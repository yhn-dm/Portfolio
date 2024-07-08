<?php 
    session_start();
    include 'includes/header.php'; 
?>

<div class="container">

   <div style="margin: 250px auto;" class="w-50">
        <h1 class="text-center">Connexion</h1>
        <form method="post" action="actions/traitement_user.php">
            <!-- email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>

            <!-- password -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" >
            </div>

            <button name="login" class="btn btn-primary">Connexion</button>
        </form>
   </div>

</div>
    
