<?php
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

try {
    $db = new PDO("mysql:host=localhost;dbname=recettes", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['id_recette']) && isset($_POST['action'])) {
        $id_user = $_SESSION['user']['id'];
        $id_recette = $_POST['id_recette'];
        $action = $_POST['action'];

        if ($action === 'like') {
            // Vérifier si l'utilisateur a déjà liké cette recette
            $request = $db->prepare("SELECT * FROM likes WHERE id_user = ? AND id_recette = ?");
            $request->execute([$id_user, $id_recette]);
            if ($request->rowCount() === 0) {
                // Ajouter un like
                $request = $db->prepare("INSERT INTO likes (id_user, id_recette) VALUES (?, ?)");
                $request->execute([$id_user, $id_recette]);
                echo json_encode(['status' => 'liked']);
                exit();
            }
        } elseif ($action === 'dislike') {
            // Supprimer un like
            $request = $db->prepare("DELETE FROM likes WHERE id_user = ? AND id_recette = ?");
            $request->execute([$id_user, $id_recette]);
            echo json_encode(['status' => 'disliked']);
            exit();
        }
    }

    echo json_encode(['error' => 'Invalid request']);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erreur : ' . $e->getMessage()]);
}
