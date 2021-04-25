<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Middleware\EnsureUserHasRole;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('aosol','App\Http\Controllers\Admin\side@index')->name('aosol');
// Route::get('/sessionfinish', function () {
//     return view('sessionfinish');
// });

// Route::get('/dashboard', function () {
//     $data = array(
//         'active1' => '', 
//         'active2' => '',
//         'active3' => '',
//         'active4' => '',
//         'active5' => '',
//         'active6' => '',
//         'active7' => '',
//     );
//     return view('admin.adminwelcome')->with($data);
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';

// Auth::routes();


// Route::get('/admin','App\Http\Controllers\Admin\side@index')->middleware('auth')->name('adminhome');
// Route::get('/students','App\Http\Controllers\students\side@index')->middleware('auth')->name('studentshome');

// Route::get('/gethashvalue/{num}','App\Http\Controllers\Admin\side@hash')->middleware('auth');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
