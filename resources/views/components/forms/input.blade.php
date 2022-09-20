@props(['name'])
<div>
    <label for="{{ $name }}">{{ ucwords(str_replace('_', ' ', $name)) }}</label>
    <input
        name="{{ $name }}"
        id="{{ $name }}"
        class="w-full px-4 py-2 my-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
        {{ $attributes }}
    >
    <x-forms.error name="{{ $name }}" />
</div>