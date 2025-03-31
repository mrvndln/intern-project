<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Traits\ResponseTrait;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ResponseTrait;
    public $username, $password;
    protected $repository;
    public function login(Request $request, UserRepository $repository) {
        $this->repository = $repository;

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ]; 

        if(Auth::attempt($credentials)) {
            // $user = User::where('username',$request->username)->first();
            // $token = $user->createToken('Bearer_Token')->plainTextToken;
            return $this->responseAPI('200','Login',['message' => 'Login Successful!']);
        }        
        return $this->response('401','Unauthorized',['message' => 'Invalid login credentials.']); 
    }
 
}
