<x-app-layout>
    <x-slot name="header">
        Edit Student
    </x-slot>
    <x-forms.layout
        action="/admin/students/{{ $student->id }}"
        method="post"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PATCH')
        @livewire('admin.student-form', [
            'first_name' => $student->first_name,
            'middle_name' => $student->middle_name,
            'last_name' => $student->last_name,
            'birthdate' => $student->birthdate,
            'photo' => $student->photo,
            'section' => $student->section,
            'address' => $student->address
            ])
        <x-forms.button>Edit Student</x-forms.button>
    </x-forms.layout>
    @livewireScripts
</x-app-layout>