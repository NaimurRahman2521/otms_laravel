<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherAuthController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminTrainingController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/training/{id}', [HomeController::class, 'detail'])->name('training-detail');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/training-category/{id}', [HomeController::class, 'traningCategory'])->name('training-category');

Route::post('/training-enroll/{id}', [EnrollController::class, 'newEnroll'])->name('training.enroll');
Route::get('/complete-enroll', [EnrollController::class, 'completeEnroll'])->name('enroll.complete');

Route::get('/all-training', [HomeController::class, 'allTraining'])->name('all-training');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/login-register', [HomeController::class, 'auth'])->name('login-registration');
Route::get('/teacher/login', [TeacherAuthController::class, 'index'])->name('teacher.login');
Route::post('/teacher/login', [TeacherAuthController::class, 'login'])->name('teacher.login');

Route::post('/student/login', [StudentController::class, 'login'])->name('student.login');
Route::post('/student/register', [StudentController::class, 'signup'])->name('student.register');
Route::middleware(['student.auth'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::get('/student/all-training', [StudentController::class, 'training'])->name('student.all-training');
    Route::get('/student/change-password', [StudentController::class, 'change'])->name('student.password-change');
    Route::post('/student/change-password', [StudentController::class, 'newPassword'])->name('student.update-password');
    Route::post('/student/update-profile', [StudentController::class, 'updateProfile'])->name('student.update-profile');
    Route::get('/student/logout', [StudentController::class, 'logout'])->name('student.logout');
});

Route::middleware(['teacher.auth'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherAuthController::class, 'dashboard'])->name('teacher.dashboard');
    Route::post('/teacher/logout', [TeacherAuthController::class, 'logout'])->name('teacher.logout');
    Route::get('/teacher/training/add', [TrainingController::class, 'index'])->name('training.add');
    Route::post('/teacher/training/create', [TrainingController::class, 'create'])->name('training.create');
    Route::get('/teacher/training/manage', [TrainingController::class, 'manage'])->name('training.manage');
    Route::get('/teacher/training/search', [TrainingController::class, 'error'])->name('training.search');
    Route::post('/teacher/training/search', [TrainingController::class, 'search'])->name('training.search');
    Route::get('/teacher/training/detail/{id}', [TrainingController::class, 'detail'])->name('training.detail');
    Route::get('/teacher/training/edit/{id}', [TrainingController::class, 'edit'])->name('training.edit');
    Route::post('/teacher/training/update/{id}', [TrainingController::class, 'update'])->name('training.update');
    Route::post('/teacher/training/delete/{id}', [TrainingController::class, 'delete'])->name('training.delete');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/teacher/add', [TeacherController::class, 'index'])->name('teacher.add');
    Route::post('/admin/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::get('/admin/teacher/manage', [TeacherController::class, 'manage'])->name('teacher.manage');
    Route::get('/admin/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('/admin/teacher/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::post('/admin/teacher/delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');
    Route::get('/admin/teacher/category/add', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/admin/teacher/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/admin/teacher/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/admin/teacher/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/admin/teacher/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/admin/teacher/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/admin/training/manage', [AdminTrainingController::class, 'index'])->name('admin.training.manage');
    Route::get('/admin/training/detail/{id}', [AdminTrainingController::class, 'show'])->name('admin.training.detail');
    Route::get('/admin/training/update/status/{id}', [AdminTrainingController::class, 'status'])->name('admin.training.update.status');
});

