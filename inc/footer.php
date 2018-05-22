<!-- Connection a la base de donnée distante -->
<?php include 'inc/bddconnect.php'?>

<?php
$reponse = $bdd->query('SELECT user_prenom, user_nom FROM user WHERE user_id=1');?>
    <footer>
        <p>Designed By
            <?php
while ($donnees = $reponse->fetch()){
    echo $donnees['user_prenom'].' '.$donnees['user_nom'];
}
$reponse->closeCursor();
?> | Copyright &copy;2018 | <a href="mention.php">Mentions Légales</a></p>
    </footer>
