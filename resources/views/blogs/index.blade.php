<x-app-layout>
    <x-slot name="header">
        <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Blogs') }}
        </h2>
            <div class="flex-grow"></div>
        <a href="/blogs/create" class="btn btn-blue">Create</a>
        </div>
    </x-slot>

    <div class="hidden sm:flex sm:items-center sm:ml-6 pt-5 max-w-7xl mx-auto flex">
        <div class="flex-grow"></div>
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                <div>Sort By - {{ $sorting_options[$sort] }}</div>

                <div class="ml-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            @foreach($sorting_options as $key => $val)
                <x-dropdown-link :href="'/blogs?sort=' . $key">
                    {{ $val }}
                </x-dropdown-link>
            @endforeach
        </x-slot>
    </x-dropdown>
    </div>

    <div class="py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @foreach($blogs as $post)
                <x-post type="PREVIEW" :post="$post" />
                @if (!$loop->last)
                    <hr class="border-b-2 border-gray-400 mb-8 mx-4">
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
