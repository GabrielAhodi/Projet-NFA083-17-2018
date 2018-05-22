<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Contraste, Partager votre vie en noir et blanc et en photo">

    <!-- Titre -->
    <title>Contraste | Contact</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./image/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./image/favicon.png" type="image/png">

    <!-- Feuille de style CSS -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- Header -->
    <?php include 'inc/header.php'; ?>

    <?php
    include 'inc/bddconnect.php';

    /*Recuperation des donnés de session*/
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $email = $_SESSION['email'];
    $message = $_SESSION['message'];
    $date = date('Y-m-d H:i:s');

    /*insertion dans la bdd*/
    $sql ="INSERT INTO message (message_date, message_prenom, message_nom, message_email, message_content)
    VALUES (NOW(),'$prenom','$nom','$email','$message')";
    $bdd->exec($sql);
    ?>
    <section class="container3">

    <h1>Nous Contacter</h1>
    <?php echo 'Votre demande a bien été enregistré (' . $date.')';?><br>
    </section>
    <?php
    $bdd = null;
/*effacement des variables de sessions*/
session_unset(); 

/*fin de la session*/
session_destroy(); 
?>

    <!-- Footer -->
    <?php include 'inc/footer.php'; ?>

</body>

</html>
