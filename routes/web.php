<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function ()
{
    Route::get('/login', function () {
        $pageName = 'Login';
        return view('page.login', compact('pageName'));
    })->name('login');

    Route::post('/login', 'App\Http\Controllers\AuthController@authenticate')->name('login');
    
    Route::get('/register', function () {
        $pageName = 'Register';
        return view('page.register', compact('pageName'));
    })->name('register');
    
    Route::post('/register', 'App\Http\Controllers\AuthController@registerUser')->name('register');
});


Route::middleware(['auth'])->group(function ()
{
    Route::get('/data-anggota', 'App\Http\Controllers\DataAnggotaController@index')->name('dashboard');
    
    Route::get('/tambah-anggota', function () {
        $pageName = 'Tambah Anggota';
        return view('page.tambah-anggota', compact('pageName'));
    })->name('tambah-anggota');

    Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
});


