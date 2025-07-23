<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UploadController::class, 'index']);

Route::post('/upload', [UploadController::class, 'store'])->name('upload');

Route::post('/download', [UploadController::class, 'download'])->name('download');

Route::get('/admin', [UploadController::class, 'admin'])->name('admin');

Route::get('test', function () {
    $string = '2330205325|xawazo@mailinator.com|high_school_certificate.jpg';
    $parts = explode('|', $string);
    $filename = $parts[2];
    $filenameWithoutExt = pathinfo($filename, PATHINFO_FILENAME);
    return str_replace('_', ' ', $filenameWithoutExt);
});
