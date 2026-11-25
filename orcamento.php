<?php $titulo = 'Orçamento'; include 'includes/header.php'; ?>
<section class="pagina">
  <h1>Meu orçamento</h1>
  <p id="msg-ok" class="aviso" hidden>Orçamento enviado! A Mecatec entra em contato para confirmar.</p>
  <p id="vazio">Seu orçamento está vazio. Veja os <a href="servicos.php">serviços</a> e as <a href="pecas.php">peças</a>.</p>
  <div class="tabela-wrap" id="tabela" hidden><table>
    <thead><tr><th>Tipo</th><th>Item</th><th>Valor</th><th></th></tr></thead>
    <tbody id="itens"></tbody>
    <tfoot><tr><th colspan="2">Total</th><th id="total"></th><th></th></tr></tfoot>
  </table></div>
  <div class="barra" id="botoes" hidden>
    <button type="button" class="btn" id="finalizar">Finalizar orçamento</button>
    <button type="button" class="link perigo" id="limpar">Limpar tudo</button>
  </div>
</section>
<?php include 'includes/footer.php'; ?>
