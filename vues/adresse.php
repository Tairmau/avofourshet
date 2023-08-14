<?php

session_start()

?>

<div class="livraison">
    <div class="leftliv">
        <h1>Mode de livraison</h1>
        <label for="pizzeria"><input type="radio" name="mode_livraison" id="pizzeria"> &nbsp; Réception à domicile</label>
        <label for="dom"><input type="radio" name="mode_livraison" id="dom"> &nbsp;  Réception en magasin</label>
    </div>
    <div class="right">
        <form id="form_livraison" action="index.php?uc=connexionBonne&ucconn=menu&action=adresse" method="POST">
            <h1>Adresse de livraison</h1>
            <label for="">Nom:</label>
            <input type="text" name="nom" disabled>

            <label for="">Prenom:</label>
            <input type="text" name="prenom" disabled>

            <label for="">Adresse:</label>
            <input type="text" name="habitation" disabled>

            <label for="">Code postal:</label>
            <input type="text" name="codep" disabled>

            <label for="">Pays:</label>
            <input type="text" name="pays" disabled>

            <label for="">Tel:</label>
            <input type="text" name="telephone" disabled>
    <?php     

        if (empty($nom) || empty($prenom) || empty($habitation) || empty($codeP) || empty($pays) || empty($telephone) ) {
            echo '<p class="error-msg">Veuillez renseigner tous les champs.</p>';
        }
        
    ?>
            <button type="submit" disabled>VALIDER</button>
        </form>
    </div>
</div>

<style>
    /* Style pour les champs désactivés */
    #form_livraison input[type="text"]:disabled {
        background-color: #f2f2f2;
        color: #888;
    }
</style>

<script>
    // Récupérer les éléments du DOM
    const radioDom = document.getElementById('dom');
    const formLivraison = document.getElementById('form_livraison');
    const inputs = formLivraison.querySelectorAll('input[type="text"]');
    const buttonValider = formLivraison.querySelector('button[type="submit"]');

    // Écouter les changements sur les boutons radio "Réception à domicile" et "Réception en magasin"
    const radioButtons = document.getElementsByName('mode_livraison');
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            const isDomSelected = radioDom.checked;
            inputs.forEach(input => input.disabled = isDomSelected);
            buttonValider.disabled = isDomSelected;
        });
    });
</script>
