<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserRepository implements UserInterface{
    
    use ResponseTrait;

    public function getAll()
    {
        return User::all();
    }

    public function validation($data, $validation_type)
    {
        try {
            DB::beginTransaction();
            if ($validation_type == 'create') {
                $validator = Validator::make($data, [
                    'name' => 'required',
                    'contact' => 'required|unique:user_details,contact', 
                    'email' => 'sometimes',
                    'address' => 'required',
                    'birthdate' => 'required',
                    'username' => 'required|unique:users,username',
                    'password' => 'required|min:8'
                ]);
            } else {
                $validator = Validator::make($data, [
                    'name' => 'sometimes',
                    'contact' => 'sometimes|unique:user_details,contact'.$data['id'], 
                    'email' => 'sometimes',
                    'address' => 'sometimes',
                    'birthdate' => 'sometimes',
                    'username' => 'sometimes|unique:users,username'.$data['id'],
                    'password' => 'sometimes'
                ]);
            }

            if ($validator->fails()) {
                return  $this->response('400', 'Bad request.', $validator->errors());
            }
            DB::commit();
            return $this->response('200', 'Validated Successfully', $validator->validated());
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->response('500', 'Something went wrong', $e->getMessage());
        }
    }

    public function add($data) {
        try {
            $response = $this->validation($data, 'create');
            if ($response['code'] !== '200') {
                return $this->response($response['code'], $response['message'], $response['result']);
            } 
            
            $user = User::create([
                'name' => $response['result']['name'],
                'email' => $response['result']['email'],
                'username' => $response['result']['username'],
                'password' => $response['result']['password']
            ]);

            $user->user_detail()->create([
                'contact' => $response['result']['contact'], 
                'address' => $response['result']['address'],
                'birthdate' => $response['result']['birthdate'],
            ]);

            return $this->response($response['code'], $response['message'], $response['result']);

        } catch (\Exception $e) {
            return $this->response('500','Something went wrong.',$e->getMessage());
        }
    }

    public function loginValidation($data){
        try {
            $validator = Validator::make($data,[
                'username' => 'required',
                'password' => 'required',
            ]);

            if($validator->fails()){
                return $this->response('401','Incorrect credentials.', $validator->errors());
            }

            return $this->response('200','',$validator->validated());

        } catch(\Exception $e) {
            return $this->response('','', $e->getMessage());
        }
    }
    public function find($data) {
       return User::where('username',$data)->first();
    }

}