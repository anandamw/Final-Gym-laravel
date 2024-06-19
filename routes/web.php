<?php

use App\Http\Controllers\AksesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\RekapitulasiPaketController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UsersController;
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



Route::middleware(['guest'])->group(function () {
    Route::get('/', [UsersController::class, 'guest']);
    Route::get('/login', [SessionController::class, 'index'])->name('login');
    Route::post('/login', [SessionController::class, 'login']);

    Route::get('/register', [SessionController::class, 'register']);
    Route::post('/register', [SessionController::class, 'register_action']);
});



Route::get('/home', function () {
    $sesi = auth()->user()->role;

    return redirect('/dashboard/' . $sesi);
});
Route::middleware(['auth'])->group(function () {

    Route::middleware(['userAkses:customer'])->group(function () {
        // page customer
        Route::get('/page', [UsersController::class, 'customer']);
    });
    Route::middleware(['userAkses:admin'])->group(function () {
        // dashboard admin

        Route::get('/dashboard/admin/', [DashboardController::class, 'admin']);
        // akses
        Route::get('/akses', [UsersController::class, 'index']);
        Route::get('/akses/create', [UsersController::class, 'create']);
        Route::post('/akses/create', [UsersController::class, 'create_action']);
        Route::get('/akses/{id}/update', [UsersController::class, 'update']);
        Route::post('/akses/{id}/update', [UsersController::class, 'update_action']);
        Route::get('/akses/{id}/delete', [UsersController::class, 'delete']);


        // paket 
        Route::get('/paket', [PaketController::class, 'index']);
        Route::get('/paket/create', [PaketController::class, 'create']);
        Route::post('/paket/create', [PaketController::class, 'create_action']);
        Route::get('/paket/{id}/update', [PaketController::class, 'update']);
        Route::post('/paket/{id}/update', [PaketController::class, 'update_action']);
        Route::get('/paket/{id}/delete', [PaketController::class, 'delete']);


        Route::get('scanner', function () {
            return view('scanner');
        });

        Route::post('/scanner/store', [RekapitulasiPaketController::class, 'store'])->name('store');
    });

    Route::middleware(['userAkses:karyawan'])->group(function () {
        // dashboard karyawan
        Route::get('/dashboard/karyawan', [DashboardController::class, 'karyawan']);
    });
    // customer
    Route::get('/customer', [CustomerController::class, 'index']);
    Route::get('/customer/create', [CustomerController::class, 'create']);
    Route::post('/customer/create', [CustomerController::class, 'create_action']);
    Route::get('/customer/{id}/update', [CustomerController::class, 'update']);
    Route::post('/customer/{id}/update', [CustomerController::class, 'update_action']);
    Route::get('/customer/{id}/delete', [CustomerController::class, 'delete']);


    Route::get('/logout', [SessionController::class, 'logout']);
    Route::get('/dashboard', function () {
        return view('admin.session_dashboard');
    });

    // rekapitulasi 
    Route::get('/rekapitulasi-paket', [RekapitulasiPaketController::class, 'index']);
    Route::get('/rekapitulasi-paket/create', [RekapitulasiPaketController::class, 'create']);
    Route::post('/rekapitulasi-paket/create', [RekapitulasiPaketController::class, 'create_action']);
    Route::get('/rekapitulasi-paket/{id}/update', [RekapitulasiPaketController::class, 'update']);
    Route::post('/rekapitulasi-paket/{id}/update', [RekapitulasiPaketController::class, 'update_action']);
    Route::get('/rekapitulasi-paket/{id}/delete', [RekapitulasiPaketController::class, 'delete']);
});
