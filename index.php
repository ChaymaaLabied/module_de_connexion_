<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="./style/common.css">
    <link rel="stylesheet" href="./style/index.css">
</head>

<body>

    <?php include 'includes/header.php'; ?>

    <main class="accueil">
        <h1>Bienvenue sur notre site</h1>

        <?php if (isset($_SESSION['login'])): ?>
            <p class="bonjour">Bonjour <strong><?= htmlspecialchars($_SESSION['login']) ?></strong> 👋</p>
            <div class="liens">
                <a href="profil.php" class="btn">Mon Profil</a>
                <?php if ($_SESSION['login'] === 'admin'): ?>
                    <a href="admin.php" class="btn admin">Admin</a>
                <?php endif; ?>
                <a href="deconnexion.php" class="btn logout">Déconnexion</a>
            </div>
        <?php else: ?>
            <p class="invite">Connectez-vous ou inscrivez-vous pour accéder aux fonctionnalités du site.</p>
            <div class="liens">
                <a href="connexion.php" class="btn">Connexion</a>
                <a href="inscription.php" class="btn">Inscription</a>
            </div>
        <?php endif; ?>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>

</html>