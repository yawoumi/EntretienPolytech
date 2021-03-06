<!DOCTYPE HTML>

<html>

	<head>
		<title>Consultation et saisie fiche entretien</title>
		<meta content="info">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="page_accueil.css" />
	</head>
	
	<?php
	session_start(); #Afin d'utiliser des variables dans tout le programme, nous les conservons dans une session
	?>
	
	<body>
	
	<!-- Habillage de la page web -->
	
	<div class="box"> 
  
		<div class="logo">
			<img src="http://localhost/EntretienPolytech/Data/POLYTECH_ANNECY-CHAMBERY.jpg" width="200.4px" height="59.25px" style=" position:absolute;left:60px;top:10px;" alt="logoPoly">
			<img src="http://localhost/EntretienPolytech/Data/univ_savoie.png" width="200px" height="74px" style=" position:absolute;left:320px;top:10px;" alt="logoUniv">
		</div>
  
		<div class="titre" style="text-align:center;">
	  		<p id="text">Projet Entretien</p>
	  		<video id= "bgvideo" preload="auto" width="100%" controls="controls" loop="" muted="" autoplay="" playsinline=""  style="text-align:center;position:absolute;top:94px;left:50%;bottom:0;transform:translateX(-50%);">
                <source src="http://localhost/EntretienPolytech/Data/HomePolytech.mp4" type="video/mp4">
                <source src="http://localhost/EntretienPolytech/Data/HomePolytech.webm" type="video/webm">
                <source src="http://localhost/EntretienPolytech/Data/HomePolytech.ogg" type="video/ogg">                                
      		</video>
    	</div>
	
	<!-- Menu qui permet de naviguer entre les pages du site -->
	
		<div class="contenu">
			<div class="menu">
		  
		  		<ul id="lemenu">
		  			<span style="font-size:20px" >
		  				<?php  
						$encours = array(" "," "," "," "," ");
						if( !isset($_GET["page"]) ) { 
							$page=0;
						}else{
							$page=$_GET["page"];
						}
						$encours[$page] = "encours";
       
						echo "<li><a href=\"?page=0\" class=\"btn_menu $encours[0]\">Accueil</a></li><br>";
						echo "<li><a href=\"?page=1\" class=\"btn_menu $encours[1]\">Enseignant</a></li><br>";
						echo "<li><a href=\"?page=2\" class=\"btn_menu $encours[2]\">Etudiant</a></li><br>";   
			   
						?> 
		  			</span>
		  		</ul>
		
			</div>
	
  
			<div class="con" >
			
		<div>

<?php   
        /*Connexion ?? la base de donn??es sur le serveur tp-epua*/
		$conn = @mysqli_connect("localhost", "root", "", "infotppres2");    

		if (mysqli_connect_errno()) {
            $msg = "erreur ". mysqli_connect_error();
        } else {  
            $msg = "connect?? au serveur " . mysqli_get_host_info($conn);
            /*S??lection de la base de donn??es*/
            mysqli_select_db($conn, "pascalq"); 
		
            /*Encodage UTF8 pour les ??changes avecla BD*/
            mysqli_query($conn, "SET NAMES UTF8");
        }
		
  ?> 
  
  
  <form action="entretien.php" method="post"> <!-- Menu d??roulant permettant ?? l'enseignant de s'identifier -->
  
	<label> Enseignant : </label>
	<select name = "idEns">
		<option> Choisir </option>
		
		<?php

		$sql_ens = "SELECT idEns_Enseignant, prenomEns_Enseignant, nomEns_Enseignant FROM Enseignant";
		$result_ens = mysqli_query($conn, $sql_ens);
		
		while ($val = mysqli_fetch_array($result_ens)) {
			
			echo "<option value =".$val["idEns_Enseignant"]."> {$val["prenomEns_Enseignant"]} {$val["nomEns_Enseignant"]}</option>";
			
		}
	?>
	</select>

	<button type="submit">Envoyer</button>

</form>

<?php
	if ( isset ( $_POST["idEns"])){ #Apr??s que l'enseigant se soit identifi??
		
		$id_Ens = $_POST["idEns"];
		$sql_nom_ens = "SELECT prenomEns_Enseignant, nomEns_Enseignant FROM Enseignant WHERE $id_Ens = idEns_Enseignant";
		$result_nom_ens = mysqli_query($conn, $sql_nom_ens);
		
		while ($val = mysqli_fetch_array($result_nom_ens)) {

			echo "Vous ??tes connect?? en tant que ".$val['prenomEns_Enseignant']." ".$val['nomEns_Enseignant']; #On affiche le pr??nom et le nom de l'enseignant identifi??
	
		}
		
	}

?>
	
	



<?php
if ( isset ( $_POST["idEns"])){ #Apr??s que l'enseigant se soit identifi??
	
	$_SESSION["id_Ens"] = $_POST["idEns"]; #On sauvegarde cette l'id de l'enseignant dans la session
	
	echo "<form action='entretien.php' method='post'>"; #Menu d??roulant permettant de chosir l'entretien dont on veut retrouver les r??sultats ?? partir du pr??nom et du nom de l'??tudiant

	echo "<label> R??sultats des entretiens pass??s : </label>";
	echo "<select name = 'entretien'>";
		echo "<option> Choisir </option>";
	
		#Il ne faut afficher l'entretien que si l'enseigant identifi?? y a particip??
		$sql_ent = "SELECT ent.idEnt_Entretien, etu.prenomEtu_Etudiant, etu.nomEtu_Etudiant  FROM Entretien ent JOIN Etudiant etu ON etu.idEtu_Etudiant = ent.idEtu_Etudiant, Enseignant ens WHERE ens.idEns_Enseignant = {$_POST["idEns"]} AND ({$_POST["idEns"]} = ent.idEns_Enseignant1 OR {$_POST["idEns"]} = ent.idEns_Enseignant2)";
		$result_ent = mysqli_query($conn, $sql_ent);
		
		while ($val = mysqli_fetch_array($result_ent)) {
			
			echo "<option value =".$val["idEnt_Entretien"]."> {$val["prenomEtu_Etudiant"]} {$val["nomEtu_Etudiant"]}</option>";
			
		}
	
	echo "</select>";

	echo "<button type='submit'>Envoyer</button>";
echo "</form>";

echo "<form action='entretien.php' method='post'>"; #Menu d??roulant permettant de choisir l'entretien en cours afin de remplir la grille de notation

	echo "<fieldset>";
		echo "<legend>Entretien en cours</legend>";
		echo "<label>??l??ve ?? ??valuer : </label>";
		echo "<select name = 'idEnt_Entretien'>";
		echo "<option> Choisir </option>";
	echo "</fieldset>";
	
	#On estime qu'un entretien n'est pas pass?? tant que les deux grilles de notations ne sont pas remplies, ce menu affiche donc les ??tudiants participant ?? des entretiens dont au moins une des deux grille est vide et si l'enseignant y participe
	$sqlEEC = "SELECT ent.idEnt_Entretien, etu.prenomEtu_Etudiant, etu.nomEtu_Etudiant  FROM Entretien ent JOIN Etudiant etu ON etu.idEtu_Etudiant = ent.idEtu_Etudiant JOIN Resultat r ON r.idR_Resultat = ent.idR_Resultat,
	Enseignant ens WHERE ens.idEns_Enseignant = {$_POST["idEns"]} AND ({$_POST["idEns"]} = ent.idEns_Enseignant1 OR {$_POST["idEns"]} = ent.idEns_Enseignant2) AND (r.grille1_Resultat IS NULL OR r.grille2_Resultat IS NULL)";
	
	$resultEEC = mysqli_query($conn, $sqlEEC);
	while ($val = mysqli_fetch_array($resultEEC)) { /* On affiche les entretiens en question */
		
		echo "<option value =".$val['idEnt_Entretien']."> {$val["prenomEtu_Etudiant"]} {$val["nomEtu_Etudiant"]} </option>";
	}
	echo "</select>";
	echo "<button type='submit'>Envoyer</button>";
echo "</form>";
}


if ( isset ( $_POST["entretien"])){ #Si l'enseignant d??cide de voir les r??sultats d'un entretien pass??s

	/* On part du principe pour le moment qu'un ??tudiant ne passe qu'un entretien*/
	
	#Il y a deux enseignants qui juge un entretien, il faut donc identifier si l'enseignant est l'enseigant n??1 ou n??2 de l'entretien en question.
	$sql_id_ens1 = "SELECT idEns_Enseignant FROM Enseignant JOIN Entretien ON idEns_Enseignant = idEns_Enseignant1 WHERE {$_POST["entretien"]} = idEnt_Entretien";
	$result_id_ens1 = mysqli_query($conn, $sql_id_ens1);
	$sql_id_ens2 = "SELECT idEns_Enseignant FROM Enseignant JOIN Entretien ON idEns_Enseignant = idEns_Enseignant2 WHERE {$_POST["entretien"]} = idEnt_Entretien";
	$result_id_ens2 = mysqli_query($conn, $sql_id_ens2);
	#echo $sql_nom_ens2. "</br>";
	

	while ($val = mysqli_fetch_array($result_id_ens1)) {
		
		if ($_SESSION["id_Ens"] == $val['idEns_Enseignant']) { #Si l'id de l'enseignant identifi?? est le m??me que celui de l'enseignant n??1
			
			echo "Vous avez rempli la grille n??1 </br>";
			$_SESSION["num_ens"] = 1; #On stocke l'information dans une variable session afin de l'utiliser dans tout le programme
		}	
	
	}
	
	while ($val = mysqli_fetch_array($result_id_ens2)) {

		if ($_SESSION["id_Ens"] == $val['idEns_Enseignant']) {
			
			echo "Vous avez rempli la grille n??2 </br>";
			$_SESSION["num_ens"] = 2;
		}		
	
	}
	
	
	$sql = "SELECT r.idR_Resultat FROM Resultat r JOIN Entretien e ON r.idR_Resultat = e.idR_Resultat WHERE r.idR_Resultat = (SELECT idR_Resultat FROM Entretien WHERE {$_POST["entretien"]} = idEnt_Entretien)"; /* Retourne les idR pour les deux r??sultats de l'entretien s??lectionn??*/
	$result = mysqli_query($conn, $sql);
	
	$sql_session = "SELECT idT_Type_Session FROM Passe WHERE idEtu_Etudiant = (SELECT idEtu_Etudiant FROM Entretien WHERE idEnt_Entretien = {$_POST["entretien"]})"; /* Retourne l'id de la session correspondant ?? l'??tudiant afin d'adopter le bon affichage des crit??res*/ 
	
	$sql_nomsession = "SELECT descriptionT_Type_Session FROM Type_Session WHERE ($sql_session) = idT_Type_Session"; #Retourne la description de la session de l'entretien
	$result_nomsession = mysqli_query($conn, $sql_nomsession);
		
	$sql_resultats = "SELECT grille1_Resultat, grille2_Resultat, noteR_Resultat FROM Resultat WHERE ($sql) = idR_Resultat"; /* Retourne le contenu de la fiche de r??sultats*/
	$result_resultats = mysqli_query($conn, $sql_resultats);
	
	while ($val = mysqli_fetch_array($result_nomsession)) { #On affiche le type de l'entretien
			
			echo "Type de la session : ".$val['descriptionT_Type_Session']."</br>";
			
		}
	
	while ($val = mysqli_fetch_array($result_resultats)) { #On affiche les r??sultats des deux grilles et enfin, la moyenne des deux correspondant ?? la note finale
			
			echo " Grille 1 : ".$val['grille1_Resultat']. "</br>"." Grille 2 : ".$val['grille2_Resultat']."</br>". " Note finale : ".$val['noteR_Resultat'];
			
		}
} 


    if (isset ($_POST["idEnt_Entretien"])){ #Si l'enseignant s??lectionne un entretien en cours
		
	#On est confront?? au m??me probl??me, il faut identifier l'enseignant afin de savoir dans quel emplacement de la base de donn??e il faudra rentrer sa note
	
	$sql_id_ens1 = "SELECT idEns_Enseignant FROM Enseignant JOIN Entretien ON idEns_Enseignant = idEns_Enseignant1 WHERE {$_POST["idEnt_Entretien"]} = idEnt_Entretien";
	$result_id_ens1 = mysqli_query($conn, $sql_id_ens1);
	$sql_id_ens2 = "SELECT idEns_Enseignant FROM Enseignant JOIN Entretien ON idEns_Enseignant = idEns_Enseignant2 WHERE {$_POST["idEnt_Entretien"]} = idEnt_Entretien";
	$result_id_ens2 = mysqli_query($conn, $sql_id_ens2);
	
	$sql_id_res = "SELECT r.idR_Resultat FROM Resultat r JOIN Entretien e ON r.idR_Resultat = e.idR_Resultat";
	$result_id_res = mysqli_query($conn, $sql_id_res);
	
	while ($val = mysqli_fetch_array($result_id_res)) {
	
		$_SESSION["idResult"] = $val["idR_Resultat"];
	
	}

	while ($val = mysqli_fetch_array($result_id_ens1)) {
		
		if ($_SESSION["id_Ens"] == $val['idEns_Enseignant']) {
			
			$_SESSION["num_ens"] = 1;
		}	
	
	}
	
	while ($val = mysqli_fetch_array($result_id_ens2)) {

		if ($_SESSION["id_Ens"] == $val['idEns_Enseignant']) {
			
			$_SESSION["num_ens"] = 2;
		}		
	
	}
	
        #On recupere les crit??res et leur id necessaires ?? l'??valuation de ce type de session
        $sql_crit = "SELECT c.idC_Critere,descriptionC_Critere FROM Critere AS c JOIN Possede AS p ON c.idC_Critere=p.idC_Critere JOIN Type_Session AS ts ON ts.idT_Type_Session=p.idT_Type_Session WHERE p.idT_Type_Session = (SELECT idT_Type_Session FROM Passe p JOIN Entretien idE ON p.idEtu_Etudiant = idE.idEtu_Etudiant)";
        $result_crit=mysqli_query($conn,$sql_crit);
		
        #Cr??ation de la grille d'??valuation sous forme de tableau contenant un formulaire
        echo "<table id='table' style='width:100%'>";
        echo "<tr id='tr'>";
        echo "<th id='th'> Crit??re </th>"; 
        echo "<th id='th'> Insuffisant </th>"; #On ??value les crit??res suivant quatres niveaux diff??rents
        echo "<th id='th'> Moyen </th>";
        echo "<th id='th'> Bien </th>";
        echo "<th id='th'> Tr??s bien </th>";
        echo "</tr>" ;
        echo "<form method='post' action='entretien.php'>";
		
        while ($val=mysqli_fetch_assoc($result_crit)){
            echo "<tr id='tr'>";
            echo "<td id='td'>".$val['descriptionC_Critere']."</td>";
            echo "<td id='td'> <input type='radio' id='valeur' name=".$val['idC_Critere']." value='5' checked> </td>"; #Chaque niveau d'??valutation est assign?? ?? une note
            echo "<td id='td'> <input type='radio' id='valeur' name=".$val['idC_Critere']." value='10' checked> </td>";
            echo "<td id='td'> <input type='radio' id='valeur' name=".$val['idC_Critere']." value='15' checked> </td>";
            echo "<td id='td'> <input type='radio' id='valeur' name=".$val['idC_Critere']." value='20' checked> </td>";
            echo "</tr>";
        }    
        echo "</table>";
        echo "<p><button type='submit' name='eval'> Entrer </button></p>";
        echo "</form>";
    }
 
    #Si on appuit sur le bouton pour valider la grille 
    if (isset($_POST["eval"])){
		
        $somme=0; #On d??clare une variable qui repr??sente la somme des notes
        $nb=0; #Et une autre qui repr??sente le nombre de crit??res not??s
		
        #Recup??re chacune des valeurs correspondant aux criteres et en fait la somme
        foreach ($_POST as $note){
			if ($note == NULL) { #Permet d'??viter de se retrouver avec une note NULL
				break;
			}
			
            $somme=$somme+$note;
            $nb++;
            }
			
        #On divise par nb-1 car $note prend une valeur vide a la fin
		
        $moy=$somme/($nb); #Pas besoin du -1 car on augemente par $nb si la note est NULL
		
        #On doit maintenant decider dans quel attribut de la bdd on entre la valeur  
		
        if ($_SESSION["num_ens"] == 1) { #Si l'enseignant correspond ?? l'enseignant n??1

			#Partant du principe que l'entretien est d??j?? cr??e, il ne faut que modifier la base de donn??es, en modifiant les valeurs NULL
			$sql_grille= "UPDATE Resultat SET grille1_Resultat = {$moy} WHERE {$_SESSION["idResult"]} = idR_Resultat"; //Ins??re la moyenne de la fiche de r??sultat au bon endroit, il faudrait que ce soit un UPDATE si la fiche de r??sultat est d??j?? cr??e 
            $result_grille = mysqli_query($conn,$sql_grille);
        
        #Permet d'informer l'enseignant que la note a bien ??t?? ins??r??
            echo "La note de ".$moy." a bien ??t?? entr??e";
        }
		
		
		if ($_SESSION["num_ens"] == 2) { #Si l'enseignant correspond ?? l'enseignant n??2, on fait de m??me
            $sql_grille= "UPDATE Resultat SET grille2_Resultat = {$moy} WHERE {$_SESSION["idResult"]} = idR_Resultat"; //Ins??re la moyenne de la fiche de r??sultat au bon endroit, il faudrait que ce soit un UPDATE si la fiche de r??sultat est d??j?? cr??e 
            $result_grille = mysqli_query($conn,$sql_grille);
        
        //informer la personne que tout marche
        if ($result_grille == 1) {
            echo "La note de ".$moy." a bien ??t?? entr??e";
        }
		}
		
		#La note finale d'un entretien correspond ?? la moyenne des deux notes, lorsque les deux notes sont rentr??es, il faut ins??rer dans la base de donn??es la note finale
		
		$sql_note_saisie = "SELECT grille1_Resultat, grille2_Resultat FROM Resultat WHERE {$_SESSION["idResult"]} = idR_Resultat";
		$result_note_saisie = mysqli_query($conn,$sql_note_saisie);
		
		while ($val = mysqli_fetch_array($result_note_saisie)) {
		
		if ($val["grille1_Resultat"] != NULL AND $val["grille2_Resultat"] != NULL ){ #Si les deux notes des deux enseignants sont ins??r??es
			
			$sql_note_finale = "UPDATE Resultat SET noteR_Resultat = (grille1_Resultat + grille2_Resultat) / 2 WHERE {$_SESSION["idResult"]} = idR_Resultat";
			$result_note_finale = mysqli_query($conn,$sql_note_finale);
		}	
	
	}
}
?>

</div>

<div> <a href="page_accueil.php?page=1"><br>Retourner dans la page Enseignant </a> </div> <!-- Lien permettant de revenir ?? la page enseignant -->
		
			</div>
		
		</div>
  
		<!-- Habillage du pied de la page -->
    	<div class="pied"> 
      		<p>Polytech Annecy-Chamb??ry - IGI642 BTDW - Projet Entretient</p>
	  		<span style="color:gris ;font-size:20px" >Notre ??quipe: Bourabi Kaoutar, Drouin Lola, Hassani Yawoumihani, Pascal Quentin, Randriamahefa Nomentsoa, Theze Doriane, Yao Xin</span>
    	</div>
 </div>
  
  </body>
</html> 
