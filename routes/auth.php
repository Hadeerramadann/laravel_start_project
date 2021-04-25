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
use App\Http\Controllers\Admin\side;
Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/registern', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');

// Route::group(['middleware' => ['auth', 'admin']], function() {
   
    Route::get('/aosol','App\Http\Controllers\Admin\side@index')->name('aosol');
//     Route::get('/year','App\Http\Controllers\Admin\side@year')->name('year');
//     Route::get('/examques','App\Http\Controllers\Admin\side@examques')->name('examques');
//     Route::get('/exam','App\Http\Controllers\Admin\side@exam')->name('exam');
//     Route::get('/student','App\Http\Controllers\Admin\side@student')->name('student');
//     Route::get('/viewexam','App\Http\Controllers\Admin\side@viewexam')->name('viewexam');
//     Route::get('/group','App\Http\Controllers\Admin\side@group')->name('group');
//     Route::get('/tests_res','App\Http\Controllers\Admin\side@testsres')->name('testsres');
//     Route::get('/upload_video','App\Http\Controllers\Admin\side@upload_video')->name('upload_video');

//     Route::get('/try_upload_video','App\Http\Controllers\Admin\side@try_upload_video')->name('try_upload_video');
//     Route::post('/store_try','App\Http\Controllers\Admin\side@store_try')->name('store_try');
    
//     Route::post('addyear','App\Http\Controllers\year@store' );
//     Route::post('delyear','App\Http\Controllers\year@delete');
//     Route::post('updateyear','App\Http\Controllers\year@update');
//     Route::get('maxyear','App\Http\Controllers\year@max_');
//     Route::post('addgroup','App\Http\Controllers\groups@store' );
//     Route::post('updategroup','App\Http\Controllers\groups@update' );
//     Route::post('delgroup','App\Http\Controllers\groups@delete' );
//     Route::post('getgroups','App\Http\Controllers\groups@getgroups');
//     Route::post('dis_group_results','App\Http\Controllers\groups@dis_group_results');
//     Route::get('details_exam','App\Http\Controllers\groups@details_exam')->name('details_exam');
//     Route::post('delstudent','App\Http\Controllers\student@delete');
//     Route::post('updatestudent','App\Http\Controllers\student@update');
//     Route::get('maxstudent','App\Http\Controllers\student@max_');
//     Route::post('searchstud','App\Http\Controllers\student@search');
//     Route::post('addstudent','App\Http\Controllers\student@store' );
//     Route::post('addtest','App\Http\Controllers\Test\test@addtests');
//     Route::post('addques_choice','App\Http\Controllers\Test\test@addques_choice');
//     Route::post('addques_choice_tf','App\Http\Controllers\Test\test@addques_choice_tf');
//     Route::post('addques_choice_texted','App\Http\Controllers\Test\test@addques_choice_texted');
//     Route::post('update_test','App\Http\Controllers\Test\test@update_test');
// });
// // Route::get('/admin','App\Http\Controllers\Admin\side@index')->name('adminhome');
// Route::group(['middleware' => ['auth', 'student']], function() {
   
//     Route::get('/students','App\Http\Controllers\students\side@index')->name('studentshome');
//     Route::get('/newexam','App\Http\Controllers\students\side@newexam')->name('newexam');
//     Route::get('/grads','App\Http\Controllers\students\side@grads')->name('grads');
//     Route::get('/lastexam','App\Http\Controllers\students\side@lastexam')->name('lastexam');
//     Route::post('/finshtest','App\Http\Controllers\students\side@finshtest')->name('finshtest');
//     Route::post('/answars','App\Http\Controllers\students\side@answars')->name('answars');
//     Route::post('display_examm','App\Http\Controllers\students\side@display_exam');
 
// });
// // Route::group(['middleware' => ['auth', 'student','sessiontimeout']], function() {
  
// // });

// Route::group(['middleware' => ['auth']], function() {
    
//     Route::post('gettestnames','App\Http\Controllers\Test\test@gettestnames');
//     Route::post('display_exam','App\Http\Controllers\Test\test@display_exam');
//     Route::post('update_ques','App\Http\Controllers\Test\test@update_ques');
//     Route::post('update_ques_tf','App\Http\Controllers\Test\test@update_ques_tf');
//     Route::post('update_ques_text','App\Http\Controllers\Test\test@update_ques_text');
//     Route::post('upload_img','App\Http\Controllers\Test\test@upload_img');
//     Route::post('puplish','App\Http\Controllers\Test\test@puplish');
//     Route::post('upload_img_new','App\Http\Controllers\Test\test@upload_img_new');
//     Route::post('del_img_up','App\Http\Controllers\Test\test@del_img_up');
//     Route::post('delete_ques','App\Http\Controllers\Test\test@delete_ques');
//     Route::post('del_ch','App\Http\Controllers\Test\test@del_ch');
   
// });


// Route::post('addstudent','App\Http\Controllers\student@store' );








// ///////////////student


