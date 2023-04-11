<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('landing');
});

// Routes group for auth middleware
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Routes group for admin
    Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('offices', App\Http\Controllers\Admin\OfficeController::class)->only(['index', 'edit', 'update', 'store', 'create', 'destroy']);
        Route::resource('roles', App\Http\Controllers\Admin\RoleController::class)->only(['index','create','store']);
        Route::resource('sets', App\Http\Controllers\Admin\SetController::class)->only(['index', 'store', 'create']);
        Route::resource('office_types', App\Http\Controllers\Admin\OfficeTypeController::class)->only(['index', 'store', 'create']);
        Route::resource('users', App\Http\Controllers\Admin\UserController::class)->only(['index', 'edit', 'update']);
        Route::resource('rtns', App\Http\Controllers\Admin\RtnController::class)->only(['index', 'edit', 'update', 'store', 'create']);
    });

    Route::group(['middleware' => ['role:Editor,Verified']], function(){
        Route::resource('mos', App\Http\Controllers\MoController::class)->only(['index', 'store', 'create', 'edit', 'update']);
        Route::resource('aadhaars', App\Http\Controllers\AadhaarController::class)->only(['index', 'store', 'create', 'edit', 'update']);
    });

    Route::group(['middleware' => ['role:admin']], function(){
        Route::resource('rankings', App\Http\Controllers\RankingController::class)->only(['store', 'create', 'edit']);
    });
    Route::get('/rankings', [App\Http\Controllers\RankingController::class, 'index'])->name('rankings.index');
    Route::put('/rankings/{service}', [App\Http\Controllers\RankingController::class, 'update'])->name('rankings.update');

    Route::group(['middleware' => ['role:Byod,Admin']], function(){
        Route::resource('byods', App\Http\Controllers\ByodController::class)->only(['index', 'store', 'create', 'edit', 'update']);
    });
});



require __DIR__ . '/auth.php';
