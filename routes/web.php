<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\TemaBakatController;
use App\Http\Controllers\PernyataanController;
use Illuminate\Support\Facades\Redirect;

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
    return Redirect::to('/login');
});

Auth::routes();
Route::get('logout', function () {
    auth()->logout();

    return Redirect::to('/login');
})->name('logout');

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/index', [HomeController::class, 'index'])->name('index');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/index', [HomeController::class, 'indexAdmin'])->name('admin.index');
    });
    Route::prefix('jabatan')->group(function () {
        Route::get('/getJabatan', [JabatanController::class, 'getJabatan'])->name('jabatan.getJabatan');
        Route::get('/index', [jabatanController::class, 'index'])->name('jabatan.index');
        Route::post('/store', [jabatanController::class, 'store'])->name('jabatan.store');
        Route::put('/update/{id}', [jabatanController::class, 'update'])->name('jabatan.update');
        Route::delete('/destroy/{id}', [jabatanController::class, 'destroy'])->name('jabatan.destroy');
        Route::get('/detail/{id}', [jabatanController::class, 'show'])->name('jabatan.detail');
        Route::post('/import', [jabatanController::class, 'import'])->name('jabatan.import');
        Route::get('/export', [jabatanController::class, 'export'])->name('jabatan.export');
    });
    Route::prefix('unit_kerja')->group(function () {
        Route::get('/getUnitKerja', [UnitKerjaController::class, 'getUnitKerja'])->name('unit_kerja.getUnitKerja');
        Route::get('/index', [UnitKerjaController::class, 'index'])->name('unit_kerja.index');
        Route::post('/store', [UnitKerjaController::class, 'store'])->name('unit_kerja.store');
        Route::put('/update/{id}', [UnitKerjaController::class, 'update'])->name('unit_kerja.update');
        Route::delete('/destroy/{id}', [UnitKerjaController::class, 'destroy'])->name('unit_kerja.destroy');
        Route::get('/detail/{id}', [UnitKerjaController::class, 'show'])->name('unit_kerja.detail');
        Route::post('/import', [UnitKerjaController::class, 'import'])->name('unit_kerja.import');
        Route::get('/export', [UnitKerjaController::class, 'export'])->name('unit_kerja.export');
    });
    Route::prefix('pernyataan')->group(function () {
        Route::get('/getPernyataan', [PernyataanController::class, 'getPernyataan'])->name('pernyataan.getPernyataan');
        Route::get('/index', [PernyataanController::class, 'index'])->name('pernyataan.index');
        Route::post('/store', [PernyataanController::class, 'store'])->name('pernyataan.store');
        Route::put('/update/{id}', [PernyataanController::class, 'update'])->name('pernyataan.update');
        Route::delete('/destroy/{id}', [PernyataanController::class, 'destroy'])->name('pernyataan.destroy');
        Route::get('/detail/{id}', [PernyataanController::class, 'show'])->name('pernyataan.detail');
        Route::post('/import', [PernyataanController::class, 'import'])->name('pernyataan.import');
        Route::get('/export', [PernyataanController::class, 'export'])->name('pernyataan.export');
    });
    Route::prefix('tema_bakat')->group(function () {
        Route::get('/getTemaBakat', [TemaBakatController::class, 'getTemaBakat'])->name('tema_bakat.getTemaBakat');
        Route::get('/index', [TemaBakatController::class, 'index'])->name('tema_bakat.index');
        Route::post('/store', [TemaBakatController::class, 'store'])->name('tema_bakat.store');
        Route::put('/update/{id}', [TemaBakatController::class, 'update'])->name('tema_bakat.update');
        Route::delete('/destroy/{id}', [TemaBakatController::class, 'destroy'])->name('tema_bakat.destroy');
        Route::get('/detail/{id}', [TemaBakatController::class, 'show'])->name('tema_bakat.detail');
        Route::post('/import', [TemaBakatController::class, 'import'])->name('tema_bakat.import');
        Route::get('/export', [TemaBakatController::class, 'export'])->name('tema_bakat.export');
    });
    Route::prefix('user')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('user.index');
        Route::get('/getUser', [UserController::class, 'getUser'])->name('user.getUser');
        Route::get('/add', [UserController::class, 'create'])->name('user.add');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update', [UserController::class, 'update'])->name('user.update');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/detail/{id}', [UserController::class, 'show'])->name('user.detail');
        Route::post('/import', [UserController::class, 'import'])->name('user.import');
        Route::get('/export', [UserController::class, 'export'])->name('user.export');
    });
});
