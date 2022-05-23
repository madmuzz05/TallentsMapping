<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\UnitKerjaController;
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
    });
    Route::prefix('unit_kerja')->group(function () {
        Route::get('/getUnitKerja', [UnitKerjaController::class, 'getUnitKerja'])->name('unit_kerja.getUnitKerja');
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

    });
});
