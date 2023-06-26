<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainCategoryController;
use Illuminate\Support\Facades\Route;

define('PAGINATION_COUNT',10);
//Route just to Admin Auth who login successfully
Route::group(['namespace'=>'Admin','middleware'=>'auth:admin'],function(){
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');

    //Languages Route----------------------------------------

    Route::group(['prefix'=>'languages'],function(){
        Route::get('/',[LanguageController::class,'index'])->name('admin.langauge');
        Route::get('create',[LanguageController::class,'create'])->name('admin.langauge.create');
        Route::post('store',[LanguageController::class,'store'])->name('admin.langauge.store');
        Route::get('edit/{id}',[LanguageController::class,'edit'])->name('admin.langauge.edit');
        Route::post('update/{id}',[LanguageController::class,'update'])->name('admin.langauge.update');
        Route::get('delete/{id}',[LanguageController::class,'delete'])->name('admin.langauge.delete');


    });
    //End Language Route ------------------------------------


    //start MainCategory Route--------------------------------
    Route::group(['prefix'=>'maincategory'],function(){
        Route::get('/',[MainCategoryController::class,'index'])->name('admin.maincategory');
        Route::get('create',[MainCategoryController::class,'create'])->name('admin.maincategory.create');
        Route::post('store',[MainCategoryController::class,'store'])->name('admin.maincategory.store');
        Route::get('edit/{id}',[MainCategoryController::class,'edit'])->name('admin.maincategory.edit');
        Route::post('update/{id}',[MainCategoryController::class,'update'])->name('admin.maincategory.update');
        Route::get('delete/{id}',[MainCategoryController::class,'delete'])->name('admin.maincategory.delete');
    });

    //End MainCategory Route----------------------------------



});


//we can add prefix to RouteServicePrivider file and  delete it from here
// Route::group(['prefix'=>'admin','middleware'=>'guest:admin'],function(){
Route::group(['middleware'=>'guest:admin'],function(){
    Route::get('login',[LoginController::class,'getLogin'])->name('get.admin.login');//Show Login Page
    Route::post('login',[LoginController::class,'postLogin'])->name('admin.postlogin');//Take Data and Login
});
//Route::get();
