<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Livewire\LoginUser;
use Illuminate\Routing\Controllers\Middleware;
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

Route::get('/app', function () {
    return view('app');
});

Route::get('/register', function (){
    return view('register');
});

Route::post('/login',[AuthController::class,'login']);

Route::group([
    'middleware' => 'auth:sanctum'
], function(){
    Route::view('/testpage', 'testpage')->name('test');
    Route::get('/',[UserController::class,'showPage']);
});



