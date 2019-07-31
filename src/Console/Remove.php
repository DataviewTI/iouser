<?php
namespace Dataview\IOUser\Console;
use Dataview\IntranetOne\Console\IOServiceRemoveCmd;
use Dataview\IOUser\IOUserServiceProvider;
use Dataview\IntranetOne\IntranetOne;


class Remove extends IOServiceRemoveCmd
{
  public function __construct(){
    parent::__construct([
      "service"=>"user",
      "tables" =>['users'],
    ]);
  }

  public function handle(){
    parent::handle();
  }
}
