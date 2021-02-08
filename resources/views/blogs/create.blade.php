<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="px-8 pt-6 pb-8 mb-4 max-w-4xl mx-auto">

                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('blogs.store') }}">
                @csrf


                    <div>
                        <x-label for="title" :value="__('Title')" />

                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-label for="description" :value="__('Description')" />

                        <x-textarea id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="date" :value="__('Publication Date')" />

                        <x-input id="publication_date" class="block mt-1 w-full" type="date" name="publication_date" :value="old('publication_date')" required />
                    </div>


                    <div class="flex items-center justify-end mt-4">

                        <x-button class="ml-4">
                            {{ __('Submit') }}
                        </x-button>
                    </div>


            </form>
            </div>
        </div>
    </div>
</x-app-layout>
