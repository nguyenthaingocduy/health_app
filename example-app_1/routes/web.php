<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserCatalogueController;


use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Controllers\Ajax\LocationController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});


// USERS ROUTES
Route::group(['prefix' => 'user', 'middleware' => AuthenticateMiddleware::class], function () {
    Route::get('index', [UserController::class, 'index'])->name('user.index');
    Route::get('create', [UserController::class, 'create'])->name('user.create');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('{id}/edit', [UserController::class, 'edit'])->where(['id'=>'[0-9]+'])->name('user.edit');
    Route::post('{id}/update', [UserController::class, 'update'])->where(['id'=>'[0-9]+'])->name('user.update');
    Route::get('{id}/delete', [UserController::class, 'delete'])->where(['id'=>'[0-9]+'])->name('user.delete');
    Route::DELETE('{id}/destroy', [UserController::class, 'destroy'])->where(['id'=>'[0-9]+'])->name('user.destroy');
});

// USERS CATALOGUE ROUTES
Route::group(['prefix' => 'user/catalogue', 'middleware' => AuthenticateMiddleware::class], function () {
    Route::get('index', [UserCatalogueController::class, 'index'])->name('user.catalogue.index');
    Route::get('create', [UserCatalogueController::class, 'create'])->name('user.catalogue.create');
    Route::post('store', [UserCatalogueController::class, 'store'])->name('user.catalogue.store');
    Route::get('{id}/edit', [UserCatalogueController::class, 'edit'])->where(['id'=>'[0-9]+'])->name('user.catalogue.edit');
    Route::post('{id}/update', [UserCatalogueController::class, 'update'])->where(['id'=>'[0-9]+'])->name('user.catalogue.update');
    Route::get('{id}/delete', [UserCatalogueController::class, 'delete'])->where(['id'=>'[0-9]+'])->name('user.catalogue.delete');
    Route::DELETE('{id}/destroy', [UserCatalogueController::class, 'destroy'])->where(['id'=>'[0-9]+'])->name('user.catalogue.destroy');
});

// USERS language ROUTES
Route::group(['prefix' => 'language', 'middleware' => AuthenticateMiddleware::class], function () {
    Route::get('index', [LanguageController::class, 'index'])->name('language.index');
    Route::get('create', [LanguageController::class, 'create'])->name('language.create');
    Route::post('store', [LanguageController::class, 'store'])->name('language.store');
    Route::get('{id}/edit', [LanguageController::class, 'edit'])->where(['id'=>'[0-9]+'])->name('language.edit');
    Route::post('{id}/update', [LanguageController::class, 'update'])->where(['id'=>'[0-9]+'])->name('language.update');
    Route::get('{id}/delete', [LanguageController::class, 'delete'])->where(['id'=>'[0-9]+'])->name('language.delete');
    Route::DELETE('{id}/destroy', [LanguageController::class, 'destroy'])->where(['id'=>'[0-9]+'])->name('language.destroy');
});


// BACKEND ROUTES
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(AuthenticateMiddleware::class);


Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware(LoginMiddleware::class);
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

// AJAX ROUTES
Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.index')->middleware(AuthenticateMiddleware::class);
Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashboard.index')->middleware(AuthenticateMiddleware::class);
Route::post('ajax/dashboard/changeStatusAll', [AjaxDashboardController::class, 'changeStatusAll'])->name('ajax.dashboard.index')->middleware(AuthenticateMiddleware::class);


