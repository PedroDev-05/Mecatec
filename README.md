# Mecatec - Trabalho 1 de Desenvolvimento Web

Site de um centro automotivo feito com HTML, CSS, JavaScript e PHP (PDO + MySQL).
O visitante vê os serviços e as peças, monta um orçamento e cadastra o carro. A gestão dos clientes fica numa área restrita de administrador.

## Como rodar (XAMPP)
1. Copie esta pasta para `C:\xampp\htdocs\mecatec`.
2. Inicie **Apache** e **MySQL** no painel do XAMPP.
3. Em `http://localhost/phpmyadmin`, aba **Importar**, envie o `database.sql`.
4. Abra `http://localhost/mecatec/` (se o Apache usar a porta 8080, `http://localhost:8080/mecatec/`).

## Páginas
| Arquivo | O que faz |
|---|---|
| `index.php` | Página inicial |
| `servicos.php` | Serviços (mão de obra) com filtro por categoria |
| `pecas.php` | Peças com filtro por categoria |
| `orcamento.php` | Orçamento com os itens escolhidos, total e finalizar |
| `cliente_form.php` | Cadastro do cliente e do carro (formulário) |
| `admin.php` | Login do administrador |
| `clientes.php` | Área do administrador: listar, buscar, editar e excluir clientes |

## O que cada tecnologia faz
- **HTML**: páginas com menu, `header`, `nav`, `main`, `section`, `article`, `footer` e formulários.
- **CSS**: `assets/style.css`, layout responsivo (grid, flexbox e `@media`).
- **JavaScript**: `assets/app.js` (menu mobile, filtros, orçamento com `localStorage`, máscara e validação do formulário, confirmação ao excluir).
- **PHP/PDO**: CRUD da tabela `clientes` (cadastrar em `cliente_form.php`; listar, editar e excluir em `clientes.php`, só para o administrador). Os serviços e as peças ficam em `includes/dados.php`.

## Área do administrador
- Endereço: `http://localhost/mecatec/admin.php` (não aparece no menu do site).
- Usuário: `admin` | Senha inicial: `Mecatec@2026` (para trocar, altere o hash em `includes/auth.php`).
- Os clientes cadastrados não aparecem para os visitantes.
