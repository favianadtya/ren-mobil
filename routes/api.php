<?php

use App\Http\Controllers\Api\MobilController;
use Illuminate\Support\Facades\Route;

Route::apiResource('mobil', MobilController::class);
