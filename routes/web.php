<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('login/loginadmin');
});
Route::post('/login',[AdminController::class, 'registerAdmin'])->name('create.log');
Route::get('/connexion', function () {
    return view('login/loginadmin');
});
