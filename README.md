# API de Gerenciamento de Livros

Este projeto consiste em uma API desenvolvida em Laravel para gerenciar uma base de dados de livros. A API oferece operações básicas de CRUD (Criar, Ler, Atualizar, Deletar) para livros e também permite a geração de relatórios.

## Rotas Disponíveis

### 1. Listar todos os livros
- **Método:** GET
- **Rota:** `/api/livros`
- **Descrição:** Retorna uma lista de todos os livros cadastrados.
- **Controlador:** `API\LivrosController@index`

### 2. Criar um novo livro
- **Método:** POST
- **Rota:** `/api/livros`
- **Descrição:** Adiciona um novo livro à base de dados.
- **Controlador:** `API\LivrosController@store`

### 3. Visualizar detalhes de um livro específico
- **Método:** GET
- **Rota:** `/api/livros/{livro}`
- **Descrição:** Retorna os detalhes de um livro específico identificado pelo `{livro}`.
- **Controlador:** `API\LivrosController@show`

### 4. Atualizar um livro existente
- **Método:** PUT/PATCH
- **Rota:** `/api/livros/{livro}`
- **Descrição:** Atualiza as informações de um livro específico.
- **Controlador:** `API\LivrosController@update`

### 5. Deletar um livro
- **Método:** DELETE
- **Rota:** `/api/livros/{livro}`
- **Descrição:** Remove um livro da base de dados.
- **Controlador:** `API\LivrosController@destroy`

### 6. Gerar relatório de livros
- **Método:** GET
- **Rota:** `/api/relatorio`
- **Descrição:** Gera e exporta um relatório dos livros cadastrados.
- **Controlador:** `LivroRelatorioController@export`

## Tecnologias Utilizadas

- **Framework:** Laravel
- **Banco de Dados:** MySQL/PostgreSQL/SQLite (dependendo da configuração)

## Configuração e Execução

1. Clone o repositório.
2. Execute `composer install` para instalar as dependências.
3. Configure o arquivo `.env` com as suas credenciais de banco de dados e outras variáveis de ambiente.
4. Execute `php artisan migrate` para criar as tabelas no banco de dados.
5. Execute `php artisan serve` para iniciar o servidor de desenvolvimento.

## Testes

Para executar os testes automatizados, utilize o seguinte comando:

```bash
php artisan test
