<?php

use App\Http\Controllers\Admins\notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Fabrics\modelcontroller;
use App\Http\Controllers\Fabrics\Fabrics;
use App\Http\Controllers\Fabrics\Fabrics_Invoices;
use App\Http\Controllers\InvoiceController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("get_date_for_cash_fabrics_recite",[Fabrics_Invoices::class,"get_date_for_cash_fabrics_recite"]);
Route::get('/models/{code}', [ModelController::class, 'getByCode']);
Route::get('/fetch-all-data', [InvoiceController::class, 'fetchAllData']);

Route::post("markAllAsRead",[notifications::class,"Mark_All_As_Read"])->name("Mark_All_As_Read");