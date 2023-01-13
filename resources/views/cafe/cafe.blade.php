<x-nongkies-layout>
    <div class=" m-8 ml-8 w-8/12 grid grid-rows-1 md:grid-cols-2 gap-6">
        <div class="drop-shadow-md">
            <img class="rounded w-100" src="{{ asset($cafe->image) }}" alt="">
        </div>

        <div class="rounded bg-white drop-shadow-xl p-5">
            <!-- Title -->
            <h1 class="text-xl font-semibold">
                {{ $cafe->cafe_name }} <span class="text-sm text-white bg-emerald-800 ml-2 px-2 py-1 rounded">{{ $cafe->rating }}</span>
            </h1>

            <!-- Cafe Deskription -->
            <p class="mt-4">
                {{ $cafe->description }}
            </p>

            <!-- Button Group -->
            <div class="mt-5">
                <x-green-anchor href="{{ $cafe->gmaps_link }}">Find Me</x-green-anchor>
                <x-orange-anchor href="{{ route('home.show.review', $cafe->id) }}">Reviews</x-orange-anchor>
                <a class="ml-3" href="/">Back</a>
                
            </div>
        </div>
    </div>
</x-nongkies-layout>
