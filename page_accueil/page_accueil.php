<!DOCTYPE HTML>

<html>

  <head>
    <title></title>
    <meta content="info">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="page_accueil.css" />
	
  </head>
  
  <?php   
        /*Connexion à la base de données sur le serveur tp-epua*/
		$conn = @mysqli_connect("", "", "");    
		
		/*connexion à la base de donnée depuis la machine virtuelle INFO642*/
		/*$conn = @mysqli_connect("localhost", "etu", "bdtw2021");*/  

		if (mysqli_connect_errno()) {
            $msg = "erreur ". mysqli_connect_error();
        } else {  
            $msg = "connecté au serveur " . mysqli_get_host_info($conn);
            /*Sélection de la base de données*/
            mysqli_select_db($conn, "yaox"); 
            /*mysqli_select_db($conn, "etu"); */ /*sélection de la base sous la VM info642*/
		
            /*Encodage UTF8 pour les échanges avecla BD*/
            mysqli_query($conn, "SET NAMES UTF8");
        }
		
  ?> 
  
  <body>
  
  <div class="box">
  
	<div class="logo">
	<img src="POLYTECH_ANNECY-CHAMBERY.jpg" width="200.4px" height="59.25px" style=" position:absolute;left:60px;top:10px;" alt="logoPoly">
	<img src="univ_savoie.png" width="200px" height="74px" style=" position:absolute;left:320px;top:10px;" alt="logoUniv">
	
	</div>
  
	<div class="titre" style="text-align:center;">
	  
      <p id="text">Projet Entretien</p>
	  <video id= "bgvideo" preload="auto" loop="" muted="" autoplay="" playsinline=""  style="text-align:center;position:absolute;top:94px;left:50%;bottom:0;transform:translateX(-50%);">
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
	
  
		<div class="con">
		<?php
			if( file_exists("page_".$page.".php") ){ 
				include("page_".$page.".php");
			}
		?>
		
		</div>
		
	</div>
  
    <div class="pied">
      <p>Polytech Annecy-Chambéry - IGI642 BTDW - Projet Entretient</p></br>
	  <span style="color:gris ;font-size:20px" >Notre équipe: Bourabi Kaoutar, Drouin Lola, Hassani Yawoumihani, Pascal Quentin, Randriamahefa Nomentsoa, Theze Doriane, Yao Xin</span>
    </div>
 
  </div>
  
  
  
  </body>
</html>  
  
  
  
