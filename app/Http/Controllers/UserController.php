<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ResponseTrait;
    protected $repository;
    
    public function mount(UserRepository $repository) {
        $this->repository = $repository;
        return $this->repository->getAll();
    }

    public function login(UserRepository $repository, Request $request) {
        $this->repository = $repository;
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];


       if(Auth::attempt($credentials)) {
            $user = User::where('username',$credentials['username'])->first();
            $token = $user->createToken('Bearer_Token')->plainTextToken;
            return $this->response('200','Login Successful',['Your_token'=>$token] );
        }  
       
        return $this->responseAPI('401','Unauthorized',[]); 
    }

    public function testRoute() {
        return $this->responseAPI('200','This is a test route.',[]); 
    }
}
