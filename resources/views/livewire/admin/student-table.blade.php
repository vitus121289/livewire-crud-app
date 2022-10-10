<div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <x-tables.header-column>
                                Id
                                <x-tables.sort-button wire:click="sortBy('id')" />
                            </x-tables.header-column>
                            <x-tables.header-column>
                                Name
                                <x-tables.sort-button wire:click="sortBy('last_name')" />
                            </x-tables.header-column>
                            <x-tables.header-column>
                                Birthdate
                                <x-tables.sort-button wire:click="sortBy('birthdate')" />
                            </x-tables.header-column>
                            <x-tables.header-column>
                                Section
                                <x-tables.sort-button wire:click="sortBy('section')" />
                            </x-tables.header-column>
                            <x-tables.header-column>
                                Address
                                <x-tables.sort-button wire:click="sortBy('address')" />
                            </x-tables.header-column>
                            <x-tables.header-column colspan=2 >
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
                <x-flash />
            </div>
        </div>
    </div>
</div>