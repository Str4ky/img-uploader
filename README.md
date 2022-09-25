# Images uploader
Uploader d'images fait en PHP pour le fun, <a href="http://myimg.tk">démo ici</a><br>
Un grand merci à <a href="https://www.w3schools.com">W3school</a> et à <a href="https://www.w3schools.com/php/php_file_upload.asp">cette page</a> d'aide

<img src="https://i.imgur.com/2pwdcmB.png">

# Mise en ligne du site
Vous pouvez mettre en ligne le site sur votre hébergeur favori ou votre serveur si PHP est installé (pas besoin de base de données)

Pour avoir accès à la page d'administratrion, changez cette ligne sur les pages "index.php", "admin.php" et "delete.php"
```
$verif = votre_ip;
```
Et remplacez y par votre adresse IP, pour un peu plus de sécurité vous pouvez encoder votre IP en base64 et remplacez la ligne par la fonction php base64_decode() suivi de votre adresse IP encryptée en base64
