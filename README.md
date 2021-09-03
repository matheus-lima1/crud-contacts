### APRESENTAÇÃO

A proposta de desenvolvimento foi um sistema para ações de criação, listagem, edição e remoção de dados (CRUD) referentes a contatos utilizando o Laravel para o back-end e o VueJS para o front-end.

Ademais, foi implementado um painel de controle de usuários com o JWT como guard e bearer token para validação (sendo salvo nos cookies da sessão web para acesso das páginas).

As requisições que consomem a API foram realizadas via axios e os CORS foram habilitados para não haver nenhuma limitação para com o tráfego dos dados.

---
### INFORMATIVOS

As portas padrões que a aplicação está usando localmente é a 8000 para o back-end, a 8080 para o front-end e a 3306 para o banco de dados. Para inicializarmos cada recurso utilizamos os seguintes comandos:

- É necessário a instalação das dependências, para o frontend `$ yarn install` ou ainda `$ npm install` e para o backend `$ composer install`.
- Copiar o arquivo ".env-example" para ".env" usando `$ cp .env.example .env`
- Por padrão o nome do banco de dados local é "api-contacts", então crie um novo database com esse nome
- Adicione uma nova key para o projeto e para o JWT usando:
    `$ php artisan key:generate`
    `$ php artisan jwt:secret`
    `$ php artisan cache:clear`
    `$ php artisan config:clear`
- Rode as migrations do projeto usando `$ php artisan migrate` no diretório "backend"
- `$ yarn serve` (no diretório "frontend" do projeto);
- `$ php artisan serve` (no diretório "backend" do projeto);
- Importante também inicializar o banco de dados MySQL de sua máquina, startando via XAMPP, software similar ou via comando em bash;


---
### DOCUMENTAÇÃO DA API

#### rotas de autenticação

| ROTA  | MÉTODO | PARÂMETROS |
|------------ |---------------|-----|
| "/"     | GET | x |
| "/login" | POST    | "email", "password" |
| "/register" |POST | "name", "email", "password" |

#### rotas de usuários

| ROTA  | MÉTODO | PARÂMETROS |
|------------ |---------------|-----|
| "/me"     | GET | *token |
| "/users" | GET    | *token |

#### rotas de contatos

| ROTA  | MÉTODO | PARÂMETROS |
|------------ |---------------|-----|
| "/contacts"     | GET | *token |
| "/contacts" | POST    | "email", "phone", "email" *token |
| "/contacts/{id}" |GET | *token |
| "/contacts/{id}" |PUT | "name", "phone", "email", *token |
| "/contacts/{id}" |DELETE | *token |
