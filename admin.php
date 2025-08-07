<?php
session_start();
include 'config.php';

// Rediriger si non connecté
if (!isset($_SESSION['login'])) {
    header("Location: connexion.php");
    exit();
}

// Rediriger si ce n'est pas l'admin
if ($_SESSION['login'] !== 'admin') {
    echo "Accès refusé. Cette page est réservée à l'administrateur.";
    exit();
}

// Récupérer tous les utilisateurs
$result = $conn->query("SELECT id, login, prenom, nom FROM utilisateurs");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin - Liste des utilisateurs</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Bienvenue admin 👑</h1>
    <h2>Liste des utilisateurs :</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Login</th>
            <th>Prénom</th>
            <th>Nom</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['login']) ?></td>
                <td><?= htmlspecialchars($row['prenom']) ?></td>
                <td><?= htmlspecialchars($row['nom']) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <p><a href="index.php">Retour à l’accueil</a></p>
</body>

</html>