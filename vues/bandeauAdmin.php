<?php
 if($_SESSION['login'] !== ""){
 $user = $_SESSION['login'];
 // afficher un message
 echo "Bonjour $user, vous êtes connecté";
 }
 ?>
<body>
        <section>
            <div class="container">
                <div class="navcenter">
                    <nav>
                        <ul>
                            <img src="images/logo.png" alt="">
                            <li> <a href="index.php?uc=admin&ad=messages&action=commentaires">MESSAGES</a></li>
                            <li> <a href="index.php?uc=admin&ad=produits&action=ajouterproduit">AJOUTS PRODUITS</a></li>
                            <li> <a href="index.php?uc=admin&ad=voirProduits&action=voirLesProduitsAdmin">VOIR PRODUITS</a></li>
                            <li> <a href="index.php?uc=admin&ad=deconnexion&action=deconnexiongo">Déconnexion</a></li>
                        </ul>
                    </nav>
                </div>
