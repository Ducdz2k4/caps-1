<?php

use Illuminate\Support\Facades\Route;

// Home
Route::get('/', 'HomeController@index')->name('home');
Route::get('/chatbot', 'HomeController@chatBot')->name('chatbot');

// Payment
Route::get('/payment/{id}', 'PaymentController@show');
Route::post('/payment/{id}/confirm', 'PaymentController@confirm');

// Admin registrations
Route::get('/admin/registrations', 'Admin\\RegistrationController@index');
Route::post('/admin/registrations/confirm/{id}', 'Admin\\RegistrationController@confirm');

// Auth + Verify Email
Auth::routes(['verify' => true]);


// ===============================
// COURSE REGISTER (chỉ verified mới được đăng ký)
// ===============================
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/courses/register/{course}', 'CourseController@showFormRegisterCourse')
        ->name('register-course');

    Route::post('/courses/register/{course}', 'CourseController@create')
        ->name('register-course.store');

});


// ===============================
// PROFILE STUDENT (chỉ verified mới được vào)
// ===============================
Route::namespace('Student')
    ->prefix('profile')
    ->name('student.')
    ->middleware(['auth', 'verified'])
    ->group(function () {

        Route::get('/', 'HomeController@index')->name('home');

        Route::name('account.')->group(function () {
            Route::get('/account/profile', 'AccountController@showFormUpdateProfile')->name('edit-profile');
            Route::post('/account/profile', 'AccountController@updateProfile')->name('update-profile');

            Route::get('/account/password', 'AccountController@showFormUpdatePassword')->name('edit-password');
            Route::post('/account/password', 'AccountController@updatePassword')->name('update-password');
        });

        Route::name('notification.')->group(function () {
            Route::get('/notification', 'NoteController@index')->name('index');
        });

        Route::name('class.')->group(function () {
            Route::get('/class', 'ClassController@index')->name('index');
            Route::get('/class/{class}', 'ClassController@show')->name('show');
        });

        Route::name('lesson.')->group(function () {
            Route::get('/lesson/{course}', 'LessonController@show')->name('show');
            Route::get('/lesson/show/{lesson}', 'LessonController@showLesson')->name('show-lesson');
        });

        Route::name('exam.')->group(function () {
            Route::get('/exam', 'ExamController@index')->name('index');
            Route::get('/exam/{exam}', 'ExamController@quiz')->name('quiz');
            Route::get('/exam/questions/{exam}', 'ExamController@getQuestion');
            Route::post('/exam/{exam}', 'ExamController@checkQuiz')->name('quiz.check');
        });

    });


// Show course detail
Route::get('/course/{course}', 'CourseController@showCourse')->name('course.show');