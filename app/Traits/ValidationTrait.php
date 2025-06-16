<?php

namespace App\Traits;

trait ValidationTrait
{
  public function validation_rules_array($type, $action)
  {
      if ($type == 'user') {
          switch ($action) {
              case 'update':
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
  
              case 'create':
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
  
              default:
                  return ['moduleName' => 'required'];
          }
      } elseif ($type == 'patient') {
          switch ($action) {
              case 'create':
              case 'update':
                  return [
                      'patient_name' => 'required|min:3',
                      'patient_gender' => 'required|in:male,female',
                      'patient_birthdate' => 'required|date',
                      'patient_contact' => 'required|min:11',
                      'patient_email' => 'nullable|email',
                      'patient_address' => 'required|min:10',
                  ];
  
              default:
                  return ['patient_name' => 'required'];
          }
      } else {
          return ['moduleName' => 'required'];
      }
  }
  

  public function validation_rules_messages($type)
  {
    if ($type == 'user') {
      return [
        'name.required' => 'Please fill out this field.',
        'name.min' => 'The name must be at least 6 characters.',

        'role_id.required' => 'Please select a role.',

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
    } else {
      return [
      
        'patient_name.required' => 'Please fill out this field.',
        'patient_name.min' => 'The name must be at least 3 characters.',

        'patient_gender.required' => 'Please select a gender.',
        'patient_gender.in' => 'Gender must be either "male" or "female".',

        'patient_birthdate.required' => 'Please enter a valid birthdate.',
        'patient_birthdate.date' => 'Please enter a valid birthdate.',

        'patient_contact.required' => 'Please fill out this field.',
        'patient_contact.min' => 'The contact must be at least 11 digits.',

        'patient_email.email' => 'Please enter a valid email address.',

        'patient_address.required' => 'Please fill out this field.',
        'patient_address.min' => 'Please enter a valid address.',

      ];
    }
  }
}
