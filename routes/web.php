<?php

use App\Http\Controllers\ObatController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function () {
    Route::resource('obat', ObatController::class);
});
