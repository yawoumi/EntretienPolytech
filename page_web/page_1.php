<!DOCTYPE HTML>
<html>
  <head>
    <title></title>
    <meta content="info">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="page_accueil.css">
  </head>
 
<body> 
<?php
$conn = @mysqli_connect("localhost", "root", "", "infotppres2") or die ("Impossible de se connecter: ".mysqli_connect_error());
mysqli_select_db($conn, "infotppres2") or die("Impossible de sélectionner la base: ".mysqli_connect_error());
mysqli_query($conn, "SET NAMES UTF8");
?>
  <!--Entrer les disponibilités une à une-->
	<h2>Sélectionner une disponibilité</h2>
	<form action="page_accueil.php?page=1" method="post">
	Nom: <input type="text" name="nom"><br>
	Prénom: <input type="text" name="prenom"><br>
	<select id="dispoE" name="dispoE">
	<?php
	$sql4="SELECT idDEns_DispoEnseignant, dateDEns_DispoEnseignant, heureD_DispoEnseignant FROM DispoEnseignant;";
	$result4=mysqli_query($conn, $sql4);
	while ($row = mysqli_fetch_assoc($result4)) {
			echo "<option value=".$row['idDEns_DispoEnseignant']."> Le ".$row['dateDEns_DispoEnseignant']." ".$row['heureD_DispoEnseignant']."</option>";
	}
	?>
	</select>
	<input type="submit" value="Entrer ma disponibilité">
	</form>
	 
	</br>
  <?php
	if (empty($_POST['nom']) or empty($_POST['prenom']) or empty($_POST["dispoE"])){
		echo "Veuillez vous identifier et sélectionner un horaire.";
	}else{
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$dispoE = $_POST["dispoE"];
	$sql3="SELECT idEns_Enseignant FROM Enseignant WHERE nomEns_Enseignant='".$nom."' AND prenomEns_Enseignant='".$prenom."';";
	$result3 = mysqli_query($conn, $sql3);
	$row3 = mysqli_fetch_assoc($result3);
	$sql2= "INSERT INTO a_des_disponibilites
			values ({$row3['idEns_Enseignant']},{$dispoE},1);";
			
#values (convert('".$row3['idEns_Enseignant']."', UNSIGNED),convert('".$dispoE."', UNSIGNED));";

	$result2 = mysqli_query($conn, $sql2);
	echo "Horaire enregistré.";
	}
  ?>
  <h2>Mes horaires</h2>
  <form action="page_accueil.php?page=1" method="post">
	<p>Veuillez entrer votre nom et prénom:</p>
	Nom: <input type="text" name="nom"><br>
	Prénom: <input type="text" name="prenom"><br>
	
	<button type="submit">M'identifier</button>
	
	<?php
	if (!empty($_POST['nom']) and !empty($_POST['prenom'])){
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	}
	?>
	</form>
	
  <h3>Mes disponibilités sélectionnées:</h3>
  <?php
  if (empty($_POST['nom']) or empty($_POST["prenom"])){
		echo "Veuillez vous identifier";
	}
  else{
  $sql1="SELECT dateDEns_DispoEnseignant, heureD_DispoEnseignant 
		FROM Enseignant as ens JOIN a_des_disponibilites as ad ON ens.idEns_Enseignant=ad.idEns_Enseignant
		JOIN DispoEnseignant as de ON ad.idDEns_DispoEnseignant=de.idDEns_DispoEnseignant 
		WHERE nomEns_Enseignant='".$nom."' AND prenomEns_Enseignant='".$prenom."';";
  $result1 = mysqli_query($conn, $sql1);
  echo "<table id='table'> 
        <tr id='tr'>
        <th id='th'>Date</th>
		<th id='th'>Heure</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($result1)) { 
        echo "<tr id='tr'>\n";
        echo "<td id='td'>".$row['dateDEns_DispoEnseignant']."</td>";
		echo "<td id='td'>". $row['heureD_DispoEnseignant']."</td>";
        echo "</tr>\n";
    }
    echo "</table>";
  }
  ?>
  <!--Affiche les affectations d'entretien-->
  <h3>Mes entretiens:</h3>
<?php
	if (empty($_POST['nom']) or empty($_POST["prenom"])){
		echo "Veuillez vous identifier";
	}
  else{
	$sql = "SELECT  dateH_Horaires, heureH_Horaires, nomS_Salle, descriptionT_Type_Session, nomEtu_Etudiant, prenomEtu_Etudiant 
	FROM (SELECT idEns_Enseignant FROM Enseignant WHERE nomEns_Enseignant='".$nom."' AND prenomEns_Enseignant='".$prenom."') AS prof
	JOIN Entretien as ent ON prof.idEns_Enseignant=ent.idEns_Enseignant1
	JOIN Etudiant AS etu ON ent.idEtu_Etudiant=etu.idEtu_Etudiant 
	JOIN Passe AS p ON etu.idEtu_Etudiant=p.idEtu_Etudiant 
	JOIN Type_Session AS ts ON p.idT_Type_Session=ts.idT_Type_Session 
	JOIN se_deroule as der ON ent.idEnt_Entretien=der.idEnt_Entretien
	JOIN Salle AS s ON der.idS_Salle=s.idS_Salle
	JOIN Horaires AS h ON der.idH_Horaires=h.idH_Horaires; ";
    $result = mysqli_query($conn, $sql);
	$sql0="SELECT  dateH_Horaires, heureH_Horaires, nomS_Salle, descriptionT_Type_Session, nomEtu_Etudiant, prenomEtu_Etudiant 
	FROM (SELECT idEns_Enseignant FROM Enseignant WHERE nomEns_Enseignant='".$nom."' AND prenomEns_Enseignant='".$prenom."') AS prof
	JOIN Entretien as ent ON prof.idEns_Enseignant=ent.idEns_Enseignant2
	JOIN Etudiant AS etu ON ent.idEtu_Etudiant=etu.idEtu_Etudiant 
	JOIN Passe AS p ON etu.idEtu_Etudiant=p.idEtu_Etudiant 
	JOIN Type_Session AS ts ON p.idT_Type_Session=ts.idT_Type_Session 
	JOIN se_deroule as der ON ent.idEnt_Entretien=der.idEnt_Entretien
	JOIN Salle AS s ON der.idS_Salle=s.idS_Salle
	JOIN Horaires AS h ON der.idH_Horaires=h.idH_Horaires; ";
	$result0 = mysqli_query($conn, $sql0);
	echo "<ul>";
	while ($row=mysqli_fetch_array($result)) {
		echo "<li>\n";
		echo $row[3]." le ".$row[0]." à ".$row[1]." en ".$row[2]." pour ".$row[4]." ".$row[5];
		echo "</li>\n";
	}
	while ($row=mysqli_fetch_array($result0)) {
		echo "<li>\n";
		echo $row[3]." le ".$row[0]." à ".$row[1]." en ".$row[2]." pour ".$row[4]." ".$row[5];
		echo "</li>\n";
	}
	echo "</ul>";
  }
?>
  </br>
  <!--Accès à la page php por remplir les résultats-->
  <h3>Remplir les fiches critères</h3>
	<div> <a href="entretien.php">Entrer les résultats</a> </div>
</body>
</html>
