<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    use ResponseTrait;
    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return $this->responseAPI('200','You are logged out.',[]);
    }
}
