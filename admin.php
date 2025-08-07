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
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Admin - Liste des utilisateurs</title>
    <link rel="stylesheet" href="./style/common.css">
    <link rel="stylesheet" href="./style/admin.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <main class="admin">
        <h1>Bienvenue admin 👑</h1>
        <h2>Liste des utilisateurs</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['login']) ?></td>
                        <td><?= htmlspecialchars($row['prenom']) ?></td>
                        <td><?= htmlspecialchars($row['nom']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <p><a class="btn" href="index.php">Retour à l’accueil</a></p>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>

</html>