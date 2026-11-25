<?php
// Conexão PDO (padrão do XAMPP: usuário root, sem senha)
try {
    $pdo = new PDO('mysql:host=localhost;dbname=mecatec;charset=utf8mb4', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die('Não foi possível conectar ao banco. Importe o database.sql e confira o MySQL no XAMPP.');
}
function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
