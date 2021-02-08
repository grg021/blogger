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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($blogs as $post)
                    <x-post type="PREVIEW" :post="$post" />
                    @if (!$loop->last)
                        <hr class="border-b-2 border-gray-400 mb-8 mx-4">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
