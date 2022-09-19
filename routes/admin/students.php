<?php

use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'can:admin', 'verified'])->group(function() {
    Route::get('admin/students', [AdminStudentController::class, 'index'])->name('list-students');
    Route::get('admin/students/add', [AdminStudentController::class, 'create'])->name('add-student');
    Route::get('admin/students/{student}', [AdminStudentController::class, 'edit'])->name('edit-student');
    Route::post('admin/students/', [AdminStudentController::class, 'store']);
    Route::patch('admin/students/{student}', [AdminStudentController::class, 'update']);
    Route::delete('admin/students/{student}', [AdminStudentController::class, 'destroy']);
});