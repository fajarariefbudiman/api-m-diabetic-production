<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DailyTrackingController;
use App\Http\Controllers\ExerciseReminderController;
use App\Http\Controllers\FactMythController;
use App\Http\Controllers\EducationContentController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MealInputController;
use App\Http\Controllers\MealScheduleController;
use App\Http\Controllers\MedicationReminderController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\ReminderLogController;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WoundCareController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest')
        ->name('auth.register');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest')
        ->name('auth.login');

    Route::post('/forgot-password/send-otp', [PasswordResetLinkController::class, 'sendOtp']);
    Route::post('/forgot-password/verify-otp', [PasswordResetLinkController::class, 'verifyOtp']);
    Route::post('/forgot-password/reset', [NewPasswordController::class, 'resetPassword']);
    Route::middleware('auth:sanctum')->post('/change-password', [NewPasswordController::class, 'changePassword']);
    Route::middleware('auth:sanctum')->delete('/delete-account', [AuthenticatedSessionController::class, 'deleteAccount']);
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:sanctum')
        ->name('auth.logout');
});
Route::middleware('auth:sanctum')->get('/fact-myths', [FactMythController::class, 'index']);
Route::middleware('auth:sanctum')->get('/fact-myths/{id}', [FactMythController::class, 'show']);

Route::middleware('auth:sanctum')->prefix('user')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'show']);
    Route::put('/profile', [UserProfileController::class, 'update']);
});
Route::middleware('auth:sanctum')->prefix('medication-reminders')->group(function () {
    Route::get('/', [MedicationReminderController::class, 'index']);
    Route::post('/', [MedicationReminderController::class, 'store']);
    Route::put('/{id}', [MedicationReminderController::class, 'update']);
    Route::delete('/{id}', [MedicationReminderController::class, 'destroy']);
});
Route::middleware('auth:sanctum')->prefix('meal-inputs')->group(function () {
    Route::get('/', [MealInputController::class, 'index']);
    Route::post('/', [MealInputController::class, 'store']);
    Route::get('/{id}', [MealInputController::class, 'show']);
    Route::delete('/{id}', [MealInputController::class, 'destroy']);
});
Route::middleware('auth:sanctum')->prefix('foods')->group(function () {
    Route::get('/', [FoodController::class, 'index']);
    Route::get('/{id}', [FoodController::class, 'show']);
    Route::post('/', [FoodController::class, 'store']);
    Route::delete('/{id}', [FoodController::class, 'destroy']);
});
Route::middleware('auth:sanctum')->prefix('exercise-reminders')->group(function () {
    Route::get('/', [ExerciseReminderController::class, 'index']);
    Route::post('/', [ExerciseReminderController::class, 'store']);
    Route::put('/{id}', [ExerciseReminderController::class, 'update']);
    Route::delete('/{id}', [ExerciseReminderController::class, 'destroy']);
});
Route::middleware('auth:sanctum')->prefix('daily-tracking')->group(function () {
    Route::get('/', [DailyTrackingController::class, 'index']);
    Route::post('/', [DailyTrackingController::class, 'store']);
    Route::get('/{date}', [DailyTrackingController::class, 'show']);
    Route::delete('/{date}', [DailyTrackingController::class, 'destroy']);
});
Route::middleware('auth:sanctum')->prefix('educational-contents')->group(function () {
    Route::get('/', [EducationContentController::class, 'index']);
    Route::get('/{id}', [EducationContentController::class, 'show']);
    Route::post('/', [EducationContentController::class, 'store']);
    Route::delete('/{id}', [EducationContentController::class, 'destroy']);
});
Route::middleware('auth:sanctum')->prefix('meal-schedules')->group(function () {
    Route::get('/', [MealScheduleController::class, 'index']);
    Route::post('/', [MealScheduleController::class, 'store']);
    Route::delete('/{id}', [MealScheduleController::class, 'destroy']);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/screening-questions', [ScreeningController::class, 'questions']);
    Route::post('/screening-answers', [ScreeningController::class, 'submitAnswers']);
    Route::get('/screening-sessions/{id}', [ScreeningController::class, 'show']);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/reminders', [ReminderController::class, 'index']);
    Route::post('/reminders', [ReminderController::class, 'store']);

    Route::get('/reminder-logs', [ReminderLogController::class, 'index']);
    Route::post('/reminder-logs', [ReminderLogController::class, 'store']);
});
Route::middleware('auth:sanctum')->prefix('wound-care')->group(function () {
    Route::get('/guide', [WoundCareController::class, 'guide']);
    Route::get('/tips', [WoundCareController::class, 'tips']);
    Route::post('/logs', [WoundCareController::class, 'store']);
});
