# Cadastro de Usuários para IntranetOne

IOUser requires IntranetOne

## Conteúdo

- [Instalação](#instalação)
- [Webpack](#webpack)

## Instalação

```sh
composer require dataview/iouser
```

Instalar o pacote com php artisan

```sh
php artisan io-user:install
```

Configurar .env para disparo de emails

```sh
IOUSER_MAIN_EMAIL = "suporte@dataview.com.br"
IOUSER_ACTIVATION_EMAIL =
IOUSER_ACTIVATION_FROM = 'IntranetOne Dataview'
IOUSER_ACTIVATION_SUBJECT = 'Ativação de cadastro'
```

```sh
php artisan config:cache
```

## Webpack

```sh
let io = require('intranetone');
...
let user = require('intranetone-user');
io.compile({
  services:[
    ...
    new user(),
  ]
});
```
