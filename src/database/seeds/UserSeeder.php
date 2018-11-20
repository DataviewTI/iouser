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

      //seta privilegios padrão para o role odin
      $odinRole = Sentinel::findRoleBySlug('odin');
      $odinRole->addPermission('user.view');
      $odinRole->addPermission('user.create');
      $odinRole->addPermission('user.update');
      $odinRole->addPermission('user.delete');
      $odinRole->save();

      //seta privilegios padrão para o role admin
      $adminRole = Sentinel::findRoleBySlug('admin');
      $adminRole->addPermission('user.view');
      $adminRole->addPermission('user.create');
      $adminRole->addPermission('user.update');
      $adminRole->addPermission('user.delete');
      $adminRole->save();

    }
} 
