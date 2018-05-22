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
    /* Variable message erreur*/
	$msg = '';

	/* Verification du submit*/
	if(filter_has_var(INPUT_POST, 'submit')){
		/* Recuperation des données du formulaire et validation grace a la fonction test_input*/
		$nom = test_input($_POST['nom']);
        $prenom = test_input($_POST['prenom']);
		$email = test_input($_POST['email']);
		$message = test_input($_POST['message']);

		/* Verification que les données sont saisie*/
		if(!empty($email) && !empty($nom) && !empty($prenom) && !empty($message)){
			/* Verification du format d'email*/
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $msg = 'Merci d\'utilser un email valide';
            /* Verification des données nom et prenom*/
			} else if (preg_match("/^[a-zA-Z ]*$/",$nom)=== false) {
                $msg = 'Merci de ne saisir que des lettres'; 
              }else if (preg_match("/^[a-zA-Z ]*$/",$prenom)=== false) {
                $msg = 'Merci de ne saisir que des lettres'; 
            }else {
				/*Saisie dans des variables de session*/
				$_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['email'] = $email;
                $_SESSION['message'] = $message;
                header('Location: message.php');
			}
            
		} else {
			/*message d'erreur si tout les champs ne sont pas saisie*/
			$msg = 'Merci de saisir tout les champs';
		}
    }
    /*fonction de validation des données saisie*/
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

        <!-- Formulaire -->
        <section class="container3">

            <h1>Nous Contacter</h1>

            <p><span class="erreur">* Champ obligatoire</span></p>
            <div class="contact">
                <?php if($msg != ''): ?>
                <div class="alert">
                    <?php echo $msg; ?>
                </div>
                <?php endif; ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div>
                        <label>Nom *</label>
                        <input type="text" name="nom" value="<?php echo isset($_POST['nom']) ? $nom : ''; ?>">
                    </div><br>
                    <div>
                        <label>Prénom *</label>
                        <input type="text" name="prenom" value="<?php echo isset($_POST['prenom']) ? $prenom : ''; ?>">
                    </div><br>
                    <div>
                        <label>Adresse Email *</label>
                        <input type="email" name="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                    </div><br>
                    <div class="ligne">
                        <label>Message *</label>
                        <textarea name="message" rows="5"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                    </div><br>
                    <div class="ligne">
                        <button type="submit" name="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <?php include 'inc/footer.php'; ?>

</body>

</html>
