
    <div class="grid-containeradmin">

        <?php foreach( $lesProduits as $unProduits) { ?>
            <?php 
                    echo "<section class='order'>";
                    echo "<div class='item'>";
                    echo "<div class='carre'>";
                    echo "<img src='images/".$unProduits['photo']." ' ></th>";
                    echo "</div>";
                    //echo '<p>'.($unProduits['id'].'</p>');
                    echo '<p>'.($unProduits['nom'].'</p>');
                    echo '<p>'.($unProduits['prix'].'$</p>');
                    echo '<p>'.($unProduits['ingredients'].'</p>');
                    echo "<button><a href='index.php?uc=admin&ad=produits&action=supprimerproduit&id=" . $unProduits['id'] . "'>Supprimer</a></button>";
                    echo "<button><a href='index.php?uc=admin&ad=produits&action=modifierproduit&id=" . $unProduits['id'] . "'>Modifier</a></button>";
                    echo "</div>";
                    echo "</section>";
            ?>
            <?php
                } 
            ?>
        </div>

