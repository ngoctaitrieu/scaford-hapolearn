<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('courses', CourseController::class)->only(['index', 'show']);
Route::group(['middleware' => 'auth'], function () {
    Route::resource('reviews', ReviewController::class)->only(['store'])->middleware('canReview');
    Route::resource('reviews', ReviewController::class)->only(['destroy', 'update']);
    Route::resource('course-users', CourseUserController::class)->only(['store', 'destroy', 'update']);
    Route::resource('profiles', ProfileController::class)->only(['index', 'update']);
    Route::resource('lessons', LessonController::class)->middleware('canLearnLessons')->only('show');
    Route::resource('programs', ProgramController::class)->only('store');
});
Route::get('/{locale}', [HomeController::class, 'lang'])->name('home.lang');
