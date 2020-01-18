# API

Symfony 4

## Get into docker container

```
docker exec -it -u dev calcu_co_php bash
cd api
```

## Instalation

```
composer update
php bin/console doctrine:migrations:migrate
```

## Configuration

Database connection, CORS
```
./.env
```

## Addresses

API: http://calcu-co.api.lo

API DOC http://calcu-co.api.lo/api/doc


## Api Routes

	GET ->   http://calcu-co.api.lo/api/v1/operation
	POST ->   http://calcu-co.api.lo/api/v1/operation

example payload for POST:

    {
	  "arguments": [1,2],
	  "type": "add"
	}


