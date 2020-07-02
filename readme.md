## Sobre o projeto

Este projeto foi desenvolvido em 18/05/2019 e serviu como teste para avaliação do processo seletivo à vaga de desenvolvedor backend PHP na Agência Sorocabacom.

A ideia do projeto foi testar minhas habilidades utilizando o framework Laravel 5.8 com operações básicas como CRUD (acrónimo do inglês Create, Read, Update and Delete - são as quatro operações básicas envolvendo banco de dados : criação, consulta, atualização e destruição de dados) e autenticação de usuários, sob tema de um simples painel CMS (Content Management System - Sistema de gerenciamento de conteúdo).

## Requisitos para ambiente de desenvolvimento

-   PHP 7.1.3+
-   MSYQL/PHPMyADMIN
-   Composer

## Como utilizar

-   Renomear o arquivo ".env.example" para ".env" e configurar os campos APP_URL com a URL completa do projeto, DB_DATABASE com o nome do banco de dados criado no PHPMYADMIN, DB_USERNAME e DB_PASSWORD com login e senha do banco de dados.
-   No terminal digite (sem aspas): "composer install" - Para que seja instalado todas as dependências do LARAVEL
-   Após instalar as dependências do LARAVEL, digite no terminal (sem aspas): "php artisan key:generate" - Para gerar sua chave de aplicação parar encriptar seus dados.
-   No terminal digite (sem aspas): "npm install" - Para que seja instalado todas as dependências do WEBPACK
-   No terminal digite (sem aspas): "php artisan migrate --seed" - Para que o sistema crie todas as tabelas e colunas do banco de dados e popule com informações fake de acordo com as Migrations criadas.
-   Para rodar o webpack: "npm run watch" - Para monitorar alterações. "npm run production" - Para compilar e minificar para produção.
