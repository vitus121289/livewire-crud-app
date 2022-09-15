@props(['student'])
<tr>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <div class="flex items-center">
            <div class="flex-shrink-0 w-10 h-10">
                <img class="w-full h-full rounded-full"
                    src="{{ asset('storage/' . $student->photo) }}"
                    alt="" />
            </div>
            <div class="ml-3">
                <p class="text-gray-900 whitespace-no-wrap">
                    {{ $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name }}
                </p>
            </div>
        </div>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 whitespace-no-wrap">
            {{ $student->birthdate }}
        </p>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 whitespace-no-wrap">
            {{ $student->section }}
        </p>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 whitespace-no-wrap">
            {{ $student->address }}
        </p>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-blue-500 whitespace-no-wrap">
            <a href="/admin/students/{{ $student->id }}">Edit</a>
        </p>
    </td>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-red-500 whitespace-no-wrap">
            <a
                href="#"
                x-data={}
                @click.prevent="document.querySelector('#delete-form-{{ $student->id }}').submit()"
            >
                Delete
            </a>
            <form
                action="/admin/students/{{ $student->id }}"
                method="post"
                id="delete-form-{{ $student->id }}"
                hidden
            >
                @csrf
                @method('DELETE')
            </form>
        </p>
    </td>
</tr>