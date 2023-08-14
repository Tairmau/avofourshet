<div class="summarycommande">
    <table>
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
            
                session_start();
                $pdo = PdoAvofourshet::getPdoAvofourshet();
                $email = $_SESSION['login'];
           
                if (isset($_GET['id'])) {
                    $idProduitASupprimerco = $_GET['id'];
                    $pdo->supprimerProduitPanier($idProduitASupprimerco);
                    header('index.php?uc=connexionBonne&ucconn=confirmcommande&action=recapcommande');
                }

                foreach ($articlescommandes as $articlescommande) {
                    echo "<tr>";
                    $idcommande = $articlescommande['id_commande'];

                    echo "<td class='imagestd'><img src='images/" . $articlescommande['image'] . "' style='width: 100px; height: 100px; margin-left: 10px;'></td>";
                    echo "<td style='text-align: center;'>" . $articlescommande['nom'] . "</td>";
                    echo "<td style='text-align: center;'>" . $articlescommande['prix'] . "$</td>";
                    echo "<td style='text-align: center;'>#" . $idcommande . "</td>";
                    $Qte = $articlescommande['qte'];
                    $taille = $articlescommande['Taille'];
                    if ($Qte == 0) {
                        $Qte += 1;
                        // Mettre à jour la quantité dans la base de données ici, si nécessaire
                        $pdo->addqteandtaille($Qte,$taille,$idcommande);
                    }
                    echo "<td style='text-align: center;'>" . $Qte . "</td>";
                    echo "<td style='text-align: center;'>" . $taille . "</td>";
                    $unProduitsPanier = $articlescommande['id'];
                    echo "<td style='text-align: center;'><a href='index.php?uc=connexionBonne&ucconn=confirmcommande&action=supprimerproduitpanier&id=" . $unProduitsPanier . "'><img src='images/moin.png' style='display: block; margin: 0 auto; width: 50px; height: 50px;'></a></td>";
                    echo "</tr>";

                }
            ?>
        </table>

</div>
        <div class="totalcommandeconf">
            <p>Total : <?php echo $total; if($total == 0){echo 0;}?>$</p>
        </div>
        <div class="retourorpayer">
            <button type="submit"><a href="index.php?uc=connexionBonne&ucconn=menu&action=livraison">LIVRAISON</a></button>
        </div>
</form>

</div>