<?php

use App\Http\Controllers\FileUploadsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {
    $files = Storage::allFiles('public/files');
    $fileUrls = [];

    foreach ($files as $file) {
        $fileUrls[] = Storage::url($file);
    }

    return view('welcome', [
        'files' => $fileUrls
    ]);
});

Route::post('/uploads', [FileUploadsController::class, 'store'])->name('uploads.store');
