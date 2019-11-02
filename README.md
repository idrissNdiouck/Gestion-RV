# Gestion-RV SunuRV Médical par SunuGroup (Idrissa Ndiouck & Mame Fatou Ngom) Classe c Cohorte 1 dev web online Sonatel Academy 2019
1-Description
Il s'agit ici d'une application web de gestion de rendez-vous Médical

Le programme permet :
aux administrateurs de gérer avec exactitude les données reçues en se connectant chacun dans une espace membre
D’enregistrer tout les rendez-vous prises par les patients 
D’enregistrer l’heure du rendez vous; 
D’enregistrer et de planifier toutes les activités du Médecin

2-Objectif du programme 

L'objectif principal de ce programme est de permettre aux 
Sécrétaire de faire la gestion des différents rendez-vous prises par les patients 

3-Projet realiser avec les technologies suivantes :
PHP
MYSQL
Javascript
Jquery
Jquery UI
Jquery easing
Ajax
bootstrap

4-Manuel de déploiement
 -Etape 1
 Importer ou créer dabord la base de donnée "hopital.sql" trouver dans le dossier "hospi1"
 -Etape 2
 Ensuite modifier le fichier de connection dénommée "Database.php" se trouvant dans le dossier include
 Modifier : <?php
class Database {
    private $_connection;
    private $_host = "localhost";
    private $_username = "root";
    private $_password = "";
    private $_database = "hopital";
    
    
 
