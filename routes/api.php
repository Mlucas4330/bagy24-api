<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\SellerController;
use App\Http\Controllers\Api\V1\SaleController;

Route::prefix('v1')->group(function () {
    Route::apiResource('sellers', SellerController::class);
    Route::get('/sellers/{seller}/sales', [SellerController::class, 'sellerSales']);
    Route::get('/sellers/{seller}/resend-email', [SellerController::class, 'resendEmail']);
    Route::resource('sales', SaleController::class)->only(['index', 'store']);


    Route::get('/teste', function () {
   
    });
});
