<?php $titulo = 'Peças'; include 'includes/dados.php'; include 'includes/header.php'; ?>
<section class="pagina">
  <h1>Peças</h1>
  <p>Adicione as peças ao orçamento junto com a mão de obra. <a href="servicos.php">Ver serviços</a>.</p>
  <div class="filtros" role="group" aria-label="Filtrar peças">
    <button class="filtro ativo" data-filtro="todos">Todas</button>
    <button class="filtro" data-filtro="motor">Motor</button>
    <button class="filtro" data-filtro="freios">Freios</button>
    <button class="filtro" data-filtro="eletrica">Elétrica</button>
    <button class="filtro" data-filtro="acessorios">Acessórios</button>
  </div>
  <div class="grade lista"><?php cartoes($pecas, 'Peça', ''); ?></div>
</section>
<?php include 'includes/footer.php'; ?>
