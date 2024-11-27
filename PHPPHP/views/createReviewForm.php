<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <title>Adaugă Recenzie</title>
</head>

<body>
    <h1>Adaugă o recenzie</h1>
    <form method="post" action="index.php?action=createReview">
        <input type="hidden" name="room_id" value="<?php echo htmlspecialchars($_GET['room_id']); ?>">
        <label for="author">Autor:</label>
        <input type="text" name="author" id="author" required><br>
        <label for="content">Conținut:</label>
        <textarea name="content" id="content" required></textarea><br>
        <label for="rating">Rating:</label>
        <input type="number" name="rating" id="rating" min="1" max="5" required><br>
        <button type="submit">Adaugă</button>
    </form>
</body>

</html>