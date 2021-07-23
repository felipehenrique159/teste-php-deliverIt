## Aplicação Back end DeliverIt 

## Comandos para rodar a aplicação
- cp .env.example .env  (Configurar .env corretamente com o ambiente atual)
- composer install
- php artisan config:cache (Rodar após a configuração do .env para limpar os cache)
- php artisan config:clear
- php artisan serve

## Comandos para rodar a aplicação (Ambiente Docker)
- cp .env.example .env  (Configurar .env corretamente com o docker)
- composer install
- php artisan config:cache (Rodar após a configuração do .env para limpar os cache)
- php artisan config:clear
- docker-compose up -d (Para subir os container)

## Uso de Migrate e Seeder

- Foi criado migrate para as tabelas e seeder para popular a tabela de provas

## Comandos

- php artisan migrate
- php artisan db:seed  (popula a tabela provas com dados)

## Sobre a aplicação
Aplicação back end no formato API rest, usada para Crud, tratativa ,validações e listagem de dados seguindo as regras de negocio solicitada no teste, a api usa Request personalizado com regras usando o Laravel Validation, além do uso de models, migrate e seed.

## Tecnologias utilizadas:

- ### Laravel 8

## Tecnologias para teste na Api:

- ### Postman
- ### XDebuger

## Rotas da aplicação
## POST localhost:8000/api/corredores
- Insere novo corredor
```json
{
    "nome" : "Leo",
    "cpf" : "22437586601",
    "data_nascimento" : "1982-07-10"
}
```

## POST localhost:8000/api/provas
- Insere relação entre corredor e prova
```json
{
    "id_corredor" :2,
    "id_prova" : 1
}
```

## POST localhost:8010/api/resultados
- Insere os resultados da prova do corredor
```json
{
    "id_corredor" : 2,
    "id_prova" : 1,
    "horario_inicio_prova" : "08:15:20",
    "horario_conclusao_prova" : "23:10:30"
}
```

## GET localhost:8000/api/resultados-agrupados
- Retorna todos os resultados agrupados por tipo de prova classificando por idade e menor tempo
