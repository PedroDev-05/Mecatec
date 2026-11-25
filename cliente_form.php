<?php
require 'includes/auth.php';
require 'includes/db.php';
$id = (int)($_GET['id'] ?? 0);
if ($id) exigir_admin(); // editar é só para o administrador
$ok = isset($_GET['ok']);
$c = ['nome' => '', 'email' => '', 'telefone' => '', 'veiculo' => ''];
if ($id) {
    $st = $pdo->prepare('SELECT * FROM clientes WHERE id = ?'); $st->execute([$id]);
    $c = $st->fetch() ?: die('Cliente não encontrado.');
}
$erros = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($c as $k => $_) $c[$k] = trim($_POST[$k] ?? '');
    if (mb_strlen($c['nome']) < 3) $erros[] = 'Informe o nome completo.';
    if (!filter_var($c['email'], FILTER_VALIDATE_EMAIL)) $erros[] = 'E-mail inválido.';
    if (strlen(preg_replace('/\D/', '', $c['telefone'])) < 10) $erros[] = 'Telefone deve ter DDD e número.';
    if ($c['veiculo'] === '') $erros[] = 'Informe o veículo.';
    if (!$erros) {
        try {
            $dados = [$c['nome'], $c['email'], $c['telefone'], $c['veiculo']];
            if ($id) { // UPDATE
                $pdo->prepare('UPDATE clientes SET nome=?, email=?, telefone=?, veiculo=? WHERE id=?')->execute([...$dados, $id]);
                header('Location: clientes.php?msg=editado'); exit;
            }
            // CREATE
            $pdo->prepare('INSERT INTO clientes (nome, email, telefone, veiculo) VALUES (?,?,?,?)')->execute($dados);
            header('Location: ' . (admin_logado() ? 'clientes.php?msg=criado' : 'cliente_form.php?ok=1')); exit;
        } catch (PDOException $ex) {
            $erros[] = $ex->getCode() == 23000 ? 'Este e-mail já está cadastrado.' : 'Erro ao salvar. Tente novamente.';
        }
    }
}
$titulo = $id ? 'Editar cliente' : 'Cadastrar meu carro';
include 'includes/header.php';
?>
<section class="pagina estreita">
  <?php if (!$ok): ?><h1><?= $titulo ?></h1><?php endif; ?>
  <?php foreach ($erros as $er): ?><p class="erro-box"><?= e($er) ?></p><?php endforeach; ?>
  <?php if ($ok): ?>
    <p class="aviso">Cadastro realizado com sucesso! Agora é só escolher seus <a href="servicos.php">serviços</a> e <a href="pecas.php">peças</a>.</p>
  <?php else: ?>
  <form method="post" id="form-cliente" novalidate>
    <label>Nome completo<input type="text" name="nome" value="<?= e($c['nome']) ?>" required></label>
    <label>E-mail<input type="email" name="email" value="<?= e($c['email']) ?>" required></label>
    <label>Telefone com DDD<input type="tel" name="telefone" value="<?= e($c['telefone']) ?>" placeholder="(21) 99999-9999" required></label>
    <label>Veículo (modelo e ano)<input type="text" name="veiculo" value="<?= e($c['veiculo']) ?>" required></label>
    <div class="barra"><button class="btn">Salvar cadastro</button><a class="link" href="<?= $id ? 'clientes.php' : 'index.php' ?>">Cancelar</a></div>
  </form>
  <?php endif; ?>
</section>
<?php include 'includes/footer.php'; ?>
