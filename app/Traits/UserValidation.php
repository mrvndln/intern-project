<?php

namespace App\Traits;

trait UserValidation
{
  public function validation_rules_array()
  {
    return [
      'name' => ['min:6', 'required'],
      'contact' => ['bail', 'required', 'min:11', 'unique:user_details,contact'],
      'email' => 'required|email',
      'address' => 'required|min:10',
      'birthdate' => 'required',
      'username' => 'required|min:6|unique:users,username',
      'password' => 'required|min:6',
    ];
  }
}
