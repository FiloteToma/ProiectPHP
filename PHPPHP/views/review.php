<!DOCTYPE html>
<html>

<head>
    <title>Recenzii</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Recenzii</h1>
    <div class="reviews">
        <?php foreach ($reviews as $review): ?>
            <div class="review">
                <h3><?php echo htmlspecialchars($review['room_name']); ?></h3>
                <p>Utilizator: <?php echo htmlspecialchars($review['username']); ?></p>
                <p>Rating: <?php echo htmlspecialchars($review['rating']); ?> / 5</p>
                <p>Comentariu: <?php echo htmlspecialchars($review['comment']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>