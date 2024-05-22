<?php

use App\Http\Controllers\API\V1\CustomerController;
use Illuminate\Support\Facades\Route;

Route::group([], static function ($router) {
    $router->resource('/customers', CustomerController::class)->except(['update']);
    $router->post('/customers/{customer}', [CustomerController::class, 'update']);
});
