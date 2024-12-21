<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervările Hotelului</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Rezervări</h1>
    <div class="bookings">
        <?php if (!empty($bookings)): ?>
            <?php foreach ($bookings as $booking): ?>
                <div class="booking">
                    <p>Client: <?php echo htmlspecialchars($booking['username'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p>Cameră: <?php echo htmlspecialchars($booking['room_name'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p>Data rezervării: <?php echo htmlspecialchars($booking['booking_date'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p>Total: <?php echo htmlspecialchars($booking['total_price'], ENT_QUOTES, 'UTF-8'); ?> RON</p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nu există rezervări în acest moment.</p>
        <?php endif; ?>
    </div>
</body>

</html>