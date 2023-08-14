<div class="connexion">
    <form action="index.php?uc=connexion&action=verifconnex" method="POST">
        <h1>CONNEXION</h1>
        
        <?php
        
        if (isset($_POST['login'])) {
            $login = $_POST['login'];
            
            if ($count === false) {
                echo '<p class="error-msg">Mot de passe ou identifiant incorrect.</p>';
            }
            
            if (empty($login) || empty($mdp)) {
                echo '<p class="error-msg">Veuillez renseigner tous les champs.</p>';
            }
            
            if (!strpos($login, '@gmail.com') || !strpos($login, '@yahoo.com')) {
                echo '<p class="error-msg">Veuillez rentrer une adresse email valide.</p>';
            }
        }
        ?>
        
        <input type="text" name="login" placeholder="Email" value="<?php echo isset($login) ? $login : ''; ?>">
        <input type="password" name="mdp" placeholder="Mot de passe">
        <button type="submit">connexion</button>
        <a href="index.php?uc=register">Pas de compte ? Inscrivez-vous</a>
    </form>
</div>
