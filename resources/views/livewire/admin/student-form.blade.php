<div class="mt-4">
    <x-forms.input name="first_name" type="text" wire:model="first_name" />
    <x-forms.input name="middle_name" type="text" wire:model="middle_name" />
    <x-forms.input name="last_name" type="text" wire:model="last_name" />
    <x-forms.input name="birthdate" type="date" wire:model="birthdate" />
    <x-forms.input name="photo" type="file" wire:model="photo" />
    @if (isset($photo) && request()->routeIs('edit-student'))
        <div class="flex-shrink-0 w-20 h-20 m-4">
            <img src="{{ asset('storage/' . $photo) }}" alt="" />
        </div>
    @endif
    <x-forms.textarea name="section" wire:model="section"></x-forms.textarea>
    <x-forms.textarea name="address" wire:model="address"></x-forms.textarea>
    {{-- <x-forms.button type="submit">Add Student</x-forms.button> --}}
</div>
