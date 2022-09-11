<?php

use App\Http\Controllers\Admin\Api\ApiController;
use App\Http\Controllers\ApicategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test',[ApiController::class,'section']);
Route::get('/category',[ApicategoryController::class,'index']);
