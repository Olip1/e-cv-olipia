<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;

Route::get('/', [CvController::class, 'index'])->name('cv.index');
Route::get('/print', [CvController::class, 'print'])->name('cv.print');
Route::post('/contact', [CvController::class, 'contact'])->name('cv.contact');
