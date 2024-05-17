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
use Modules\Faq\Http\Controllers\FaqController;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    /**
     * 
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('faq', FaqController::class);
        Route::get('faq/trashed/view', [FaqController::class, 'trashed'])->name('faq.trashed');
        Route::delete('faq/trashed/destroy/{id}', [FaqController::class, 'destroyTrash'])->name('faq.trashed.destroy');
        Route::put('faq/trashed/revert/{id}', [FaqController::class, 'revertFromTrash'])->name('faq.trashed.revert');
    });
});
