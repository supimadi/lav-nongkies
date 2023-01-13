<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Review') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="grid grid-cols-2 p-6 bg-n-green">
                    <div class="text-gray-900 text-xl text-n-white">
                        {{ __("Pesan dari: ") }} <span class="font-semibold">{{ $message->name }}</span>
                    </div>
                    <div class="text-right text-m">
                        <a href="{{ route('messages.index') }}"
                           class="rounded-full px-4 py-1 bg-gray-700 hover:bg-gray-500 text-n-white transition duration-150 ease-in-out">
                            Kembali
                        </a>
                    </div>
                </div>

                <!--START MESSAGES TABLE-->
                <div class="p-6 mx-6">
                    <div>
                        <x-input-label for="name" :value="__('Nama Lengkap')" />
                        <x-text-input id="name" value="{{ $message->name }}" class="block mt-1 w-full" type="text" required disabled />
                        <x-input-error :messages="$errors->get('cafe_name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" value="{{ $message->email }}" class="block mt-1 w-full" type="email" required disabled />
                        <x-input-error :messages="$errors->get('user')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="message" :value="__('Pesan')" />
                        <textarea disabled id="message" class="block mt-1 border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 rounded-md shadow-sm w-full" type="text" name="message" required>{{ $message->message }}</textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    </div>
                </div>
                <!--END MESSAGES TABLE-->

            </div>
        </div>
    </div>
</x-app-layout>
