<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
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
Route::post('admin/register', [AdminController::class, 'store']);
Route::post('admin/auth', [AdminController::class, 'authenticate']);
Route::get('admins', [AdminController::class, 'index']);

Route::post('client', [ClientController::class, 'store']);
Route::post('client/auth', [ClientController::class, 'authenticate']);
Route::get('clients', [ClientController::class, 'index']);

Route::post('product', [ProductController::class, 'store']);
Route::get('products', [ProductController::class, 'index']);


Route::post('application/store', [ApplicationController::class, 'store']);
Route::get('applications', [ApplicationController::class, 'index']);
Route::post('application/accept', [ApplicationController::class, 'UpdateAccept']);
Route::post('application/reject', [ApplicationController::class, 'UpdateReject']);
Route::get('accepted', [ApplicationController::class, 'returnAccepted']);
Route::get('rejected', [ApplicationController::class, 'returnRejected']);
Route::get('pending', [ApplicationController::class, 'returnPending']);

Route::post('vacancy/store', [VacancyController::class, 'store']);
Route::get('vacancies', [VacancyController::class, 'index']);



