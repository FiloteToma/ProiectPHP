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
    <title>Recenzii Cameră</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <h1>Recenzii pentru cameră</h1>
    <a href="index.php?action=createReview&room_id=<?php echo htmlspecialchars($room_id, ENT_QUOTES, 'UTF-8'); ?>">Adaugă Recenzie</a>

    <?php if (!empty($reviews)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Autor</th>
                    <th>Conținut</th>
                    <th>Rating</th>
                    <th>Acțiuni</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($review['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($review['author'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($review['content'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($review['rating'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <a href="index.php?action=deleteReview&id=<?php echo htmlspecialchars($review['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                onclick="return confirm('Ești sigur că vrei să ștergi această recenzie?');">Șterge</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nu există recenzii pentru această cameră.</p>
    <?php endif; ?>
</body>

</html>