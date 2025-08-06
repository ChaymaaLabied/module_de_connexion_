<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Bienvenue sur le site</h1>
    <?php if (isset($_SESSION['login'])): ?>
        <p>Bonjour, <?= $_SESSION['login'] ?> | <a href="profil.php">Profil</a> | <a href="deconnexion.php">Déconnexion</a></p>
        <?php if ($_SESSION['login'] === 'admin') echo '<p><a href="admin.php">Accès admin</a></p>'; ?>
    <?php else: ?>
        <p><a href="connexion.php">Connexion</a> | <a href="inscription.php">Inscription</a></p>
    <?php endif; ?>
</body>

</html>