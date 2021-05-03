<!DOCTYPE html>

<html>
  <head>
	  <title> Consultation </title>
	<meta content="info">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="page_accueil.css">

  </head>
  <body>
  <?php
 
     /*Connexion à la base de données sur le serveur tp-epua*/
		$conn = @mysqli_connect("tp-epua:3308", "login", "mdp");    
		
		/*connexion à la base de donnée depuis la machine virtuelle INFO642*/
		/*$conn = @mysqli_connect("localhost", "login", "mdp");*/  

		if (mysqli_connect_errno()) {
            $msg = "erreur ". mysqli_connect_error();
        } else {  
            $msg = "connecté au serveur " . mysqli_get_host_info($conn);
            /*Sélection de la base de données*/
            mysqli_select_db($conn, "login"); 
            /*mysqli_select_db($conn, "login"); */ /*sélection de la base sous la VM info642*/
		
            /*Encodage UTF8 pour les échanges avecla BD*/
            mysqli_query($conn, "SET NAMES UTF8");
        }
	/*	
	if (isset($_POST["button"])){
		if (isset($_POST["nom"],$_POST["prenom"])){
			
			$nom = $_POST["nom"];
			$prenom = $_POST["prenom"];
			
		
			$sql ="INSERT INTO Etudiant(nomEtu_Etudiant,prenomEtu_Etudiant) VALUES ('".$nom."','".$prenom."')";
			//echo $sql;
	   
			$result = mysqli_query($conn, $sql);
			if ($result == TRUE) {
				echo "Bien Ajouter !";
				
				}
		}
	}
	*/

		
		
		
	if (isset($_POST["button1"])){
		if (isset($_POST["id"],$_POST["pw"])){
			$id = $_POST["id"];
			$pw = $_POST["pw"];
		    
			$sql1 ="select nomEtu_Etudiant,prenomEtu_Etudiant,nomS_Salle,dateH_Horaires,heureH_Horaires FROM Etudiant,Salle,Entretien,est_disponible,Horaires,se_deroule
					WHERE Etudiant.idEtu_Etudiant = '".$id."' 
					AND Salle.idS_Salle = est_disponible.idS_Salle 
					AND Horaires.idH_Horaires = est_disponible.idH_Horaires
					AND Salle.idS_Salle = se_deroule.idS_Salle 
					AND se_deroule.idH_Horaires = Horaires.idH_Horaires 
					AND Etudiant.idEtu_Etudiant = Entretien.idEtu_Etudiant;";
			
			
			
			$result1 = mysqli_query($conn, $sql1);
			while ($row = mysqli_fetch_assoc($result1)) {
			    echo '<table>';
				echo '<tr>';
				echo '<th> Nom </th>';
				echo '<th> Prenom </th>';
				echo '<th> Salle </th>';
				echo '<th> Date </th>';
				echo '<th> Heure </th>';
				echo '</tr>';
				echo '<tr>';
				echo '<td> '.$row["nomEtu_Etudiant"].' </td>';
				echo '<td> '.$row["prenomEtu_Etudiant"].' </td>';
				echo '<td> '.$row["nomS_Salle"].' </td>';
				echo '<td> '.$row["dateH_Horaires"].' </td>';
				echo '<td> '.$row["heureH_Horaires"].'</td>';
				echo '</tr>';
				echo '</table>';
				
		}
		
		    $sql2 = "SELECT noteR_Resultat FROM (SELECT * FROM Etudiant WHERE Etudiant.idEtu_Etudiant = '".$id."') as etu
			JOIN Entretien as ent ON ent.idEtu_Etudiant=etu.idEtu_Etudiant
			JOIN Resultat as res ON res.idR_Resultat=ent.idR_Resultat ;";
		    
		
		    $result2 = mysqli_query($conn, $sql2);
		   
			
			while ($row = mysqli_fetch_assoc($result2)) {
			    echo '<li>'.$row['noteR_Resultat'].'</li>';
		
				
		}
		
        
		}
	    }
	    
      	
		

?>

  <form class="box1" action="" method="post">
     <h1>Se connecter</h1>
       <input type="number" name="id" placeholder="Identifiant">
       <input type="password" name="pw" placeholder="Mot de passe">
       <input type="submit" name="button1" value="Se connecter">
	   
	   <div class="signup-link" style="color:black;"> Vous n'êtes pas un membre ?<a href="index2.php" style="color:#3498db;">Inscrivez-vous</a</div>
	  
	   
		
	   
  </form>
  
  
  
 
  
  
    
  </body>
</html>
