<?php if (!isset($_SESSION['user_id'])): ?>
    <p>Trebuie să fii autentificat pentru a accesa această pagină.</p>
    <a href="login.php">Autentificare</a>
    <?php exit; ?>
<?php endif; ?>

<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugă Cameră</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Adaugă Cameră</h1>
    <form method="post" action="index.php?action=createRoom">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">

        <label for="name">Nume:</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Descriere:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="price">Preț:</label>
        <input type="number" id="price" name="price" step="0.01" required>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="available">Available</option>
            <option value="booked">Booked</option>
            <option value="maintenance">Maintenance</option>
        </select>

        <button type="submit">Adaugă Cameră</button>
    </form>
</body>

</html>