<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanelListController;
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

Route::get('/', [HomeController::class, 'index'])->name('base');
Route::get('index', [HomeController::class, 'index'])->name('index');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('school-corner', [HomeController::class, 'school_corner'])->name('school-corner');
Route::get('stream-video/{video_id}', [HomeController::class, 'stream_video'])->name('stream-video');

Route::get('panel-list', [PanelListController::class, 'index'])->name('panel-list');
Route::get('gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('contact-us', [HomeController::class, 'contact_us'])->name('contact-us');

Route::get('school_register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('school_register', [RegisteredUserController::class, 'store'])->name('register.submit');

require __DIR__.'/auth.php';
