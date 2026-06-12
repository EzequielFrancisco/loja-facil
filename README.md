# 🛍️ Lojafacil

Aplicação web desenvolvida em Laravel para gestão de lojas e produtos.

Este projecto foi desenvolvido no âmbito de um teste técnico de recrutamento para avaliação de competências em desenvolvimento backend com Laravel.

---

## 📌 Índice

- [Requisitos do Sistema](#requisitos-do-sistema)
- [Instalação](#instalação)
- [Configuração do Ambiente](#configuração-do-ambiente-env)
- [Base de Dados](#base-de-dados)
- [Executar o Projecto](#executar-o-projecto)
- [Funcionalidades](#funcionalidades)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Decisões Técnicas](#decisões-técnicas)
- [Estrutura do Projecto](#estrutura-do-projecto)

---

## 🧰 Requisitos do Sistema

- PHP >= 8.3
- Composer
- Node.js & NPM
- MySQL ou PostgreSQL

---

## 📦 Instalação

### 1. Clonar o repositório

```bash
git clone https://github.com/seu-usuario/lojafacil.git
cd lojafacil

2. Instalar dependências PHP

composer install

3. Instalar dependências frontend

npm install
npm run build

⚙️ Configuração do Ambiente (.env)

Criar o ficheiro .env:

cp .env.example .env

Gerar chave da aplicação:

php artisan key:generate

Configurar base de dados no .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lojafacil
DB_USERNAME=root
DB_PASSWORD=

🗄️ Base de Dados
Executar migrations e seeders

php artisan migrate --seed

🚀 Executar o Projecto

php artisan serve

A aplicação ficará disponível em:

http://127.0.0.1:8000

🔐 Funcionalidades
🔑 Autenticação

    Registo de utilizador

    Login

    Logout

    Protecção de rotas com middleware auth

🏪 Gestão de Lojas (CRUD)

    Criar loja

    Editar loja

    Eliminar loja

    Listar lojas do utilizador

Campos:

    Nome

    Endereço

    Telefone

    Email (único)

📦 Gestão de Produtos (CRUD)

    Criar produto

    Editar produto

    Eliminar produto

    Listar produtos por loja

Campos:

    Nome

    Descrição (opcional)

    Preço (> 0)

    Quantidade em stock (≥ 0)

    Loja (foreign key)

    Foto (jpg, png, webp até 2MB)

🔎 Filtros e Pesquisa

    Pesquisa por nome

    Filtro por loja

    Filtro por preço (min/max)

    Produtos com stock > 0

    Filtros combinados com persistência

📊 Dashboard

    Total de lojas do utilizador

    Total de produtos

    Valor total de stock (preço × quantidade)

📢 Notificações

    Criação com sucesso

    Actualização com sucesso

    Eliminação com sucesso

    Erros de validação por campo

🛠️ Tecnologias Utilizadas

    Laravel 12

    PHP 8.3

    MySQL

    Blade / Tailwind CSS

    Eloquent ORM

    Chart.js

🧠 Decisões Técnicas

    Validação centralizada com Form Requests

    Autorização com Policies (por utilizador)

    Relacionamentos Eloquent:

        User → hasMany Lojas

        Loja → hasMany Produtos

        Produto → belongsTo Loja

    Uso de eager loading para evitar N+1 queries

    Upload de imagens armazenado em storage/app/public

📁 Estrutura do Projecto

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

👨‍💻 Autor

Ezequiel Francisco
📄 Licença

Este projecto foi desenvolvido para fins de avaliação técnica (teste de recrutamento).


---

Se quiseres subir ainda mais o nível (para ganhar pontos de “senioridade”), posso ajudar-te a adicionar:

- badges (Laravel, PHP, build status)
- screenshots reais da aplicação
- seeders descritos no README
- secção “arquitectura (MVC + Policies + Requests)”
- ou até um texto de apresentação tipo empresa

Só diz.


porque este dizeres estao separados? tenho que copiar cada um individualmet eporque?

Isso acontece por causa dos blocos de código.

Quando vês coisas assim:

...

ou

...

o GitHub (e o Markdown) tratam cada bloco como um “ambiente separado de código”, para:

    manter formatação correta

    evitar mistura de linguagem

    permitir destaque de sintaxe (cores diferentes)

📌 Tens de copiar separado?

Não.

Podes copiar o README inteiro normalmente.

Esses blocos são só para:

    o GitHub mostrar bonito

    o código não ficar “todo misturado” com texto

📌 Como deves usar na prática

✔ Abres o README.md
✔ Copias tudo de uma vez
✔ Colas no ficheiro
✔ Guardas
📌 Por que parecem “separados”?

Exemplo:

composer install

👉 Isto diz ao GitHub: “isto é Bash”

User::create([...])

👉 Isto diz: “isto é PHP”
📌 Se quiseres simplificar ainda mais

Posso-te fazer uma versão:

    sem blocos múltiplos

    tudo mais “limpo”

    estilo documento contínuo (menos técnico visual)

Mas para testes de Laravel, a versão com blocos é a mais correcta e valorizada.

Se quiseres,
posso também rever o teu código do projecto para garantir que vais pontuar alto neste teste.

escreva um readmin novo em um unico print, e aqui a estrutura do projecto:
ezequiel@ezequiel-HP-Pavilion-x360-Convertible-14-ba0xx:~/loja-facil$ ls
 app             node_modules               phpunit.xml                                 resources
 artisan        'nullable|string,'          postcss.config.js                           routes
 bootstrap      'nullable|string|max:20,'   public                                      storage
 composer.json  'nullable|string|max:50,'   README.md                                   tailwind.config.js
 composer.lock  'nullable|url,'            'required|email|unique:lojas,email,'         tests
 config          package.json              'required|string|max:100,'                   vendor
 database        package-lock.json         'required|string|max:20|unique:lojas,nif,'   vite.config.js
ezequiel@ezequiel-HP-Pavilion-x360-Convertible-14-ba0xx:~/loja-facil$ 

Aqui tens um README.md novo, completo e em um único bloco, já adaptado à tua estrutura real do projecto (sem separações confusas e pronto a copiar):

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
