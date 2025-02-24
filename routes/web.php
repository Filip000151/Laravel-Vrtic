<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrijavaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeteController;
use App\Http\Controllers\RoditeljController;
use App\Http\Controllers\EvidencijaController;
use App\Http\Controllers\GrupaController;

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

Route::get('/', [PrijavaController::class, 'create'])->name('prijavas.create');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::put('/prijavas/{prijava}/potvrdi', [PrijavaController::class, 'potvrdi'])->name('prijavas.potvrdi');
Route::put('/prijavas/{prijava}/odbij', [PrijavaController::class, 'odbij'])->name('prijavas.odbij');

Route::get('/grupa/{grupa}/evidencija/create', [EvidencijaController::class, 'create'])->name('evidencija.create');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {});


Route::resource('detes', App\Http\Controllers\DeteController::class);

Route::resource('evidencijas', App\Http\Controllers\EvidencijaController::class);

Route::resource('grupas', App\Http\Controllers\GrupaController::class);

Route::resource('prijavas', App\Http\Controllers\PrijavaController::class);

Route::resource('roditeljs', App\Http\Controllers\RoditeljController::class);

Route::resource('users', App\Http\Controllers\UserController::class);
