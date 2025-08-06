<?php
session_start();
include 'config.php';

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Vérifier que tous les champs sont remplis
    if (empty($login) || empty($prenom) || empty($nom) || empty($password) || empty($confirm_password)) {
        $erreur = "Tous les champs doivent être remplis.";
    }
    // Vérifier que les mots de passe correspondent
    elseif ($password !== $confirm_password) {
        $erreur = "Les mots de passe ne correspondent pas.";
    }
    // Vérifier si le login est déjà utilisé
    else {
        $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $erreur = "Ce login est déjà utilisé.";
        } else {
            // Hacher le mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insérer dans la base de données
            $insert = $conn->prepare("INSERT INTO utilisateurs (login, prenom, nom, password) VALUES (?, ?, ?, ?)");
            $insert->bind_param("ssss", $login, $prenom, $nom, $hashed_password);
            $insert->execute();

            // Redirection vers la page de connexion
            header("Location: connexion.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Inscription</h1>
    <?php if ($erreur): ?>
        <p style="color:red"><?= $erreur ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="login" placeholder="Login" required><br>
        <input type="text" name="prenom" placeholder="Prénom" required><br>
        <input type="text" name="nom" placeholder="Nom" required><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br>
        <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required><br>
        <button type="submit">S'inscrire</button>
    </form>

    <p><a href="index.php">Retour à l'accueil</a></p>
</body>

</html>