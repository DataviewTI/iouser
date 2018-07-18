<?php
namespace Dataview\IOUser\Console;
use Dataview\IntranetOne\Console\IOServiceInstallCmd;
use Dataview\IOUser\IOUserServiceProvider;
use Dataview\IOUser\UserSeeder;

class Install extends IOServiceInstallCmd
{
  public function __construct(){
    parent::__construct([
      "service"=>"user",
      "provider"=> IOUserServiceProvider::class,
      "seeder"=>UserSeeder::class,
    ]);
  }

  public function handle(){
    parent::handle();
  }
}
