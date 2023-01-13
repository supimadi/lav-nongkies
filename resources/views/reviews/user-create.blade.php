<x-nongkies-layout>
    <div class=" m-8 ml-8 w-8/12 grid grid-rows-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-10 hidden md:block">
            <img src="{{ asset('images/feedback.svg') }}" alt="image">
        </div>

        <div class="rounded bg-white drop-shadow-xl p-5">
            <h1 class="font-semibold text-green-800 text-lg">Give Your Review!</h1>
            <p class="text-sm text-gray-500">
                Setiap review kamu, akan selalu terhitung, teracat, dan berguna untuk
                memberikan bantuan memilih tempat congkrong...
            </p>

            <form class="p-5" action="{{ route('home.store.review') }}" method="POST">
                @csrf

                <input type="hidden" name="cafe_name" value="{{ $cafe->id }}">
                <input type="hidden" name="user" value="{{ Auth::user()->id }}">

                <!-- Cafe -->
                <div>
                    <x-input-label for="cafe_name_str" :value="__('Nama Cafe')" class="text-sm" />
                    <x-text-input id="cafe_name_str" class="block mt-1 w-full text-sm" type="text" name="cafe_name_str" value="{{ $cafe->cafe_name }}" required aria-readonly="" />
                    <x-input-error :messages="$errors->get('cafe_name')" class="mt-2" />
                </div>

                <!-- Rating -->
                <div class="mt-4">
                    <x-input-label for="rating" :value="__('Rating')" />
                    <x-text-input id="rating" class="block mt-1 w-full text-sm" type="text" name="rating" required />
                    <x-input-error :messages="$errors->get('rating')" class="mt-2" />
                </div>

                <!-- Review -->
                <div class="mt-4">
                    <x-input-label for="review" :value="__('Review')" />
                    <textarea id="review" class="block mt-1 border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 rounded-md shadow-sm w-full" type="text" name="review" required></textarea>
                    <x-input-error :messages="$errors->get('review')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-primary-button>
                            {{ __('Tambah Review') }} 
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-nongkies-layout>
