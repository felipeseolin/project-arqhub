# Arqhub

## Requisitos para execução
- PHP
- Apache
- Banco de Dados (PostgreSQL, MySQL ou outros que o Laravel suporte)
- Extensões do php que o Laravel necessita
- NodeJS e NPM

## Orientações para executar o programa em seu computador

- Clonar o repositório onde desejar com:
`
git clone https://github.com/felipeseolin/project-arqhub.git
`
- Copiar o arquivo .env.example com o nome .env
- Configurar o arquivo .env, principalmente a parte de Database e SMTP
- Rodar o npm em /project-arqhub/
`
npm install
`
- Rodar o composer em /project-arqhub/
`
composer install
`
- Fazer um banco de dados com o nome que configurou no .env
- Criar as tabelas com o php através do seguinte comando:
`
php artisan migrate
`
- Vale ressaltar que alguma vez pode ser necessário executar o comando acima com `:refresh` e também `--force`
- Além disso utilizamos o Postgres como banco de dados, porém você pode utilizar o banco que desejar que o laravel suporte
- Executar o programa com:
`
php artisan serve
`

## Herouku app
Não tivemos como foco o desenvolvimento par ao heroku, porém nosso programa também está lá e pode ser acessado por este link: [http://project-arqhub.herokuapp.com/](http://project-arqhub.herokuapp.com/)
