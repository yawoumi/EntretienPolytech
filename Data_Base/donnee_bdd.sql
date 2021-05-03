INSERT INTO Horaires (dateH_Horaires,heureH_Horaires) VALUES (NOW(), 'AM');
INSERT INTO Horaires (dateH_Horaires,heureH_Horaires) VALUES (NOW(), 'PM');
INSERT INTO Horaires (dateH_Horaires,heureH_Horaires) VALUES (date(NOW())+1, 'AM');
INSERT INTO Horaires (dateH_Horaires,heureH_Horaires) VALUES (date(NOW())+1, 'PM');
INSERT INTO Horaires (dateH_Horaires,heureH_Horaires) VALUES (date(NOW())+2, 'AM');
INSERT INTO Horaires (dateH_Horaires,heureH_Horaires) VALUES (date(NOW())+2, 'PM');
INSERT INTO Horaires (dateH_Horaires,heureH_Horaires) VALUES (date(NOW())+3, 'AM');
INSERT INTO Horaires (dateH_Horaires,heureH_Horaires) VALUES (date(NOW())+3, 'PM');
INSERT INTO Horaires (dateH_Horaires,heureH_Horaires) VALUES (date(NOW())+4, 'AM');
INSERT INTO Horaires (dateH_Horaires,heureH_Horaires) VALUES (date(NOW())+4, 'PM');
INSERT INTO Horaires (dateH_Horaires,heureH_Horaires) VALUES (date(NOW())+5, 'AM');
INSERT INTO Horaires (dateH_Horaires,heureH_Horaires) VALUES (date(NOW())+5, 'PM');
INSERT INTO Horaires (dateH_Horaires,heureH_Horaires) VALUES (date(NOW())+6, 'AM');
INSERT INTO Horaires (dateH_Horaires,heureH_Horaires) VALUES (date(NOW())+6, 'PM');

INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Vernier', 'Flavien');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Yvenat', 'Muriel');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Marteau', 'Stéphane');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Valet', 'Lionel');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Cimpan', 'Sorana');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Breysse', 'Michel');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Prele', 'Florian');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Alloui', 'Ilham');
INSERT INTO Enseignant (nomEns_Enseignant, prenomEns_Enseignant) VALUES ('Cuny', 'Michel');

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

INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('recrutements PEIP');
INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('recrutements filière ingé');
INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('APP');
INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('stage FI3');	
INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('stage FI4');
INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('stage FI5');
INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('projets usage');
INSERT INTO Type_Session (descriptionT_Type_Session) VALUES ('projet R&D');

INSERT INTO Critere (descriptionC_Critere) VALUES ('contenu de l expose');
INSERT INTO Critere (descriptionC_Critere) VALUES ('qualité des support');
INSERT INTO Critere (descriptionC_Critere) VALUES ('qualité de l expression');
INSERT INTO Critere (descriptionC_Critere) VALUES ('reponse aux questions');

INSERT INTO Etudiant (nomEtu_Etudiant,prenomEtu_Etudiant) VALUES ('Theze','Doriane');
INSERT INTO Etudiant (nomEtu_Etudiant,prenomEtu_Etudiant) VALUES ('Yao','Xin');
INSERT INTO Etudiant (nomEtu_Etudiant,prenomEtu_Etudiant) VALUES ('Drouin','Lola');
INSERT INTO Etudiant (nomEtu_Etudiant,prenomEtu_Etudiant) VALUES ('Bourabi','Kaoutar');
INSERT INTO Etudiant (nomEtu_Etudiant,prenomEtu_Etudiant) VALUES ('Hassani', 'Yawoumihani');
INSERT INTO Etudiant (nomEtu_Etudiant,prenomEtu_Etudiant) VALUES ('Pascal', 'Quentin');
INSERT INTO Etudiant (nomEtu_Etudiant,prenomEtu_Etudiant) VALUES ('Randriamahefa', 'Nomentsoa');

INSERT INTO Possede (idT_Type_Session, idC_Critere) VALUES (1, 1);
INSERT INTO Possede (idT_Type_Session, idC_Critere) VALUES (1, 2);
INSERT INTO Possede (idT_Type_Session, idC_Critere) VALUES (1, 3);
INSERT INTO Possede (idT_Type_Session, idC_Critere) VALUES (1, 4);
INSERT INTO Possede (idT_Type_Session, idC_Critere) VALUES (2, 1);
INSERT INTO Possede (idT_Type_Session, idC_Critere) VALUES (2, 2);
© 2021 GitHub, Inc.
