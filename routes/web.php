<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgreementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

// For Public Users
Route::get('/', [UserController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerUser'])->name('registerUser');
Route::post('/login', [AuthController::class, 'loginUser'])->name('loginUser');

Route::group(['middleware' => 'auth'], function () {
    // For Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin_index');
    Route::get('/vehicles', [AdminController::class, 'listVehicle'])->name('listVehicle');
    Route::get('/vehicles/{id}', [AdminController::class, 'vehicleDetail'])->name('vehicleDetail');
    Route::get('/vehicle/edit/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('/add', [AdminController::class, 'addVehicle'])->name('addVehicle');
    Route::get('/monitoring', [AdminController::class, 'monitoringData'])->name('monitoringData');
    Route::get('/admin/pools', [AdminController::class, 'listPool'])->name('listPool');
    Route::get('/add/pool', [AdminController::class, 'addPool'])->name('addPool');

    Route::post('/add', [AdminController::class, 'addNewVehicle'])->name('addNewVehicle');
    Route::post('/update/{id}', [AdminController::class, 'updateVehicle'])->name('updateVehicle');
    Route::post('/pool/{id}', [AdminController::class, 'addToPool'])->name('addToPool');
    Route::post('/export', [AdminController::class, 'exportToExcel'])->name('exportToExcel');
    Route::post('/add/pool', [AdminController::class, 'createPool'])->name('createPool');

    // For Agreement Section
    Route::get('/agreement', [AgreementController::class, 'index'])->name('agreement_index');
    Route::get('/agreement/pools', [AgreementController::class, 'pools'])->name('pools');
    Route::get('/pool/{id}', [AgreementController::class, 'viewPool'])->name('viewPool');
    Route::post('/verify/{id}', [AgreementController::class, 'verifyVehicle'])->name('verifyVehicle');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
