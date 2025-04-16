<?php

namespace App\Traits;

trait UserValidation
{
  public function validation_rules_array($type)
  {
    if ($type !== 'create') {
      return [
        'name' => 'required|min:6',
        'role_id' => 'sometimes',
        'contact' => 'required|min:11',
        'email' => 'required|email',
        'address' => 'required|min:10',
        'birthdate' => 'required',
        'username' => 'required|min:6',
        'password' => 'sometimes',
      ];
    }

    return [
      'name' => 'required',
      'role_id' => 'required',
      'contact' => 'required|min:11|unique:user_details,contact',
      'email' => 'required|email',
      'address' => 'required|min:10',
      'birthdate' => 'required',
      'username' => 'required|min:6|unique:users,username',
      'password' => 'required|min:6',
    ];
  }

  public function validation_rules_messages($type)
  {
    return [
      'name.required' => 'Please fill out this field.',
      'name.min' => 'The name must be at least 6 characters.',

      'contact.required' => 'Please fill out this field.',
      'contact.min' => 'The contact must be at least 11 digits.',
      'contact.unique' => 'This contact number is already taken.',

      'email.required' => 'Please fill out this field.',
      'email.email' => 'Please enter a valid email address.',

      'address.required' => 'Please fill out this field.',
      'address.min' => 'The address must be at least 10 characters.',

      'birthdate.required' => 'Please fill out this field.',

      'username.required' => 'Please fill out this field.',
      'username.min' => 'The username must be at least 6 characters.',
      'username.unique' => 'This username is already taken.',

      'password.required' => 'Please fill out this field.',
      'password.min' => 'The password must be at least 6 characters.',
    ];
  }
}
