<?php
session_start();
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
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validări de bază
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['flash_message'] = "Toate câmpurile sunt obligatorii.";
        header('Location: register.php');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['flash_message'] = "Email invalid.";
        header('Location: register.php');
        exit;
    }

    if ($password !== $confirm_password) {
        $_SESSION['flash_message'] = "Parolele nu se potrivesc.";
        header('Location: register.php');
        exit;
    }

    // Verificare lungime și complexitate parolă
    if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[\W]/', $password)) {
        $_SESSION['flash_message'] = "Parola trebuie să aibă cel puțin 8 caractere și să conțină o literă mare, o literă mică, o cifră și un caracter special.";
        header('Location: register.php');
        exit;
    }

    // Criptăm parola
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Inserăm utilizatorul în baza de date
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password_hash)");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password_hash', $passwordHash, PDO::PARAM_STR);
        $stmt->execute();

        $_SESSION['flash_message'] = "Înregistrare realizată cu succes! Te poți conecta acum.";
        header('Location: login.php');
        exit;
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            $_SESSION['flash_message'] = "Numele de utilizator sau email-ul există deja.";
        } else {
            $_SESSION['flash_message'] = "Eroare: " . $e->getMessage();
        }
        header('Location: register.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Înregistrare</title>
</head>

<body>
    <h1>Înregistrează-te</h1>

    <?php
    if (isset($_SESSION['flash_message'])) {
        echo "<p style='color:red'>" . $_SESSION['flash_message'] . "</p>";
        unset($_SESSION['flash_message']);
    }
    ?>

    <form action="register.php" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <label for="username">Nume utilizator:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Parolă:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirm_password">Confirmă Parola:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <button type="submit">Înregistrează-te</button>
    </form>

    <p>Ai deja cont? <a href="login.php">Conectează-te aici</a></p>
</body>

</html>