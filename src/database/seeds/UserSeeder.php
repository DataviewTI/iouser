<?php
namespace Dataview\IOUser;

use Illuminate\Database\Seeder;
use Dataview\IntranetOne\Service;
use Sentinel;

class UserSeeder extends Seeder
{
    public function run(){
      //cria o serviço se ele não existe
      if(!Service::where('service','User')->exists()){
        Service::insert([
            'service' => "User",
            'alias' =>'user',
            'ico' => 'ico-user',
            'description' => 'Cadastro de Usuários',
            'order' => Service::max('order')+1
          ]);
      }
      //seta privilegios padrão para o role admin
      $rolse = Sentinel::findRoleBySlug('admin');
      $rolse->addPermission('user.view');
      $rolse->addPermission('user.create');
      $rolse->addPermission('user.update');
      $rolse->addPermission('user.delete');
      $rolse->save();

    }
} 
