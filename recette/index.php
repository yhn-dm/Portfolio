<?php
session_start();
include 'includes/header.php';

try {
    // Connexion à la base de données
    $db = new PDO("mysql:host=localhost;dbname=recettes", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les recettes et les like counts
    $request = $db->query("SELECT r.*, (SELECT COUNT(*) FROM likes l WHERE l.id_recette = r.id) AS like_count FROM recettes r");
    $recettes = $request->fetchAll(PDO::FETCH_ASSOC);
    
    // Récupérer les likes de l'utilisateur connecté
    $likes = [];
    if (isset($_SESSION['user'])) {
        $id_user = $_SESSION['user']['id'];
        $likeRequest = $db->prepare("SELECT id_recette FROM likes WHERE id_user = ?");
        $likeRequest->execute([$id_user]);
        $likes = $likeRequest->fetchAll(PDO::FETCH_COLUMN);
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recettes</title>
    <style>
        .card-img-top {
            width: 100%;
            height: 200px; /* Ajustez cette valeur selon vos besoins */
            object-fit: cover;
        }
        .content-header {
            margin-top: 20px; /* Espace entre la navbar et le heading */
        }
    </style>
</head>
<body>
    <div class="container content-header">
        <h1>Recettes :</h1>
        <div class="row">
            <?php foreach ($recettes as $recette): ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="uploads/<?php echo htmlspecialchars($recette['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($recette['nom']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($recette['nom']); ?></h5>
                            <p class="card-text text-truncate" style="max-height: 3.6em;"><?php echo htmlspecialchars($recette['description']); ?></p>
                            <h6>Ingrédients:</h6>
                            <p class="card-text text-truncate" style="max-height: 3.6em;"><?php echo htmlspecialchars($recette['liste_ingredient']); ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <form method="post" action="actions/traitement_recette.php" class="d-inline w-100">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($recette['id']); ?>">
                                <button type="submit" name="supprimer" class="btn btn-danger w-100">Supprimer</button>
                            </form>
                            <form method="post" class="like-form d-inline w-100 ms-2">
                                <input type="hidden" name="id_recette" value="<?php echo htmlspecialchars($recette['id']); ?>">
                                <input type="hidden" name="action" value="<?php echo in_array($recette['id'], $likes) ? 'dislike' : 'like'; ?>">
                                <button type="submit" class="btn btn-<?php echo in_array($recette['id'], $likes) ? 'secondary' : 'success'; ?> w-100 like-button">
                                    <?php echo in_array($recette['id'], $likes) ? 'Dislike' : 'Like'; ?> (<span class="like-count"><?php echo $recette['like_count']; ?></span>)
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.like-form').forEach(function(form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                var formData = new FormData(form);
                var button = form.querySelector('.like-button');
                var action = formData.get('action');
                var id_recette = formData.get('id_recette');
                var likeCountSpan = button.querySelector('.like-count');

                fetch('classes/like.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'liked' || data.status === 'disliked') {
                        var newAction = action === 'like' ? 'dislike' : 'like';
                        var likeCount = parseInt(likeCountSpan.textContent);
                        likeCount += newAction === 'like' ? -1 : 1;
                        likeCountSpan.textContent = likeCount;
                        button.textContent = newAction === 'like' ? 'Like' : 'Dislike';
                        button.classList.toggle('btn-success', newAction === 'like');
                        button.classList.toggle('btn-secondary', newAction === 'dislike');
                        form.querySelector('input[name="action"]').value = newAction;
                        button.innerHTML = `${newAction === 'like' ? 'Like' : 'Dislike'} (<span class="like-count">${likeCount}</span>)`;
                    } else {
                        alert(data.error || 'An error occurred.');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
    </script>
</body>
</html>