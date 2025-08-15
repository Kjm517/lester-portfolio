<?php

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\AwardController;
use App\Http\Controllers\Api\PortfolioController;

// About routes
Route::get('/abouts', [AboutController::class, 'index']);
Route::post('/abouts', [AboutController::class, 'store']);
Route::put('/abouts/{id}', [AboutController::class, 'update']);

// Experience routes
Route::get('/experiences', [ExperienceController::class, 'index']);
Route::post('/experiences', [ExperienceController::class, 'store']);
Route::delete('/experiences/{id}', [ExperienceController::class, 'destroy']);

// Award routes
Route::get('/awards', [AwardController::class, 'index']);
Route::post('/awards', [AwardController::class, 'store']);
Route::delete('/awards/{id}', [AwardController::class, 'destroy']);

// Portfolio/Project routes
Route::get('/projects', [PortfolioController::class, 'index']);
Route::post('/projects', [PortfolioController::class, 'store']);
Route::delete('/projects/{id}', [PortfolioController::class, 'destroy']);