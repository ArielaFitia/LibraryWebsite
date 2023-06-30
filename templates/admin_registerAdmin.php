<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=library_website';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Traitement du formulaire d'inscription
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupération des données du formulaire
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Insertion des données dans la table "user"
        $stmt = $pdo->prepare('INSERT INTO user (fullname, email, password, status) VALUES (?, ?, ?, ?)');
        $stmt->execute([$fullname, $email, $password, 'admin']);

        // Affichage d'un message de succès
        echo "Inscription réussie !";
    }
} catch (PDOException $e) {
    // Gestion des erreurs de connexion à la base de données
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Inscription bibliothécaire</title>
</head>

<body>
    <h1>Inscription bibliothécaire</h1>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="fullname">Nom complet :</label>
        <input type="text" name="fullname" required><br>

        <label for="email">Email :</label>
        <input type="email" name="email" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Inscrire">
    </form>
</body>

</html>