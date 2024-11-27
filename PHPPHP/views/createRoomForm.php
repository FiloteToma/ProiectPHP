<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <title>Adaugă Cameră</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Adaugă Cameră</h1>
    <form method="post" action="index.php?action=createRoom">
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