<?php
//Initialisation de la sesion
session_start();
//Vérification de l'existence d'une variable temporaire
if (!isset($_SESSION['message']))
{
  //Initialisation d'une variable temporaire
    $_SESSION['message'] = "";
}

//Déclaration d"une variable du nom de l'hôte
$host = $_SERVER['REMOTE_ADDR'];
//Déclaration d"une variable de l'ip du développeur
$verif = votre_ip;
//Si le nom d'hôte n'est pas égal à celui du développeur
if ($host != $verif) {
    //Redirection de l'utilisateur
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>MyImg</title>
        <meta content="MyShrt" property="og:title">
        <meta content="Stockage d'images fait par Straky" property="og:description">
        <meta content="http://myimg.tk" property="og:url">
        <meta content="http://myimg.tk/logo.png" property="og:image">
        <meta content="#d3883e" data-react-helmet="true" name="theme-color">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" type="image/png" href="favicon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
<?php
//Suppression de l'image
unlink($_GET['file']);
?>
            <script>
                location.replace("admin.php")
            </script>
</body>