🛍️ Lojafacil

Sistema completo de gerenciamento de lojas e produtos desenvolvido com Laravel.
🚀 Requisitos Prévios

    PHP >= 8.0

    Composer

    Node.js & NPM

    MySQL/MariaDB

📦 Instalação
Configuração inicial
# Clonar o repositório
git clone https://github.com/seu-usuario/lojafacil.git
cd lojafacil

# Instalar dependências PHP
composer install

# Instalar dependências Node.js
npm install

# Configurar ambiente
cp .env.example .env
php artisan key:generate

📁 Estrutura do Projeto

lojafacil/
├── app/
│   ├── Http/
│   │   ├── Controllers/          # Controladores
│   │   │   ├── LojaController.php
│   │   │   └── ProdutosController.php
│   │   ├── Middleware/           # Middlewares
│   │   └── Requests/             # Validações
│   ├── Models/                   # Modelos Eloquent
│   │   ├── User.php
│   │   ├── Loja.php
│   │   └── Produto.php
│   └── Policies/                 # Autorizações
├── database/
│   ├── factories/                # Factories
│   ├── migrations/               # Migrations
│   └── seeders/                  # Seeders
├── public/storage/               # Uploads
├── resources/views/              # Templates Blade
│   ├── loja/                     # CRUD Lojas
│   ├── produtos/                 # CRUD Produtos
│   ├── auth/                     # Autenticação
│   └── components/               # Componentes UI
└── routes/web.php                # Rotas

Banco de Dados
bash

php artisan migrate:fresh --seed    # ⚠️ RECRIA o banco (apaga dados)

Criar Usuário Manualmente
bash

php artisan tinker
>>> App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@teste.com', 
    'password' => bcrypt('password')
])

🛠️ Tecnologias

    Laravel - Framework PHP

    Tailwind CSS - Framework CSS

    Chart.js - Biblioteca de gráficos

📄 Licença

MIT License © 2024
👨‍💻 Desenvolvimento

Ezequiel Francisco

<div align="center">

⭐ Se este projeto te ajudou, considere deixar uma estrela! ⭐
</div>