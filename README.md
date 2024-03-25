## Como rodar o projeto

Com Docker e o WSL2 configurados em sua máquina, basta clonar o projeto e rodar o seguinte comando:

'./vendor/bin/sail up'

## Como popular o banco de dados

Após preencher o .env com seus dados de conexão com o seu banco de dados escolhido, basta rodar os comandos:

'./vendor/bin/sail php artisan migrate'

e após

'./vendor/bin/sail php artisan db:seed'