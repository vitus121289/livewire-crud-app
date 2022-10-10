<x-app-layout>
    <x-slot name="header">
        List Students
    </x-slot>
    @livewire('admin.student-table')
    @livewireScripts
</x-app-layout>