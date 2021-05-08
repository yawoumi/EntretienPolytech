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
				<?php
					if( file_exists("page_".$page.".php") ){ 
						include("page_".$page.".php");
						}
				?>
		
			</div>
		
		</div>
  
    	<div class="pied">
      		<p>Polytech Annecy-Chambéry - IGI642 BTDW - Projet Entretient</p>
	  		<span style="color:gris ;font-size:20px" >Notre équipe: Bourabi Kaoutar, Drouin Lola, Hassani Yawoumihani, Pascal Quentin, Randriamahefa Nomentsoa, Theze Doriane, Yao Xin</span>
    	</div>
 </div>
  
  
  
  </body>
</html>  
