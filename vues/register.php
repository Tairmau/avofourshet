<div class="connexion">
    <form action="index.php?uc=register&action=register" method="POST">
    <?php
        

            if (empty($email) || empty($motdepasse) || empty($nom) || empty($prenom)) {
                echo '<p class="error-msg">Veuillez renseigner tous les champs.</p>';
            }
            
            if (!strpos($email, '@gmail.com') || !strpos($email, '@yahoo.com')) {
                echo '<p class="error-msg">Veuillez rentrer une adresse email valide.</p>';
            }
    ?>
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="mdp" placeholder="Mot de passe">
        <button type="submit">Inscription</button>
        <a href="index.php?uc=connexion">Deja un compte? Connectez vous</a>
    </form>
</div>