<?php

use App\Http\Controllers\DemoCourseController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('layouts.admin');
});


Route::get('/demo-class', function () {
    return view('pages.demo_class');
});


Route::get('/courses', function () {
    return view('pages.courses');
});

Route::get('/yoruba-courses', function () {
    return view('pages.yoruba_courses');
});
Route::get('/igbo-courses', function () {
    return view('pages.igbo_courses');
});
Route::get('/hausa-courses', function () {
    return view('pages.hausa_courses');
});

Route::get('/contact', function () {
    return view('forms.contact_us');
});

Route::get('/register-parent', function () {
    return view('forms.parent_registration_form');
});

Route::get('/verify-otp', function () {
    return view('pages.verify_email');
});

Route::get('/register-student', function () {
    return view('forms.student_registration_form');
});

Route::get('/class-schedule', function () {
    return view('pages.class_schedule');
});

Route::get('/payment', function () {
    return view('pages.payment');
});
Route::get('/payment-processing', function () {
    return view('pages.payment_processing');
});

Route::get('/student-login', function () {
    return view('pages.student_login');
});

Route::get('/student-dashboard', function () {
    return view('pages.student_dashboard');
});


Route::get('/demo-class', [ParentController::class, 'create'])->name('demo_class.create');
Route::post('/demo-class-register', [ParentController::class, 'storeParentWithDemoCourse'])->name('demo_class.store');
Route::get('/demo-class/registration-success', [DemoCourseController::class, 'loadSuccessPage'])->name('demo_class.success');

Route::get('/parent/registration-form', [ParentController::class, 'showRegistrationForm'])->name('parent.registration.form');
Route::post('/parent/registration', [ParentController::class, 'storeParentForm'])->name('parent.registration.store');
Route::get('/parent/verify-email/{parent}', [ParentController::class, 'showOtpForm'])->name('parent.verify_otp');
Route::post('parent/verify-otp', [ParentController::class, 'verifyOtp' ])->name('otp.submit');
Route::get('parent/resend-otp/{parent}', [ParentController::class, 'resendOtp'])->name('otp.resend');

Route::middleware('auth:parent')->group(function () {
    Route::get('/parent/dashboard', [ParentController::class, 'index'])->name('parent.dashboard');
});

/** 
 * Google login
 */
 Route::controller(SocialiteController::class)->group(function() {
    Route::get('auth/google',  'googleLogin')->name('auth.google');
Route::get('auth/google-callback', 'googleAuthentication')->name('auth.google_callback');

 });



Route::middleware(['auth', 'verified'])->group(function() {

    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/demo-course', [DemoCourseController::class, 'index'])->name('demo_course.index');
    Route::post('/add-demo-course', [DemoCourseController::class, 'store'])->name('demo_course.store');
    Route::patch('/update-demo-course/{demoCourse}', [DemoCourseController::class, 'update'])->name('demo_course.update');
    Route::delete('/delete-demo-course/{demoCourse}', [DemoCourseController::class, 'destroy'])->name('demo_course.destroy');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
