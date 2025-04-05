<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DemoCourseController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

// Route::get('/admin', function () {
//     return view('layouts.admin');
// });


Route::get('/demo-class', function () {
    return view('pages.demo_class');
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


Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/yoruba-courses', [CourseController::class, 'showYorubaCourses'])->name('courses.yoruba');
Route::get('/igbo-courses', [CourseController::class, 'showIgboCourses'])->name('courses.igbo');
Route::get('/hausa-courses', [CourseController::class, 'showHausaCourses'])->name('courses.hausa');


Route::middleware('auth:parent')->group(function () {

    Route::get('/parent/dashboard', [ParentController::class, 'index'])->name('parent.dashboard');
    Route::get('/parent/student-login', [ParentController::class, 'selectStudent'])->name('parent.student_login');
    Route::get('/student/registration-form', [StudentController::class, 'create'])->name('student.create');
    Route::post('/parent/logout', [AuthenticatedSessionController::class, 'destroyParent'])
    ->name('parent.logout');
   
});


    





/** 
 * Google login
 */
 Route::controller(SocialiteController::class)->group(function() {
    Route::get('/auth/google',  'googleLogin')->name('auth.google');
Route::get('/auth/google-callback', 'googleAuthentication')->name('auth.google_callback');

 });



Route::middleware(['auth', 'verified'])->group(function() {

    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/demo-course', [DemoCourseController::class, 'index'])->name('demo_course.index');
    Route::post('/add-demo-course', [DemoCourseController::class, 'store'])->name('demo_course.store');
    Route::patch('/update-demo-course/{demoCourse}', [DemoCourseController::class, 'update'])->name('demo_course.update');
    Route::delete('/delete-demo-course/{demoCourse}', [DemoCourseController::class, 'destroy'])->name('demo_course.destroy');

    Route::get('/class-schedule', [ClassScheduleController::class, 'index'])->name('class_schedule.index');
    Route::post('/class-schedule/store', [ClassScheduleController::class, 'store'])->name('class_schedule.store');
    Route::post('/update-schedule/{classSchedule}', [ClassScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/delete-schedule/{classSchedule}', [ClassScheduleController::class, 'destroy'])->name('schedule.destroy');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
