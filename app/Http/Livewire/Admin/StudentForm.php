<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

class StudentForm extends Component
{
    use WithFileUploads;

    public $first_name;
    public $middle_name;
    public $last_name;
    public $birthdate;
    public $photo;
    public $section;
    public $address;

    protected $rules = [
        'first_name' => 'required|min:2|max:255',
        'middle_name' => 'required|min:2|max:255',
        'last_name' => 'required|min:2|max:255',
        'photo' => 'image',
        'section' => 'max:255',
        'address' => 'required|min:6|max:255'
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.admin.student-form');
    }
}
