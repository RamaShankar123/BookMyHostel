<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
    Route::get('student', [HomeController::class,'index']);
    Route::get('operations', [OperationController::class,'index']);
    //hiostels  routes start
    Route::get('create-user-cridentialls', [HostelController::class,'createCridentials']);
    Route::post('save-user-cridentialls', [HostelController::class,'saveCridentials']);
    Route::get('get-inquiry', [HomeController::class,'getInquiry']);
    Route::get('hostel-admin', [HostelController::class,'main']);
    Route::get('admin-add-hostel', [HostelController::class,'addHoste']);
    Route::post('save-admin-hostel', [HostelController::class,'saveHoste']);
    Route::get('hostel-list', [HostelController::class,'hostelList']);
    Route::get('admin-add-student', [HostelController::class,'addStudentView']);
    Route::get('edit-hostel', [HostelController::class,'editHostel']);
    Route::post('update-admin-hostel', [HostelController::class,'updateHoste']);
    Route::post('remove-img', [HostelController::class,'removeImg']);
    Route::post('delete-hostel', [HostelController::class,'deleteHostel']);

    //students routes start
    Route::post('admin-save-student', [StudentController::class,'saveStudentRecord']);
    Route::get('student-list', [StudentController::class,'getStudent']);
    Route::get('edit-student', [StudentController::class,'editStudent']);
    Route::post('update-student', [StudentController::class,'updateStudent']);
    Route::post('delete-student', [StudentController::class,'deleteStudent']);

    //transactions route   
    Route::get('transactions', [TransactionController::class,'transactions']);

});
