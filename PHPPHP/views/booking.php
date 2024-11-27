<!DOCTYPE html>
<html>

<head>
    <title>Rezervările Hotelului</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Rezervări</h1>
    <div class="bookings">
        <?php foreach ($bookings as $booking): ?>
            <div class="booking">
                <p>Client: <?php echo htmlspecialchars($booking['username']); ?></p>
                <p>Cameră: <?php echo htmlspecialchars($booking['room_name']); ?></p>
                <p>Data rezervării: <?php echo htmlspecialchars($booking['booking_date']); ?></p>
                <p>Total: <?php echo htmlspecialchars($booking['total_price']); ?> RON</p>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>