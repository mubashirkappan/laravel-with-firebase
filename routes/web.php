<?php

use App\Http\Controllers\Firebase\ContactController;
use App\Http\Controllers\Firebase\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/contact', [ContactController::class, 'home'])->name('welcome');
Route::get('/contact-add', [ContactController::class, 'view'])->name('contact.add');
Route::post('/contact-add', [ContactController::class, 'store'])->name('do.contact.add');
Route::get('/contact-add', [ContactController::class, 'view'])->name('contact.add');
Route::get('/contact-edit/{key}', [ContactController::class, 'edit'])->name('contact.edit');
Route::post('/contact-update', [ContactController::class, 'update'])->name('do.contact.update');
Route::get('/contact-delete/{key}', [ContactController::class, 'delete'])->name('contact.delete');
// Route::get('/home', [ContactController::class,'index'])->name('home');

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/do-login', [LoginController::class, 'doLogin'])->name('do.login');
Route::post('/do-register', [LoginController::class, 'doRegister'])->name('do.register');
Route::get('/register', [LoginController::class, 'register'])->name('register');
