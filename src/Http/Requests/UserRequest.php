<?php

namespace Dataview\IOUser;
use Dataview\IntranetOne\IORequest;

class UserRequest extends IORequest
{
  public function sanitize(){
    $input = parent::sanitize();

    if($input['__admin'] == "true")
      $input['__admin'] = true;
    else
      $input['__admin'] = false;

    if(array_has($input, 'permissions') && $input['permissions'] != [])
    {
      foreach($input['permissions'] as $permission => $value){
          $input['permissions'][$permission] = true;
      }
    }else{
      $input['permissions'] = [];
    }

    $this->replace($input);
	}

  public function rules(){
    $this->sanitize();
    return [
      'first_name' => 'required|max:255',
      'last_name' => 'required|max:255',
      'email' => 'required|max:255',
      'password' => 'required|max:255',
      'confirm_password' => 'required|max:255|same:password',
    ];
  }
}
