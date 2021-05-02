DROP TABLE IF EXISTS Etudiant ;
CREATE TABLE Etudiant (idEtu_Etudiant BIGINT(11) AUTO_INCREMENT NOT NULL,
nomEtu_Etudiant VARCHAR(250),
prenomEtu_Etudiant VARCHAR(250),
photoEtu_Etudiant BLOB,
PRIMARY KEY (idEtu_Etudiant)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Enseignant ;
CREATE TABLE Enseignant (idEns_Enseignant BIGINT(11) AUTO_INCREMENT NOT NULL,
nomEns_Enseignant VARCHAR(250),
prenomEns_Enseignant VARCHAR(250),
idEnt_Entretien INT(11),
PRIMARY KEY (idEns_Enseignant)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Salle ;
CREATE TABLE Salle (idS_Salle BIGINT(11) AUTO_INCREMENT NOT NULL,
nomS_Salle VARCHAR(250),
PRIMARY KEY (idS_Salle)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Entretien ;
CREATE TABLE Entretien (idEnt_Entretien BIGINT(11) AUTO_INCREMENT NOT NULL,
idEtu_Etudiant INT(11),
resultat_idr_resultat INT(11),
idS_Salle INT(11),
PRIMARY KEY (idEnt_Entretien)) ENGINE=InnoDB;

DROP TABLE IF EXISTS DispoEnseignant ;
CREATE TABLE DispoEnseignant (idDEns_DispoEnseignant BIGINT(11) AUTO_INCREMENT NOT NULL,
dateDEns_DispoEnseignant VARCHAR(250),
heureD_DispoEnseignant TIME,
PRIMARY KEY (idDEns_DispoEnseignant)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Type_Session ;
CREATE TABLE Type_Session (idT_Type_Session BIGINT(11) AUTO_INCREMENT NOT NULL,
descriptionT_Type_Session VARCHAR(250),
PRIMARY KEY (idT_Type_Session)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Critere ;
CREATE TABLE Critere (idC_Critere BIGINT(11) AUTO_INCREMENT NOT NULL,
descriptionC_Critere VARCHAR(250),
niveauEval_Critere INT(11),
PRIMARY KEY (idC_Critere)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Resultat ;
CREATE TABLE Resultat (idR_Resultat BIGINT(11) AUTO_INCREMENT NOT NULL,
noteR_Resultat BIGINT(11),
grille1_Resultat BLOB,
grille2_Resultat BLOB,
entretien_ident_entretien INT(11),
PRIMARY KEY (idR_Resultat)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Horaires ;
CREATE TABLE Horaires (idH_Horaires BIGINT(11) AUTO_INCREMENT NOT NULL,
dateH_Horaires DATE,
heureH_Horaires TIME,
PRIMARY KEY (idH_Horaires)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Passe ;
CREATE TABLE Passe (idT_Type_Session INT(11) AUTO_INCREMENT NOT NULL,
idEtu_Etudiant INT(11) NOT NULL,
PRIMARY KEY (idT_Type_Session,
 idEtu_Etudiant)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Possède ;
CREATE TABLE Possède (idT_Type_Session INT(11) AUTO_INCREMENT NOT NULL,
idC_Critere INT(11) NOT NULL,
PRIMARY KEY (idT_Type_Session,
 idC_Critere)) ENGINE=InnoDB;

DROP TABLE IF EXISTS a_des_disponibilites ;
CREATE TABLE a_des_disponibilites (idEns_Enseignant INT(11) AUTO_INCREMENT NOT NULL,
idDEns_DispoEnseignant INT(11) NOT NULL,
PRIMARY KEY (idEns_Enseignant,
 idDEns_DispoEnseignant)) ENGINE=InnoDB;

DROP TABLE IF EXISTS est_disponible ;
CREATE TABLE est_disponible (idS_Salle INT(11) AUTO_INCREMENT NOT NULL,
idH_Horaires INT(11) NOT NULL,
PRIMARY KEY (idS_Salle,
 idH_Horaires)) ENGINE=InnoDB;



ALTER TABLE Enseignant ADD CONSTRAINT FK_Enseignant_idEnt_Entretien FOREIGN KEY (idEnt_Entretien) REFERENCES Entretien (idEnt_Entretien);

ALTER TABLE Entretien ADD CONSTRAINT FK_Entretien_idEtu_Etudiant FOREIGN KEY (idEtu_Etudiant) REFERENCES Etudiant (idEtu_Etudiant);
ALTER TABLE Entretien ADD CONSTRAINT FK_Entretien_resultat_idr_resultat FOREIGN KEY (resultat_idr_resultat) REFERENCES Resultat (idR_Resultat);
ALTER TABLE Entretien ADD CONSTRAINT FK_Entretien_idS_Salle FOREIGN KEY (idS_Salle) REFERENCES Salle (idS_Salle);
ALTER TABLE Resultat ADD CONSTRAINT FK_Resultat_entretien_ident_entretien FOREIGN KEY (entretien_ident_entretien) REFERENCES Entretien (idEnt_Entretien);
ALTER TABLE Passe ADD CONSTRAINT FK_Passe_idT_Type_Session FOREIGN KEY (idT_Type_Session) REFERENCES Type_Session (idT_Type_Session);
ALTER TABLE Passe ADD CONSTRAINT FK_Passe_idEtu_Etudiant FOREIGN KEY (idEtu_Etudiant) REFERENCES Etudiant (idEtu_Etudiant);
ALTER TABLE Possède ADD CONSTRAINT FK_Possède_idT_Type_Session FOREIGN KEY (idT_Type_Session) REFERENCES Type_Session (idT_Type_Session);
ALTER TABLE Possède ADD CONSTRAINT FK_Possède_idC_Critere FOREIGN KEY (idC_Critere) REFERENCES Critere (idC_Critere);
ALTER TABLE a_des_disponibilites ADD CONSTRAINT FK_a_des_disponibilites_idEns_Enseignant FOREIGN KEY (idEns_Enseignant) REFERENCES Enseignant (idEns_Enseignant);
ALTER TABLE a_des_disponibilites ADD CONSTRAINT FK_a_des_disponibilites_idDEns_DispoEnseignant FOREIGN KEY (idDEns_DispoEnseignant) REFERENCES DispoEnseignant (idDEns_DispoEnseignant);
ALTER TABLE est_disponible ADD CONSTRAINT FK_est_disponible_idS_Salle FOREIGN KEY (idS_Salle) REFERENCES Salle (idS_Salle);
ALTER TABLE est_disponible ADD CONSTRAINT FK_est_disponible_idH_Horaires FOREIGN KEY (idH_Horaires) REFERENCES Horaires (idH_Horaires);
