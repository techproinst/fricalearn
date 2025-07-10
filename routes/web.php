<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseLevelController;
use App\Http\Controllers\CourseMaterialController;
use App\Http\Controllers\DemoCourseController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentScheduleController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Mail;



Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('/demo-class', function () {
    return view('pages.demo_class');
});


Route::get('/contact', function () {
    return view('forms.contact_us');
});

Route::get('/about-us', function () {
    return view('about');
})->name('about');


Route::get('/terms-of-service', function () {
    return view('terms');
})->name('terms');

Route::get('/register-parent', function () {
    return view('forms.parent_registration_form');
});

Route::get('/verify-otp', function () {
    return view('pages.verify_email');
});


Route::get('/demo-class', [ParentController::class, 'create'])->name('demo_class.create');
Route::post('/demo-class-register', [ParentController::class, 'storeParentWithDemoCourse'])->name('demo_class.store');
Route::get('/demo-class/registration-success', [DemoCourseController::class, 'loadSuccessPage'])->name('demo_class.success');

Route::get('/parent/registration-form', [ParentController::class, 'showRegistrationForm'])->name('parent.registration.form');
Route::post('/parent/registration', [ParentController::class, 'storeParentForm'])->name('parent.registration.store');
Route::get('/parent/verify-email/{parent}', [ParentController::class, 'showOtpForm'])->name('parent.verify_otp');
Route::post('parent/verify-otp', [ParentController::class, 'verifyOtp'])->name('otp.submit');
Route::get('parent/resend-otp/{parent}', [ParentController::class, 'resendOtp'])->name('otp.resend');


Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/yoruba-courses', [CourseController::class, 'showYorubaCourses'])->name('courses.yoruba');
Route::get('/igbo-courses', [CourseController::class, 'showIgboCourses'])->name('courses.igbo');
Route::get('/hausa-courses', [CourseController::class, 'showHausaCourses'])->name('courses.hausa');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.show');
Route::post('/store/contact', [ContactController::class, 'store'])->name('contact.store');



Route::middleware(['auth:parent', 'isParent'])->group(function () {

    Route::get('/parent/dashboard', [ParentController::class, 'index'])->name('parent.dashboard');
    Route::get('/parent/enrollment', [ParentController::class, 'getIncompleteEnrollment'])->name('parent.enrollments');
    Route::get('/parent/student-login', [ParentController::class, 'selectStudent'])->name('parent.student_login');
    Route::get('/student/registration-form', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student/registration-form/store', [StudentController::class, 'store'])->name('student.store');
    Route::get('/select-class-schedule/{student}', [ClassScheduleController::class, 'create'])->name('student.schedule');
    Route::post('/student-class-schedule', [StudentScheduleController::class, 'store'])->name('student.store_schedule');
    Route::get('/initialize-payment/{student}', [PaymentController::class, 'showPaymentPage'])->name('payment');
    Route::post('/payment/store/{student}', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/payment/processing', [PaymentController::class, 'loadProcessingPage'])->name('payment.processing');
    Route::get('/parent/payment', [ParentController::class, 'getParentPayments'])->name('parent.payments');
    Route::get('/parent/subscription', [SubscriptionController::class, 'getParentSubscriptions'])->name('parent.subscriptions');
    Route::post('/parent/update/{parent}', [ParentController::class, 'update'])->name('parent.update');
    Route::get('/student/dashboard/{student}', [StudentController::class, 'index'])->name('student.dashboard');
    Route::post('/student/update/{student}', [StudentController::class, 'update'])->name('student.update');




    Route::post('/parent/logout', [AuthenticatedSessionController::class, 'destroyParent'])->name('parent.logout');
});


/** 
 * Google login
 */
Route::controller(SocialiteController::class)->group(function () {
    Route::get('/auth/google',  'googleLogin')->name('auth.google');
    Route::get('/auth/google-callback', 'googleAuthentication')->name('auth.google_callback');
});



Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/demo-course', [DemoCourseController::class, 'index'])->name('demo_course.index');
    Route::post('/add-demo-course', [DemoCourseController::class, 'store'])->name('demo_course.store');
    Route::patch('/update-demo-course/{demoCourse}', [DemoCourseController::class, 'update'])->name('demo_course.update');
    Route::delete('/delete-demo-course/{demoCourse}', [DemoCourseController::class, 'destroy'])->name('demo_course.destroy');

    Route::get('/class-schedule', [ClassScheduleController::class, 'index'])->name('class_schedule.index');
    Route::post('/class-schedule/store', [ClassScheduleController::class, 'store'])->name('class_schedule.store');
    Route::put('/update-schedule/{classSchedule}', [ClassScheduleController::class, 'update'])->name('schedule.update');
    Route::post('/class-schedules/{classSchedule}/link', [ClassScheduleController::class, 'scheduleUpcomingClass'])
    ->name('class_schedules.link');
    Route::delete('/delete-schedule/{classSchedule}', [ClassScheduleController::class, 'destroy'])->name('schedule.destroy');

    Route::get('admin/payments', [PaymentController::class, 'getPayments'])->name('payments.show');
    Route::post('/approve-payment/{payment}', [PaymentController::class, 'approvePayment'])->name('payment.approve');
    Route::post('/decline-payment/{payment}', [PaymentController::class, 'declinePayment'])->name('payment.decline');

    Route::get('/admin/subscription', [SubscriptionController::class, 'index'])->name('subscriptions.show');
    Route::get('/student-info/{student}', [StudentController::class, 'show'])->name('student.show');

    Route::get('/admin/courses', [CourseController::class, 'getAllCourses'])->name('courses.show');
    Route::put('/admin/update-course/{courseLevel}', [CourseLevelController::class, 'update'])->name('course_level.update');
    Route::get('/admin/course-material', [CourseMaterialController::class, 'index'])->name('course_materials.show');
    Route::get('/courses/{courseId}/levels', [CourseLevelController::class, 'getLevels']);
    Route::post('/upload/course-material', [CourseMaterialController::class, 'store'])->name('course_material.store');
    Route::put('/update/{courseMaterial}/course-material', [CourseMaterialController::class, 'update'])->name('course_material.update');
    Route::delete('delete/{courseMaterial}/course-material', [CourseMaterialController::class, 'destroy'])->name('course_material.destroy');
   
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__ . '/auth.php';
