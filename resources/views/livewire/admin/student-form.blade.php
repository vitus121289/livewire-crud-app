<x-forms.layout wire:submit.prevent="{{ $method }}" enctype="multipart/form-data">
    <div class="mt-4">
        <x-forms.input name="student.first_name" type="text" wire:model="student.first_name" />
        <x-forms.input name="student.middle_name" type="text" wire:model="student.middle_name" />
        <x-forms.input name="student.last_name" type="text" wire:model="student.last_name" />
        <x-forms.input name="student.birthdate" type="date" wire:model="student.birthdate" />
        {{-- <x-forms.input name="student.photo" type="file" wire:model="student.photo" /> --}}
        <x-forms.input name="photo" type="file" wire:model="photo" />
        @if ($photo)
            <div class="flex-shrink-0 w-20 h-20 m-4">
                <img src="{{ $photo->temporaryUrl() }}">
            </div>
        @endif
        @if ((isset($student->photo) && ($method === 'update')) && (!$photo))
            <div class="flex-shrink-0 w-20 h-20 m-4">
                <img src="{{ asset('storage/' . $student->photo) }}" alt="" />
            </div>
        @endif
        <x-forms.textarea name="student.section" wire:model="student.section"></x-forms.textarea>
        <x-forms.textarea name="student.address" wire:model="student.address"></x-forms.textarea>
        <x-forms.button type="submit">{{ ($method === 'update') ? 'Edit Student' : 'Add Student' }}</x-forms.button>
    </div>
    <x-flash />
</x-forms.layout>
