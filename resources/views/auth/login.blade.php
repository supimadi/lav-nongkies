<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-5xl mx-auto">
        <div class="rounded-xl bg-grey-100 bg-opacity-0 px-16 py-10 shadow-lg">
            <div class="p-4 text-black">
                <p class="text-3xl font-bold mb-2">Masuk</p>
                <p>Silahkan masuk untuk mendapatkan fitur yang menarik! <span>Belum punya akun? <a href="{{ route('register') }}" class="text-red-500 hover:text-red-700 hover:underline">Buat disini</a></span></p>
                
                <form action="{{ route('login') }}" method="POST" class="mt-6 w-full">
                    @csrf

                    <div class="">
                        <label class="mb-2 block" for="">Email</label>
                        <input type="email" name="email" class="inline-block w-1/2 border border-black rounded-lg p-2.5 leading-none" placeholder="Email"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mt-3">
                        <label class="mb-2 block" for="">Kata sandi</label>
                        <input type="password" name="password" class="inline-block w-1/2 border border-black rounded-lg p-2.5 leading-none" placeholder="Kata sandi"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="flex justify-start mt-5 gap-3 items-center">
                        <button type="submit" class="border bg-red-500 text-white p-1  rounded-lg px-6 hover:scale-105">Masuk</button>
                        <a href="/" class="text-red-500 hover:underline hover:text-red-700">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-guest-layout>

