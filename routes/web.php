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

    // Route::get('/editpmks', function () {
    //     return view('rehsos/editpmks');
    // });

    Route::get('/caripmks','PmksController@index');

    

    Route::get('/tambahdtks', function () {
        return view('dayasos/tambahdtks');
    });
    
    Route::get('/tambahpkh', function () {
        return view('linjamsos/tambahpkh');
    });
    //mengambil data kecamatan untuk dropdown
    Route::get('get-data-pmks',[PmksController::class, 'getDataPMKS'])->name('getDataPMKS');

    Route::get('pmks', [PmksController::class, 'view'])->name('dropdownView');
   
    Route::get('get-data-kec',[PmksController::class, 'getDataKec'])->name('getDataKec');
    Route::get('get-pmks-desa',[PmksController::class, 'getPmksDesa'])->name('getPmksDesa');
    Route::get('get-pmks-bulan',[PmksController::class,'getPmksBulan'])->name('getPmksBulan');

    Route::get('/editpmks',[PmksController::class, 'editPmks'])->name('editPmks');
    Route::get('/tambahpmks', [PmksController::class, 'tambah'])->name('tambah');

    //update data pmks
    Route::post('/editpmks/update',[PmksController::class, 'update'])->name('update');

    //store data pmks
    Route::post('/tambahpmks/store',[PmksController::class, 'store'])->name('store');

    //lihat data dtks
    Route::get('/dtks', [DtksController::class, 'getViewDTKS'])->name('getViewDTKS');
    Route::get('get-data-dtks',[DtksController::class,'getDataDTKS'])->name('getDataDTKS');
    
    //edit data dtks
    Route::get('/editdtks',[DtksController::class, 'editDtks'])->name('editDtks');

    //lihat data pkh
    Route::get('/pkh',[PkhController::class, 'getViewPKH'])->name('getViewPKH');
    Route::get('get-data-pkh',[PkhController::class,'getDataPKH'])->name('getDataPKH');

    //lihat data bencana
    Route::get('/bencana',[BencanaController::class, 'getViewBencana'])->name('getViewBencana');
    Route::get('get-data-bencana', [BencanaController::class, 'getDataBencana'])->name('getDataBencana');

    //tambh data bencana
    Route::get('/tambahdatabencana', [BencanaController::class, 'tambah'])->name('tambah');

});



