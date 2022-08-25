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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::controller(AdminController::class)->group(function(){
Route::get('/admin-dashboard','getUserList')->name('admin-dashboard');
Route::post('/role','addRole')->name('role');
Route::get('/admin-dashboard','viewRole')->name('admin-dashboard');
Route::post('/set','addSet')->name('set');
Route::get('/admin-dashboard','viewSet')->name('admin-dashboard');
Route::post('/office','addOffice')->name('office');
Route::get('/admin-dashboard','viewOffice')->name('admin-dashboard');
});

require __DIR__.'/auth.php';
