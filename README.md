## Aplicação back-end Teste Prático Try

# Ambiente configurado em docker, Vue JS / Laravel

## Ajustes e configurações para contêiner do Vuejs:
- Vá ate a pasta da aplicação vue js chamada 'application-vue' copie o .env.local.example de exemplo para .env.local, o valor da única variável do arquivo deve conter a mesma porta da aplicação laravel, por padrão deixei 8000

## Ajustes e configurações para contêiner do laravel:

- Copie o .env.example para .env (Configurar .env da raiz corretamente com o ambiente atual, realizar o mesmo procedimento para o .env contido em ./application-laravel)
- Configure tambem as variáveis de envio de email, criei a variável MAIL_TO_RELATORIO_VENDAS_DIARIA que deve ser preenchido para ser o destinatário do relatorio de vendas
- Deixei pré configurado algumas variáveis de e-mail pois ja configurei a conta para permitir o envio, mas se preferir pode usar a configuração e o email que preferir
- Execute o comando: **docker-compose up -d --build** para subir os contêiner
- Assim que os contêiner estiver 'up' acesse o contêiner da aplicação, no nosso caso se chama 'laravel' com o seguinte comando:  **docker exec -it laravel bash**
- Execute de dentro do contêiner os seguintes comandos:

  - composer install
  - php artisan key:generate
  - php artisan config:cache (Rodar após a configuração do .env para limpar os cache)
  - php artisan config:clear

### Uso de Migrate e Seeder

- Foi criado migrate para as tabelas necessárias (execute os comandos dentro do contêiner utilizado acima)
  - php artisan migrate

### Testes Unitários

- Para execução dos testes unitários, acesse o contêiner 'laravel' e execute o comando abaixo para executar os 2 arquivos de teste:
  - php vendor/bin/phpunit tests/Unit

### Uso de Command, tarefa agendada e envio de e-mails
- A aplicação possui com um command para envio de e-mail contendo o relatório das vendas do dia atual, ele está configurado para execução todos os dias ás 18h

 - Como estamos testando localmente, precisamos acessar o contêiner da nossa aplicação laravel e executar o que ficará ouvindo os agendamentos e os executando:
   - php artisan schedule:work

- É possivel tambem executarmos a command para envio do e-mail a qualquer hora utilizando o comando:
  - php artisan relatorio:vendas

### Sobre as aplicações

Aplicação consiste em um sistema de gestão de vendas. composta de um front-end independente e de uma aplicação back-end no formato rest

### Tecnologias utilizadas

- ### Laravel 11
- ### PHP 8.2
- ### VUE JS

### Tecnologias para teste na Api

- ### Insominia

### Rotas da aplicação

### POST localhost:8000/api/vendedor

- Inserir novo vendedor
  exemplo request:

```json
{
	"nome" : "teste",
	"email" : "teste@hotmail.com"
}
```
### GET localhost:8000/api/vendedor

- Exibir todos vendedores

### POST localhost:8000/api/vendas

- Efetuar uma venda:
  exemplo request:

```json
{
	"id_vendedor": 8,
	"valor_da_venda": "30.60"
}
```
### GET localhost:8000/api/vendas/vendedor?id=1

- Exibir todas vendas por id de vendedor
