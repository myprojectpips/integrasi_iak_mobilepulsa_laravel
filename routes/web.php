<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\uiController;
use App\Http\Controllers\pulsaController;
use App\Http\Controllers\emoneyController;
use App\Http\Controllers\payController;
use App\Http\Controllers\callbackController;
use App\Http\Controllers\checkStatusController;
use App\Http\Controllers\dataOrderController;

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

// Route UI
Route::controller(uiController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

// Route TopUp Pulsa
Route::controller(pulsaController::class)->group(function () {
    Route::get('/pulsa', 'indexPulsa')->name('index.pulsa');
    Route::post('/pulsa/get-op', 'getOp')->name('pulsa.getOp');
});

Route::controller(emoneyController::class)->group(function () {
    Route::get('/emoney', 'indexEmoney')->name('index.emoney');
    Route::get('/emoney/{type}', 'prosesEmoney')->name('emoney.proses');
    Route::post('/emoney/get', 'emoneyList')->name('emoney.getData');
});

// Route TopUp / Pay
Route::controller(payController::class)->group(function () {
    Route::post('/pulsa/pay', 'pay')->name('pulsa.pay');
});

// Route Callback
Route::controller(callbackController::class)->group(function () {
    Route::post('/mobilepulsa-laravel/callback', 'callback');
});

// Route Check Status
Route::controller(checkStatusController::class)->group(function () {
    Route::get('/check-status', 'indexStatus')->name('index.checkStatus');
    Route::post('/check-status/get-status', 'getStatus')->name('checkStatus.getStatus');
});

Route::controller(dataOrderController::class)->group(function () {
    Route::get('/data-order', 'indexDataOrder')->name('index.dataOrder');
    Route::get('/data-order/delete-all', 'deleteAllDataOrder');
    Route::get('/data-order/delete/{ref_id}', 'deleteDataOrder');
});

Route::get('/debug', function () {
    echo date('G:i:s');
});