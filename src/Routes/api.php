<?php

use ConfrariaWeb\Document\Controllers\Api\DocumentController;
use ConfrariaWeb\Document\Controllers\Api\DocumentGroupController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api', 'auth:sanctum'])
    ->prefix('api')
    ->name('api.')
    ->group(function () {

        Route::apiResource('documents', DocumentController::class);
        Route::apiResource('documents/groups', DocumentGroupController::class);

    });
    