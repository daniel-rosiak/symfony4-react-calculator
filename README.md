# DOCKER

Add to hosts in Your system:
<docker ip> calcu-co.api.lo calcu-co.web.lo

Unix
/etc/hosts

Windows
%SystemRoot%\system32\drivers\etc\hosts

## Start

1. Start your docker
2. Open console and write
```
docker-compose build
docker-compose up
docker-compose exec php bash
cd /home/wwwroot/api && composer install
cd /home/wwwroot/api && php bin/console doctrine:migrations:migrate --no-interaction
cd /home/wwwroot/web && yarn
cd /home/wwwroot/web && yarn build
```

## Apps instalation

API: [API repository](./apps/api/README.md)

WEB: [WEB repository](./apps/web/README.md)

## URL's

API: http://calcu-co.api.lo

API DOC: http://calcu-co.api.lo/api/doc

WEB: http://calcu-co.web.lo