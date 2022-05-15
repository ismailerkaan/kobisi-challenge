<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ObserverController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('log', [\App\Http\Controllers\CallBackController::class, 'index']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/company-package', [CompanyController::class, 'setPackage']);
    Route::get('/check-company-package', [CompanyController::class, 'checkCompanyPackage']);
});
