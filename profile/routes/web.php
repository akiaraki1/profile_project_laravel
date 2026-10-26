<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegAthController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\GalleryController;

Route::get('/', [RegAthController::class, 'index']);

Route::get('/index', [RegAthController::class, 'index'])->name('index');; 

Route::get('/reg',[RegAthController::class, 'reg']);

Route::get('/aut', [RegAthController::class, 'aut']);

Route::post('/reg/process', [RegAthController::class, 'regProcess'])->name('reg.process');

Route::post('/aut/process', [RegAthController::class, 'autProcess'])->name('aut.process');

Route::get('/profile', [RegAthController::class, 'profile'])->name('profile');

Route::get('/profile/calculator', [CalculatorController::class, 'index']);

Route::get('/profile/guestBook', [GuestBookController::class, 'index'])->name('guestbook.index');

Route::post('/profile/guestBook', [GuestBookController::class, 'add'])->name('guestbook.add');

Route::get('/profile/guestBook/edit/{id}', [GuestBookController::class, 'edit'])->name('guestbook.edit');

Route::post('/profile/guestBook/update/{id}', [GuestBookController::class, 'update'])->name('guestbook.update');

Route::get('/profile/guestBook/delete/{id}', [GuestBookController::class, 'delete'])->name('guestbook.delete');

Route::get('/profile/gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::post('/profile/gallery/upload', [GalleryController::class, 'upload'])->name('gallery.upload');

Route::get('/logout', [RegAthController::class, 'logout']);