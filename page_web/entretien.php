<!DOCTYPE HTML>

<html>

  <head>
    <title></title>
    <meta content="info">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="page_accueil.css" />
	
  </head>
  
  
  <body>
  
  <div class="box">
  
		<div class="logo">
			<img src="POLYTECH_ANNECY-CHAMBERY.jpg" width="200.4px" height="59.25px" style=" position:absolute;left:60px;top:10px;" alt="logoPoly">
			<img src="univ_savoie.png" width="200px" height="74px" style=" position:absolute;left:320px;top:10px;" alt="logoUniv">
		</div>
  
		<div class="titre" style="text-align:center;">
	  		<p id="text">Projet Entretien</p>
	  		<video id= "bgvideo" preload="auto" width="100%" controls="controls" loop="" muted="" autoplay="" playsinline=""  style="text-align:center;position:absolute;top:94px;left:50%;bottom:0;transform:translateX(-50%);">
                <source src="HomePolytech.mp4" type="video/mp4">
                <source src="HomePolytech.webm" type="video/webm">
                <source src="HomePolytech.ogg" type="video/ogg">                                
      		</video>
    	</div>
	
	
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
        /*Connexion à la base de données sur le serveur tp-epua*/
		$conn = @mysqli_connect("tp-epua:3308", "login", "mdp");    
		
		/*connexion à la base de donnée depuis la machine virtuelle INFO642*/
		/*$conn = @mysqli_connect("localhost", "etu", "bdtw2021");*/  

		if (mysqli_connect_errno()) {
            $msg = "erreur ". mysqli_connect_error();
        } else {  
            $msg = "connecté au serveur " . mysqli_get_host_info($conn);
            /*Sélection de la base de données*/
            mysqli_select_db($conn, "drouinlo"); 
            /*mysqli_select_db($conn, "etu"); */ /*sélection de la base sous la VM info642*/
		
            /*Encodage UTF8 pour les échanges avecla BD*/
            mysqli_query($conn, "SET NAMES UTF8");
        }
		
  ?> 
  
<?php


?>  
  
  <p></p>
  <form action="entretien.php" method="post">
Nom : <input type="text" name="nom"><br/>

  <p></p>
	<label> Entretiens : </label>
	<select name = "entretien">
		<option> Choisir </option>
	
	<?php

		$sql_ent = "SELECT ent.idEnt_Entretien, etu. prenomEtu_Etudiant, etu.nomEtu_Etudiant  FROM Entretien ent JOIN Etudiant etu ON etu.idEtu_Etudiant = ent.idEtu_Etudiant";
		//echo $sql_ent;
		$result_ent = mysqli_query($conn, $sql_ent);
		
		while ($val = mysqli_fetch_array($result_ent)) {
			
			echo "<option value =".$val["idEnt_Entretien"]."> {$val["prenomEtu_Etudiant"]} {$val["nomEtu_Etudiant"]}</option>";
			
		}
	?>
	
	</select>

	<button type="submit">Envoyer</button>
</form>

<?php
	/*Consulation des fiches de résultats remplies*/

if ( isset ( $_POST["entretien"], $_POST["nom"])){ /* On part du principe pour le moment qu'un étudiant ne passe qu'un entretien*/
	
	echo $_POST["entretien"]. "</br>";
	$sqlTest = "SELECT s.nomS_Salle FROM Salle s JOIN Entretien e ON s.idS_Salle = e.idS_Salle WHERE e.idEnt_Entretien = {$_POST["entretien"]}";
	echo $sqlTest. "</br>";
	$resultTest =  mysqli_query($conn, $sqlTest);
	while ($val = mysqli_fetch_array($resultTest)) {
			
			echo $val['nomS_Salle'];
			
		}
		
	$sqlTest1 = "SELECT prenomEns_Enseignant FROM Enseignant WHERE nomEns_Enseignant = '{$_POST["nom"]}'";
	$resultTest1 =  mysqli_query($conn, $sqlTest1);
	while ($val = mysqli_fetch_array($resultTest1)) {
			
			echo $val['prenomEns_Enseignant'];
			
		}
	
	$sql = "SELECT idR_Resultat FROM Resultat r JOIN Entretien e ON r.entretien_ident_entretien = e.idEnt_Entretien WHERE r.entretien_ident_entretien = {$_POST["entretien"]}"; /* Retourne les idR pour les deux résultats de l'entretien sélectionné*/
	$result = mysqli_query($conn, $sql);
	
	$sql_session = "SELECT idT_Type_Session FROM Passe WHERE {$_POST["entretien"]} = (SELECT idEtu_Etudiant FROM Entretien WHERE idEnt_Entretien = {$_POST["entretien"]}"; /* Retourne l'id de la session correspondant à l'étudiant afin d'adopter le bon affichage des résultats*/ 
	$result_session = mysqli_query($conn, $sql_session);
	#$type_session = mysqli_fetch_array ($result2, MYSQLI_BOTH); /* Insère le l'id de la session dans un tableau, on retrouve l'unique id dans l'index 0 tu tableau*/
	
		
	$sql_resultats = "SELECT grille1_Resultat, grille2_Resultat, noteR_Resultat FROM Resultat WHERE $sql = idR_Resultat"; /* Retourne le contenu de la fiche de résultats*/
	$result_resultats = mysqli_query($conn, $sql_resultats);
	#$resultat_affiche = mysqli_fetch_array($result3, MYSQLI_BOTH);
	
	$sql4 = "SELECT nomEns_Enseignant FROM Enseignant WHERE '{$_POST["nom"]}' = nomEns_Enseignant	"; /* Retourne le nom de l'enseigant qui a noté*/
	$result4 = mysqli_query($conn, $sql4);
	$nom_enseign = mysqli_fetch_array ($result4, MYSQLI_BOTH); /* Insère le le nom de l'enseignant dans un tableau, on le retrouve dans l'index 0 tu tableau*/
	
	while ($val = mysqli_fetch_array($result_session)) {
			
			echo $val['idT_Type_Session'];
			
		}
	#echo "Entretien de : ".$type_session[0];
	
	while ($val = mysqli_fetch_array($result_resultats)) {
			
			echo "Grille 1 : ".$result_resultats[0]." Grille 2 : ".$result_resultats[1]." Résultat : ".$result_resultats[2];
			
		}
	
	#echo "Grille 1 : ".$resultat_affiche[0];
	#echo "Grille 2 : ".$resultat_affiche[1];
	#echo "Résultat : ".$resultat_affiche[2];
	
	#while ($row = mysqli_fetch_array($result_resultats)) {
			
		#$cpt = 1;	
		#echo "Enseignant : ".$nom_enseign[0]; /* On affiche le nom de l'enseignant, on pourrait aussi afficher le nom de l'étudiant*/
		#echo "<li> "."Critère ".$cpt." : ". $row[0];
		#$cpt = $cpt + 1;
		/* echo ("<li> "."Contenu de l'exposé ".$row["contenu"]." Qualité des supports ". $row["qualite_support"]. " Qualité de l'expression". $row["qualite_expre"]. " Réponse aux questions :". $row["reponse"]."</li>\n");*//* Puis les critères de notation (nous le moment sous forme de texte*/
		
		/* Pensé pour une liste de critère propre à chaque entretien, sinon je vois pas comment faire une solution généralisée à tous les types de résultats*/
	#}

} 
?>

<!-- Saisie des notes par les enseignants, formulaire sous forme de cases à cochées/menu déroulant
	 Différents formulaires en fonction du type de l'entretien -->
  <p></p>
<form action="entretien.php" method="post"> <!-- Liste déroulante permettant de choisir le type de l'entretien --> 

	<fieldset>
		<legend>Choix du type d'entretien</legend>
		<label>Types d'entretiens : </label>
		<select name = "id_Type_Session">
		<option> Choisir </option>
	</fieldset>
	
<?php
	
	$sqlTE = "SELECT idT_Type_Session, descriptionT_Type_Session FROM Type_Session"; /*Type de l'entretien*/
	$resultTE = mysqli_query($conn, $sqlTE);
	
	while ($val = mysqli_fetch_array($resultTE)) { /* On affiche les différents types d'entretiens */
		
		echo "<option value =".$val['idT_Type_Session']."> {$val["descriptionT_Type_Session"]} </option>";
		
	}
?>
	</select>
	
	<label>Numéro Enseignant : </label>
	<select name = "name_grille">
		<option> Choisir </option>
		<option value="grille1">Enseignant 1</option>
		<option value="grille2">Enseignant 2</option>
	</fieldset>
	
	</select>
	
	<button type="submit">Envoyer</button>
</form>

<?php
    //recupere les donnees liees au type de session, Récupérable avec des requêtes existantes
    //$sql1 ="SELECT idT_Type_Session, descriptionT_Type_Session FROM Type_Session";
    //$result1=mysqli_query($conn,$sql1);
    ?>

 

    <!--creation du formulaire permettant au prof de choisir le type de session qu'il veut, Déjà fait 
	<form action="info642tableau critère.php" method="post">
    <label for="session">Choisi un type de session:</label><br>
    <select id="session" name="session">
    <?php
    //while ($val1=mysqli_fetch_assoc($result1)){
        //echo "<option value=".$val1['idT_Type_Session'].">".$val1['descriptionT_Type_Session']."</option>";
    //}
    ?>
    </select>
    <p><button type="submit" name="submit"> Choisir </button></p>
    </form>
	-->
    
    <?php
    //une fois le type de session valide
    if (isset ($_POST["id_Type_Session"])){
        //$idsession= $_POST["id_Type_Session"];
        // on recupere les criteres et leur id necessaire a l'evaluation de ce type de session
        $sql_crit = "SELECT c.idC_Critere,descriptionC_Critere FROM Critere AS c JOIN Possede AS p ON c.idC_Critere=p.idC_Critere JOIN Type_Session AS ts ON ts.idT_Type_Session=p.idT_Type_Session WHERE p.idT_Type_Session = {$_POST["id_Type_Session"]}";
		//echo $sql_crit. "</br>";
        $result_crit=mysqli_query($conn,$sql_crit);
        // creation de la grille d'evaluation sous forme de tableau contenant un formulaire
        echo "<table id='table' style='width:100%'>";
        echo "<tr id='tr'>";
        echo "<th id='th'> Critère </th>";
        echo "<th id='th'> Insuffisant </th>";
        echo "<th id='th'> Moyen </th>";
        echo "<th id='th'> Bien </th>";
        echo "<th id='th'> Très bien </th>";
        echo "</tr>" ;
        echo "<form method='post' action='entretien.php'>";
        while ($val=mysqli_fetch_assoc($result_crit)){
            echo "<tr id='tr'>";
            echo "<td id='td'>".$val['descriptionC_Critere']."</td>";
            echo "<td id='td'> <input type='radio' id='valeur' name=".$val['idC_Critere']." value='5' checked> </td>";
            echo "<td id='td'> <input type='radio' id='valeur' name=".$val['idC_Critere']." value='10' checked> </td>";
            echo "<td id='td'> <input type='radio' id='valeur' name=".$val['idC_Critere']." value='15' checked> </td>";
            echo "<td id='td'> <input type='radio' id='valeur' name=".$val['idC_Critere']." value='20' checked> </td>";
            echo "</tr>";
        }    
        echo "</table>";
        echo "<p><button type='submit' name='eval'> Entrer </button></p>";
        echo "</form>";
    }
    ?>
    
    <?php 
    //si on appuit sur le bouton pour valider la grille 
    if (isset($_POST["eval"])){
        $somme=0;
        $nb=0;
        //recupere chacune des valeurs correspondant aux criteres et en fait la somme
        foreach ($_POST as $note){
			if ($note == NULL) { // Permet d'éviter de se retrouver avec une note NULL
				break;
			}
			//echo "note :". $note;
            //echo "note".$note."<br>";
            //echo "nb".$nb."<br>";
            $somme=$somme+$note;
            $nb++;
            //echo "somme".$somme."<br>";
            }
        // je divise par nb-1 car $note prend une valeur vide a la fin, nb passe donc 3 fois dans le foreach
        $moy=$somme/($nb); // Pas besoin du -1 car on augemente par $nb si la note est NULL
        //echo "moy".$moy;
        //decider dans quel attribut de la bdd on entre la valeur  
		
        if ($_POST["name_grille"]="grille1") {
            $sql_grille= "INSERT INTO Resultat (grille1_Resultat) VALUES ($moy)"; //Insère la moyenne de la fiche de résultat au bon endroit, il faudrait que ce soit un UPDATE si la fiche de résultat est déjà crée 
			//echo $sql_grille;
            $result_grille = mysqli_query($conn,$sql_grille);
        }
        //informer la personne que tout marche
        if ($result_grille == 1) {
            echo "La note de ".$moy." a bien été entrée";
        }
    }
    ?>

<?php
	
if ( isset ($_POST["descriptionT_Type_Session"])){ #Si l'enseignant à choisi une type d'entretien, on doit lui afficher la liste des critères à remplir

/*
	if ($_POST["descriptionT_Type_Session"] == "APP"){
		
		while ($row = mysqli_fetch_array($result3)) {
			
		$cpt = 1;	
		echo ("<li> "."Critère ".$cpt." : ". $row[0]);
		
		if ($cpt == 1){
			echo '<form action = "entretien.php" method = "post"> 
				<input type="checkbox"
					name="les_deux"
					value="A"> A - Bien structuré et bonne prise de recul
				<input type="checkbox"
					name="un_seul"
					value="B"> B - Un seul des deux critères précédents est satisfait
				<input type="checkbox"
					name="aucun"
					value="C"> C - Aucun des deux critères est satisfait
				</form>';
		}
		
		if ($cpt == 2){
			echo '<form action = "entretien.php" method = "post"> 
				<input type="checkbox"
					name="total"
					value="A"> A - Attentes totalement satisfaites
				<input type="checkbox"
					name="partiel"
					value="B"> B - Attentes partiellement satisfaites
				<input type="checkbox"
					name="non"
					value="C"> C - Attentes non satisfaites
			</form>';
		}
		
		$cpt = $cpt + 1;
		}
		
		echo '<form action = "entretien.php" method = "post">
				<button type="submit" name="bouton">Envoyer</button>
			</form>';
			
		if ( isset ($_POST["bouton"])){
			
			$sql6 = "INSERT INTO Resultat (, id_zone) VALUES ('SELECT id_actionneur FROM actionneur WHERE nom = $actionneur', 'SELECT id_zone FROM zone WHERE nom = $zone')"; #A faire en fonction de la BDD
			$result6 = mysqli_query($conn, $sql6);
			echo "Le résultat a bien été envoyé";
			
		}
	}
		
	if ($_POST["descriptionT_Type_Session"] == "R&D"){
		
		while ($row = mysqli_fetch_array($result3)) {
			
		$cpt = 1;	
		echo "<li> "."Critère ".$cpt." : ". $row[0];
		$cpt = $cpt + 1;
		echo '<form action = "entretien.php" method = "post"> 
			<input type="checkbox"
				name="tres_bien"
				value="TB"> Très Bien
			<input type="checkbox"
				name="bien"
				value="B"> Bien
			<input type="checkbox"
				name="moyen"
				value="M"> Moyen
			<input type="checkbox"
				name="insuff"
				value="I"> Insuffisant
			<input type="checkbox"
				name="sans_obj"
				value="SO"> Sans Objet
		</form>';
		}
		
		echo '<form action = "entretien.php" method = "post">
				<button type="submit" name="bouton">Envoyer</button>
			</form>';
			
		$sql7 = "INSERT INTO resultat (id_actionneur, id_zone) VALUES ('SELECT id_actionneur FROM actionneur WHERE nom = $actionneur', 'SELECT id_zone FROM zone WHERE nom = $zone')"; #A faire en fonction de la BDD
		$result7 = mysqli_query($conn, $sql7);
		echo "Le résultat a bien été envoyé";
	}
	
	if ($_POST["descriptionT_Type_Session"] == "FI4"){
		
		while ($row = mysqli_fetch_array($result3)) {
			
		$cpt = 1;	
		echo "<li> "."Critère ".$cpt." : ". $row[0];
		$cpt = $cpt + 1;
		echo '<form action = "entretien.php" method = "post"> 
			<input type="checkbox"
				name="tres_bien"
				value="TB"> Très Bien
			<input type="checkbox"
				name="bien"
				value="B"> Bien
			<input type="checkbox"
				name="moyen"
				value="M"> Moyen
			<input type="checkbox"
				name="insuff"
				value="I"> Insuffisant
		</form>';
		}
		
		echo '<form action = "entretien.php" method = "post">
				<button type="submit" name="bouton">Envoyer</button>
			</form>';
			
		$sql8 = "INSERT INTO resultat (id_actionneur, id_zone) VALUES ('SELECT id_actionneur FROM actionneur WHERE nom = $actionneur', 'SELECT id_zone FROM zone WHERE nom = $zone')"; #A faire en fonction de la BDD
		$result7 = mysqli_query($conn, $sql8);
		echo "Le résultat a bien été envoyé";
	}
*/
}
?>
</div>
<div> <a href="page_accueil.php?page=1">retourner dans la page Enseignant </a> </div>
		
			</div>
		
		</div>
  
    	<div class="pied">
      		<p>Polytech Annecy-Chambéry - IGI642 BTDW - Projet Entretient</p></br>
	  		<span style="color:gris ;font-size:20px" >Notre équipe: Bourabi Kaoutar, Drouin Lola, Hassani Yawoumihani, Pascal Quentin, Randriamahefa Nomentsoa, Theze Doriane, Yao Xin</span>
    	</div>
 </div>
  
  
  
  </body>
</html>  
