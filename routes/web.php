<?php

use App\Http\Controllers\DemoCourseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('layouts.admin');
});

Route::get('/demo-class-application', function () {
    return view('forms.demo_class_form');
})->name('demo_class_application');

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
