document.addEventListener('DOMContentLoaded', () => {
  // Menu do celular
  const btn = document.querySelector('.menu-btn'), menu = document.getElementById('menu');
  btn.addEventListener('click', () => {
    btn.setAttribute('aria-expanded', menu.classList.toggle('aberto'));
  });

  // Início: marcar item da ordem de serviço como feito
  const os = document.getElementById('btn-os');
  if (os) os.addEventListener('click', () => {
    const feito = document.getElementById('item-os').classList.toggle('feito');
    os.textContent = feito ? 'Desmarcar' : 'Marcar como feito';
  });

  // Serviços: filtrar por categoria
  document.querySelectorAll('.filtro').forEach(f => f.addEventListener('click', () => {
    document.querySelectorAll('.filtro').forEach(x => x.classList.toggle('ativo', x === f));
    document.querySelectorAll('.lista article').forEach(a => {
      a.hidden = f.dataset.filtro !== 'todos' && a.dataset.cat !== f.dataset.filtro;
    });
  }));

  // Serviços: abrir já filtrado pelo link do rodapé (servicos.php#mecanica)
  const aplicarHash = () => {
    const alvo = document.querySelector('.filtro[data-filtro="' + location.hash.slice(1) + '"]');
    if (alvo) alvo.click();
  };
  aplicarHash();
  window.addEventListener('hashchange', aplicarHash);

  // Orçamento (guardado no navegador com localStorage)
  const KEY = 'mecatec_orcamento';
  const ler = () => { try { return JSON.parse(localStorage.getItem(KEY)) || []; } catch { return []; } };
  const brl = n => n.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
  const contar = () => { const c = document.getElementById('cont'); if (c) c.textContent = ler().length; };
  const salvar = l => { localStorage.setItem(KEY, JSON.stringify(l)); contar(); };
  contar();
  document.querySelectorAll('.add').forEach(b => b.addEventListener('click', () => {
    const l = ler(); l.push({ tipo: b.dataset.tipo, nome: b.dataset.nome, preco: +b.dataset.preco }); salvar(l);
    b.textContent = 'Adicionado ✓'; setTimeout(() => b.textContent = 'Adicionar ao orçamento', 1200);
  }));
  const itens = document.getElementById('itens');
  if (itens) {
    const render = () => {
      const l = ler(); itens.innerHTML = '';
      l.forEach((it, i) => {
        const tr = document.createElement('tr');
        [it.tipo, it.nome, brl(it.preco)].forEach(t => { const td = document.createElement('td'); td.textContent = t; tr.append(td); });
        const td = document.createElement('td'), r = document.createElement('button');
        r.className = 'link perigo'; r.textContent = 'Remover';
        r.addEventListener('click', () => { l.splice(i, 1); salvar(l); render(); });
        td.append(r); tr.append(td); itens.append(tr);
      });
      document.getElementById('total').textContent = brl(l.reduce((s, x) => s + x.preco, 0));
      document.getElementById('vazio').hidden = l.length > 0;
      document.getElementById('tabela').hidden = document.getElementById('botoes').hidden = !l.length;
    };
    render();
    document.getElementById('limpar').addEventListener('click', () => { salvar([]); render(); });
    document.getElementById('finalizar').addEventListener('click', () => {
      salvar([]); render(); document.getElementById('msg-ok').hidden = false;
    });
  }

  // Clientes: confirmar exclusão
  document.querySelectorAll('.form-excluir').forEach(f => f.addEventListener('submit', e => {
    if (!confirm('Excluir este cliente?')) e.preventDefault();
  }));

  // Formulário: máscara de telefone e validação
  const form = document.getElementById('form-cliente');
  if (!form) return;
  const tel = form.telefone;
  tel.addEventListener('input', () => {
    const d = tel.value.replace(/\D/g, '').slice(0, 11);
    tel.value = d.length > 10 ? d.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3')
              : d.length > 6 ? d.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3')
              : d.length > 2 ? d.replace(/(\d{2})(\d{0,5})/, '($1) $2') : d;
  });
  const regras = {
    nome: v => v.trim().length >= 3 || 'Informe o nome completo.',
    email: v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v) || 'Digite um e-mail válido.',
    telefone: v => v.replace(/\D/g, '').length >= 10 || 'Informe DDD e número.',
    veiculo: v => v.trim() !== '' || 'Informe o veículo.',
  };
  form.addEventListener('submit', e => {
    let ok = true;
    for (const [campo, regra] of Object.entries(regras)) {
      const input = form[campo], r = regra(input.value);
      let msg = input.parentElement.querySelector('.erro');
      if (r !== true) {
        ok = false;
        if (!msg) { msg = document.createElement('small'); msg.className = 'erro'; input.after(msg); }
        msg.textContent = r;
      } else if (msg) msg.remove();
    }
    if (!ok) e.preventDefault();
  });
});
