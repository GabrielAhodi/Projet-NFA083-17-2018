<?php include 'inc/bddconnect.php'?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118037822-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-118037822-1');

    </script>

    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Contraste Photographie, Partager votre vie en noir et blanc. Partager vos photographies en noir et blanc: portaits, paysages, nature, architecture, design">

    <!-- Titre -->
    <title>Contraste | Noir &amp; Blanc</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./image/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./image/favicon.png" type="image/png">

    <!-- Feuille de style CSS -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- Header -->
    <?php include 'inc/header.php'; ?>

    <!-- Bandeau tête de page -->
    <section id="showcase">
        <div class="container">
            <h1>"La photographie en noir et blanc est celle qui raconte des aventures en couleurs."</h1><br>
            <p>- Remy Donnadieu -</p>
        </div>
    </section>

    <!-- Thumbnails -->
    <section class="grid">
        <div class="box box1">
            <h2>Gallerie Contraste</h2>
        </div>
        <!--
        Les thumbnails sont affichés grace à une boucle while PHP.
        La connection à la BDD permet des recuperer les données affichés.
        -->
        <?php
        $reponse = $bdd->query('SELECT content.content_titre, content.content_image_path, content.content_comment, user.user_prenom, categorie.categorie_type FROM content, user, categorie WHERE content.categorie_id=categorie.categorie_id AND content.user_id=user.user_id ORDER BY RAND() LIMIT 11');
        ?>
        <?php
          while ($donnees = $reponse->fetch()){
        ?>
          <div class="box">
              <img src="<?php echo $donnees['content_image_path']?>" alt="<?php echo $donnees['content_titre']?>">
              <div class="overlay">
                <p>Nom: <?php echo $donnees['content_comment']?></p>
                <p>Categorie: <?php echo $donnees['categorie_type']?></p>
                <p>Contributeur: <?php echo $donnees['user_prenom']?></p>
              </div>
          </div>
        <?php
          } $reponse->closeCursor(); 
        ?>
    </section>

    <!-- Footer -->
    <?php include 'inc/footer.php'; ?>

</body>

</html>
