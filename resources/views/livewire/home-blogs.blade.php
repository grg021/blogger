<div>
    @forelse($posts as $post)
        <x-post type="PREVIEW" :post="$post" />
        @if (!$loop->last)
            <hr class="border-b-2 border-gray-400 mb-8 mx-4">
        @endif
    @empty
        <div class="my-5">
            <p class="text-2xl text-gray-500">The site currently has no blog post.</p>
        </div>
    @endforelse

    <div class="my-20">
        {{ $posts->links() }}
    </div>

</div>

