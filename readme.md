
# Cadastro de Usuários para IntranetOne
IOUser requires IntranetOne
## Conteúdo
 
- [Instalação](#instalação)
- [Webpack](#assets) 

## Instalação

```sh
composer require dataview/iouser
```
Instalar o pacote com php artisan
```sh
php artisan io-user:install
```
Configure o Model app/User.php para extender a classe EloquentUser 
```php
use Cartalyst\Sentinel\Users\EloquentUser as EloquentUser;
...
class User extends EloquentUser
{
...
```

## Webpack
  
```sh
let io = require('intranetone');
let user = require('intranetone-user');
io.compile({
  services:[
    new user(),
  ]
});
```
 