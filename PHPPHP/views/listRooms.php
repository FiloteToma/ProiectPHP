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
    <title>Listă Camere</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Listă Camere</h1>

    <?php if (!empty($rooms)): ?>
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
                        <td><?php echo htmlspecialchars($room['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($room['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($room['description'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($room['price'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($room['status'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <form action="index.php?action=updateRoom" method="post" style="display:inline;">
                                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($room['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                <button type="submit">Editează</button>
                            </form>

                            <form action="index.php?action=deleteRoom&id=<?php echo htmlspecialchars($room['id'], ENT_QUOTES, 'UTF-8'); ?>" method="post" style="display:inline;">
                                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                <button type="submit" onclick="return confirm('Ești sigur că vrei să ștergi această cameră?');">Șterge</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nu există camere disponibile în acest moment.</p>
    <?php endif; ?>

    <a href="index.php?action=createRoom">Adaugă Cameră Nouă</a>
</body>

</html>