<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        return view('admin.students.index');
    }

    public function create() {
        return view('admin.students.create');
    }
    
    public function edit(Student $student) {
        return view('admin.students.edit', [
            'student' => $student
        ]);
    }

    public function destroy(Student $student) {
        unlink(public_path() . '//storage//' . $student->photo);
        $student->delete();

        return back()->with('success', 'Student deleted.');
    }
}
