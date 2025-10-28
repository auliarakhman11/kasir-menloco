<?php


use App\Http\Controllers\AuthController;

use App\Http\Controllers\KasirController;

use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::middleware('auth')->group(function(){
//     Route::get('/',[SosmedController::class,'admin'])->name('admin');
// Route::post('export-youtube',[SosmedController::class,'exportYoutube'])->name('exportYoutube');
// Route::post('export-instagram',[SosmedController::class,'exportInstagram'])->name('exportInstagram');

// Route::get('/logout',[AuthController::class,'logout'])->name('logout');
// });

Route::middleware('auth')->group(function () {

    Route::get('/', [KasirController::class, 'index'])->name('kasir');

    //kasir
    // Route::get('kasir', [KasirController::class, 'index'])->name('kasir');
    Route::get('getInput', [KasirController::class, 'getInput'])->name('getInput');
    Route::post('addPelanggan', [KasirController::class, 'addPelanggan'])->name('addPelanggan');
    Route::get('getAntrian', [KasirController::class, 'getAntrian'])->name('getAntrian');
    Route::get('getSelesai', [KasirController::class, 'getSelesai'])->name('getSelesai');
    Route::get('deletePelanggan/{id}', [KasirController::class, 'deletePelanggan'])->name('deletePelanggan');
    Route::get('getTambahPesanan', [KasirController::class, 'getTambahPesanan'])->name('getTambahPesanan');
    Route::post('checkout', [KasirController::class, 'checkout'])->name('checkout');
    Route::get('getDeatailPesanan/{invoice_id}', [KasirController::class, 'getDeatailPesanan'])->name('getDeatailPesanan');
    Route::get('printNota', [KasirController::class, 'printNota'])->name('printNota');
    Route::post('refundInvoice', [KasirController::class, 'refundInvoice'])->name('refundInvoice');
    //end kasir




    //block
    Route::get('forbidden-access', [AuthController::class, 'block'])->name('block');
    //endblock
    Route::get('ganti-password', [UserController::class, 'gantiPassword'])->name('gantiPassword');
    Route::post('edit-password', [UserController::class, 'editPassword'])->name('editPassword');



    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('non-active', [AuthController::class, 'nonActive'])->name('nonActive');
});




Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login_page'])->name('loginPage');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});
