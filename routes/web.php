<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('auth.login');
});

// Routes group for auth middleware
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Routes group for admin
    Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('offices', App\Http\Controllers\Admin\OfficeController::class)->only(['index', 'edit', 'update', 'store', 'create', 'destroy']);
        Route::resource('roles', App\Http\Controllers\Admin\RoleController::class)->only(['index','create','store']);
        Route::resource('sets', App\Http\Controllers\Admin\SetController::class)->only(['index', 'store', 'create']);
        // Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    });
});



require __DIR__ . '/auth.php';
