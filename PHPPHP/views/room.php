<!DOCTYPE html>
<html>

<head>
    <title>Detalii Cameră</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="room-details">
        <h1><?php echo htmlspecialchars($room['name']); ?></h1>
        <p><?php echo htmlspecialchars($room['description']); ?></p>
        <p>Preț pe noapte: <?php echo htmlspecialchars($room['price']); ?> RON</p>
        <p>Status: <?php echo htmlspecialchars($room['status']); ?></p>
        <a href="index.php">Înapoi la listă</a>
    </div>
</body>

</html>