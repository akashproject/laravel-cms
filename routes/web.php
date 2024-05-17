<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('website');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'administrator'], function () {

    Route::get('/signin', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/signin', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    
    Route::get('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

    Route::group(['middleware' => ['auth','role:super-admin|admin']], function () {
        Route::get('/dashboard', [App\Http\Controllers\Administrator\IndexController::class, 'index'])->name('dashboard');
        Route::get('/', [App\Http\Controllers\Administrator\IndexController::class, 'index'])->name('administrator');
        
        //Users
        Route::get('/users/{role_id}', [App\Http\Controllers\Administrator\UserController::class, 'index'])->name('admin-users');
        Route::get('/user/{id}', [App\Http\Controllers\Administrator\UserController::class, 'show'])->name('admin-user');
        Route::post('/save-user', [App\Http\Controllers\Administrator\UserController::class, 'save'])->name('admin-save-user');
        Route::get('/delete-user/{id}', [App\Http\Controllers\Administrator\UserController::class, 'delete'])->name('admin-delete-user');


        Route::get('/settings', [App\Http\Controllers\Administrator\SettingController::class, 'show'])->name('admin-settings');
        Route::post('/save-settings', [App\Http\Controllers\Administrator\SettingController::class, 'save'])->name('admin-save-settings');

        //Courses
        Route::get('/courses', [App\Http\Controllers\Administrator\CourseController::class, 'index'])->name('admin-courses');
        Route::get('/add-course', [App\Http\Controllers\Administrator\CourseController::class, 'Add'])->name('admin-add-course');
        Route::get('/show-course/{id}', [App\Http\Controllers\Administrator\CourseController::class, 'show'])->name('admin-show-course');
        Route::post('/save-course', [App\Http\Controllers\Administrator\CourseController::class, 'save'])->name('admin-save-course');
        Route::get('/delete-course/{id}', [App\Http\Controllers\Administrator\CourseController::class, 'delete'])->name('admin-delete-course');

        Route::get('/curriculum/{id}', [App\Http\Controllers\Administrator\CourseController::class, 'curriculum'])->name('admin-curriculum');
        Route::post('/save-curriculum', [App\Http\Controllers\Administrator\CourseController::class, 'saveCurriculum'])->name('admin-save-curriculum');

        //Course Type
        Route::get('/course-type', [App\Http\Controllers\Administrator\CourseTypeController::class, 'index'])->name('admin-course-type');
        Route::get('/add-course-type', [App\Http\Controllers\Administrator\CourseTypeController::class, 'add'])->name('admin-add-course-type');
        Route::get('/view-course-type/{id}', [App\Http\Controllers\Administrator\CourseTypeController::class, 'show'])->name('admin-view-course-type');
        Route::post('/save-course-type', [App\Http\Controllers\Administrator\CourseTypeController::class, 'save'])->name('admin-save-course-type');
        Route::get('/delete-course-type/{id}', [App\Http\Controllers\Administrator\CourseTypeController::class, 'delete'])->name('admin-delete-course-type');
    
        Route::get('/media', [App\Http\Controllers\Administrator\MediaController::class, 'index'])->name('admin-media');
        Route::get('/view-file/{id}', [App\Http\Controllers\Administrator\MediaController::class, 'view'])->name('admin-view-file');
        Route::post('/upload', [App\Http\Controllers\Administrator\MediaController::class, 'save'])->name('admin-save-media');
        Route::post('/save-file', [App\Http\Controllers\Administrator\MediaController::class, 'updateFile'])->name('admin-save-file');
        Route::get('/delete-file/{id}', [App\Http\Controllers\Administrator\MediaController::class, 'delete'])->name('admin-delete-job');
        Route::post('/search-media', [App\Http\Controllers\Administrator\MediaController::class, 'search'])->name('admin-search-media');
        
    });

    Route::group(['middleware' => ['role:super-admin']], function () {
        Route::get('/manage-roles', [App\Http\Controllers\Administrator\AccessibilityController::class, 'index'])->name('manage-roles');
        Route::get('/create-accessibility', [App\Http\Controllers\Administrator\AccessibilityController::class, 'createAccessibility'])->name('role-master');
        Route::get('/edit-accessibility/{id}', [App\Http\Controllers\Administrator\AccessibilityController::class, 'show'])->name('edit-accessibility');
        Route::post('/save-accessibility', [App\Http\Controllers\Administrator\AccessibilityController::class, 'saveAccessibility'])->name('save-accessibility');
        Route::get('/assign-role/{id}', [App\Http\Controllers\Administrator\AssignRoleController::class, 'index'])->name('assign-role.index');
        Route::post('/assign-role', [App\Http\Controllers\Administrator\AssignRoleController::class, 'save'])->name('assign-role.save');
    });

    
});
Route::group(['middleware' => ['auth']], function () {
    
});
