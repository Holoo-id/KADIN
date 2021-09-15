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
// Page Example
Route::get('/dashboard', function () {
    return view('page.dashboard');
})->name('dashboard');
Route::get('/login', function () {
    $pageName = 'Login';
    return view('page.login', compact('pageName'));
})->name('login');
Route::get('/register', function () {
    $pageName = 'Register';
    return view('page.register', compact('pageName'));
})->name('register');
Route::get('/data-anggota', function () {
    $pageName = 'Data Anggota';
    return view('page.data-anggota', compact('pageName'));
})->name('data-anggota');
Route::get('/tambah-anggota', function () {
    $pageName = 'Tambah Anggota';
    return view('page.tambah-anggota', compact('pageName'));
})->name('tambah-anggota');
