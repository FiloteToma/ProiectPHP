<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizează Cameră</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Actualizează Cameră</h1>

    <?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin'): ?>
        <p>Trebuie să fii autentificat ca admin pentru a accesa această pagină.</p>
        <a href="login.php">Autentificare</a>
        <?php exit; ?>
    <?php endif; ?>


    <form method="post" action="index.php?action=updateRoom">
        <!-- Câmpuri ascunse -->
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($roomDetails['id'], ENT_QUOTES, 'UTF-8'); ?>">

        <!-- Câmpuri editabile -->
        <label for="name">Nume:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($roomDetails['name'], ENT_QUOTES, 'UTF-8'); ?>" required>

        <label for="description">Descriere:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($roomDetails['description'], ENT_QUOTES, 'UTF-8'); ?></textarea>

        <label for="price">Preț:</label>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($roomDetails['price'], ENT_QUOTES, 'UTF-8'); ?>" required>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="available" <?php echo $roomDetails['status'] === 'available' ? 'selected' : ''; ?>>Available</option>
            <option value="booked" <?php echo $roomDetails['status'] === 'booked' ? 'selected' : ''; ?>>Booked</option>
            <option value="maintenance" <?php echo $roomDetails['status'] === 'maintenance' ? 'selected' : ''; ?>>Maintenance</option>
        </select>

        <button type="submit">Actualizează Cameră</button>
    </form>






</body>

</html>