<?php
session_start();
?>
    <div class="grid-container">

        <?php foreach($lesProduits as $unProduits) { ?>
            <?php 
                    echo "<section class='order'>";
                    echo "<div class='item'>";
                    echo "<div class='carre'>";
                    echo "<img src='images/".$unProduits['photo']." ' ></th>";
                    echo "</div>";
                    echo '<p>'.($unProduits['nom'].'</p>');
                    echo '<p>'.($unProduits['ingredients'].'</p>');
                    echo '<p>'.($unProduits['prix'].'$</p>');
                    echo "<button><a href='index.php?uc=connexionBonne&ucconn=menu&action=ajoutpanier&id=" . $unProduits['id'] . "&photo=" . $unProduits['photo'] . "&nom=" . $unProduits['nom'] . "&ingredients=" . $unProduits['ingredients'] . "&prix=" . $unProduits['prix'] . "'>Commander</a></button>";
                    echo "</div>";
                    echo "</section>";
            ?>
            <?php
                } 
            ?>
    </div>

