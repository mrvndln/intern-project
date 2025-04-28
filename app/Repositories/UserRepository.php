<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\AccessControl;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\UserDetails;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Log;
use Str;

class UserRepository implements UserInterface
{

    use ResponseTrait;

    public function getAll()
    {
        $users = User::with(['user_detail','roles'])->get();
        // $users = DB::table('users')
        //     ->join('user_details', 'users.id', '=', 'user_details.user_id')
        //     ->select('users.*', 'user_details.contact', 'user_details.address', 'user_details.birthdate')
        //     ->get();
        return $users;
    }

    public function getRoles()
    {
        return Role::all();
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
                    'password' => 'required|min:8',
                    'role_id' => 'required'
                ]);
            } else {
                $validator = Validator::make($data, [
                    'name' => 'sometimes',
                    'role_id' => 'sometimes',
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
            $response = $this->validation($data, 'create', '');
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

            $user->roles()->sync([$response['result']['role_id']]);

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

            if (!is_null($response['result']['password'])) {
                $user->password = $response['result']['password'];
            }

            $user_details = UserDetails::find($id);

            $user_details->contact = $response['result']['contact'];
            $user_details->address = $response['result']['address'];
            $user_details->birthdate = $response['result']['birthdate'];

            $user->roles()->sync([$response['result']['role_id']]);

            $user->save();
            $user_details->save();

            return $this->response($response['code'], $response['message'], $response['result']);
        } catch (\Exception $e) {
            return $this->response('500', 'Something went wrong.', $e->getMessage());
        }
    }

    public function delete($id)
    {
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
        if (gettype($data) !== 'string') {
            $user = User::with(['user_detail', 'roles'])->where('users.id', $data)->first();
            // $user = DB::table('users')
            // ->join('user_details', 'users.id', '=', 'user_details.user_id')
            // ->select('users.*', 'user_details.contact', 'user_details.address', 'user_details.birthdate')
            // ->where('users.id', $data)
            // ->first();
            return $user;
        } else {
            return User::where('username', $data)->first();
        }
    }

    public function getResults($data)
    {
        $result = User::with(['user_detail', 'roles'])

            ->whereAny(['name', 'email', 'username'], 'LIKE', '%' . $data . '%')
            ->orWhereHas('user_detail', function ($query) use ($data) {
                $query->whereAny(['contact', 'address', 'birthdate'], 'LIKE', '%' . $data . '%');
            })
            ->orWhereHas('roles', function ($query) use ($data) {
                $query->where('role', 'LIKE', '%' . $data . '%');
            })
            ->get();
        return $result;
    }

    public function findModule($data)
    {
        $module = Permission::where('module_name', 'LIKE','%'.$data.'%' )->get();
        return $module;
    }

    public function getModules()
    {
        $module = Permission::all();
        return $module;
    }


    public function updateOrCreate($data)
    {

        try {
            $snakeCaseData = Str::snake($data);

            Permission::updateOrCreate([
                'module_name' => $data,
                'access_module_name' => $snakeCaseData
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating or creating user: ' . $e->getMessage());
        }
    }
}
