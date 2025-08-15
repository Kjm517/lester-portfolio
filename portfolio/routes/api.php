<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\AwardController;

// About routes
Route::apiResource('abouts', AboutController::class);

// Experience routes
Route::apiResource('experiences', ExperienceController::class);

// Portfolio routes
Route::apiResource('portfolios', PortfolioController::class);

// Award routes
Route::apiResource('awards', AwardController::class);

// Public routes for displaying portfolio (no authentication required)
Route::prefix('public')->group(function () {
    Route::get('about', [AboutController::class, 'index']);
    Route::get('experiences', [ExperienceController::class, 'index']);
    Route::get('portfolios', [PortfolioController::class, 'index']);
    Route::get('awards', [AwardController::class, 'index']);
});