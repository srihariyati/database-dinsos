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
    return view('login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/pmks', function () {
    return view('rehsos/pmks');
});

Route::get('/tambahpmks', function () {
    return view('rehsos/tambahpmks');
});

Route::get('/caripmks', function () {
    return view('rehsos/caripmks');
});

Route::get('/dtks', function () {
    return view('dayasos/dtks');
});

Route::get('/tambahdtks', function () {
    return view('dayasos/tambahdtks');
});

Route::get('/bencana', function () {
    return view('linjamsos/bencana');
});

Route::get('/tambahdatabencana', function () {
    return view('linjamsos/tambahdatabencana');
});

Route::get('/pkh', function () {
    return view('linjamsos/pkh');
});

Route::get('/tambahpkh', function () {
    return view('linjamsos/tambahpkh');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
