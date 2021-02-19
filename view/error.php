<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 
if( isset($_GET["type"]) ) {
    switch($_GET["type"]) {
        case "log_pass_missing":
            echo "L'identifiant ou le mot de passe est manquant";
        break;
        case "login_type":
            echo "L'identifiant n'est ni un email, ni un numéro de téléphone";
        break;
        case "invalid":
            echo "L'identifiant ou le mot de passe est invalide";
        break;
        case "login_match":
            echo "Les deux identifiants sont différents";
        break;
        case "login_exists":
            echo "L'identifiant a déjà été utilisé";
        break;
        default:
            echo "Aucune information sur l'erreur";
        break;
    }
} else {
    header("Location: /view");
}
?><br>
<a href="/view">Revenir à la page de connexion</a>
</body>
</html>