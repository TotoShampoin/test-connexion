# Test: Page de connexion Facebook

## Comment fonctionne-t-elle?

### La base de données

Le dossier model ne contient qu'un ficher appelé bdd.sql, à exécuter sur PhpMyAdmin sous MariaDB ou MySQL. La création de la base de donnée et de l'unique table qu'elle contient sont tous écrits dans ce fichier.

### Les dossiers

Il y a 3 dossiers: view, model et controller.

Les liens ont été écrit en partant du principe qu'ils seront tous les trois situés à la racine du serveur.

Dans le dossier controller, il y a 3 pages PHP de redirection et 1 page PHP dédiés à l'utilisation d'ajax (ou d'un fetch Javascript). Les autres fichiers sont présents pour être utilisés par ces 4 pages PHP.

Un .htaccess a été préalablement déposé dans le dossier .secret de sortes à ce que personne ne puisse y accéder, hormis la machine elle-même (localhost).

## Tester le code sur votre serveur

- Exécuter le fichier bdd.sql contenu dans le dossier model avec PhpMyAdmin.
  - Si PhpMyAdmin refuse de créer la BDD, le faire manuellement, puis exécuter le code de création de la table.
  - Nom de la base: "uballers".
- Glisser au minimum les dossiers controller et view <u>dans la racine du serveur</u>
- Mettre les identifiants adéquats de la base de donnée de votre serveur dans le dossier /controller/.secret/secret.php
- Ouvrir Apache (xampp / wamp / mamp) et se rendre à l'url : http://localhost/view 

## Temps passé

| Langage | Temps  |
| ------- | ------ |
| MySQL   | 0h 15m |
| PHP     | 2h 45m |
| HTML    | 1h 15m |
| CSS     | 1h 45m |
| JS      | 1h 15m |

