# Teste de avaliação técnica - AutoRegistro
Este projeto foi desenvolvido como parte de um teste de avaliação técnica.

## Requisitos
- PHP 8.0 ou superior
- Composer
- MySQL ou outro banco de dados compatível com Laravel

## Instalaçao

1 - Clone o repositório do projeto
```
git clone https://github.com/rebekaodilon/AutoRegistro.git
```
2 - Entre na pasta do projeto
```
cd AutoRegistro
```
3 - Instale as dependências do Composer
```
composer install
```
4 - Copie o arquivo .env.example e renomeie para .env
```
cp .env.example .env
```
5 - Configure as variáveis de ambiente do arquivo .env com as informações do seu ambiente (o .env.exemple já possui o mesmo nome do database que utilizei)

6 - Gere uma nova chave de aplicativo Laravel
```
php artisan key:generate
```
7 - Execute as migrações do banco de dados para criar as tabelas necessárias
```
php artisan migrate
```
8 - Também é possível gerar dados fakes com o comando (opcional)
```
php artisan db:seed
```
10 - Inicie o servidor do frontend
```
npm run dev
```
11 - Em outro terminal inicie o servidor de desenvolvimento
```
php artisan serve
```
