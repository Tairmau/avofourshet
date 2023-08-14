<?php

$unIdProduit = $_REQUEST['id'];

?>

<div class="addproduct">
    <div class="productmenu">
        <form action="index.php?uc=admin&ad=produits&action=modifierproduit&id=<?php echo $unIdProduit; ?>" method="POST">
            <center><h1>Modifier</h1></center>
            <label for="file">Choisissez une image</label>
            <input type="file" name="image" id="file" class="inputfile">
            <input type="text" placeholder="Nommmmm" name="nom">
            <input type="text" placeholder="Ingrédients" name="ingredients">
            <input type="text" placeholder="Prix" name="prix">
            <button type="submit">Insérer</button>
        </form>
    </div>
</div>
