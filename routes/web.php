<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\PatientAdminController;
use App\Http\Controllers\DoctorAdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LandingpageController::class, 'index']);
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('login/admin', [LoginController::class, 'adminLogin']);
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('useradmin', UserAdminController::class);
    Route::resource('patientadmin', PatientAdminController::class);
    Route::resource('doctoradmin', DoctorAdminController::class);
});
