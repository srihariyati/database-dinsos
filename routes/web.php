<?php


use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PmksController;
use App\Http\Controllers\DtksController;
use App\Http\Middleware;

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

Route::get('/', [LoginController::class, 'index'])->name('/');
Route::post('/actionlogin', [LoginController::class, 'login']);


Route::group(['middleware' =>['auth']], function(){

    Auth::routes();

    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/pmks','PmksController@index2');
    Route::get('/dtks','DtksController@index2');

    Route::get('/tambahpmks', function () {
        return view('rehsos/tambahpmks');
    });

    Route::get('/editpmks', function () {
        return view('rehsos/editpmks');
    });

    Route::get('/caripmks','PmksController@index');

    Route::get('/caridtks','DtksController@index');

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

    Route::get('pmks', [PmksController::class, 'view'])->name('dropdownView');
    Route::get('get-desa',[PmksController::class, 'getDesa'])->name('getDesa');
    Route::get('get-data-pmks',[PmksController::class, 'getDataPMKS'])->name('getDataPMKS');
    Route::get('get-data-kec',[PmksController::class, 'getDataKec'])->name('getDataKec');

    Route::get('dtks', [DtksController::class, 'view'])->name('dropdownView');
    Route::get('get-desa',[DtksController::class, 'getDesa'])->name('getDesa');
    Route::get('get-data-dtks',[DtksController::class, 'getDataDTKS'])->name('getDataDTKS');
});



