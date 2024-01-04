<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SentralController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\KunciController;
use App\Http\Controllers\GKunciController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SentralsController;
use App\Http\Controllers\CompanyDataController;


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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
    Route::get('/register', [SesiController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [SesiController::class, 'register']);
});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/engineer', [AdminController::class, 'engineer'])->middleware('userAccess:engineer');
    Route::get('/admin/mitra', [AdminController::class, 'mitra'])->middleware('userAccess:mitra');
    Route::get('/logout', [SesiController::class, 'logout']);

});

Route::prefix('admin/engineer')->group(function () {
    Route::get('/dashboard', [SentralController::class, 'dashboard'])->name('sentrals.dashboard');
    Route::get('/sentrals', [SentralController::class, 'index'])->name('sentrals.index');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/sentrals/create', [SentralController::class, 'create'])->name('sentrals.create_sentral_data');
    Route::post('/sentrals/store', [SentralController::class, 'store'])->name('sentrals.store');
    Route::get('/sentrals/{id}', [SentralController::class, 'show'])->name('sentrals.show');
    Route::delete('/sentrals/{id}', [SentralController::class, 'destroy'])->name('sentrals.destroy');
    Route::get('/sentrals/{id}/edit', [SentralController::class, 'edit'])->name('sentrals.edit');

    Route::get('/company_data', [CompanyDataController::class, 'index'])->name('company_data.index');
    Route::get('/company_data/create', [CompanyDataController::class, 'create'])->name('company_data.create_company_data');
    Route::post('/company_data/store', [CompanyDataController::class, 'store'])->name('company_data.store');
    Route::delete('/company_data/{id}', [CompanyDataController::class, 'destroy'])->name('company.destroy');
    Route::get('/company_data/{id}/edit', [CompanyDataController::class, 'edit'])->name('company.edit_company');

    Route::get('/approve', [EngineerController::class, 'index'])->name('engineers.index');

    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');

    Route::get('/kode', [KunciController::class, 'index'])->name('kode.index');

    Route::get('/gkuncis', [GKunciController::class, 'index'])->name('gkuncis.index');
    Route::get('/gkuncis/create', [GKunciController::class, 'create'])->name('gkuncis.create_gkuncis');
    Route::post('gkuncis/store', [GKunciController::class, 'store'])->name('gkuncis.store');




});

Route::middleware(['auth'])->group(function () {
    // Rute lainnya
    Route::post('/mitras/{mitra}/approve', [EngineerController::class, 'approve'])->name('engineer.approve');
});

Route::get("/dashboard", function () {
    return view("admin.dashboard");
})->name("dashboard");
Route::get("/sentrals", function () {
    return view("admin.engineer.sentrals");
})->name("sentrals");
Route::get("/company_data", function () {
    return view("admin.engineer.company_data");
})->name("company_data");
Route::get("/user_managemen", function () {
    return view("admin.engineer.users");
})->name("users");
Route::get("/approve", function () {
    return view("admin.engineer.approval_order");
})->name("engineers");
Route::get("/transactions", function () {
    return view("admin.engineer.transactions");
})->name("transactions");
Route::get("/kode", function () {
    return view("admin.engineer.kode");
})->name("kode");
Route::get("/gkuncis", function () {
    return view("admin.engineer.gkuncis");
})->name("gkuncis");



Route::prefix('admin/mitra')->group(function () {
    Route::get('/dashboard', [MitraController::class, 'dashboard'])->name('mitras.dashboard');
    Route::get('/mitras', [MitraController::class, 'index'])->name('mitras.index');
    Route::post('/mitras/{id}', [MitraController::class, 'index'])->name('mitras.index');
    Route::get('/mitras/create', [MitraController::class, 'create'])->name('mitras.create');
    Route::post('/mitras/store', [MitraController::class, 'store'])->name('mitras.store');
    Route::get('/mitras/{id}', [MitraController::class, 'show'])->name('mitras.show');
    Route::get('/mitras/{mitra}', [MitraController::class, 'show_mitra'])->name('mitras.show');
    Route::get('/mitras/{id}/edit', [MitraController::class, 'edit'])->name('mitras.edit');
    Route::put('/mitras/{id}', [MitraController::class, 'update'])->name('mitras.update');
    Route::delete('/mitras/{id}', [MitraController::class, 'destroy'])->name('mitras.destroy');
    Route::get('/admin/mitra/mitras', [MitraController::class, 'index'])->name('admin.mitra.mitras');

    Route::post('/mitras/verify-code', [MitraController::class, 'verifyCode'])->name('mitras.verifyCode');

    Route::get('/kuncis/generate-code/{mitra}', [KunciController::class, 'generateCode'])->name('kuncis.generateCode');
    Route::put('/kuncis/update/{kunci}', [KunciController::class, 'update'])->name('kuncis.update');

    Route::get('/sentrals/mitra', [SentralsController::class, 'index_sentral'])->name('sentrals.index_sentral');
    Route::get('/sentrals/{id}', [SentralsController::class, 'show_sentral'])->name('sentrals.show_sentral');
    Route::get('/sentrals/create', [SentralsController::class, 'create_sentral'])->name('sentrals.create_sentral');
    Route::post('/sentrals/store', [SentralsController::class, 'store_sentral'])->name('sentrals.store_sentral');

    

});




Route::get("/mitras", function () {
    return view("admin.mitra.mitras");
})->name("mitras");

Route::resource('mitras', MitraController::class);
