# 1. Clonar o repositório
git clone https://github.com/seu-usuario/lojafacil.git
cd lojafacil

# 2. Instalar dependências PHP
composer install

# 3. Instalar dependências Node.js
npm install

# 4. Configurar arquivo de ambiente
cp .env.example .env

# 5. Gerar chave da aplicação
php artisan key:generate

# 6. Configurar o banco de dados no arquivo .env
# DB_DATABASE=lojafacil
# DB_USERNAME=root
# DB_PASSWORD=sua_senha

# 7. Executar migrations e seeders
php artisan migrate --seed

# 8. Criar link simbólico para uploads
php artisan storage:link

# 9. Compilar assets
npm run build

# 10. Iniciar servidor (em outro terminal)
php artisan serve

# 1. Clonar o repositório
git clone https://github.com/seu-usuario/lojafacil.git
cd lojafacil

# 2. Instalar dependências PHP
composer install

# 3. Instalar dependências Node.js
npm install

# 4. Configurar arquivo de ambiente
cp .env.example .env

# 5. Gerar chave da aplicação
php artisan key:generate

# 6. Configurar o banco de dados no arquivo .env
# DB_DATABASE=lojafacil
# DB_USERNAME=root
# DB_PASSWORD=sua_senha

# 7. Executar migrations e seeders
php artisan migrate --seed

# 8. Criar link simbólico para uploads
php artisan storage:link

# 9. Compilar assets
npm run build

# 10. Iniciar servidor (em outro terminal)
php artisan serve

# Para desenvolvimento com hot
npm run dev

# Crie o banco de dados manualmente antes de executar as migrations:
CREATE DATABASE lojafacil CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

📁 Estrutura do Projeto
lojafacil/
├── app/
│   ├── Http/
│   │   ├── Controllers/     # Controladores da aplicação
│   │   │   ├── LojaController.php
│   │   │   └── ProdutosController.php
│   │   ├── Middleware/      # Middlewares
│   │   └── Requests/        # Form Requests (validações)
│   ├── Models/              # Modelos Eloquent
│   │   ├── User.php
│   │   ├── Loja.php
│   │   └── Produto.php
│   └── Policies/            # Políticas de autorização
│       ├── LojaPolicy.php
│       └── ProdutoPolicy.php
├── database/
│   ├── factories/           # Factories para testes
│   │   ├── LojaFactory.php
│   │   └── ProdutoFactory.php
│   ├── migrations/          # Migrations do banco
│   └── seeders/             # Seeders para dados iniciais
│       ├── DatabaseSeeder.php
│       ├── LojaSeeder.php
│       └── ProdutoSeeder.php
├── public/
│   └── storage/             # Arquivos de upload (fotos)
├── resources/
│   └── views/               # Templates Blade
│       ├── loja/            # Views de lojas
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── show.blade.php
│       │   └── edit.blade.php
│       ├── produtos/        # Views de produtos
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── show.blade.php
│       │   └── edit.blade.php
│       ├── auth/            # Views de autenticação
│       ├── components/      # Componentes reutilizáveis
│       └── dashboard.blade.php
├── routes/
│   └── web.php              # Rotas da aplicação
└── .env.example             # Exemplo de configuração

O sistema inclui seeders que geram dados automaticamente:
# Executar todos os seeders
php artisan db:seed

# Executar seeder específico
php artisan db:seed --class=LojaSeeder
php artisan db:seed --class=ProdutoSeeder

# Comandos Úteis

# Iniciar servidor
php artisan serve

# Compilar assets (desenvolvimento)
npm run dev

# Compilar assets (produção)
npm run build

# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Recriar banco do zero (ATENÇÃO: apaga todos os dados)
php artisan migrate:fresh --seed

# Criar usuário manualmente
php artisan tinker
> App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@teste.com',
    'password' => bcrypt('password')
  ])

  📄 Licença

Este projeto está sob a licença MIT.
✨ Agradecimentos

    Laravel - Framework incrível

    Tailwind CSS - Framework CSS

    Chart.js - Biblioteca de gráficos


📞 Contacto

    Desenvolvido por: Ezequiel Francisco

    Desafio Técnico: Mamute Africano
    

⭐ Se gostou do projeto, deixe uma estrela no GitHub!