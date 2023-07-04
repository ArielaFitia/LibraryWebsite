<!DOCTYPE html>
<html>

<head>
    <title>Inscription bibliothécaire</title>
</head>

<body>
    <a href="index.php?action=admin_dashboard">retour</a>
    <h1>Inscription bibliothécaire</h1>

    <form method="POST" action="index.php?action=registerAdmin">
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