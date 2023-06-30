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
        $payment_date = $_POST['payment_date'];
        $expiration_date = $_POST['expiration_date'];

        // Insertion des données dans la table "user"
        $stmt = $pdo->prepare('INSERT INTO user (fullname, email, password, status) VALUES (?, ?, ?, ?)');
        $stmt->execute([$fullname, $email, $password, 'membre']);

        // Récupération de l'ID de l'utilisateur inséré
        $user_id = $pdo->lastInsertId();

        // Insertion des informations de contribution dans la table "contribution"
        $stmt = $pdo->prepare('INSERT INTO contribution (payment_date, expiration_date, user_id) VALUES (?, ?, ?)');
        $stmt->execute([$payment_date, $expiration_date, $user_id]);

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
    <title>Inscription membre</title>
</head>

<body>
    <h1>Inscription membre</h1>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="fullname">Nom complet :</label>
        <input type="text" name="fullname" required><br>

        <label for="email">Email :</label>
        <input type="email" name="email" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br>

        <label for="payment_date">Date de paiement :</label>
        <input type="date" name="payment_date" required><br>

        <label for="expiration_date">Date d'expiration :</label>
        <input type="date" name="expiration_date" required><br>

        <input type="submit" value="Inscrire">
    </form>
</body>

</html>