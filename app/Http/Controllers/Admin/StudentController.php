<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        return view('admin.students.index', [
            'students' => Student::latest()->paginate(20)
        ]);
    }

    public function create() {
        return view('admin.students.create');
    }

    public function store() {
        $attributes = $this->validateStudent();

        $attributes['photo'] = request()->file('photo')->store('student_ids');

        Student::create($attributes);

        return redirect('admin/students')->with('success', 'Added student.');
    }

    public function edit(Student $student) {
        return view('admin.students.edit', [
            'student' => $student
        ]);
    }

    public function update(Student $student) {
        $attributes = $this->validateStudent($student);

        if (isset($attributes['photo'])) {
            $attributes['photo'] = request()->file('photo')->store('student_ids');
        }

        $student->update($attributes);

        return redirect('admin/students')->with('success', 'Student updated.');
    }

    public function destroy(Student $student) {
        $student->delete();

        return back()->with('success', 'Student deleted.');
    }

    private function validateStudent(?Student $student = null) {
        return request()->validate([
            'first_name' => ['required', 'min:2', 'max:255'],
            'middle_name' => ['required', 'min:2', 'max:255'],
            'last_name' => ['required', 'min:2', 'max:255'],
            'birthdate' => ['required', 'date'],
            'photo' => is_null($student) ? ['required', 'image'] : 'image',
            'section' => 'max:255',
            'address' => ['required', 'min:6', 'max:255']
        ]);
    }
}
