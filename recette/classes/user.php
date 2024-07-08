<?php

class User {
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $pswd;

    public function __construct($id = null, $nom, $prenom, $email, $mdp) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->pswd = password_hash($mdp, PASSWORD_DEFAULT);
    }

    public function inscription() {
        try {
            $db = new PDO("mysql:host=localhost;dbname=recettes", "root", "");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request = $db->prepare("INSERT INTO users (nom, prenom, email, pswd) VALUES (?, ?, ?, ?)");
            $request->execute(array($this->nom, $this->prenom, $this->email, $this->pswd));
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function connexion($email, $mdp) {
        try {
            $db = new PDO("mysql:host=localhost;dbname=recettes", "root", "");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request = $db->prepare("SELECT * FROM users WHERE email = ?");
            $request->execute(array($email));
            $user = $request->fetch();

            if (!$user) {
                echo "Cet utilisateur n'existe pas";
                return false;
            } else {
                if (password_verify($mdp, $user['pswd'])) {
                    session_start();
                    $_SESSION['user'] = $user;
                    return true;
                } else {
                    echo "Mot de passe incorrect";
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function deconnexion() {
        session_start();
        session_unset();
        session_destroy();
        return true;
    }
}
?>