<?php

namespace App\Livewire;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class LoginUser extends Component
{
    public $username, $password, $errorMessage;
    protected $rules = [
        'username' => 'required|min:6',
        'password' => 'required|min:8',
    ];
    public function login(Request $request) {

        $this->resetErrorBag('username');
        $this->resetErrorBag('password');
        $this->errorMessage = '';

        $this->validate();

        $credentials = [
            'username' => $this->username, 
            'password' => $this->password
        ];

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');;
        }   
            $this->resetErrorBag('username');
            $this->resetErrorBag('password'); 
            $this->errorMessage = 'The username or password is incorrect.';   

        $this->reset(['username', 'password']);
    }
    public function render()
    {
        return view('livewire.login-user');
    }
}
