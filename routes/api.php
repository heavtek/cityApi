<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

Route::get('cities', [CityController::class, 'getAllCites']);
Route::get('cities/{id}', [CityController::class, 'getCityById']);
Route::post('cities', [CityController::class, 'store']);
Route::put('cities/{id}', [CityController::class, 'update']);
Route::delete('cities/{id}', [CityController::class, 'deleteCity']);
