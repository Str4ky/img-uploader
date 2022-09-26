<?php
//Initialisation de la session
session_start();
//Vérification de l'existence d'une variable de session
if (!isset($_SESSION['message']))
{
    //Définition d'une variable temporaire, ou son contenu est égal à la variable de session
    $_SESSION['message'] = '';
    //Suppression du contenu de la variable de session
    $message = '';
}
else
{
    //Initialisation d'une variable temporaire
    $message = $_SESSION['message'];
    //Initialisation d'une variable de session
    $_SESSION['message'] = '';
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
    <center>
    <h1>MyImg 🖼️</h1>
    <h3>Par <a href="https://github.com/Str4ky" target="_blank" style="color: white;">Straky</a> | <a href="https://github.com/Str4ky/img-uploader" target="_blank" style="color: white;">Code source</a></h3>
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <!-- Bouton parcourir -->
        <label class="uploadLabel">
            <input class="uploadButton" type="file" name="fileToUpload" id="fileToUpload" accept=".png,.jpg,.jpeg,.gif"><p name="file" id="file" style="background-color: #222222; margin: 4px;"><i class="fa-solid fa-file-image"></i> Choisir un fichier</p>
        </label><br><br><br>
            <!-- Bouton de mise en ligne -->
            <input class="uploadLabel" type="submit" value="Mettre en ligne" name="submit">
        </form>
        <br>
            <?php
            //Affichage d'un message d'alerte
            echo $message;
            
            //Déclaration d"une variable du nom de l'hôte
            $host = $_SERVER['REMOTE_ADDR'];
            //Déclaration d"une variable de l'ip du développeur
            $verif = votre_ip;
            //Si le nom d'hôte est égal à celui du développeur
            if ($host == $verif) {
                //Affichage d'un bouton d'administration
                echo "<br><br><br><br><a href='admin.php' class='uploadLabel' style='text-decoration: none; font-size:24px;'>🔧 Administration</a>";
            }
            ?>
    <center>
    </body>
</html>

<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<!-- Affichage du nom du fichier dans le bouton parcourir -->
<script type="text/javascript">
var wrapper = $('<div/>').css({height:0,width:0,'overflow':'hidden'});
var fileInput = $(':file').wrap(wrapper);

fileInput.change(function(){
    $this = $(this);
    $('#file').text($this.val());
})
</script>
