<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\HomeController as AdminHomeController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ImageGalleryController;
use App\Http\Controllers\Backend\SettingController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//************************** ADMIN CATEGORY ROUTES **********************************

Route::prefix('Admin')->middleware('auth')->group(function (){
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.index');
    Route::prefix('/category')->group(function (){
        Route::get   ('/',       [CategoryController::class, 'index'])  ->name('backend.category.index');
        Route::get   ('/create', [CategoryController::class, 'create']) ->name('backend.category.create');
        Route::post  ('/store',  [CategoryController::class, 'store'])  ->name('backend.category.store');
        Route::get   ('/edit',   [CategoryController::class, 'edit'])   ->name('backend.category.edit');
        Route::post  ('/update', [CategoryController::class, 'update']) ->name('backend.category.update');
        Route::delete('/delete', [CategoryController::class, 'destroy'])->name('backend.category.delete');
    });
//************************** ADMIN PRODUCT ROUTES **********************************

    Route::prefix('/product')->group(function (){
        Route::get   ('/',            [ProductController::class, 'index']) ->name('backend.product.index');
        Route::get   ('/create',      [ProductController::class, 'create'])->name('backend.product.create');
        Route::post  ('/store',       [ProductController::class, 'store']) ->name('backend.product.store');
        Route::get   ('/edit/{id}',   [ProductController::class, 'edit'])  ->name('backend.product.edit');
        Route::post  ('/update/{id}', [ProductController::class, 'update'])->name('backend.product.update');
        Route::delete('/delete',      [ProductController::class, 'delete'])->name('backend.product.delete');
    });

//************************** ADMIN IMAGE GALLERY ROUTES **********************************

    Route::prefix('/images')->group(function (){
        Route::get   ('/{pid}',             [ImageGalleryController::class, 'index']) ->name('backend.images.index');
        Route::get   ('/create/{pid}', [ImageGalleryController::class, 'create'])->name('backend.images.create');
        Route::post  ('/store/{pid}',  [ImageGalleryController::class, 'store']) ->name('backend.images.store');
      //Route::get   ('/edit/{pid}',   [ImageGalleryController::class, 'edit'])  ->name('backend.images.edit');
        Route::post  ('/update/{pid}/{id}', [ImageGalleryController::class, 'update'])->name('backend.images.update');
        Route::delete('/delete/{pid}/{id}', [ImageGalleryController::class, 'delete'])->name('backend.images.delete');

    });


 //************************** ADMIN SETTING ROUTES **********************************
        Route::get('setting',         [SettingController::class, 'index'])->name('backend.setting.index');
        Route::post('setting/update', [SettingController::class, 'update'])->name('backend.setting.update');


});




Route::get('/index', [HomeController::class, 'index'])->name('frontend.index');
