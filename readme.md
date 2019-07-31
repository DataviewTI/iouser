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
