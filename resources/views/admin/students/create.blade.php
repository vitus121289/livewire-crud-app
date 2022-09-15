<x-app-layout>
    <x-slot name="header">
        Add Student
    </x-slot>
    <x-forms.layout
        action="/admin/students"
        method="post"
        enctype="multipart/form-data"
    >
        @csrf
        @livewire('admin.student-form')
        <x-forms.button>Add Student</x-forms.button>
    </x-forms.layout>
    @livewireScripts
</x-app-layout>