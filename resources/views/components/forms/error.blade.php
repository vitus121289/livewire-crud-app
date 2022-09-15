@props(['name'])
<div class="font-xs text-red-500">
    @error($name)
        {{ $message }}
    @enderror
</div>