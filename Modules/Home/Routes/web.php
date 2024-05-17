<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Modules\Home\Http\Controllers\HomeController;

   

        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
       
            Route::group(['prefix' => ''], function () {
                Route::resource('banner', HomeController::class);
                Route::get('banner/trashed/view', [HomeController::class, 'trashed'])->name('banner.trashed');
                Route::delete('banner/trashed/destroy/{id}', [HomeController::class, 'destroyTrash'])->name('banner.trashed.destroy');
                Route::put('banner/trashed/revert/{id}', [HomeController::class, 'revertFromTrash'])->name('banner.trashed.revert');
            });
        });
    