# Cadastro de Usuários para IntranetOne

IOUser requires IntranetOne

#### Composer installation

Laravel 7 or above, PHP >= 7.2.5

```sh
composer require dataview/iouser dev-master
```

laravel 5.6 or below, PHP >= 7 and < 7.2.5

```sh
composer require dataview/iouser 1.0.0
```

#### Laravel artisan installation

```sh
php artisan io-user:install
```

#### Configurar .env para disparo de emails

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
