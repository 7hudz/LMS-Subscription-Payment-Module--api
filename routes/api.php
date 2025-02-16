<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubscriptionController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

// ✅ Public Routes (No Authentication Required)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
// Public Routes (No Authentication)
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{course}', [CourseController::class, 'show']);
Route::post('/courses', [CourseController::class, 'store']);
Route::put('/courses/{course}', [CourseController::class, 'update']);
Route::delete('/courses/{course}', [CourseController::class, 'destroy']);

// ✅ Subscription (No Authentication)
Route::post('/courses/{course}/subscribe', [SubscriptionController::class, 'subscribe']);
Route::post('/stripe/webhook', [SubscriptionController::class, 'handleWebhook']);
