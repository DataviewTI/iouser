<?php

namespace Dataview\IOUser;
use Dataview\IntranetOne\IORequest;

class UserRequest extends IORequest
{
  public function sanitize(){
    $input = parent::sanitize();

    if(array_key_exists("__admin",$input) && $input['__admin'] == "true")
      $input['__admin'] = true;
    else if(array_key_exists("__admin",$input))
      $input['__admin'] = false;

    if($this->is('*/update/*')){
      if(array_key_exists('password', $input) && $input['password'] == null)
        unset($input['password']);
        
      if(array_key_exists('confirm_password', $input) && $input['confirm_password'] == null)
        unset($input['confirm_password']);
    }

    if(array_has($input, 'permissions') && $input['permissions'] != [] && $input['__admin'] == false)
    {
      foreach($input['permissions'] as $permission => $value){
        $input['permissions'][$permission] = true;
      }
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
