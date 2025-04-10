<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Livewire\LoginUser;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::middleware('auth')->group(function () {    
    Route::view('/testpage', 'testpage')->name('test');
    Route::view('/dashboard','welcome')->name('dashboard'); 
});



Route::get('/login', function () {
    return view('app');
})->name('login');