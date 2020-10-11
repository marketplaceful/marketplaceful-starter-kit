<x-layouts.app>
    <div class="max-w-5xl mx-auto relative mt-16">
        <article>
            <header class="mb-16">
                <h1 class="text-4xl lg:text-6xl font-bold">Tags</h1>
            </header>
            @foreach ($tags as $tag)
                <h2 class="text-4xl font-bold hover:text-purple-600"><a href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a></h2>
            @endforeach
        </article>
    </div>
</x-layouts.app>
