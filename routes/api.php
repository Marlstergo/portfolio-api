<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public auth routes
Route::prefix('auth')->group(function () {
  Route::post('/register', [RegisterController::class, 'store']);
  Route::post('/login', [LoginController::class, 'store']);
  Route::post('/forgot-password', [PasswordResetLinkController::class, 'store']);
  Route::post('/reset-password', [NewPasswordController::class, 'store']);

  // Protected auth routes
  Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
      ->middleware('throttle:6,1');
    Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
      ->middleware(['signed', 'throttle:6,1']);
  });
});

// Protected API routes
Route::middleware('auth:sanctum')->group(function () {
  Route::get('/me', [UserController::class, 'me']);

  Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
  });

  Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index']);
    Route::post('/', [ProjectController::class, 'create']);
    Route::get('/{project}', [ProjectController::class, 'show']);
  });

  Route::prefix('tags')->group(function () {
    Route::get('/', [TagController::class, 'index']);
    Route::post('/', [TagController::class, 'create']);
  });
});
