# Livros API

Este é um projeto Laravel que implementa uma API RESTful para Gerenciamento de Livros.

## Descrição do Projeto

A API permite aos usuários realizar operações CRUD (Criar, Ler, Atualizar, Excluir) em uma entidade chamada "Livros" e "Autores". Cada livro possui um título, uma descrição e um autor.

## Funcionalidades

- **CRUD de Livros:** Os usuários podem criar, ler, atualizar e excluir Livros.
- **Listagem de Livros:** Os usuários podem visualizar todos os Livros existentes.
- **Detalhes do Livro:** Os usuários podem visualizar os detalhes de um Livro específico.
- **Atualização do Livro:** Os usuários podem atualizar os detalhes de um Livro existente.
- **Exclusão do Livro:** Os usuários podem excluir uma Livro existente.
- **CRUD de Autores:** Os usuários podem criar, ler, atualizar e excluir Autores.
- **Listagem de Autores:** Os usuários podem visualizar todos os Autores existentes.
- **Detalhes do Autor:** Os usuários podem visualizar os detalhes de um Autor específico.
- **Atualização do Autor:** Os usuários podem atualizar os detalhes de um Autor existente.
- **Exclusão do Autor:** Os usuários podem excluir um Autor existente.

## Princípios SOLID

Este projeto segue os princípios SOLID, um conjunto de diretrizes de design de software que visam tornar o código mais compreensível, flexível e fácil de manter. Aqui está como os princípios SOLID foram aplicados neste projeto:

- **S (Single Responsibility Principle):** Cada classe tem uma única responsabilidade e um único motivo para mudar. Isso torna o código mais modular e fácil de entender.

- **O (Open/Closed Principle):** O código é aberto para extensão, mas fechado para modificação. Isso significa que novas funcionalidades podem ser adicionadas sem alterar o código existente.

- **L (Liskov Substitution Principle):** As classes derivadas podem ser substituídas por suas classes base sem afetar o comportamento do programa. Isso permite que o código seja mais flexível e extensível.

- **I (Interface Segregation Principle):** Interfaces específicas são preferíveis a interfaces gerais. Isso evita que as classes dependam de funcionalidades que não utilizam.

- **D (Dependency Inversion Principle):** As dependências são injetadas nas classes em vez de serem criadas dentro delas. Isso torna o código mais desacoplado e facilita a substituição de implementações.

A aplicação desses princípios ajuda a garantir que o código seja mais modular, extensível e fácil de manter, promovendo boas práticas de desenvolvimento de software.


## Instalação

1. Clone o repositório:

```bash
git clone https://github.com/tarciziowalter/books-api.git
```

2. Instale as dependências:

```bash
composer install
```

3. Copie o arquivo .env.example para .env e configure as variáveis de ambiente, incluindo a conexão com o banco de dados.

4. Gere uma nova chave de aplicativo:

```bash
php artisan key:generate
```

5. Execute as migrações do banco de dados para criar as tabelas necessárias:

```bash
php artisan migrate
```

6. Opcional: Se desejar, você pode adicionar dados fictícios ao banco de dados usando os seeders:

```bash
php artisan db:seed
```

7. Gerar a chave JWT

```bash 
php artisan jwt:secret
```

8. Inicie o servidor de desenvolvimento:

```bash
php artisan serve
```

## Uso

Você pode usar o Postman ou qualquer outra ferramenta de cliente HTTP para enviar solicitações à API. Abaixo estão os endpoints disponíveis:

- **POST /api/login:** Autenticação da aplicação
- **POST /api/logout:** Logout da aplicação
- **GET /api/books:** Retorna todas os livros.
- **POST /api/books:** Cria um novo livro.
- **GET /api/books/{id}:** Retorna os detalhes de um livro específico.
- **PUT /api/books/{id}:** Atualiza os detalhes de um livro específico.
- **DELETE /api/books/{id}:** Exclui um livro específico.
- **GET /api/authors:** Retorna todos os autores.
- **POST /api/authors:** Cria um novo autor.
- **GET /api/authors/{id}:** Retorna os detalhes de um autor específico.
- **PUT /api/authors/{id}:** Atualiza os detalhes de um autor específico.
- **DELETE /api/authors/{id}:** Exclui um autor específico.

Certifique-se de incluir os cabeçalhos `Authorization: Bearer {token}`, `Accept: application/json` em todas as solicitações para endpoints, exceto na rota login.


## Tests/Feature

Além disso, foram criados testes automatizados no diretório tests/Feature para garantir a integridade e a funcionalidade da aplicação. Estes testes podem ser executados  individualmente para verificar se todas as funcionalidades estão operando conforme o esperado.

```bash
php artisan test --filter test_authenticated_user_can_create_book
php artisan test --filter test_authenticated_user_can_view_book_details
php artisan test --filter test_authenticated_user_can_view_all_books
php artisan test --filter test_authenticated_user_can_update_book
php artisan test --filter test_authenticated_user_can_delete_book
php artisan test --filter test_authenticated_user_can_create_author
php artisan test --filter test_authenticated_user_can_view_author_details
php artisan test --filter test_authenticated_user_can_view_all_authors
php artisan test --filter test_authenticated_user_can_update_author
php artisan test --filter test_authenticated_user_can_delete_author
```

## Contribuição

Contribuições são bem-vindas! Se você quiser melhorar este projeto, por favor, abra uma issue ou envie uma solicitação pull.

## Licença

Este projeto está licenciado sob a MIT License.

## Autor

Este projeto foi desenvolvido por [Tarcízio Walter](https://github.com/tarciziowalter). Você pode entrar em contato com o autor por e-mail em [tarciziowalter@outlook.com](mailto:tarciziowalter@outlook.com) ou seguir no [LinkedIn](https://linkedin.com/in/tarciziowalter).