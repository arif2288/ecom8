<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;

Route::get('/',[FrontendController::class, 'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    //Category
    route::get('/dashboard', [AdminController::class, 'index']);
    route::get('/category/add', [CategoryController::class, 'showCategoryForm']);
    route::get('/category/manage', [CategoryController::class, 'showCategoryList']);
    route::post('/category/store', [CategoryController::class, 'categoryStore']);
    route::get('/category/edit/{id}', [CategoryController::class, 'categoryEdit']);
    route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate']);
    route::get('/category/delete/{id}', [CategoryController::class, 'categoryDelete']);


    //Brand
    route::get('/brand/add', [BrandController::class, 'showBrandForm']);
    route::get('/brand/manage', [BrandController::class, 'showBrandList']);
    route::post('/brand/store', [BrandController::class, 'brandStore']);
    route::get('/brand/edit/{id}', [BrandController::class, 'brandEdit']);
    route::post('/brand/update/{id}', [BrandController::class, 'brandUpdate']);
    route::get('/brand/delete/{id}', [BrandController::class, 'brandDelete']);


    //Subcategory
    route::get('/subcategory/add', [SubcategoryController::class, 'showSubcategoryForm']);
    route::get('/subcategory/manage', [SubcategoryController::class, 'showsubcategoryList']);
    route::post('/subcategory/store', [SubcategoryController::class, 'subcategoryStore']);
    route::get('/subcategory/edit/{id}', [SubcategoryController::class, 'subcategoryEdit']);
    route::post('/subcategory/update/{id}', [SubcategoryController::class, 'subcategoryUpdate']);
    route::get('/subcategory/delete/{id}', [SubcategoryController::class, 'subcategoryDelete']);
});
