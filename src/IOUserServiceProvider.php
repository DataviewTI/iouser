<?php

namespace Dataview\IOUser;

use Illuminate\Support\ServiceProvider;

class IOUserServiceProvider extends ServiceProvider
{
    public static function pkgAddr($addr){
      return __DIR__.'/'.$addr;
    }

    public function boot()
    {
      $this->publishes([
        __DIR__.'/config/iouser.php' => config_path('iouser.php'),
      ]);

      $this->loadViewsFrom(__DIR__.'/views', 'User');
    }

    public function register()
    {
      $this->commands([
        Console\Install::class,
        Console\Remove::class
      ]);

      $this->app['router']->group(['namespace' => 'dataview\iouser'], function () {
        include __DIR__.'/routes/web.php';
      });
      //buscar uma forma de não precisar fazer o make de cada classe
  
      $this->app->make('Dataview\IOUser\UserController');
      $this->app->make('Dataview\IOUser\UserRequest');
    }
}