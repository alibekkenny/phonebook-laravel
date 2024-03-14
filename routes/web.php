<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ContactDetailsController as AdminContactDetailsController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactDetailsController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

//use App\Http\Middleware\EnsureTokenIsValid;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware([Authenticate::class])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact/create', [ContactController::class, 'store'])->name('contact.create');
    Route::get('/contact/edit/{contact}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/contact/edit/{contact}', [ContactController::class, 'update'])->name('contact.edit');
    Route::delete('/contact/delete/{contact}', [ContactController::class, 'destroy'])->name('contact.delete');


    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.create');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/edit/{category}', [CategoryController::class, 'update'])->name('category.edit');
    Route::delete('/category/delete/{category}', [CategoryController::class, 'destroy'])->name('category.delete');

    Route::get('/contact/{contact}/contact_details', [ContactDetailsController::class, 'index'])->name('contact_details.index');
    Route::get('/contact/{contact}/contact_details/create', [ContactDetailsController::class, 'create'])->name('contact_details.create');
    Route::post('/contact/{contact}/contact_details/create', [ContactDetailsController::class, 'store'])->name('contact_details.create');
    Route::get('/contact_details/edit/{contact_details}', [ContactDetailsController::class, 'edit'])->name('contact_details.edit');
    Route::put('/contact_details/edit/{contact_details}', [ContactDetailsController::class, 'update'])->name('contact_details.edit');
    Route::delete('/contact_details/delete/{contact_details}', [ContactDetailsController::class, 'destroy'])->name('contact_details.delete');
});

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/admin/', function () {
    return view('admin.index');
})->name('admin.home');

Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
Route::get('/admin/user/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
Route::put('/admin/user/{user}/edit', [UserController::class, 'update'])->name('admin.user.edit');
Route::delete('/admin/user/{user}/delete', [UserController::class, 'destroy'])->name('admin.user.delete');
Route::get('/admin/user/{user}/contact', [UserController::class, 'contact'])->name('admin.user.contact');

Route::get('/admin/contact', [AdminContactController::class, 'index'])->name('admin.contact.index');
Route::get('/admin/contact/{contact}/edit', [AdminContactController::class, 'edit'])->name('admin.contact.edit');
Route::put('/admin/contact/{contact}/edit', [AdminContactController::class, 'update'])->name('admin.contact.edit');
Route::delete('/admin/contact/{contact}/delete', [AdminContactController::class, 'destroy'])->name('admin.contact.delete');
Route::get('/admin/contact/{contact}/contact_details', [AdminContactController::class, 'contact_details'])->name('admin.contact.contact_details');

Route::get('/admin/contact_details/', [AdminContactDetailsController::class, 'index'])->name('admin.contact_details.index');
Route::get('/admin/contact_details/{contact_details}/edit', [AdminContactDetailsController::class, 'edit'])->name('admin.contact_details.edit');
Route::put('/admin/contact_details/{contact_details}/edit', [AdminContactDetailsController::class, 'update'])->name('admin.contact_details.edit');
Route::delete('/admin/contact_details/{contact_details}/delete', [AdminContactDetailsController::class, 'destroy'])->name('admin.contact_details.delete');

Route::get('/admin/category', [AdminCategoryController::class, 'index'])->name('admin.category.index');
Route::get('/admin/category/{contact}/edit', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');

Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
