<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=library_website';
$username = 'root';
$password = 'root';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

session_start();
// Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    // Vérification des informations de connexion dans la base de données
    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email AND password = :password AND status = :status");
    $stmt->execute(['email' => $email, 'password' => $password, 'status' => $status]);
    $user = $stmt->fetch();

    if ($user) {
        // Connexion réussie, rediriger en fonction du statut
        if ($status === 'membre') {
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $email;
            header('Location: member_dashboard.php');
            exit();
        } elseif ($status === 'admin') {
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $email;
            header('Location: admin_dashboard.php');
            exit();
        }
    } else {
        $error = "Identifiants incorrects. Veuillez réessayer.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
</head>

<body>
    <h2>Connexion</h2>
    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="login.php">
        <label for="email">Adresse email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="status">Statut:</label>
        <select name="status" id="status" required>
            <option value="membre">Membre</option>
            <option value="admin">Bibliothécaire</option>
        </select>
        <br>
        <button type="submit">Connexion</button>
    </form>
</body>

</html>