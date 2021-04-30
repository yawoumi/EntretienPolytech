<!DOCTYPE html>

<html>
  <head>
    
	<meta content="info">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">

  </head>
  <body>
  <?php
 
     /*Connexion à la base de données sur le serveur tp-epua*/
		$conn = @mysqli_connect("tp-epua:3308", "bourabik", "xe7emkea");    
		
		/*connexion à la base de donnée depuis la machine virtuelle INFO642*/
		/*$conn = @mysqli_connect("localhost", "bourabik", "xe7emkea");*/  

		if (mysqli_connect_errno()) {
            $msg = "erreur ". mysqli_connect_error();
        } else {  
            $msg = "connecté au serveur " . mysqli_get_host_info($conn);
            /*Sélection de la base de données*/
            mysqli_select_db($conn, "bourabik"); 
            /*mysqli_select_db($conn, "bourabik"); */ /*sélection de la base sous la VM info642*/
		
            /*Encodage UTF8 pour les échanges avecla BD*/
            mysqli_query($conn, "SET NAMES UTF8");
        }
		
	if (isset($_POST["button"])){
		if (isset($_POST["nom"],$_POST["prenom"],$_POST["photo"])){
			
			$nom = $_POST["nom"];
			$prenom = $_POST["prenom"];
			$photo = $_POST["photo"];
		
			$sql ="INSERT INTO Etudiant(nomEtu_Etudiant,prenomEtu_Etudiant,photoEtu_Etudiant) VALUES ('".$nom."','".$prenom."','".$photo."')";
			//echo $sql;
			$result = mysqli_query($conn, $sql);
			
			if ($result == TRUE) {
				echo "Bien Ajouter !";
				
				}
				
		    $sql1 = "select idEtu_Etudiant From Etudiant 
			WHERE Etudiant.nomEtu_Etudiant = '$nom' AND Etudiant.prenomEtu_Etudiant = '$prenom' ";
			
			
			$result1 = mysqli_query($conn, $sql1);			
			 while ($row = mysqli_fetch_assoc($result1)){
				echo "Votre identifiant :".$row['idEtu_Etudiant'];
			}
			
			}	
			}	
		    
				
		

		

			
			
			
		
	    
      	
		

?>

  <form class="box" action="" method="post">
     <h1>S'enregistrer</h1>
    
	   <input type="text" name ="nom" placeholder="Entrez votre nom" required>
	   <input type="text" name ="prenom" placeholder="Entrez votre prénom " required>
	   <input type="file" name="photo" accept="image/*" capture style="color:#3498db;">/>
		
	   <input type="submit" name ="button" value="S'enregistrer">
	   <div><a href="Etudiant.php" style="color:#3498db;">Retour</a></div>
		
	   
  </form>
  
  
  
 
  
  
    
  </body>
</html>

