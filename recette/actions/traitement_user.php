<?php
session_start();
require_once "../classes/user.php";

if (isset($_POST['register'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pswd = $_POST['password'];

    $user = new User(null, $nom, $prenom, $email, $pswd);
    $user->inscription();
    header("Location: ../inscription.php?success=1");
    exit();
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pswd = $_POST['password'];

    if (User::connexion($email, $pswd)) {
        header("Location: ../ajout_recette.php");
    } else {
        header("Location: ../login.php?error=1");
    }
    exit();
}

if (isset($_GET['logout'])) {
    User::deconnexion();
    header("Location: ../connexion.php");
    exit();
}
?>