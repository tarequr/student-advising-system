<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\RoleController;
use App\Http\Controllers\BackEnd\UserController;
use App\Http\Controllers\BackEnd\BatchController;
use App\Http\Controllers\BackEnd\CourseController;
use App\Http\Controllers\BackEnd\AdvisedController;
use App\Http\Controllers\BackEnd\ProfileController;
use App\Http\Controllers\BackEnd\RoutineController;
use App\Http\Controllers\BackEnd\SemesterController;
use App\Http\Controllers\BackEnd\DashboardController;
use App\Http\Controllers\BackEnd\DepartmentController;
use App\Http\Controllers\BackEnd\DropCourseController;
use App\Http\Controllers\Backend\AdvisedController as BackendAdvisedController;
use App\Http\Controllers\Backend\CourseMasterDataController;
use App\Http\Controllers\PreviousCourse;
use App\Http\Controllers\ResultController;
use App\Models\CourseMasterData;

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
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/my-course', [DashboardController::class, 'mycourse'])->name('mycourse');

    /* *************** Role *************** */
    Route::resource('roles', RoleController::class);

    /* *************** User *************** */
    Route::resource('users', UserController::class);

    /* *************** Profile *************** */
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('password', [ProfileController::class, 'password'])->name('password');
    Route::post('posfile-update', [ProfileController::class, 'update'])->name('profile_update');
    Route::post('password-update', [ProfileController::class, 'passwordUpdate'])->name('password_update');

    Route::get('previous-courses', [PreviousCourse::class, 'index'])->name('previousCourses.index');
    Route::get('result-entry', [ResultController::class, 'create'])->name('result.index');
    Route::post('result-store', [ResultController::class, 'store'])->name('result.store');


    /* *************** Course *************** */
    Route::resource('courses', CourseController::class);
    Route::resource('coursedata', CourseMasterDataController::class);

    /* *************** Department *************** */
    Route::resource('departments', DepartmentController::class);

    /* *************** Batch *************** */
    Route::resource('batchs', BatchController::class);

    /* *************** Advising *************** */
    Route::resource('advised', AdvisedController::class);

    /* *************** Semester *************** */
    Route::resource('semesters', SemesterController::class);

    /* *************** Routine *************** */
    Route::resource('routines', RoutineController::class);

    /* *************** Drop Course *************** */
    Route::get('student-list', [DropCourseController::class, 'index'])->name('student-list');
    Route::get('course-list/{id}', [DropCourseController::class, 'show'])->name('course-list');
    Route::delete('course-delete/{id}', [DropCourseController::class, 'destroy'])->name('course-destroy');

    Route::get('my-result', [DropCourseController::class, 'myresult'])->name('my-result');
});
