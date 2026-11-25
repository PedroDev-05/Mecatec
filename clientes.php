<?php
require 'includes/auth.php';
exigir_admin();
require 'includes/db.php';
$titulo = 'Clientes';

// DELETE
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir'])) {
    $pdo->prepare('DELETE FROM clientes WHERE id = ?')->execute([(int)$_POST['excluir']]);
    header('Location: clientes.php?msg=excluido'); exit;
}
// READ (com busca)
$busca = trim($_GET['busca'] ?? '');
$st = $pdo->prepare('SELECT * FROM clientes WHERE nome LIKE ? OR veiculo LIKE ? ORDER BY nome');
$st->execute(["%$busca%", "%$busca%"]);
$clientes = $st->fetchAll();
$msgs = ['criado' => 'Cliente cadastrado.', 'editado' => 'Cliente atualizado.', 'excluido' => 'Cliente excluído.'];
include 'includes/header.php';
?>
<section class="pagina">
  <h1>Clientes cadastrados</h1>
  <?php if (isset($msgs[$_GET['msg'] ?? ''])): ?><p class="aviso"><?= $msgs[$_GET['msg']] ?></p><?php endif; ?>
  <div class="barra">
    <form method="get" class="busca"><input type="search" name="busca" value="<?= e($busca) ?>" placeholder="Buscar por nome ou veículo" aria-label="Buscar"><button class="btn">Buscar</button></form>
    <a class="btn" href="cliente_form.php">Novo cliente</a>
  </div>
  <?php if (!$clientes): ?>
    <p>Nenhum cliente encontrado. Cadastre o primeiro em “Novo cliente”.</p>
  <?php else: ?>
  <div class="tabela-wrap"><table>
    <thead><tr><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Veículo</th><th>Ações</th></tr></thead>
    <tbody>
    <?php foreach ($clientes as $c): ?>
      <tr>
        <td><?= e($c['nome']) ?></td><td><?= e($c['email']) ?></td><td><?= e($c['telefone']) ?></td><td><?= e($c['veiculo']) ?></td>
        <td class="acoes">
          <a class="link" href="cliente_form.php?id=<?= (int)$c['id'] ?>">Editar</a>
          <form method="post" class="form-excluir"><input type="hidden" name="excluir" value="<?= (int)$c['id'] ?>"><button class="link perigo">Excluir</button></form>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table></div>
  <?php endif; ?>
</section>
<?php include 'includes/footer.php'; ?>
