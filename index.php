<?php $titulo = 'Início'; include 'includes/header.php'; ?>
<section class="hero">
  <div>
    <h1>Seu carro volta para a rua mais rápido.</h1>
    <p>Revisão, elétrica, estética e performance no mesmo lugar, com orçamento antes de qualquer serviço.</p>
    <a class="btn" href="cliente_form.php">Cadastrar meu carro</a>
  </div>
  <article class="os" aria-label="Exemplo de ordem de serviço">
    <h2>Ordem de serviço</h2>
    <ul>
      <li class="feito">Troca de óleo e filtro</li>
      <li class="feito">Alinhamento e balanceamento</li>
      <li id="item-os">Revisão dos freios</li>
    </ul>
    <button type="button" id="btn-os" class="btn-os">Marcar como feito</button>
  </article>
</section>
<section class="faixa">
  <h2>Por que a Mecatec</h2>
  <div class="grade">
    <article><h3>Orçamento claro</h3><p>Você aprova o valor antes de a gente encostar no carro.</p></article>
    <article><h3>Peças com garantia</h3><p>Trabalhamos com peças novas e damos garantia por escrito.</p></article>
    <article><h3>Acompanhamento</h3><p>Seu cadastro guarda os dados do carro para os próximos serviços.</p></article>
  </div>
</section>
<?php include 'includes/footer.php'; ?>
