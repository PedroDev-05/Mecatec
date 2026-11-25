<?php $titulo = 'Serviços'; include 'includes/dados.php'; include 'includes/header.php'; ?>
<section class="pagina">
  <h1>Serviços (mão de obra)</h1>
  <p>Escolha os serviços e adicione ao orçamento. Precisa de peças? <a href="pecas.php">Veja as peças</a>.</p>
  <div class="filtros" role="group" aria-label="Filtrar serviços">
    <button class="filtro ativo" data-filtro="todos">Todos</button>
    <button class="filtro" data-filtro="mecanica">Mecânica</button>
    <button class="filtro" data-filtro="eletrica">Elétrica</button>
    <button class="filtro" data-filtro="estetica">Estética</button>
  </div>
  <div class="grade lista"><?php cartoes($servicos, 'Mão de obra', 'a partir de '); ?></div>
</section>
<?php include 'includes/footer.php'; ?>
