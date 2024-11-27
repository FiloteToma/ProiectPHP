<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <title>Actualizează Cameră</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Actualizează Cameră</h1>
    <form method="post" action="index.php?action=updateRoom&id=<?php echo htmlspecialchars($roomDetails['id']); ?>">
        <label for="name">Nume:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($roomDetails['name']); ?>" required>

        <label for="description">Descriere:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($roomDetails['description']); ?></textarea>

        <label for="price">Preț:</label>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($roomDetails['price']); ?>" required>

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