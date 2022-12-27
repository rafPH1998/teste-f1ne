


### Passo a passo
Clone Repositório
```sh
git clone https://github.com/rafPH1998/teste-f1ne.git
```
```sh
cd teste-f1ne/
```

Remova o versionamento (opcional)
```sh
rm -rf .git/
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME="Projeto"
APP_URL=http://localhost:porta_que_definiu_no_container/users

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container APP com o bash
```sh
docker-compose exec app bash
```

Sempre entre no container se desejar rodar comandos com php artisan...
```sh
docker-compose exec app bash
```

Instale as dependências do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Rode as migrations
```sh
php artisan migration
```

Caso queira popular o banco com alguns dados
```sh
php artisan db:seed
```

Acesse o projeto
http://localhost:porta_que_definiu_no_container/users


Endpoints da API RESTFUL:

```dosini
Listagem dos clientes:
GET /api/users

Listagem de um cliente especifico:
GET /api/users/1

Cadastrar um cliente:
POST /api/users/

Editar um cliente:
PUT /api/users/1

Deletar um cliente:
DELETE /api/users/1

Listar detalhes de endereço de um cliente:
GET /api/users/address/2

Cadastrar um novo endereço para um cliente especifico:
POST /api/users/address/2/details

Deletar um endereço de um cliente especifico
DELETE /api/users/address/1/destroy
```