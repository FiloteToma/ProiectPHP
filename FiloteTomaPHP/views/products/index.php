<!DOCTYPE html>
<html lang="ro">


<head>
    <meta charset="UTF-8">
    <title>Lista de Produse</title>
    <link rel="stylesheet" href="http://filote-toma-andei.infy.uk/style.css">


</head>

<body>
    <h1>Produsele disponibile</h1>
    <div class="produse">
        <?php foreach ($products as $produs): ?>
            <div class="produs">
                <img src="imagini/<?php echo htmlspecialchars($produs['url_imagine']); ?>" alt="<?php echo htmlspecialchars($produs['nume']); ?>">
                <h2><?php echo htmlspecialchars($produs['nume']); ?></h2>
                <p><?php echo htmlspecialchars($produs['descriere']); ?></p>
                <p>Preț: <?php echo htmlspecialchars($produs['pret']); ?> lei</p>
                <a href="index.php?action=show&id=<?php echo $produs['id']; ?>">Detalii</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>