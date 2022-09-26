<?php
//Initialisation de la session
session_start();
//Vérification de l'existence d'une variable temporaire
if (!isset($_SESSION['message']))
{
  //Initialisation d'une variable temporaire
    $_SESSION['message'] = "";
}

//Initialisation des différentes variables nécessaires
$target_dir = "";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//Savoir si le fichier est une image ou non
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $_SESSION['message'] = "Le fichier n'est pas une image";
    $uploadOk = 0;
    echo "<script type='text/javascript'>
    window.location = '/';
    </script>";
  }
}

//Vérifier si le fichier existe déjà
if (file_exists($target_file)) {
  $_SESSION['message'] = "Le fichier existe déjà";
  $uploadOk = 0;
  echo "<script type='text/javascript'>
window.location = '/';
</script>";
}

//Vérifier la taille du fichier
if ($_FILES["fileToUpload"]["size"] > 500000000) {
  $_SESSION['message'] = "Le fichier est trop grand";
  $uploadOk = 0;
  echo "<script type='text/javascript'>
  window.location = '/';
  </script>";
}

//Permettre certaines extensions de fichier
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $_SESSION['message'] = "Le site accepte seulement des fichiers de type PNG, JPG, JPEG et GIF";
  $uploadOk = 0;
  echo "<script type='text/javascript'>
  window.location = '/';
  </script>";
}

//Vérifier si $uploadOk est mis à 0 par une erreur
if ($uploadOk == 0) {
  $_SESSION['message'] = "Le fichier n'a pas pu être mis en ligne,<br>il existe sûrement déjà un fichier du même nom<br>ou l'erreur est tout simplement inconnue";
//Si tout est bon, essayer de mettre en ligne le fichier
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $generate = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/" . htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
    $_SESSION['message'] = "Votre fichier a bien été mis en ligne à cette adresse : <a href='".$generate."' target='_blank'>".$generate."</a><br>(Si ça vous a pas ouvert un nouvel onglet, activez les popups)";
    echo "<script>window.open('".$generate."', '_blank');</script>";
    echo "<script type='text/javascript'>
    window.location = '/';
    </script>";
  } else {
    $_SESSION['message'] = "Il y a eu une erreur lors de la mise en ligne de votre fichier";
    echo "<script type='text/javascript'>
    window.location = '/';
    </script>";
  }
}
?>
