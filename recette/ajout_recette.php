<?php
session_start();
include 'includes/header.php';
?>

<div style="margin: 150px auto;" class="w-50">
    <h1 class="text-center">Publier une recette</h1>
    <form method="post" action="actions/traitement_recette.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description de la recette</label>
            <textarea class="form-control" rows="3" name="description" required></textarea>
        </div>

        <div class="input-group mb-3">
            <input type="text" id="ingredient" class="form-control" placeholder="Ajouter un ingrédient">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Ajouter</button>
        </div>

        <div class="mb-3">
            <label class="form-label">Liste des ingrédients</label>
            <textarea class="form-control" rows="3" id="liste-ingredient" disabled></textarea>
        </div>

        <input type="text" name="list_ingredient" id="liste" hidden>

        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Upload</label>
            <input type="file" class="form-control" name="image" required>
        </div>

        <button name="ajout" class="btn btn-primary">Publier</button>
    </form>
</div>

<script>
    const LISTE = document.getElementById("liste");
    const LISTEINGREDIENT = document.getElementById("liste-ingredient");
    document.getElementById("button-addon2").addEventListener('click', () => {
        let ingredient = document.getElementById("ingredient").value;
        if (LISTE.value == "") {
            LISTE.value = ingredient;
            LISTEINGREDIENT.value = ingredient;
        } else {
            LISTE.value = LISTE.value + ", " + ingredient;
            LISTEINGREDIENT.value = LISTEINGREDIENT.value + ", " + ingredient;
        }
        document.getElementById("ingredient").value = "";
    });
</script>