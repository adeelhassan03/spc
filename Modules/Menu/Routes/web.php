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
use Modules\Menu\Http\Controllers\MenuController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    /**
     * Menu CRUD 
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('menu', MenuController::class);
        Route::get('menu/trashed/view', [MenuController::class, 'trashed'])->name('menu.trashed');
        Route::delete('menu/trashed/destroy/{id}', [MenuController::class, 'destroyTrash'])->name('menu.trashed.destroy');
        Route::put('menu/trashed/revert/{id}', [MenuController::class, 'revertFromTrash'])->name('menu.trashed.revert');
    });
});



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

