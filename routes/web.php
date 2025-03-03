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

Route::get('/', [PrijavaController::class, 'create'])->name('prijava.create');
Route::post('/prijava', [PrijavaController::class, 'store'])->name('prijava.store');

Route::middleware(['auth', 'uloga:admin'])->group(function(){

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('grupa', GrupaController::class);
    Route::resource('user', UserController::class);

    Route::name('prijava.')->group(function(){
        Route::prefix('prijava')->group(function(){
            Route::controller(PrijavaController::class)->group(function(){
                Route::get('/', 'index')->name('index');
                Route::get('/{prijava}', 'show')->name('show');
                Route::put('/{prijava}/odbij', 'odbij')->name('odbij');
                Route::put('/{prijava}/potvrdi', 'potvrdi')->name('potvrdi');
            });
        });
    });

    Route::name('dete.')->group(function(){
        Route::prefix('dete')->group(function(){
            Route::controller(DeteController::class)->group(function(){
                Route::get('/', 'index')->name('index');
                Route::get('/{dete}', 'show')->name('show');
                Route::get('/{dete}/edit', 'edit')->name('edit');
                Route::put('/{dete}', 'update')->name('update');
                Route::delete('/{dete}', 'destroy')->name('destroy');
            });
        });
    });

    Route::name('roditelj.')->group(function(){
        Route::prefix('roditelj')->group(function(){
            Route::controller(RoditeljController::class)->group(function(){
                Route::get('/', 'index')->name('index');
                Route::get('/{roditelj}', 'show')->name('show');
                Route::get('/{roditelj}/edit', 'edit')->name('edit');
                Route::put('/{roditelj}', 'update')->name('update');
            });
        });
    });

    Route::name('evidencija.')->group(function(){
        Route::prefix('evidencija')->group(function(){
            Route::controller(EvidencijaController::class)->group(function(){
                Route::get('/{evidencija}', 'show')->name('show');
                Route::get('/grupa/{grupa}/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{evidencija}/edit', 'edit')->name('edit');
                Route::put('/{evidencija}', 'update')->name('update');
                Route::delete('/{evidencija}', 'destroy')->name('destroy');
            });
        });
    });

});

Route::middleware(['auth', 'uloga:admin,vaspitac'])->group(function(){

    Route::get('/grupa', [GrupaController::class, 'index'])->name('grupa.index');
    Route::get('/grupa/{grupa}', [GrupaController::class, 'show'])->name('grupa.show');

    Route::get('/dete/{dete}', [DeteController::class, 'show'])->name('dete.show');

    Route::get('/roditelj/{roditelj}', [RoditeljController::class, 'show'])->name('roditelj.show');

    Route::name('evidencija.')->group(function(){
        Route::prefix('evidencija')->group(function(){
            Route::controller(EvidencijaController::class)->group(function(){
                Route::get('/{evidencija}', 'show')->name('show');
                Route::get('/grupa/{grupa}/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{evidencija}/edit', 'edit')->name('edit');
                Route::put('/{evidencija}', 'update')->name('update');
            });
        });
    });

});

Auth::routes(['register' => false, 'reset' => false]);