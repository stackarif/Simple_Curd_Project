<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PeopleController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')
    ->middleware(['auth:admin']);

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/all', [CategoryController::class, 'all'])->name('all');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('show');
        Route::post('category', [CategoryController::class, 'store'])->name('store');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
        Route::post('/update/{category}', [CategoryController::class, 'update'])->name('update');
    });

     # Sub category

     Route::prefix('sub-cat')->name('sub-cat.')->group(function () {
         Route::get('/',[SubCategoryController::class,'index'])->name('index');
         Route::post('/store',[SubCategoryController::class,'store'])->name('store'); //API
         Route::get('/all',[SubCategoryController::class,'getAllSubCat'])->name('all');
         Route::get('/{id}',[SubCategoryController::class,'view'])->name('view');
         Route::delete('/{category}', [SubCategoryController::class, 'destroy'])->name('destroy');
         Route::post('/update/{id}', [SubCategoryController::class, 'update'])->name('update');



    });

    Route::prefix('people')->name('people.')->group(function () {
        Route::get('/',[PeopleController::class,'index'])->name('index');
        Route::post('/store',[PeopleController::class, 'store'])->name('store');
        Route::get('/create',[PeopleController::class, 'create'])->name('create');
        Route::get('/view/{slug}', [PeopleController::class, 'view'])->name('view');
        Route::get('/delete/{slug}', [PeopleController::class, 'delete'])->name('delete');
        Route::get('/edit/{product}', [PeopleController::class, 'edit'])->name('edit');
        Route::get('/categories/{id}', [PeopleController::class, 'categories'])->name('categories');
        Route::post('update/{product}', [PeopleController::class, 'update'])->name('update');

    });

});
