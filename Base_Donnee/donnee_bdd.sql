/* Insertion des données*/

/* INSERTION MANUELLE */
-- Enseignant

INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Vernier', 'Flavien');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Yvenat', 'Muriel');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Marteau', 'Stéphane');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Valet', 'Lionel');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Cimpan', 'Sorana');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Breysse', 'Michel');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Prele', 'Florian');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Alloui', 'Ilham');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Cuny', 'Michel');

-- Salle
INSERT INTO Salle (nomS_Salle) VALUES ('C110');
INSERT INTO Salle (nomS_Salle) VALUES ('C111');
INSERT INTO Salle (nomS_Salle) VALUES ('C112');
INSERT INTO Salle (nomS_Salle) VALUES ('C113');
INSERT INTO Salle (nomS_Salle) VALUES ('C114');
INSERT INTO Salle (nomS_Salle) VALUES ('C115');
INSERT INTO Salle (nomS_Salle) VALUES ('C116');
INSERT INTO Salle (nomS_Salle) VALUES ('C117');
INSERT INTO Salle (nomS_Salle) VALUES ('C118');
INSERT INTO Salle (nomS_Salle) VALUES ('C119');
INSERT INTO Salle (nomS_Salle) VALUES ('C210');
INSERT INTO Salle (nomS_Salle) VALUES ('C211');
INSERT INTO Salle (nomS_Salle) VALUES ('C212');
INSERT INTO Salle (nomS_Salle) VALUES ('C213');
INSERT INTO Salle (nomS_Salle) VALUES ('C214');
INSERT INTO Salle (nomS_Salle) VALUES ('C215');
INSERT INTO Salle (nomS_Salle) VALUES ('C216');
INSERT INTO Salle (nomS_Salle) VALUES ('C217');
INSERT INTO Salle (nomS_Salle) VALUES ('C218');
INSERT INTO Salle (nomS_Salle) VALUES ('C219');

-- Type Session
INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('recrutements PEIP');
INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('recrutements filière ingé');
INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('APP');
INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('stage FI3');	
INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('stage FI4');
INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('stage FI5');
INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('projets usage');
INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('projet R&D');

-- Critère
INSERT INTO Critere (descriptionC_Critere) VALUES ('contenu de l expose');
INSERT INTO Critere (descriptionC_Critere) VALUES ('qualité des support');
INSERT INTO Critere (descriptionC_Critere) VALUES ('qualité de l expression');
INSERT INTO Critere (descriptionC_Critere) VALUES ('reponse aux questions');

-- Etudiant
INSERT INTO Etudiant (nomEtu_Etudiant,prenomEtu_Etudiant) VALUES ('Theze','Doriane');
INSERT INTO Etudiant (nomEtu_Etudiant,prenomEtu_Etudiant) VALUES ('Yao','Xin');
INSERT INTO Etudiant (nomEtu_Etudiant,prenomEtu_Etudiant) VALUES ('Drouin','Lola');
INSERT INTO Etudiant (nomEtu_Etudiant,prenomEtu_Etudiant) VALUES ('Bourabi','Kaoutar');
INSERT INTO Etudiant (nomEtu_Etudiant,prenomEtu_Etudiant) VALUES ('Hassani', 'Yawoumihani');
INSERT INTO Etudiant (nomEtu_Etudiant,prenomEtu_Etudiant) VALUES ('Pascal', 'Quentin');
INSERT INTO Etudiant (nomEtu_Etudiant,prenomEtu_Etudiant) VALUES ('Randriamahefa', 'Nomentsoa');
-- Les autres données de la table Etudiant proviennent de l'insertion automatique lié à la page_2 (Etudiant) du site Web

-- Possede
INSERT INTO Possede (idT_Type_Session, idC_Critere) VALUES (1, 1);
INSERT INTO Possede (idT_Type_Session, idC_Critere) VALUES (1, 2);
INSERT INTO Possede (idT_Type_Session, idC_Critere) VALUES (1, 3);
INSERT INTO Possede (idT_Type_Session, idC_Critere) VALUES (1, 4);
INSERT INTO Possede (idT_Type_Session, idC_Critere) VALUES (2, 1);
INSERT INTO Possede (idT_Type_Session, idC_Critere) VALUES (2, 2);

-- a_des_disponibilites
/* Pour les tests en premier lieu*/
/* Ajout des dispo de Flavien Vernier*/
INSERT INTO a_des_disponibilites(idEns_Enseignant, idDEns_DispoEnseignant,Encore_Dispo) VALUES (1,1,TRUE);
INSERT INTO a_des_disponibilites(idEns_Enseignant, idDEns_DispoEnseignant,Encore_Dispo) VALUES (1,2,TRUE);
INSERT INTO a_des_disponibilites(idEns_Enseignant, idDEns_DispoEnseignant,Encore_Dispo) VALUES (1,3,TRUE);
INSERT INTO a_des_disponibilites(idEns_Enseignant, idDEns_DispoEnseignant,Encore_Dispo) VALUES (1,4,TRUE);
INSERT INTO a_des_disponibilites(idEns_Enseignant, idDEns_DispoEnseignant,Encore_Dispo) VALUES (1,5,TRUE);
INSERT INTO a_des_disponibilites(idEns_Enseignant, idDEns_DispoEnseignant,Encore_Dispo) VALUES (1,6,TRUE);
INSERT INTO a_des_disponibilites(idEns_Enseignant, idDEns_DispoEnseignant,Encore_Dispo) VALUES (1,7,TRUE);
INSERT INTO a_des_disponibilites(idEns_Enseignant, idDEns_DispoEnseignant,Encore_Dispo) VALUES (1,8,TRUE);

/* Ajout des dispo de Muriel Yvenat*/
INSERT INTO a_des_disponibilites(idEns_Enseignant, idDEns_DispoEnseignant,Encore_Dispo) VALUES (2,2,TRUE);
INSERT INTO a_des_disponibilites(idEns_Enseignant, idDEns_DispoEnseignant,Encore_Dispo) VALUES (2,6,TRUE);
INSERT INTO a_des_disponibilites(idEns_Enseignant, idDEns_DispoEnseignant,Encore_Dispo) VALUES (2,7,TRUE);
INSERT INTO a_des_disponibilites(idEns_Enseignant, idDEns_DispoEnseignant,Encore_Dispo) VALUES (2,8,TRUE);

/* Ajout des dispo de Stéphane Marteau*/
INSERT INTO a_des_disponibilites(idEns_Enseignant, idDEns_DispoEnseignant,Encore_Dispo) VALUES (3,3,TRUE);
INSERT INTO a_des_disponibilites(idEns_Enseignant, idDEns_DispoEnseignant,Encore_Dispo) VALUES (3,5,TRUE);
INSERT INTO a_des_disponibilites(idEns_Enseignant, idDEns_DispoEnseignant,Encore_Dispo) VALUES (3,6,TRUE);


-- Passe 
/* En attendant de pouvoir permettre à l'étudiant de choisir le type d'entretien qu'il souhaiterait passer*/
INSERT INTO Passe(idT_Type_Session,idEtu_Etudiant) VALUES ('4','1');

/* INSERTION AUTOMATIQUE VIA PROCEDURE */

-- Horaires

DELIMITER ;;
CREATE procedure insertion_Horaires(heureDebut time, dateDebut date, nb int)
BEGIN
	/*Déclaration des variables*/
	DECLARE intervalle time;
	DECLARE heure time;
    DECLARE heureFin time;
	DECLARE finJournee boolean;

	/*Initialisation*/
	set intervalle = "00:45";
	set heureDebut = "08:30";
	set heureFin = "17:30";
    

    SET heure = heureDebut;
	IF dateDebut <= (dateDebut + nb) THEN /*Tant que le nombre de jours à implementer n'est pas atteint*/
		WHILE TIME_TO_SEC(TIMEDIFF(heureFin,heure))>=0 DO /*Tant qu'on a pas dépassé l'heure de fin des entretiens*/
				INSERT INTO Horaires(dateH_Horaires,heureH_Horaires) VALUES (dateDebut,heure); /*Insertion des dates et horaires possibles*/
				SELECT ADDTIME(heure, intervalle) INTO heure; /*On incrémente l'heure possible suivante*/        	
				IF TIME_TO_SEC(TIMEDIFF(heureFin,heure))<0 THEN /*Si l'heure de fin est atteint*/
                    set dateDebut = dateDebut + 1; /*On incrémente les jours*/
                    set heure = heureDebut; /*On réinitialise l'heure de début*/ 
				END IF;
		END WHILE;
	END IF;

END;;

CALL insertion_Horaires("08:30",DATE(NOW()),1);


-- DispoEnseignant

DELIMITER ;;
CREATE PROCEDURE insertion_DispoEnseignant ()  
BEGIN
	CREATE VIEW DatetoDispo AS
	SELECT DISTINCT dateH_Horaires FROM Horaires;

	CREATE TABLE DemiJournee (
	`demi_journee` varchar(250) NOT NULL
	);

	INSERT INTO DemiJournee(demi_journee) VALUES ('AM');
	INSERT INTO DemiJournee(demi_journee) VALUES ('PM');

	INSERT INTO DispoEnseignant(dateDEns_DispoEnseignant, heureD_DispoEnseignant)
		SELECT d.dateH_Horaires, dj.demi_journee FROM DatetoDispo d, DemiJournee dj;
	
	DROP TABLE DemiJournee;
END;;

CALL insertion_DispoEnseignant();

-- est_disponible

DELIMITER ;;
CREATE PROCEDURE insertion_estDispo()
BEGIN
	INSERT INTO est_disponible(idH_Horaires,idS_Salle,Dispo_est_disponible)
	SELECT h.idH_Horaires, s.idS_Salle, TRUE FROM Horaires h, Salle s;
END;;

CALL insertion_estDispo();

-- Entretien - Resultat - se_deroule - Assiste

DELIMITER ;;
CREATE PROCEDURE generate_entretien(int idEtu)
BEGIN
	/* PARTIE DECLARATION DES VARIABLES */
	DECLARE idEntretien int;
    DECLARE idResultat int;
	
	DECLARE idEns1 int;
	DECLARE idEns2 int;
	DECLARE idDispo int;
	
	DECLARE dateDispo date;
	DECLARE demiJDispo varchar(250);
    DECLARE horaire int;
	DECLARE heureDispo time;
	DECLARE salleDispo varchar(250);
	
	/* PARTIE AFFECTATION ENTRETIEN JURY */

        /* On crée une table qui forme un Jury de 2 enseignants */
	DROP TABLE IF EXISTS Jury;
	CREATE TABLE Jury(idJ int AUTO_INCREMENT,
					Enseignant1 int, 
					Enseignant2 int, 
					idDispo int, 
					Affecte boolean,
                    PRIMARY KEY (idJ));
                    
    /* Insertion dans la table */                
	INSERT INTO Jury (Enseignant1,Enseignant2,idDispo,Affecte)
	SELECT t1.idEns_Enseignant, t2.idEns_Enseignant, t1.idDEns_DispoEnseignant, FALSE
	FROM a_des_disponibilites t1 INNER JOIN a_des_disponibilites t2
	ON t1.idDEns_DispoEnseignant = t2.idDEns_DispoEnseignant
	AND t1.idEns_Enseignant < t2.idEns_Enseignant
	WHERE t1.Encore_Dispo = TRUE OR t2.Encore_Dispo = TRUE;
    
	/* On récupère les identifiants des enseignants et leur dispo */
	SELECT j.Enseignant1,j.Enseignant2,j.idDispo
	INTO idEns1,idEns2,idDispo
	FROM Jury j
	LIMIT 1;
    
    /* Affectation à un entretien */
	INSERT INTO Entretien(dureeEnt_Entretien,idR_Resultat,idEns_Enseignant1,idEns_Enseignant2,idEtu_Etudiant) 
	VALUES (30,null,idEns1,idEns2,idEtu);
	
	/* On recupere l'id de l'entretien genere */
	SELECT idEnt_Entretien 
	INTO idEntretien
	FROM Entretien 
	WHERE idEns_Enseignant1 = idEns1 AND idEns_Enseignant2 = idEns2 AND idEtu_Etudiant = idEtu;
	
    /* Création d'un résultat vide que l'on associera à l'entretien généré */
    INSERT INTO Resultat(noteR_Resultat,grille1_Resultat,grille2_Resultat,entretien_ident_entretien) 
	VALUES (null,null,null,idEntretien);
    
    /* On récupère l'identifiant du Résultat généré pour l'affecter à l'entretien */
    SELECT idR_Resultat
    INTO idResultat
    FROM Resultat
    WHERE entretien_ident_entretien = idEntretien;
    
    UPDATE Entretien
    SET idR_Resultat = idResultat
    WHERE idEns_Enseignant1 = idEns1 
    AND idEns_Enseignant2 = idEns2 AND idEtu_Etudiant = idEtu;

    /* On affecte l'idEntretien à un etudiant */
    INSERT INTO Assiste(idEtu_Etudiant,idEnt_Entretien) VALUES (idEtu,idEntretien);

    UPDATE Jury SET Affecte = TRUE 
    WHERE Enseignant1 = idEns1 AND Enseignant2 = idEns2;
		
/*Les deux enseignants deviennent indisponible à la disponibilité selectionnee*/
    UPDATE a_des_disponibilites SET Encore_Dispo = FALSE
    WHERE (idEns_Enseignant = idEns1 AND idDEns_DispoEnseignant = idDispo)
    OR (idEns_Enseignant = idEns2 AND idDEns_DispoEnseignant = idDispo);
	
    /* PARTIE AFFECTATION HORAIRES SALLE */
    
    /* Récupération de la date et de la demi-journee */
    SELECT dateDEns_DispoEnseignant INTO dateDispo 
    FROM DispoEnseignant
    WHERE idDEns_DispoEnseignant = idDispo;
    
    SELECT heureD_DispoEnseignant INTO demiJDispo
    FROM DispoEnseignant
    WHERE idDEns_DispoEnseignant = idDispo;
    
    /* SI MATINEE */
	IF (demiJDispo = 'AM') THEN
		SELECT e.idH_Horaires,e.idS_Salle
		INTO horaire, salleDispo
		FROM est_disponible e JOIN Horaires h ON e.idH_Horaires = h.idH_Horaires
		WHERE h.dateH_Horaires = dateDispo 
		AND e.Dispo_est_disponible = TRUE
		AND h.heureH_Horaires BETWEEN TIME('08:30') AND TIME('12:00')
		LIMIT 1;
		
		INSERT INTO se_deroule(idEnt_Entretien,idS_Salle,idH_Horaires) 
		VALUES (idEntretien,salleDispo,horaire);

		/* La salle (salleDispo) à l'horaire (heureDispo) devient indisponible*/
		UPDATE est_disponible
		SET Dispo_est_disponible = FALSE
		WHERE idH_Horaires = horaire;
	END IF;
    
    /* SI APRES-MIDI */
	IF (demiJDispo = 'PM') THEN
		SELECT e.idH_Horaires,e.idS_Salle
		INTO horaire, salleDispo
		FROM est_disponible e JOIN Horaires h ON e.idH_Horaires = h.idH_Horaires
		WHERE h.dateH_Horaires = dateDispo 
		AND e.Dispo_est_disponible = TRUE
		AND h.heureH_Horaires BETWEEN TIME('13:45') AND TIME('17:30')
		LIMIT 1;
		
		INSERT INTO se_deroule(idEnt_Entretien,idS_Salle,idH_Horaires) 
		VALUES (idEntretien,salleDispo,horaire);
				
		/* La salle (salleDispo) à l'horaire (heureDispo) devient indisponible*/
		UPDATE est_disponible
		SET Dispo_est_disponible = FALSE
		WHERE idH_Horaires = horaire
        AND idS_Salle = salleDispo;
	END IF;
END;;

-- En attendant de pouvoir permettre à notre page Etudiant de générer des entretiens 
-- dès qu'un étudiant s'inscrit pour un entretien
-- On choisit nous même quel étudiant passer en paramètre:
CALL generate_entretien(1); 