<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\ProjectController;

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

// Project routes
Route::get('/projects', [ProjectController::class, 'index']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);