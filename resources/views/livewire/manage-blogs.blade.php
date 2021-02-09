<div>

    <div>
        <span>Sort By </span>
        <select wire:model="sort">
            @foreach($sortingOptions as $key => $val)
                <option value="{{ $key }}">{{$val}}</option>
            @endforeach
        </select>
    </div>

    <div class="bg-white overflow-hidden shadow-sm gap-4 p-4 divide-y divide-gray-300 grid grid-cols-1 mt-5">
        @forelse($posts as $post)
            <div class="flex pt-4">
                <div class="text-gray-800 text-xl">{{ $post->title }}</div>
                <div class="flex-grow"></div>
                <div class="flex-initial text-gray-500">{{ $post->published_date }}</div>
            </div>
        @empty
            <div class="flex pt-4">
                <p class="text-2xl text-gray-500">The site currently has no blog post.</p>
            </div>
        @endforelse
    </div>
    <div class="my-20">
        {{ $posts->links() }}
    </div>

</div>
