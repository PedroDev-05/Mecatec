<?php
function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
// [nome, descrição, preço, categoria]
$servicos = [
  ['Revisão completa', 'Óleo, filtros, freios e suspensão.', 299, 'mecanica'],
  ['Freios', 'Troca de pastilhas, discos e fluido.', 180, 'mecanica'],
  ['Alinhamento e balanceamento', 'Quatro rodas, com relatório.', 120, 'mecanica'],
  ['Bateria e alternador', 'Teste, troca e diagnóstico.', 90, 'eletrica'],
  ['Iluminação LED', 'Faróis, lanternas e interna.', 180, 'eletrica'],
  ['Polimento', 'Remove riscos leves e devolve o brilho.', 120, 'estetica'],
  ['Higienização interna', 'Bancos, carpete e teto.', 150, 'estetica'],
];
$pecas = [
  ['Pastilha de freio dianteira', 'Jogo com 4 peças, cerâmica.', 89.90, 'freios'],
  ['Disco de freio ventilado', 'Par, para linha popular.', 210, 'freios'],
  ['Filtro de óleo', 'Compatível com motores 1.0 a 1.6.', 32.50, 'motor'],
  ['Óleo 5W30 sintético 1L', 'Garrafa de 1 litro.', 44.90, 'motor'],
  ['Velas de ignição', 'Jogo com 4 velas.', 95, 'motor'],
  ['Bateria 60Ah', '12V, 18 meses de garantia.', 480, 'eletrica'],
  ['Lâmpada LED H7', 'Par, 6000K.', 120, 'eletrica'],
  ['Palhetas do limpador', 'Par, 24 e 18 polegadas.', 58, 'acessorios'],
  ['Tapetes de borracha', 'Jogo com 5 peças.', 99, 'acessorios'],
];
function cartoes($itens, $tipo, $prefixo) {
  foreach ($itens as [$nome, $desc, $preco, $cat]) {
    echo '<article data-cat="' . $cat . '"><h3>' . e($nome) . '</h3><p>' . e($desc) . '</p>'
       . '<strong>' . $prefixo . 'R$ ' . number_format($preco, 2, ',', '.') . '</strong>'
       . '<button type="button" class="btn add" data-tipo="' . $tipo . '" data-nome="' . e($nome) . '" data-preco="' . $preco . '">Adicionar ao orçamento</button></article>';
  }
}
