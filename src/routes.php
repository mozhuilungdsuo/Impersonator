<?php
use Illuminate\Support\Facades\Route;

use Mozhuilungdsuo\Impersonator\Controllers\ImpersonationController;
Route::middleware('web')->group(function () {
    Route::get('/impersonate/{id}', [ImpersonationController::class, 'impersonateUser'])->name('impersonate.start');
    Route::get('/impersonate/stop', [ImpersonationController::class, 'stopImpersonating'])->name('impersonate.stop');
});