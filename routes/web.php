<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/download-pdf', [Controller::class, 'downloadPdf'])->name('download.pdf');
