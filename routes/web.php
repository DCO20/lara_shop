<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use Illuminate\Support\Facades\Route;

/** Site */
Route::get('/', HomeComponent::class)->name('index');
Route::get('/sobre', AboutComponent::class)->name('about.index');
Route::get('/loja', ShopComponent::class)->name('shop.index');
Route::get('/carrinho', CartComponent::class)->name('cart.index');
Route::get('/produto/{url}', DetailsComponent::class)->name('product.details');
Route::get('/contato', ContactComponent::class)->name('contact.index');

/** Admin */
Route::prefix('admin')->middleware(['isadmin'])->group(function(){

     //home
     Route::get('/',[ HomeController::class, 'index'])->name('home.index');

    //User
    Route::get('user/{user}/roles', [UserController::class, 'roles'])->name('user.roles');
    Route::put('user/{user}/roles/sync', [UserController::class, 'rolesSync'])->name('user.rolesSync');
    Route::any('users/search', [UserController::class, 'search'])->name('users.search');
    Route::resource('users', UserController::class);

    //Product
    Route::any('products/search', [ProductController::class, 'search'])->name('products.search');
    Route::resource('products', ProductController::class);

    //Roles
    Route::get('role/{role}/permissions', [RoleController::class, 'permissions'])->name('role.permissions');
    Route::put('role/{role}/permissions/sync', [RoleController::class, 'permissionsSync'])->name('role.permissionsSync');
    Route::any('roles/search', [RoleController::class, 'search'])->name('roles.search');
    Route::resource('roles', RoleController::class);

    //Permission
    Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
    Route::resource('permissions', PermissionController::class);

    //Category
    Route::any('categories/search', [CategoryController::class, 'search'])->name('categories.search');
    Route::resource('categories', CategoryController::class);

    // Product x Category
    Route::get('products/{id}/category/{idCategory}/detach', [CategoryProductController::class, 'detachCategoryProduct'])->name('products.category.detach');
    Route::post('products/{id}/categories', [CategoryProductController::class ,'attachCategoriesProduct'])->name('products.categories.attach');
    Route::any('products/{id}/categories/create', [CategoryProductController::class, 'categoriesAvailable'])->name('products.categories.available');
    Route::get('products/{id}/categories', [CategoryProductController::class , 'categories'])->name('products.categories');
    Route::get('categories/{id}/products', [CategoryProductController::class , 'products'])->name('categories.products');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
