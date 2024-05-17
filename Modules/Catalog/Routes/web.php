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
use Modules\Catalog\Http\Controllers\CatalogController;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    /**
     * Service CRUD
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('catalog', CatalogController::class);
        
        Route::get('catalog/trashed/view', [CatalogController::class, 'trashed'])->name('catalog.trashed');
        Route::delete('catalog/trashed/destroy/{id}', [CatalogController::class, 'destroyTrash'])->name('catalog.trashed.destroy');
        Route::put('catalog/trashed/revert/{id}', [CatalogController::class, 'revertFromTrash'])->name('catalog.trashed.revert');
    });
});
