<?php
use App\Http\Controllers\Api\KunciController;
use App\Http\Controllers\Api\SentralController; // Add this line
use App\Http\Controllers\Api\MitraController;
use App\Http\Controllers\Api\EngineerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);

Route::group(['prefix' => 'api'], function () {
    Route::get('/kunci', [KunciController::class, 'index']);
    Route::get('/kunci/{id}', [KunciController::class, 'show']);
    Route::post('/kunci', [KunciController::class, 'store']);
    Route::put('/kunci/{id}', [KunciController::class, 'update']);
    Route::delete('/kunci/{id}', [KunciController::class, 'destroy']);

    Route::get('/sentrals', [SentralController::class, 'index']);
    Route::get('/sentrals/{id}', [SentralController::class, 'show']);
    Route::post('/sentrals', [SentralController::class, 'store']);
    Route::put('/sentrals/{id}', [SentralController::class, 'update']);
    Route::delete('/sentrals/{id}', [SentralController::class, 'destroy']);

    Route::get('/mitras', [MitraController::class, 'index']);
    Route::get('/mitras/{id}', [MitraController::class, 'show']);
    Route::post('/mitras', [MitraController::class, 'store']);
    Route::put('/mitras/{id}', [MitraController::class, 'update']);
    Route::delete('/mitras/{id}', [MitraController::class, 'destroy']);

    Route::get('/engineers', [EngineerController::class, 'index']);
    Route::get('/engineers/{id}', [EngineerController::class, 'show']);
    Route::post('/engineers', [EngineerController::class, 'store']);
    Route::put('/engineers/{id}', [EngineerController::class, 'update']);
    Route::delete('/engineers/{id}', [EngineerController::class, 'destroy']);
});
Route::prefix('kuncis')->group(function () {
    Route::get('/', [KunciController::class, 'index'])->name('kuncis.index');
    Route::post('/', [KunciController::class, 'store'])->name('kuncis.store');
});

