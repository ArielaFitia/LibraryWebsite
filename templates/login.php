<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
</head>

<body>
    <h2>Connexion</h2>

    <form method="post" action="index.php?action=login">
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