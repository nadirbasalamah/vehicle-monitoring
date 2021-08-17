<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgreementController;
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
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerUser'])->name('registerUser');
Route::post('/login', [UserController::class, 'loginUser'])->name('loginUser');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// For Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin_index');
Route::get('/vehicles', [AdminController::class, 'listVehicle'])->name('listVehicle');
Route::get('/vehicles/{id}', [AdminController::class, 'vehicleDetail'])->name('vehicleDetail');
Route::get('/add', [AdminController::class, 'addVehicle'])->name('addVehicle');
Route::get('/monitoring', [AdminController::class, 'monitoringData'])->name('monitoringData');
Route::get('/admin/pools', [AdminController::class, 'listPool'])->name('listPool');
Route::post('/add', [AdminController::class, 'addNewVehicle'])->name('addNewVehicle');

// update and delete is optional
Route::post('/update/{id}', [AdminController::class, 'updateVehicle'])->name('updateVehicle');
Route::post('/delete/{id}', [AdminController::class, 'deleteVehicle'])->name('deleteVehicle');

Route::post('/pool/{id}', [AdminController::class, 'addToPool'])->name('addToPool');
Route::post('/export', [AdminController::class, 'exportToExcel'])->name('exportToExcel');

// For Agreement Section
Route::get('/agreement', [AgreementController::class, 'index'])->name('agreement_index');
Route::get('/agreement/pools', [AgreementController::class, 'pools'])->name('pools');
Route::get('/pool/{id}', [AgreementController::class, 'viewPool'])->name('viewPool');
Route::post('/verify/{id}', [AgreementController::class, 'verifyVehicle'])->name('verifyVehicle');
