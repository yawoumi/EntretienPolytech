# EntretienPolytech

## Contexte du projet

Ce projet s’inscrit dans le cadre du module INFO642 – Base de données et technologies du Web de la formation IDU.

L’objectif est d’appliquer les notions de développement web à la conception d’un site web permettant la gestion des différents types d’entretiens qui se déroulent chaque année au sein de Polytech Annecy-Chambéry.

## Cahier des charges

Chaque année, des étudiants se rendent à Polytech Annecy-Chambéry pour passer un entretien devant un jury composé d’un ou deux enseignants :

- Entretiens de recrutement (PEIP ou cycle ingénieur)
- Evaluations de compétences (APP)
- Evaluations de projets (projet usage, projet R&D, etc.)
- Evaluation de stages (stage ingénieur, etc.)

Une session d’une demi-journée mobilise trois ressources principales : des étudiants, des enseignants et des salles. L’idée est donc de bloquer les membres du jury sur des demi-journées complètes selon leurs disponibilités et de convoquer les étudiants sur une plage horaire précise. On leur attribue ensuite une salle pour toute la session.

Par ailleurs, nous avons pris l'initiative de fixer la durée d'un entretien à 30 minutes, de laisser 15 minutes de pause au jury entre deux entretiens et d'imposer un jury de deux enseignants.

Le projet inclut également une fonctionnalité permettant à chaque membre du jury de réaliser individuellement une évaluation de l’entretien d’un étudiant, à partir d’une série de critères.

## Utilisation

Pour faire ce projet nous avons utilisé :
- HTML5
- CSS
- PHP 7.4.14
- PhpMyAdmin

Afin de créer la base de données contenant les tables, procédures, fonctions et données, exécutez le code bdd.sql contenu dans le dossier Data_Base dans PhpMyAdmin.
Une fois fait, récupérez les images et vidéo contenues dans le dossier Data et enregistrez les dans un dossier dans votre serveur.
Pour créer le site web vous aurez besoin de tous les fichiers contenus dans page_web. Enregistrez-les sur votre serveur dans le même dossier que les images.
Faites attention si vous changez les noms de fichiers. Le lien entre les fichiers PHP, HTML et CSS se fait à l'aide des noms des fichiers. Assurez-vous donc de sauvegarder les programmes avec le nom que nous leur avons donnés dans notre github.
Une fois tout ceci fait, vous devrez entrer le login et le mot de passe de votre base de données dans la partie connection à la base de données des pages web.
Enfin, il vous suffira d'ouvrir la page d'accueil du site (fichier page_accueil.php) dans votre serveur web et vous aurez accès aux différentes pages du sites.
