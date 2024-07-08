<?php
session_start();
require_once "../classes/recette.php";

if (!isset($_SESSION['user'])) {
    header("Location: ../connexion.php");
    exit();
}

$id_user = $_SESSION['user']['id'];

if (isset($_POST['ajout'])) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $listeIngredients = $_POST['list_ingredient'];
    $image = $_FILES['image']['name'];
    $target = "../uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $recette = new Recette(null, $nom, $description, $listeIngredients, $id_user, $image);
        $recette->ajoutRecette();
        header("Location: ../index.php");
    } else {
        echo "Échec du téléchargement de l'image.";
    }
}


if (isset($_POST['supprimer'])) {
    $id = $_POST['id'];

    $recette = new Recette($id, null, null, null, $id_user, null);
    $recette->supprimerRecette();
    header("Location: ../index.php?success=1");
}
