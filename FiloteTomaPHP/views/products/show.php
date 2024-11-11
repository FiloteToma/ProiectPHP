<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <title>Detalii Produs - <?php echo htmlspecialchars($product['nume'] ?? 'Produs'); ?></title>
    <link rel="stylesheet" href="http://filote-toma-andei.infy.uk/style.css">

<body>
    <div class="produs">
        <h1><?php echo htmlspecialchars($product['nume']); ?></h1>
        <img src="imagini/<?php echo htmlspecialchars($product['url_imagine']); ?>" alt="<?php echo htmlspecialchars($product['nume']); ?>" width="400">
        <p><?php echo htmlspecialchars($product['descriere']); ?></p>
        <p>Preț: <?php echo htmlspecialchars($product['pret']); ?> lei</p>
        <p>Categorie: <?php echo htmlspecialchars($product['categorie'] ?? 'N/A'); ?></p>
        <a href="http://filote-toma-andei.infy.uk/index.php">Înapoi la listă</a>
    </div>

</body>

</html>