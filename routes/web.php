<?php

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
