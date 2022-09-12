<?php

use App\Http\Controllers\Admin\Api\ApiController;
use App\Http\Controllers\IsAdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('admin/isadmin',[IsAdminController::class, 'index'])->name('admin.isadmin');
// Route::post('admin/isadmin',[IsAdminController::class, 'store']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/test',[ApiController::class,'section']);


require __DIR__ . '/auth.php';
require __DIR__ . '/admin_auth.php';
