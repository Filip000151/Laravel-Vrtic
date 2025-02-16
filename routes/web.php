<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {});


Route::resource('detes', App\Http\Controllers\DeteController::class);

Route::resource('evidencijas', App\Http\Controllers\EvidencijaController::class);

Route::resource('grupas', App\Http\Controllers\GrupaController::class);

Route::resource('prijavas', App\Http\Controllers\PrijavaController::class);

Route::resource('roditeljs', App\Http\Controllers\RoditeljController::class);

Route::resource('users', App\Http\Controllers\UserController::class);
