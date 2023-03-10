<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cafe') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="grid grid-cols-2 p-6 bg-n-green font-semibold">
                    <div class="text-gray-900 text-xl text-n-white">
                        @empty( $cafe->id )
                            {{ __('Tambah Cafe') }} 
                        @else
                            {{ __('Update Cafe') }} 
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
                    @empty( $cafe->id )
                     action="{{ route('cafe-store') }}"
                    @else
                     action="{{ route('cafe-update', $cafe->id) }}"
                    @endempty
                     enctype="multipart/form-data">
                        @csrf

                        <!-- Cafe Name -->
                        <div>
                            <x-input-label for="cafe_name" :value="__('Nama Cafe')" />
                            <x-text-input id="cafe_name" value="{{ $cafe->cafe_name }}" class="block mt-1 w-full" type="text" name="cafe_name" required autofocus />
                            <x-input-error :messages="$errors->get('cafe_name')" class="mt-2" />
                        </div>

                        <!-- Location -->
                        <div class="mt-4">
                            <x-input-label for="location" :value="__('Location')" />
                            <x-text-input id="location" value="{{ $cafe->location }}" class="block mt-1 w-full" type="text" name="location" required />
                            <x-input-error :messages="$errors->get('location')" class="mt-2" />
                        </div>

                        <!-- GMaps Link -->
                        <div class="mt-4">
                            <x-input-label for="gmaps_link" :value="__('Google Maps Link')" />
                            <x-text-input id="gmaps_link" value="{{ $cafe->gmaps_link }}" class="block mt-1 w-full" type="text" name="gmaps_link" required />
                            <x-input-error :messages="$errors->get('gmaps_link')" class="mt-2" />
                        </div>

                        <!-- Distance -->
                        <div class="mt-4">
                            <x-input-label for="distance" :value="__('Jarak Ke Cafe')" />
                            <x-text-input id="distance" class="block mt-1 w-full" type="text" name="distance" value="{{ $cafe->distance }}" required />
                            <x-input-error :messages="$errors->get('distance')" class="mt-2" />
                        </div>

                        <!-- Image -->
                        <div class="mt-4">
                            <div class="flex">
                              <div class="mb-3 w-full">
                                <label for="image" class="form-label inline-block mb-2 text-gray-700">Photo/Gambar Cafe</label>
                                <input accept="image/*" class="form-control
                                block
                                w-full
                                px-2
                                py-1
                                text-m
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="image" id="image" type="file">
                              </div>
                            </div>
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

    
                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Deskripsi Cafe')" />
                            <textarea id="description" name="description" class="w-full rounded">{{ $cafe->description }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Open 24 Hours -->
                        <div class="block mt-4">
                            <label for="is_open_24h" class="inline-flex items-center">
                                <input id="is_open_24h"
                                    value="1"
                                        @if( $cafe->is_open_24h )
                                            checked
                                        @endif
                                    type="checkbox" class="rounded border-gray-400 text-emerald-600 shadow-sm focus:ring-emerald-500" name="is_open_24h">
                                <span class="ml-2 text-m font-semibold text-gray-900">{{ __('Buka 24 Jam') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @empty( $cafe->id )
                                <a onclick="resetForm(); return false;" class="underline text-sm text-gray-600 hover:text-gray-900" href="#">
                                    {{ __('Reset') }}
                                </a>
                            @else
                                <button type="submit" form="destroy-cafe" class="text-gray-500 hover:text-gray-800">Hapus Cafe</button>
                            @endempty
                            

                            <x-primary-button class="ml-4">
                                @empty( $cafe->id )
                                    {{ __('Tambah Cafe') }} 
                                @else
                                    {{ __('Update Cafe') }} 
                                @endempty
                            </x-primary-button>
                        </div>
                    </form>
                </div>
                <!-- END FORM CONTAINER -->

                @empty( $cafe->id )
                @else 
                <form method="POST" id="destroy-cafe" action="{{ route('cafe-destroy', $cafe->id) }}">
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
