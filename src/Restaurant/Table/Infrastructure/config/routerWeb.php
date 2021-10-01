<?php

use App\Http\Controllers\Table\TablesGetController;
use Illuminate\Support\Facades\Route;

Route::get('/table/search', [TablesGetController::class, '__invoke']);
