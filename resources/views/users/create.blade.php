<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="grid grid-cols-2 p-6 bg-n-green font-semibold">
                    <div class="text-gray-900 text-xl text-n-white">
                        @empty( $user->id )
                            {{ __('Tambah User') }} 
                        @else
                            {{ __('Update User') }} 
                        @endempty
                    </div>
                    <div class="text-right text-m">
                        <a href="{{ route('users-index') }}"
                           class="rounded-full px-4 py-1 bg-gray-700 hover:bg-gray-500 text-n-white transition duration-150 ease-in-out">
                            Kembali
                        </a>
                    </div>
                </div>

                <!-- START FORM CONTAINER -->
                <div class="p-6 mx-6">
                    <form method="POST" id="user-form"
                    @empty( $user->id )
                     action="{{ route('users-store') }}"
                    @else
                     action="{{ route('users-update', $user->id) }}"
                    @endempty
                     >
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        @empty( $user->id )
                        <!-- Password -->
                        <div class="mt-4">
                            @empty( $user->id )
                                <x-input-label for="password" :value="__('Password')" />
                            @else
                                <x-input-label for="password" :value="__('New Password')" />
                            @endempty

                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        @endempty

                        <div class="flex items-center justify-end mt-4">
                            @empty( $user->id )
                                <a onclick="resetForm(); return false;" class="underline text-sm text-gray-600 hover:text-gray-900" href="#">
                                    {{ __('Reset') }}
                                </a>
                            @else
                                <button type="submit" form="destroy-user" class="text-gray-500 hover:text-gray-800">Hapus User</button>
                            @endempty
                            

                            <x-primary-button class="ml-4">
                                @empty( $user->id )
                                    {{ __('Tambah User') }} 
                                @else
                                    {{ __('Update User') }} 
                                @endempty
                            </x-primary-button>
                        </div>
                    </form>
                </div>
                <!-- END FORM CONTAINER -->

                @empty( $user->id )
                @else 
                <form method="POST" id="destroy-user" action="{{ route('users-destroy', $user->id) }}">
                    @csrf
                </form> 
                @endempty

                <script type="text/javascript">
                    let resetForm = () => {
                        document.getElementById("user-form").reset();
                    }
                </script>

            </div>
        </div>
    </div>
</x-app-layout>
