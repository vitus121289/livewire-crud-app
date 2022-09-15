<?php

use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use Illuminate\Support\Facades\Route;

Route::get('admin/students/add', [AdminStudentController::class, 'create'])->name('add-student');
Route::post('admin/students/', [AdminStudentController::class, 'store']);