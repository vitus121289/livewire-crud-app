@props(['name'])
<div>
    <label for="{{ $name }}">{{ ucwords(str_replace('_', ' ', $name)) }}</label>
    <textarea
        wire:model="{{ $name }}"
        name="{{ $name }}"
        id="{{ $name }}"
        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
    ></textarea>
    @error($name)
        {{ $message }}
    @enderror
</div>