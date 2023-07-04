<!DOCTYPE html>
<html>

<head>
    <title>Inscription membre</title>
</head>

<body>
    <a href="index.php?action=admin_dashboard">retour</a>
    <h1>Inscription membre</h1>

    <form method="POST" action="index.php?action=registerMember">
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

        <label for="payment_option">Option de paiement :</label>
        <select name="payment_option" required>
            <option value="Paiement en une fois">Paiement en une fois</option>
            <option value="Paiement en deux tranches">Paiement en deux tranches</option>
        </select><br>


        <input type="submit" value="Inscrire">
    </form>
</body>

</html>