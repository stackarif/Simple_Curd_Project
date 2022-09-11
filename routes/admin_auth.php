<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\{
    
    AuthenticatedSessionController,
    RegisteredUserController,
};
use App\Http\Controllers\IsAdminController;

Route::prefix('admin')->name('admin.')->group(function () {
 
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest:admin')
    ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest:admin');

    Route::get('/isadmin',[IsAdminController::class, 'index'])
    ->middleware('guest:admin')
    ->name('isadmin');

    Route::post('/isadmin',[IsAdminController::class, 'store'])
    ->middleware('guest:admin');


   Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:admin')
    ->name('logout'); 
    
    Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest:admin')
    ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest:admin');
});
