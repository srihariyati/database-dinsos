<?php


use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PmksController;
use App\Http\Controllers\DtksController;
use App\Http\Controllers\PkhController;
use App\Http\Controllers\BencanaController;
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

    //mengambil data kecamatan untuk dropdown
   
    Route::get('pmks', [PmksController::class, 'view'])->name('dropdownView');
    Route::get('get-data-pmks',[PmksController::class, 'getDataPMKS'])->name('getDataPMKS');
    Route::get('/editpmks',[PmksController::class, 'editPmks'])->name('editPmks');
    Route::get('/tambahpmks', [PmksController::class, 'tambah'])->name('tambah');
    Route::post('/tambahpmks/store',[PmksController::class, 'store'])->name('store');
    Route::post('/editpmks/update',[PmksController::class, 'update'])->name('update');

    //lihat data dtks
    Route::get('/dtks', [DtksController::class, 'getViewDTKS'])->name('getViewDTKS');
    Route::get('get-data-dtks',[DtksController::class,'getDataDTKS'])->name('getDataDTKS');
    Route::get('/editdtks',[DtksController::class, 'editDtks'])->name('editDtks');
    Route::get('/tambahdtks',[DtksController::class, 'tambah'])->name('tambah');
    Route::post('/tambahdtks/store',[DtksController::class, 'store'])->name('store');

    //lihat data pkh
    Route::get('/pkh',[PkhController::class, 'getViewPKH'])->name('getViewPKH');
    Route::get('get-data-pkh',[PkhController::class,'getDataPKH'])->name('getDataPKH');
    Route::get('/tambahpkh', [PkhController::class, 'tambah'])->name('tambah');
    Route::post('/tambahpkh/store',[PkhController::class, 'store'])->name('store');

    //lihat data bencana
    Route::get('/bencana',[BencanaController::class, 'getViewBencana'])->name('getViewBencana');
    Route::get('get-data-bencana', [BencanaController::class, 'getDataBencana'])->name('getDataBencana');
    Route::get('/tambahdatabencana', [BencanaController::class, 'tambah'])->name('tambah');
    Route::post('/tambahbencana/store', [BencanaController::class, 'store'])->name('store');
});



