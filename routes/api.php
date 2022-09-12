<?php

use App\Http\Controllers\Admin\Api\ApiController;
use App\Http\Controllers\Admin\Api\MainsectionApiController;
use App\Http\Controllers\Admin\Api\SectionApiController;
use App\Http\Controllers\Admin\Api\SubsectionApiController;
use App\Http\Controllers\ApicategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/test',[ApiController::class,'section']);

Route::get('/main-section/{slug?}', [MainsectionApiController::class, 'main_section'])->name('main-section');
Route::get('/section/{slug?}', [SectionApiController::class, 'section'])->name('section');
Route::get('/sub-section/{slug?}', [SubsectionApiController::class, 'sub_section'])->name('sub-section');
