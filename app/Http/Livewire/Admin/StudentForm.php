<?php

namespace App\Http\Livewire\Admin;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentForm extends Component
{
    use WithFileUploads;

    public Student $student;
    public $method;
    public $photo;

    public function rules() {
        return [
                'student.first_name' => 'required|min:2|max:255',
                'student.middle_name' => 'required|min:2|max:255',
                'student.last_name' => 'required|min:2|max:255',
                'student.birthdate' => 'required|date',
                'photo' => $this->method === 'store' ? 'required|image' : 'nullable',
                'student.section' => 'max:255',
                'student.address' => 'required|min:6|max:255'
            ];
    }

    public function mount($student = null) {
        if (request()->routeIs('add-student')) {
            $this->student = new Student();
            $this->method = 'store';
        }

        if (request()->routeIs('edit-student')) {
            $this->student = $student;
            $this->method = 'update';
        }
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function updatedPhoto() {
        $this->validate();
    }

    public function store() {
        if ($this->checkForDuplicateFullname()) {
            session()->flash('fail', 'Student alread exists.');
        } else {
            $this->validate();
            $this->student->photo = $this->photo->store('student_ids');
            $this->student->save();
            session()->flash('success', 'Added student');
            redirect()->to('/admin/students');
        }
    }

    public function update() {
        $this->validate();
        if (! is_null($this->photo)) {
            unlink(public_path() . '//storage//' . $this->student->photo);
            $this->student->photo = $this->photo->store('student_ids');
        }
        $this->student->update();
        session()->flash('success', 'Edited Student');
    }

    public function render()
    {
        return view('livewire.admin.student-form');
    }

    private function checkForDuplicateFullname() {
        return Student::where('first_name', $this->student->first_name)
                        ->where('middle_name', $this->student->middle_name)
                        ->where('last_name', $this->student->last_name)
                        ->exists();
    }
}
