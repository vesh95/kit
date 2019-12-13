# kit

## Quickstart
1. [Install composer](https://getcomposer.org)
2. [Install docker](https://docs.docker.com/install/)
3. [Install docker-compose](https://docs.docker.com/compose/install/)
4. Install traefik [https://gogs.mt-pc.ru/danjudex/traefik](https://gogs.mt-pc.ru/danjudex/traefik)

Создание .env из шаблона .env-dist
```
cp .env-dist .env
```

Полная установка приложения в докер 
```
make install
```

Для подключения к рабочему окружению 
```
make
```

## DEMO

`administrator` role account
```
Login: webmaster
Password: webmaster
```

`manager` role account
```
Login: manager
Password: manager
```

`user` role account
```
Login: user
Password: user
```
## Php worker
Команда просмотра логов воркера

```console
docker-compose logs php-worker
```

```console
docker-compose logs -f php-worker
```

[**API  DOCUMENTATION**](API.md)
