<?php require_once __DIR__ . '/auth.php'; $atual = basename($_SERVER['SCRIPT_NAME']);
function ativo($p) { global $atual; return $atual === $p ? ' class="ativo"' : ''; } ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($titulo ?? 'Mecatec') ?> | Mecatec</title>
  <link rel="stylesheet" href="assets/style.css">
  <script src="assets/app.js" defer></script>
</head>
<body>
<header class="topo">
  <a class="logo" href="index.php">Meca<span>tec</span></a>
  <button class="menu-btn" aria-label="Abrir menu" aria-expanded="false" aria-controls="menu">Menu</button>
  <nav id="menu" aria-label="Principal">
    <a href="index.php"<?= ativo('index.php') ?>>Início</a>
    <a href="servicos.php"<?= ativo('servicos.php') ?>>Serviços</a>
    <a href="pecas.php"<?= ativo('pecas.php') ?>>Peças</a>
    <a href="cliente_form.php"<?= ativo('cliente_form.php') ?>>Cadastro</a>
    <a href="orcamento.php"<?= ativo('orcamento.php') ?>>Orçamento <span class="badge" id="cont">0</span></a>
    <?php if (admin_logado()): ?>
    <a href="clientes.php"<?= ativo('clientes.php') ?>>Clientes (admin)</a>
    <a href="admin.php?sair=1">Sair</a>
    <?php endif; ?>
  </nav>
</header>
<main>
