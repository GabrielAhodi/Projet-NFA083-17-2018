<!-- Fichier de connection à la base de données -->
<?php
try{
$bdd = new PDO('mysql:host=localhost;dbname=contraste;charset=utf8','root', '');
}
catch (exception $e){
    die('Erreur: ' .$e->getMessage());
}
?>
