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

use Modules\Booking\Http\Controllers\BillingInformationController;
use Modules\Booking\Http\Controllers\BookingRequestController;
use Modules\ThemeBusiness\Http\Controllers\ContactsController;
use Modules\ThemeBusiness\Http\Controllers\FrontPagesController;
use Modules\ThemeBusiness\Http\Controllers\ServicePagesController;
use Modules\ThemeBusiness\Http\Controllers\CatalogController;
use Modules\ThemeBusiness\Http\Controllers\OrderController;
use Modules\ThemeBusiness\Http\Controllers\FaqsMessagesController;
use Modules\ThemeBusiness\Http\Controllers\FaqController;

Route::group(['prefix' => '/', 'as' => 'spc.'], function () { // @todo - Change prefix route name 'as' => 'spc.'
    Route::get('/', [FrontPagesController::class, 'index'])->name('index');

    Route::get('/fetch-menu-items', [FrontPagesController::class, 'fetchMenuItems'])->name('menu.fetch');
    Route::get('/{category}/{slug}', [FrontPagesController::class, 'getPageBySlug'])->name('page.show');
    Route::get('/search-content', [FrontPagesController::class, 'search_content'])->name('page.search');
    Route::get('/contact-us', [ContactsController::class, 'index'])->name('contact');
    Route::post('/contact-us', [ContactsController::class, 'store'])->name('contact.store');
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
    Route::post('/order', [OrderController::class, 'store'])->name('order');
    Route::get('/faqs', [FrontPagesController::class, 'faq'])->name('faq');
    Route::post('/faqsMessages', [FaqsMessagesController::class, 'store'])->name('faqMessage');


    Route::get('/products', function () {
        return view('themebusiness::frontend.pages.products');
    })->name('products');
    Route::get('/product-detail', function () {
        return view('themebusiness::frontend.pages.product-detail');
    })->name('product-detail');    

    Route::get('/search-result', function () {
        return view('themebusiness::frontend.pages.search-result');
    })->name('search-result');

    Route::get('/xaxis-rod-end-ball-joints', function () {
        return view('themebusiness::frontend.pages.xaxis-rod-end-ball-joints');
    })->name('xaxis-rod-end-ball-joints');

    Route::get('/truck-axle-shims', function () {
        return view('themebusiness::frontend.pages.truck-axle-shims');
    })->name('truck-axle-shims');
    
    // Route::get('/catalog', function () {
    // return view('themebusiness::frontend.pages.catalog');
    // })->name('catalog');
    
    // Route::get('/faqs', function () {
    //     return view('themebusiness::frontend.pages.faq');
    //     })->name('faqs');
});
