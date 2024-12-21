<?php
session_start(); // Inițializăm sesiunea pentru a avea acces la $_SESSION
require_once 'config/pdo.php';

// Generăm un token CSRF pentru securitate
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificare CSRF
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("Cerere CSRF detectată!");
    }

    // Validare și curățare date de intrare
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    // Validări de bază
    if (empty($username) || empty($password)) {
        $_SESSION['flash_message'] = "Toate câmpurile sunt obligatorii.";
        header('Location: login.php');
        exit;
    }

    try {
        // Găsim utilizatorul în baza de date
        $stmt = $pdo->prepare("SELECT id, password_hash, role FROM users WHERE username = :username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificăm dacă utilizatorul există și dacă parola este corectă
        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];

            $_SESSION['flash_message'] = "Autentificare realizată cu succes!";
            header('Location: index.php');
            exit;
        } else {
            $_SESSION['flash_message'] = "Nume de utilizator sau parolă incorectă!";
            header('Location: login.php');
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['flash_message'] = "Eroare: " . $e->getMessage();
        header('Location: login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autentificare</title>
</head>

<body>
    <h1>Autentificare</h1>

    <?php
    if (isset($_SESSION['flash_message'])) {
        echo "<p style='color:red'>" . $_SESSION['flash_message'] . "</p>";
        unset($_SESSION['flash_message']);
    }
    ?>

    <form action="login.php" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <label for="username">Nume utilizator:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Parolă:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Autentificare</button>
    </form>

    <p>Nu ai cont? <a href="register.php">Înregistrează-te aici</a></p>
</body>

</html>