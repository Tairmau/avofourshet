    <div class="accueil">
        <div class="left">    
            <h1>La pizza parfaite<br>servie à votre adresse</h1>
            <p>Commandez pour être livré à votre domicile
                <br>dans toute la Guadeloupe où réservez une table dans notre restaurant.</p>
                <?php
                    require_once('controleurs/c_verifconnex.php');
                    if ($ucconn) {
                        if($_SESSION['login'] !== "")
                        {
                            $user = $_SESSION['login'];
                        }
                        //echo "Bonjour $user, vous êtes connecté ";

                        ?>
                        <button><a href="index.php?uc=connexionBonne&ucconn=menu&action=voirLesProduits">commander</a></button>

                        <?php
                    }else{
                        ?>
                        <button><a href="index.php?uc=connexion">commander</a></button>
                        <?php
                    }
                    
                ?>
        </div>
        <div class="right">
            <img src="images/pizza.png" alt="">
        </div>
    </div>
    </div>
</section>

