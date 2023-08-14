<?php 
session_start()
?>
<body>
        <section>
            <div class="container">
                <div class="navcenter">
                    <nav>
                        <ul>
                            <li><a href=""><img src="images/logo.png" alt="" class="logo"></a></li>
                            <li> <a href="index.php?uc=connexionBonne&ucconn=accueil">HOME</a></li>
                            <li> <a href="index.php?uc=connexionBonne&ucconn=menu&action=voirLesProduits">MENU</a></li>
                            <li> <a href="index.php?uc=connexionBonne&ucconn=aboutus">ABOUT US</a></li>
                            <li> <a href="index.php?uc=connexionBonne&ucconn=contact">CONTACT</a></li>
                            <li><a><img src="images/utilisateur.png" alt="" class="user" id="myBtn"></a></li>
                            <li ><a><img src="images/panier.png" alt="" class="panier" id="panierLi"></a></li>

                        </ul>
                    </nav>
                </div>
            <div class="paniershop">
                <table class="articles" id="articles">
                    <div class="cageP">
                            <tr>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>N commande</th>
                                <th>Qte</th>
                                <th>Taille</th>
                                <th>Supprimer</th>
                            </tr>
                            <?php
                                $pdo = PdoAvofourshet::getPdoAvofourshet();
                                $email = $_SESSION['login'];
                                $compteinfo = $pdo->infocompte($email);
                                $articles = $pdo->ajoutpanierSite($email);
                                

                                if (isset($_GET['id'])) {
                                    $idProduitASupprimer = $_GET['id'];
                                    $pdo->supprimerProduitPanier($idProduitASupprimer);
                                    header('Location: index.php?uc=connexionBonne&ucconn=menu&action=voirLesProduits');
                                }
                                foreach ($articles as $unArticle) {
                                    $idcommande = $unArticle['id_commande'];
                                    echo "<tr>";
                                    echo "<td><img src='images/" . $unArticle['image'] . "'></td>";
                                    echo "<td>" . $unArticle['nom'] . "</td>";
                                    echo "<td>" . $unArticle['prix'] . "$</td>";
                                    echo "<td>#". $idcommande . "</td>";
                                    
                                    echo "<td>"; ?>

                                    <form action="index.php?uc=connexionBonne&ucconn=confirmcommande&action=qteandtaille" method="POST">
                                        <input type="qte" placeholder="1" class="qte" name="qte[<?php echo $unArticle['id_commande']; ?>]" id="qte">
                                    <?php
                                    
                                        echo "<td><select name='taille[" . $unArticle['id_commande'] . "]'>";
                                        echo "<option value='Petite'>Petite</option>";
                                        echo "<option value='Moyenne'>Moyenne</option>";
                                        echo "<option value='Grande'>Grande</option>";
                                        echo "</select></td>";


                                    echo "</td>";
                                    $unProduitsPanier = $unArticle['id'];
                                    echo "<td class='delete'><a href='index.php?uc=connexionBonne&ucconn=menu&action=supprimerproduitpanier&id=" . $unProduitsPanier . "' id='delete'><img src='images/moin.png'></a></td>";
                                    echo "</tr>";
                                    $total += $unArticle['prix'];
                                }
                            ?>

                            <tr>
                                <th><button type="submit">COMMANDER</button></th>
                                <th><div class="total"><p>Total : <?php echo $total;?>$</p></div></th>
                            </tr>
                            </form>
                    </div>
                </table>
            </div>

            <script>
                var panierLi = document.getElementById("panierLi");
                var panierDiv = document.querySelector("#articles");
                var isOpen = false;

                

                panierLi.addEventListener("click", function() {
                    if (!isOpen) {
                        panierDiv.style.display = "block";
                        isOpen = true;
                    } else {
                        panierDiv.style.display = "none";
                        isOpen = false;
                    }
                });

                    // Écouteur d'événements pour les clics sur la page
                        document.addEventListener("click", function(event) {
                            var targetElement = event.target; // Élément cliqué

                            // Vérifier si l'élément cliqué se trouve à l'intérieur de la div du panier
                            if (!panierDiv.contains(targetElement) && targetElement !== panierLi) {
                                // Clic à l'extérieur de la div du panier, masquer le panier
                                panierDiv.style.display = "none";
                                isOpen = false;
                            }
                        });

            </script>
                    <div class="container-compte" id="myModal">
                        <img src="images/utilisateurinfo.png" alt="">
                        <?php 
                            $action = $_REQUEST['action'];
                            $pdo = PdoAvofourshet::getPdoAvofourshet();
                            $email = $_SESSION['login'];
                            $compteinfo = $pdo->infocompte($email);
                            require_once("controleurs/c_verifconnex.php");
                            foreach ($compteinfo as $ligne) : 
                        ?>
                        
                        
                        <p>Nom : <?php echo $ligne['nom']; ?></p>
                        <p>Prénom : <?php echo $ligne['prenom']; ?></p>
                        <p>Email : <?php echo $ligne['email']; ?></p>
                        <!-- <p>Mot de passe :--><?php //echo $ligne['motdepasse']; ?><!-- </p>-->
                    <?php endforeach; ?>
                        <button class="deconnexion" ><a href="index.php?uc=connexionBonne&ucconn=deconnexion&action=deconnexiongo">Deconnexion</a></button>
                        <a href="" id="close">fermer</a>

                    </div>


                <script>
                    var modal = document.getElementById("myModal");
                    var btn = document.getElementById("myBtn");
                    var close = document.getElementById("close");

                    btn.onclick = function() {
                        modal.style.display = "block";
                    }

                    close.onclick = function() {
                        modal.style.display = "none";
                    }

                </script>