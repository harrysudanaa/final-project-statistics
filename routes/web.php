<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataTunggalController;
use App\Http\Controllers\Admin\DeskripsiDataController;
use App\Http\Controllers\Admin\FrekuensiDataController;
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

Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
Route::group(['prefix' => 'admin'], function () {

    Route::prefix('data_tunggal')->group(function () {
        Route::get('/', [DataTunggalController::class, 'index'])->name('admin.data_tunggal.index');

        Route::middleware(['auth', 'verified'])->group(function () {
            Route::post('/store', [DataTunggalController::class, 'store'])->name('admin.data_tunggal.store');
            Route::get('/create', [DataTunggalController::class, 'create'])->name('admin.data_tunggal.create');
            Route::put('/{id}', [DataTunggalController::class, 'update'])->name('admin.data_tunggal.update');
            Route::delete('/{id}', [DataTunggalController::class, 'destroy'])->name('admin.data_tunggal.destroy');
            Route::get('/{id}/edit', [DataTunggalController::class, 'edit'])->name('admin.data_tunggal.edit');
            Route::get('/export', [DataTunggalController::class, 'export'])->name('admin.data_tunggal.export');
            Route::post('/import', [DataTunggalController::class, 'import'])->name('admin.data_tunggal.import');
        });
    });

    Route::get('/deskripsi_data', [DeskripsiDataController::class, 'index'])->name('admin.deskripsi_data.index');
    Route::get('/frequency_data', [FrekuensiDataController::class, 'index'])->name('admin.frekuensi_data.index');
});

require __DIR__ . '/auth.php';
