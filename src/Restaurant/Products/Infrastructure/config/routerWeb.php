<?php

use App\Http\Controllers\Product\ProductsGetController;
use Illuminate\Support\Facades\Route;

Route::get('/product/search', [ProductsGetController::class, '__invoke']);
