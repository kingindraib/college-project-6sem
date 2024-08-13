<?php
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\TeamCategoryController;


use App\Http\Controllers\admin\PropertyController;
use App\Http\Controllers\admin\PropertyCategoryController;



/**********************************************
 ----------------------------------------------
 ----------------------------------------------


 ------------------ADMIN ROUTE------------------


 ----------------------------------------------
 ----------------------------------------------
 **********************************************/

 Route::prefix('property-management')->group(function(){
    Route::prefix('category')->controller(PropertyCategoryController::class)->group(function(){
        Route::get('/','index')->name('admin.property.category.index');
        Route::post('/store','store')->name('admin.property.category.store');
        Route::post('/update/{id}','update')->name('admin.property.category.update');
        Route::get('/destroy/{id}','destroy')->name('admin.property.category.delete');
    });

    Route::controller(PropertyController::class)->group(function(){
        Route::get('/', 'index')->name('admin.property.index');
        Route::get('/create', 'create')->name('admin.property.create');
        Route::post('/store', 'store')->name('admin.property.store');
        Route::get('/edit/{id}', 'edit')->name('admin.property.edit');
        Route::post('/update/{id}', 'update')->name('admin.property.update');
        Route::get('/destroy/{id}', 'destroy')->name('admin.property.delete');
    });
 });





   