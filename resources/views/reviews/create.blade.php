<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Review') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="grid grid-cols-2 p-6 bg-n-green font-semibold">
                    <div class="text-gray-900 text-xl text-n-white">
                        @empty( $review->id )
                            {{ __('Tambah Review') }} 
                        @else
                            {{ __('Update Review') }} 
                        @endempty
                    </div>
                    <div class="text-right text-m">
                        <a href="{{ route('cafe-index') }}"
                           class="rounded-full px-4 py-1 bg-gray-700 hover:bg-gray-500 text-n-white transition duration-150 ease-in-out">
                            Kembali
                        </a>
                    </div>
                </div>

                <!-- START FORM CONTAINER -->
                <div class="p-6 mx-6">
                    <form method="POST" id="cafe-form"
                        @empty( $review->id )
                         action="{{ route('review.store') }}"
                        @else
                         action="{{ route('cafe-update', $review->id) }}"
                        @endempty
                    ">
                        @csrf

                        <!-- Cafe -->
                        <div>
                            <x-input-label for="cafe_name" :value="__('Nama Cafe')" />
                            <select class="border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 rounded-md shadow-sm w-full" id="cafe_name" name="cafe_name"></select>
                            <x-input-error :messages="$errors->get('cafe_name')" class="mt-2" />
                        </div>

                        <!-- User -->
                        <div class="mt-4">
                            <x-input-label for="user" :value="__('Nama Reviewer')" />
                            <select class="block mt-1 border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 rounded-md shadow-sm w-full" id="user" name="user"></select>
                            <x-input-error :messages="$errors->get('user')" class="mt-2" />
                        </div>

                        <!-- Rating -->
                        <div class="mt-4">
                            <x-input-label for="rating" :value="__('Rating')" />
                            <x-text-input id="rating" value="{{ $review->rating }}" class="block mt-1 w-full" type="text" name="rating" required />
                            <x-input-error :messages="$errors->get('rating')" class="mt-2" />
                        </div>

                        <!-- Review -->
                        <div class="mt-4">
                            <x-input-label for="review" :value="__('Review')" />
                            <textarea id="review" class="block mt-1 border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 rounded-md shadow-sm w-full" type="text" name="review" required>{{ $review->review }}</textarea>
                            <x-input-error :messages="$errors->get('review')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @empty( $review->id )
                                <a onclick="resetForm(); return false;" class="underline text-sm text-gray-600 hover:text-gray-900" href="#">
                                    {{ __('Reset') }}
                                </a>
                            @else
                                <button type="submit" form="destroy-cafe" class="text-gray-500 hover:text-gray-800">Hapus Review</button>
                            @endempty
                            

                            <x-primary-button class="ml-4">
                                @empty( $review->id )
                                    {{ __('Tambah Review') }} 
                                @else
                                    {{ __('Update Review') }} 
                                @endempty
                            </x-primary-button>
                        </div>
                    </form>
                </div>
                <!-- END FORM CONTAINER -->

                @empty( $review->id )
                @else 
                <form method="POST" id="destroy-cafe" action="{{ route('cafe-destroy', $review->id) }}">
                    @csrf
                </form> 
                @endempty

                <script type="text/javascript">
                    let resetForm = () => {
                        document.getElementById("cafe-form").reset();
                    }
                </script>

            </div>
        </div>
    </div>

</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $("#cafe_name").select2({
        ajax: {
            url: `{{ route('search.cafe') }}`,
            dataType: 'json'
        }
    });

    $("#user").select2({
        ajax: {
            url: `{{ route('search.user', Auth::user()->id) }}`,
            dataType: 'json'
        }
    });

</script>
