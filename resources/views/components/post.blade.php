<div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">

    <!--Title-->
    <div class="font-sans">
        @if($type === 'FULL')
        <p class="text-base md:text-sm text-green-500 font-bold">&lt;
            <a href="{{ route('home') }}" class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">
                BACK TO BLOG</a></p>
        @endif
        <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
            <a href="{{ route('home.show', ['blogPost' => $post]) }}">{{ $post->title }}</a>
        </h1>
        <p class="text-sm md:text-base font-normal text-gray-600">Published {{ $post->published_date }} by {{ $post->author }}</p>
    </div>
    <!--/ Title-->


    <!--Post Content-->
    @if($type === 'FULL')
        <p class="py-6">{!! $post->description !!}</p>
    @else
        <p class="py-6">{!! $post->short_description !!}</p>
    @endif
    <!--/ Post Content-->


</div>
