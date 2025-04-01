<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use ResponseTrait;
    public $repository;
    public function login(Request $request, UserRepository $repository) {
        $this->repository = $repository;
        if(!Auth::attempt($request->only(['username','password']))) {
            return $this->responseAPI('401','Invalid login credentials',[]);
        }
            $user = $this->repository->find($request->username);
            $token = $user->createToken('Auth_Token')->plainTextToken;
        return $this->responseAPI('200','Login Successful!',$token);
    }
}
