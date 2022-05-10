<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
    return view('auth/login');
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
    Route::prefix('test')->group(function () {
        Route::get('/test', [HomeController::class, 'test'])->name('test.index');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/index', [HomeController::class, 'indexAdmin'])->name('admin.index');
    });
    Route::prefix('user')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('user.index');
    });
});
