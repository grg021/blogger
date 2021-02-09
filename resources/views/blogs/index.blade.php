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

    <div class="py-6">
        <livewire:manage-blogs />
    </div>
</x-app-layout>
