<?php
require 'includes/auth.php';
if (isset($_GET['sair'])) { session_destroy(); header('Location: index.php'); exit; }
if (admin_logado()) { header('Location: clientes.php'); exit; }
$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (hash_equals(ADMIN_USER, $_POST['usuario'] ?? '') && password_verify($_POST['senha'] ?? '', ADMIN_HASH)) {
        session_regenerate_id(true);
        $_SESSION['admin'] = true;
        header('Location: clientes.php'); exit;
    }
    $erro = 'Usuário ou senha incorretos.';
}
$titulo = 'Área do administrador';
include 'includes/header.php';
?>
<section class="pagina estreita">
  <h1>Área do administrador</h1>
  <p>Acesso restrito à gestão de clientes.</p>
  <?php if ($erro): ?><p class="erro-box"><?= htmlspecialchars($erro) ?></p><?php endif; ?>
  <form method="post">
    <label>Usuário<input type="text" name="usuario" required autofocus></label>
    <label>Senha<input type="password" name="senha" required></label>
    <button class="btn">Entrar</button>
  </form>
</section>
<?php include 'includes/footer.php'; ?>
