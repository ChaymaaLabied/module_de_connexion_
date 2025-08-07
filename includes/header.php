<header class="site-header">
    <div class="container">
        <h1 class="logo">Mon Site 🔐</h1>
        <nav class="navigation">
            <a href="index.php">Accueil</a>
            <?php if (!isset($_SESSION['login'])): ?>
                <a href="inscription.php">Inscription</a>
                <a href="connexion.php">Connexion</a>
            <?php else: ?>
                <a href="profil.php">Profil</a>
                <?php if ($_SESSION['login'] === 'admin'): ?>
                    <a href="admin.php">Admin</a>
                <?php endif; ?>
                <a href="deconnexion.php">Déconnexion</a>
            <?php endif; ?>
        </nav>
    </div>
</header>