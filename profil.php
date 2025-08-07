<?php
session_start();
include 'config.php';

// Rediriger si l'utilisateur n'est pas connecté
if (!isset($_SESSION['id'])) {
    header("Location: connexion.php");
    exit();
}

$erreur = '';
$success = '';

// Récupérer les infos actuelles de l'utilisateur
$id = $_SESSION['id'];
$stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];

    // Vérification de base
    if (empty($login) || empty($prenom) || empty($nom)) {
        $erreur = "Veuillez remplir tous les champs (sauf mot de passe si inchangé).";
    } else {
        // Mise à jour avec ou sans mot de passe
        if (!empty($password)) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $update = $conn->prepare("UPDATE utilisateurs SET login = ?, prenom = ?, nom = ?, password = ? WHERE id = ?");
            $update->bind_param("ssssi", $login, $prenom, $nom, $hashed, $id);
        } else {
            $update = $conn->prepare("UPDATE utilisateurs SET login = ?, prenom = ?, nom = ? WHERE id = ?");
            $update->bind_param("sssi", $login, $prenom, $nom, $id);
        }

        if ($update->execute()) {
            $_SESSION['login'] = $login;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['nom'] = $nom;
            $success = "Profil mis à jour avec succès.";
        } else {
            $erreur = "Erreur lors de la mise à jour.";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Mon profil</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Modifier mon profil</h1>

    <?php if ($erreur): ?>
        <p style="color:red"><?= $erreur ?></p>
    <?php endif; ?>

    <?php if ($success): ?>
        <p style="color:green"><?= $success ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="login" value="<?= htmlspecialchars($user['login']) ?>" required><br>
        <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required><br>
        <input type="text" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required><br>
        <input type="password" name="password" placeholder="Nouveau mot de passe (facultatif)"><br>
        <button type="submit">Mettre à jour</button>
    </form>

    <p><a href="index.php">Retour à l'accueil</a></p>
</body>

</html>