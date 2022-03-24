<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TimetableController;
use App\Imports\StudentImport;
use Illuminate\Support\Facades\Route;

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
// Route::get('/', [DashboardControllel::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('template.index');
})->middleware('auth');

Route::get('/form', function () {
    return view('template.form');
});

Route::get('/student/export', [StudentController::class, 'export']);
Route::post('/', function () {
    \Maatwebsite\Excel\Facades\Excel::import(new StudentImport, request()->file('import_file_student'));
    return back();
});

Route::resource('/teacher', TeacherController::class)->middleware('auth');
Route::resource('/student', StudentController::class)->middleware('auth');
Route::resource('/kelas', KelasController::class)->middleware('auth');
Route::resource('/course', CourseController::class)->middleware('auth');
Route::resource('/timetable', TimetableController::class)->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
