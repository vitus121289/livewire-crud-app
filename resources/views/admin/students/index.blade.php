<x-app-layout>
    <x-slot name="header">
        List Students
    </x-slot>
    <div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <x-tables.header-column>
                                Name
                            </x-tables.header-column>
                            <x-tables.header-column>
                                Birthdate
                            </x-tables.header-column>
                            <x-tables.header-column>
                                Section
                            </x-tables.header-column>
                            <x-tables.header-column>
                                Address
                            </x-tables.header-column>
                            <x-tables.header-column colspan=2>
                                Actions
                            </x-tables.header-column>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <x-tables.data-row :student=$student />                         
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</x-app-layout>