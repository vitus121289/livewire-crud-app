<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Add Student
    </h2>
</x-slot>
<div class="flex items-center justify-center min-h-screen">
    <div class="px-8 py-6 mx-2 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:m-1/3">
        <form action="/admin/students/" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-4">
                <x-forms.input name="first_name" type="text"/>
                <x-forms.input name="middle_name" type="text"/>
                <x-forms.input name="last_name" type="text"/>
                <x-forms.input name="birthdate" type="date" />
                <x-forms.input name="photo" type="file" />
                <x-forms.textarea name="section"></x-forms.textarea>
                <x-forms.textarea name="address"></x-forms.textarea>
                <x-forms.button type="submit">Add Student</x-forms.button>
            </div>
        </form>
    </div>
</div>
