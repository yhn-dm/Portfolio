<?php

class Recette {
    private $id;
    private $nom;
    private $description;
    private $listeIngredients;
    private $auteur;
    private $image;

    public function __construct($id = null, $nom = null, $description = null, $listeIngredients = null, $auteur = null, $image = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->listeIngredients = $listeIngredients;
        $this->auteur = $auteur;
        $this->image = $image;
    }

    public function ajoutRecette() {
        try {
            $db = new PDO("mysql:host=localhost;dbname=recettes", "root", "");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request = $db->prepare("INSERT INTO recettes (nom, description, liste_ingredient, image, id_user) VALUES (?, ?, ?, ?, ?)");
            $request->execute(array($this->nom, $this->description, $this->listeIngredients, $this->image, $this->auteur));
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function modifierRecette() {
        try {
            $db = new PDO("mysql:host=localhost;dbname=recettes", "root", "");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request = $db->prepare("UPDATE recettes SET nom = ?, description = ?, liste_ingredient = ?, image = ? WHERE id = ? AND id_user = ?");
            $request->execute(array($this->nom, $this->description, $this->listeIngredients, $this->image, $this->id, $this->auteur));
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function supprimerRecette() {
        try {
            $db = new PDO("mysql:host=localhost;dbname=recettes", "root", "");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request = $db->prepare("DELETE FROM recettes WHERE id = ? AND id_user = ?");
            $request->execute(array($this->id, $this->auteur));
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>