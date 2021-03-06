<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Support\Jsonable;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\TemaBakatController;
use App\Http\Controllers\PernyataanController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\JobFamilyController;
use App\Http\Controllers\ParameterPenilaianController;
use App\Models\Pernyataan;
use App\Models\Simulasi;
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
Route::post('/storeAdmin', [UserController::class, 'storeAdmin'])->name('user.storeAdmin');
Auth::routes();
Route::get('logout', function () {
    auth()->logout();
    request()->session()->invalidate();

    request()->session()->regenerateToken();
    return Redirect::to('/login');
})->name('logout');
Route::get('register', function () {
    return view('auth/register');
})->name('register');

Route::get('/getUserLogin', [UserController::class, 'getUserLogin'])->name('user.getUserLogin');
Route::get('/editProfil', [UserController::class, 'editProfil'])->name('user.editProfil');
Route::post('/updateProfil', [UserController::class, 'updateProfil'])->name('user.updateProfil');
Route::post('/job_family/getJobFamilySelect2', [JobFamilyController::class, 'getJobFamilySelect2'])->name('job_family.getJobFamilySelect2');
Route::post('/tema_bakat/getTemaBakatSelect2', [TemaBakatController::class, 'getTemaBakatSelect2'])->name('tema_bakat.getTemaBakatSelect2');
Route::post('/unit_kerja/getUnitKerjaSelect2', [UnitKerjaController::class, 'getUnitKerjaSelect2'])->name('unit_kerja.getUnitKerjaSelect2');

Route::middleware(['auth', 'user-access:User'])->group(function () {
    Route::get('/index', [HomeController::class, 'index'])->name('index');
    Route::prefix('simulasi')->group(function () {
        Route::get('/index', [SimulasiController::class, 'index'])->name('simulasi.index');
        Route::post('/store', [SimulasiController::class, 'store'])->name('simulasi.store');
        Route::get('/end', [SimulasiController::class, 'end'])->name('simulasi.end');
        Route::get('/show', [SimulasiController::class, 'show'])->name('simulasi.show');
    });
});

Route::middleware(['auth', 'user-access:Admin'])->group(function () {
    Route::prefix('parameter')->group(function () {
        Route::get('/index', [ParameterPenilaianController::class, 'index'])->name('parameter.index');
        Route::get('/getParameter', [ParameterPenilaianController::class, 'getParameter'])->name('parameter.getParameter');
        Route::get('/export', [ParameterPenilaianController::class, 'export'])->name('parameter.export');
        Route::post('/store', [ParameterPenilaianController::class, 'store'])->name('parameter.store');
        Route::get('/show/{id}', [ParameterPenilaianController::class, 'show'])->name('parameter.show');
        Route::get('/edit/{id}', [ParameterPenilaianController::class, 'edit'])->name('parameter.edit');
        Route::post('/update', [ParameterPenilaianController::class, 'update'])->name('parameter.update');
        Route::post('/destroy/{id}', [ParameterPenilaianController::class, 'destroy'])->name('parameter.destroy');
    });
    Route::prefix('job_family')->group(function () {
        Route::get('/getJobFamily', [JobFamilyController::class, 'getJobFamily'])->name('job_family.getJobFamily');
        Route::GET('/detail/{id}', [JobFamilyController::class, 'show'])->name('job_family.detail');
        Route::get('/index', [JobFamilyController::class, 'index'])->name('job_family.index');
        Route::post('/store', [JobFamilyController::class, 'store'])->name('job_family.store');
        Route::put('/update/{id}', [JobFamilyController::class, 'update'])->name('job_family.update');
        Route::delete('/destroy/{id}', [JobFamilyController::class, 'destroy'])->name('job_family.destroy');
        Route::post('/import', [JobFamilyController::class, 'import'])->name('job_family.import');
        Route::get('/export', [JobFamilyController::class, 'export'])->name('job_family.export');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/index', [HomeController::class, 'indexAdmin'])->name('admin.index');
    });
    Route::prefix('hasil')->group(function () {
        Route::get('/index', [HasilController::class, 'index'])->name('hasil.index');
        Route::get('/getHasil', [HasilController::class, 'getHasil'])->name('hasil.getHasil');
        Route::get('/pegawai', [HasilController::class, 'hasil_pegawai'])->name('hasil.pegawai');
        Route::get('/job_family', [HasilController::class, 'hasil_job_family'])->name('hasil.job_family');
        Route::get('/show/pegawai/{id}', [HasilController::class, 'show_pegawai'])->name('hasil.show.pegawai');
        Route::get('/show/job_family/{id}', [HasilController::class, 'show_job_family'])->name('hasil.show.job_family');
        Route::delete('/destroy/pegawai/{id}', [HasilController::class, 'destroy_pegawai'])->name('hasil.destroy.pegawai');
        Route::delete('/destroy/job_family/{id}', [HasilController::class, 'destroy_job_family'])->name('hasil.destroy.job_family');
    });
    Route::prefix('jabatan')->group(function () {
        Route::get('/getJabatan', [JabatanController::class, 'getJabatan'])->name('jabatan.getJabatan');
        Route::post('/getJabatanSelect2', [JabatanController::class, 'getJabatanSelect2'])->name('jabatan.getJabatanSelect2');
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
        Route::get('/edit/{id}', [PernyataanController::class, 'edit'])->name('pernyataan.edit');
        Route::post('/update', [PernyataanController::class, 'update'])->name('pernyataan.update');
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
