<link rel="stylesheet" href="{{ asset('storage/star-rating.css') }}">

<x-nongkies-layout>
    <div class=" m-8 ml-8 w-8/12 grid grid-rows-1 md:grid-cols-2 gap-6">
        <div class="drop-shadow-md">
            <img class="rounded w-100" src="{{ asset($cafe->image) }}" alt="">
        </div>

        <div class="rounded bg-white drop-shadow-xl p-5">
            <!-- Title -->
            <h1 class="text-xl font-semibold text-emerald-800">
                {{ $cafe->cafe_name }} <span class="text-sm bg-emerald-200 ml-2 px-2 py-1 rounded">{{ $cafe->rating }}</span>
            </h1>

            <!-- Button Group -->
            <div class="mt-8">
                <h3 class="bg-green-800 text-white p-3 rounded">Review</h3>
            </div>

            <!-- Cafe Deskription -->
            <div class="mt-4 overflow-y-auto h-45">
                @foreach($review as $r)
                    <div class="rounded border p-3 my-2">
                        <h4 class="font-semibold text-s mb-1">{{ $r->name }}</h4>
                        <div class="m-1" id="rating-{{ $r->id }}"></div>
                        <p class="text-xs">
                            {{ $r->review }}
                        </p>
                    </div>
                @endforeach
            </div>

            <div class="mt-5 flex flex-row-reverse items-center">
                <a class="ml-3" href="{{ route('home.show.cafe', $cafe->id) }}">Back</a>
                <x-orange-anchor href="{{ route('home.create.review', $cafe->id) }}">Tulis Ulasan</x-orange-anchor>
            </div>

        </div>
    </div>
</x-nongkies-layout>

<script type="text/javascript" src="{{ asset('storage/start-rating.js') }}"></script>

@foreach($review as $r)
<script type="text/javascript">
    $("#rating-{{ $r->id }}").starRating({
        initialRating: '{{ $r->rating }}',
        starSize: 15,
        readOnly: true
    });
</script>
@endforeach
