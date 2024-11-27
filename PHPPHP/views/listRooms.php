<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <title>Listă Camere</title>
    <link rel="stylesheet" href="style.css"> <!-- Conectează CSS-ul dacă există -->
</head>

<body>
    <h1>Listă Camere</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nume</th>
                <th>Descriere</th>
                <th>Preț</th>
                <th>Status</th>
                <th>Acțiuni</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rooms as $room): ?>
                <tr>
                    <td><?php echo htmlspecialchars($room['id']); ?></td>
                    <td><?php echo htmlspecialchars($room['name']); ?></td>
                    <td><?php echo htmlspecialchars($room['description']); ?></td>
                    <td><?php echo htmlspecialchars($room['price']); ?></td>
                    <td><?php echo htmlspecialchars($room['status']); ?></td>
                    <td>
                        <a href="index.php?action=updateRoom&id=<?php echo $room['id']; ?>">Editează</a>
                        <a href="index.php?action=deleteRoom&id=<?php echo $room['id']; ?>" onclick="return confirm('Ești sigur că vrei să ștergi această cameră?');">Șterge</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=createRoom">Adaugă Cameră Nouă</a>
</body>

</html>