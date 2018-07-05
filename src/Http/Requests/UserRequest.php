<?php

namespace Dataview\IOUser;
use Dataview\IntranetOne\IORequest;

class UserRequest extends IORequest
{
  public function sanitize(){
    dump($this->is('*/update/*'));
    $input = parent::sanitize();

    if($input['__admin'] == "true")
      $input['__admin'] = true;
    else
      $input['__admin'] = false;

    if(array_has($input, 'permissions') && $input['permissions'] != [] && $input['__admin'] == false)
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
    $rules = null;

    if($this->is('*/update/*')){
      $rules = [
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'email' => 'required|max:255',
        'password' => 'max:255',
        'confirm_password' => 'max:255|same:password',
      ];
    }else{
      $rules = [
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'email' => 'required|max:255',
        'password' => 'required|max:255',
        'confirm_password' => 'max:255|same:password',
      ];
    }

    return $rules;

  }
}
