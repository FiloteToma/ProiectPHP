<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
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
    <a href="index.php?action=createReview&room_id=<?php echo $room_id; ?>">Adaugă Recenzie</a>
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
                    <td><?php echo htmlspecialchars($review['id']); ?></td>
                    <td><?php echo htmlspecialchars($review['author']); ?></td>
                    <td><?php echo htmlspecialchars($review['content']); ?></td>
                    <td><?php echo htmlspecialchars($review['rating']); ?></td>
                    <td>
                        <a href="index.php?action=deleteReview&id=<?php echo $review['id']; ?>" onclick="return confirm('Ești sigur că vrei să ștergi această recenzie?');">Șterge</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>