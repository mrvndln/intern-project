<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use App\Models\UserDetails;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserRepository implements UserInterface
{

    use ResponseTrait;

    public function getAll()
    {
        $users = DB::table('users')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('users.*', 'user_details.contact', 'user_details.address', 'user_details.birthdate')
            ->get();
        return $users;
    }

    public function validation(array $data, $validation_type, $userId)
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
                    'contact' => 'required|unique:user_details,contact,' . $userId,
                    'email' => 'sometimes',
                    'address' => 'sometimes',
                    'birthdate' => 'sometimes',
                    'username' => 'required|unique:users,username,' . $userId,
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

    public function add($data)
    {
        try {
            $response = $this->validation($data, 'create','');
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
            return $this->response('500', 'Something went wrong.', $e->getMessage());
        }
    }

    public function update($data, $id)
    {
        try {
            $response = $this->validation($data, '', $id);
            if ($response['code'] !== '200') {
                return $this->response($response['code'], $response['message'], $response['result']);
            }

            $user = User::find($id);

            $user->name = $response['result']['name'];
            $user->email = $response['result']['email'];
            $user->username = $response['result']['username'];

            $user_details = UserDetails::find($id);

            $user_details->contact = $response['result']['contact'];
            $user_details->address = $response['result']['address'];
            $user_details->birthdate = $response['result']['birthdate'];

            $user->save();
            $user_details->save();

            return $this->response($response['code'], $response['message'], $response['result']);
        } catch (\Exception $e) {
            return $this->response('500', 'Something went wrong.', $e->getMessage());
        }
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();
    }

    public function loginValidation($data)
    {
        try {
            $validator = Validator::make($data, [
                'username' => 'required',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->response('401', 'Incorrect credentials.', $validator->errors());
            }

            return $this->response('200', '', $validator->validated());
        } catch (\Exception $e) {
            return $this->response('', '', $e->getMessage());
        }
    }
    public function find($data)
    {
        $users = DB::table('users')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('users.*', 'user_details.contact', 'user_details.address', 'user_details.birthdate')
            ->where('users.id', $data)
            ->first();
        return $users;
    }
}