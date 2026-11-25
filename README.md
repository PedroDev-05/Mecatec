# Mecatec Centro Automotivo

Trabalho Final de **Desenvolvimento Web** (HTML, CSS, JavaScript e PHP) · Novembro de 2026

Site de um centro automotivo: o cliente consulta serviços e peças, monta um orçamento e cadastra o carro. A gestão dos clientes fica em uma área restrita do administrador, feita em PHP com PDO e MySQL.

## Integrantes e divisão de tarefas

| Integrante | O que fez no trabalho |
|---|---|
| Gabriel Dettogni Gomes | Testes no XAMPP e prints das telas |
| Gabriel Luz dos Santos Rocha | Filtros de serviços e peças |
| Caio Henrique dos Santos Pinto | Banco de dados e CRUD em PHP com PDO |
| João Pedro Pereira Ferreira | GitHub, README e escrita do relatório |
| Marcos Vinicius Silva de Oliveira | Estrutura em HTML das páginas, menu e rodapé; CSS e layout para o celular |

## O que o site faz

- **Serviços** (mão de obra) com filtro por categoria: mecânica, elétrica e estética.
- **Peças** com filtro por motor, freios, elétrica e acessórios.
- **Orçamento:** adicionar serviços e peças, ver o total, remover itens e finalizar.
- **Cadastro** do cliente e do carro, com validação no navegador e no servidor.
- **Área do administrador:** listar, buscar, editar e excluir clientes (CRUD). Os visitantes não veem os clientes cadastrados.

## Tecnologias

| Tecnologia | Uso no projeto |
|---|---|
| **HTML** | Várias páginas com menu e rodapé em comum, tags semânticas (`header`, `nav`, `main`, `section`, `article`, `footer`) e formulários com `label`. |
| **CSS** | Arquivo separado (`assets/style.css`), layout com Grid e Flexbox, responsivo com `@media` e a meta `viewport`. |
| **JavaScript** | `assets/app.js`: menu do celular, filtros, orçamento com `localStorage`, máscara de telefone, validação do formulário e confirmação ao excluir. |
| **PHP + PDO + MySQL** | CRUD da tabela `clientes` com *prepared statements*, validação no servidor, sessão e senha com hash no login do administrador. |

## Estrutura do projeto

```
Mecatec/
├── index.php            Página inicial
├── servicos.php         Serviços com filtro
├── pecas.php            Peças com filtro
├── orcamento.php        Orçamento do cliente
├── cliente_form.php     Cadastro (formulário) e edição
├── admin.php            Login do administrador
├── clientes.php         Lista, busca, edição e exclusão (admin)
├── database.sql         Criação do banco e da tabela
├── assets/
│   ├── style.css        Estilo do site
│   └── app.js           Interações em JavaScript
└── includes/
    ├── header.php       Cabeçalho e menu
    ├── footer.php       Rodapé
    ├── db.php           Conexão PDO
    ├── auth.php         Login e sessão do administrador
    └── dados.php        Lista de serviços e peças
```

## Como rodar (XAMPP)

1. Baixe o projeto (botão **Code > Download ZIP** no GitHub, ou `git clone https://github.com/PedroDev-05/Mecatec.git`) e coloque a pasta em `C:\xampp\htdocs\`. O `index.php` deve ficar direto dentro dela, sem uma pasta repetida no meio.
2. Abra o XAMPP e inicie o **Apache** e o **MySQL**.
3. Acesse `http://localhost/phpmyadmin`, vá em **Importar** e envie o arquivo `database.sql`. Isso cria o banco `mecatec` e a tabela `clientes`.
4. Abra no navegador `http://localhost/NOME_DA_PASTA/` (por exemplo, `http://localhost/Mecatec/`).

Se o Apache estiver em outra porta (por exemplo 8080), use `http://localhost:8080/NOME_DA_PASTA/`.

## Área do administrador

- Endereço: `http://localhost/NOME_DA_PASTA/admin.php` (não aparece no menu do site).
- Usuário: `admin`
- Senha: `Mecatec@2026`

Depois do login, a lista de clientes abre automaticamente. Para sair, use o link "Sair da área do administrador" no topo da página.

## Observações

- A conexão com o banco usa o padrão do XAMPP (usuário `root`, sem senha), em `includes/db.php`. Se o seu MySQL for diferente, ajuste esse arquivo.
- O orçamento fica salvo no navegador (`localStorage`) e não é gravado no banco.
