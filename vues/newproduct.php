<div class="addproduct">
    <div class="productmenu">
        <form action="index.php?uc=admin&ad=produits&action=ajouterproduit" method="POST">
            <center>
                <h1>Ajouter</h1>
            </center>
            <label for="file">Choisissez une image</label>
            <input type="file" name="image" id="file" class="inputfile">
            <input type="text" placeholder="Nom" name="nom">
            <input type="text" placeholder="Ingrédients" name="ingredients">
            <input type="text" placeholder="Prix" name="prix">
            <button type="submit" name="submit" id="myBtn">Insérer</button>
        </form>
    </div>
</div>

<style>
.error-msgadmin {
    color: rgb(172, 5, 5);
    text-align: center;
    margin-left: 350px;
    margin-bottom: 200px;
    font-size: 20px;
}
</style>

    