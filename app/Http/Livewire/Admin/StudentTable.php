<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Student;

class StudentTable extends Component
{
    public $students;
    public $sortField;
    public $sortDirection = false;

    public function sortBy($columnName) {
        $this->sortField = $columnName;
        $this->sortDirection = ! $this->sortDirection;
        $this->mount();
    }

    public function mount() {
        $this->students = Student::all()->sortBy($this->sortField, SORT_REGULAR, $this->sortDirection);
    }
    
    public function render()
    {
        return view('livewire.admin.student-table');
    }

    public function edit($id) {
        return redirect()->to('/admin/students/' . $id);
    }

    public function destroy(Student $student) {
        unlink(public_path() . '//storage//' . $student->photo);
        $student->delete();
        $this->mount();
        $this->render();
        session()->flash('success', 'Student deleted.');
    }
}
