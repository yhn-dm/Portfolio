<?php
session_start();
include 'includes/header.php'; 
?>

<div class="container">

    <div style="margin: 150px auto;" class="w-50">
        <h1 class="text-center">Inscription</h1>
        <?php
        if (isset($_GET['success'])) {
            echo '<div class="alert alert-success">Inscription réussie!</div>';
        }
        ?>
        <form action="actions/traitement_user.php" method="post">
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Prenom</label>
                <input type="text" name="prenom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button name="register" class="btn btn-primary">Inscription</button>
        </form>
    </div>

</div>

