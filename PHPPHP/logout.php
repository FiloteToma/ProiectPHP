<?php
session_start(); // Inițializăm sesiunea

// Ștergem toate datele din sesiune
session_unset();

// Distrugem sesiunea
session_destroy();

// Redirecționăm utilizatorul către pagina de login
header('Location: login.php');
exit;
