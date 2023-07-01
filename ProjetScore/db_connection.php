<?php
$servername = "localhost"; // Le nom du serveur
$username = "root"; // Le nom d'utilisateur de la base de données
$password = ""; // Le mot de passe de la base de données
$dbname = "jeusociete"; // Le nom de la base de données

// Création de la connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}
?>