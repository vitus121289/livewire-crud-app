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
        $attributes = $this->validateFields();

        if ($this->checkForDuplicateFullname()) {
            return back()->with('fail', 'Student already exists');
        } else {
            $attributes['photo'] = request()->file('photo')->store('student_ids');

            Student::create($attributes);

            return redirect('admin/students')->with('success', 'Added student.');
        }
    }

    public function edit(Student $student) {
        return view('admin.students.edit', [
            'student' => $student
        ]);
    }

    public function update(Student $student) {
        $attributes = $this->validateFields($student);

        if (isset($attributes['photo'])) {
            $attributes['photo'] = request()->file('photo')->store('student_ids');
        }

        $student->update($attributes);

        return redirect('admin/students')->with('success', 'Student updated.');
    }

    public function destroy(Student $student) {
        unlink(public_path() . '//storage//' . $student->photo);
        $student->delete();

        return back()->with('success', 'Student deleted.');
    }

    private function validateFields(?Student $student = null) {
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

    private function checkForDuplicateFullname() {
        return Student::where('first_name', request()->first_name)
                        ->where('middle_name', request()->middle_name)
                        ->where('last_name', request()->last_name)
                        ->exists();
    }
}
