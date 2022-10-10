<x-app-layout>
    <x-slot name="header">
        Edit Student
    </x-slot>
    @livewire('admin.student-form', [
            'student' => $student
            ])
    @livewireScripts
</x-app-layout>