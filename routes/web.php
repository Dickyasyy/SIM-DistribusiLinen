<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\LinenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ApproveLinenController;
use App\Http\Controllers\InputLinenBersihController;
use App\Http\Controllers\InputLinenKotorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){
    // Dashboard Menu
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::get('/units/create', [DashboardController::class,'create'])->name('unit.create');
    Route::post('/units/store', [DashboardController::class, 'store'])->name('unit.store');
    Route::get('/units/cari', [DashboardController::class, 'showUnit'])->name('unit.show');
    Route::get('/dashboard/cari', [DashboardController::class, 'showOrder'])->name('detail.order.show');
    Route::get('/dashboard/input-masuk-detail', [DashboardController::class,'DetailOrder'])->name('detail.linen.masuk');
    Route::get('/dashboard/input-keluar-detail', [DashboardController::class,'DetailApprove'])->name('detail.linen.keluar');
    Route::get('/dashboard/detail', [DashboardController::class,'detail_unit'])->name('detail.unit');

    // Ruangan Input Linen Kotor
    Route::get('/input-linen-masuk/create', [InputLinenKotorController::class, 'create'])->name('input.linenMasuk.create');
    Route::post('/input-linen-masuk', [InputLinenKotorController::class, 'store'])->name('input.linenMasuk.store');
    Route::get('linen-masuk/{no_pinta}/pdf', [InputLinenKotorController::class, 'generatePDF'])->name('input.inputMasuk.generatePDF');


    // // Ruangan Approve Linen
    Route::get('/approve-linen', [ApproveLinenController::class, 'index'])->name('approve.index');
    Route::get('/approve/edit/{no_pinta}', [ApproveLinenController::class, 'edit'])->name('approve.edit');
    Route::put('/approve/update/{no_pinta}', [ApproveLinenController::class, 'update'])->name('approve.update');

    // List Linen Menu
    Route::get('/listlinen', [LinenController::class,'index'])->name('list.linen');
    Route::get('/listlinen/cari', [LinenController::class, 'show'])->name('list.show');
    Route::get('/listlinen/create', [LinenController::class,'create'])->name('list.create');
    Route::post('/listlinen', [LinenController::class,'store'])->name('list.store');
    Route::get('/listlinen/{kode_linen}/edit', [LinenController::class,'edit'])->name('list.edit');
    Route::put('/listlinen/{kode_linen}', [LinenController::class,'update'])->name('list.update');
    Route::delete('/listlinen/{kode_linen}', [LinenController::class,'destroy'])->name('list.destroy');
});

Auth::routes();
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
