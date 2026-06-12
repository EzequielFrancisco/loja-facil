
# 🛍️ Lojafacil

Sistema web desenvolvido com Laravel para gestão de lojas e produtos, com autenticação, controlo de permissões e dashboard de estatísticas.

Projecto desenvolvido no âmbito de um teste técnico de recrutamento.

---

## 📌 Objectivo

Criar uma aplicação web onde utilizadores autenticados possam:
- Gerir lojas
- Gerir produtos associados às lojas
- Aplicar filtros e pesquisas
- Visualizar métricas no dashboard

---

## 🧰 Requisitos

- PHP 8.3+
- Composer
- Node.js & NPM
- MySQL ou PostgreSQL
- Laravel 12+

---

## 📦 Instalação

```bash
git clone <URL_DO_REPOSITORIO>
cd loja-facil

composer install
npm install
npm run build

⚙️ Configuração

Criar ficheiro .env:

cp .env.example .env
php artisan key:generate

Configurar base de dados no .env.
🗄️ Base de Dados

Executar migrations e seeders:

php artisan migrate --seed

🚀 Executar o projecto

php artisan serve

A aplicação estará disponível em:

http://127.0.0.1:8000

🔐 Autenticação

    Registo de utilizador

    Login

    Logout

    Protecção de rotas com middleware auth

🏪 Gestão de Lojas

Cada utilizador pode criar e gerir as suas lojas.
Campos:

    Nome

    Endereço

    Telefone

    Email (único)

    NIF (único)

Regras:

    Cada loja pertence ao utilizador autenticado

    Apenas o criador pode editar ou eliminar

📦 Gestão de Produtos

Produtos pertencem a uma loja.
Campos:

    Nome

    Descrição (opcional)

    Preço (> 0)

    Quantidade em stock (≥ 0)

    Loja (foreign key)

    Imagem (jpg, png, webp até 2MB)

Regras:

    Apenas produtos das lojas do utilizador podem ser geridos

    Upload de imagem guardado em storage/app/public

🔎 Filtros e Pesquisa

Na listagem de produtos:

    Pesquisa por nome

    Filtro por loja

    Filtro por preço (mínimo e máximo)

    Mostrar apenas produtos com stock disponível

    Filtros combináveis

📊 Dashboard

Após login, o utilizador vê:

    Total de lojas

    Total de produtos

    Valor total de stock (preço × quantidade)

📢 Notificações

    Criação com sucesso

    Actualização com sucesso

    Eliminação com sucesso

    Erros de validação por campo

🧠 Arquitetura e Boas Práticas

    Laravel MVC

    Form Requests para validação

    Policies para autorização por utilizador

    Eloquent ORM com relacionamentos:

        User → hasMany Lojas

        Loja → hasMany Produtos

        Produto → belongsTo Loja

    Eager Loading para evitar N+1 queries

    Código separado por responsabilidades (controllers leves)

🗂️ Estrutura do Projecto

app/
├── Http/
│   ├── Controllers/
│   ├── Requests/
│   └── Middleware/
├── Models/
├── Policies/

database/
├── migrations/
├── seeders/
├── factories/

resources/
├── views/
│   ├── lojas/
│   ├── produtos/
│   ├── auth/
│   └── components/

routes/
└── web.php

🛠️ Tecnologias

    Laravel 12

    PHP 8.3

    MySQL

    Blade + Tailwind CSS

    Eloquent ORM

    Chart.js

👨‍💻 Autor

Ezequiel Francisco
