<x-guest-layout>
    <div class="max-w-5xl mx-auto">
            <div class="rounded-xl bg-gray-100 bg-opacity-0 px-16 py-10 shadow-lg">
                <div class="p-4 text-black">
                    <p class="text-3xl font-bold mb-2">Daftar</p>
                    <p>Belum punya akun? Daftar dulu yuk!</p>

                    <form action="{{ route('register') }}" method="POST" class="mt-6 w-full">
                        @csrf
                        <div class="mb-4 grid grid-rows-1 md:grid-cols-2">
                            <label class="mb-2" for="name">Nama Lengkap Pengguna</label>
                            <input id="name" name="name" type="text" class="border border-black rounded-lg pl-2 p-0.5 leading-none" placeholder="Nama lengkap"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mb-3 grid grid-rows-1 md:grid-cols-2">
                            <label class="mb-2" for="email">Email</label>
                            <input type="email" id="email" name="email" class="border border-black rounded-lg pl-2 p-0.5 leading-none" placeholder="Email"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mb-3 grid grid-rows-1 md:grid-cols-2">
                            <label class="mb-2" for="password">Kata sandi</label>
                            <input type="password" id="password" name="password" class="border border-black rounded-lg pl-2 p-0.5 leading-none" placeholder="Kata sandi"/>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="mb-5 grid grid-rows-1 md:grid-cols-2">
                            <label class="mb-2" for="password_confirmation">Ulangi Kata Sandi</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="border border-black rounded-lg pl-2 p-0.5 leading-none" placeholder="Ulangi Kata Sandi"/>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex justify-start mt-3 gap-3 items-center mb-2">
                            <button type="submit" class="border bg-red-500 text-white p-1 rounded-lg px-6 hover:scale-105">Konfirmasi</button>
                            <a href="/" class="text-red-500 hover:underline hover:text-red-700">Kembali</a>
                        </div>

                        <div class= "flex justify-start">
                            <p>Udah punya akun? tinggal <a href="{{ route('login') }}" class="text-red-500 hover:text-red-700 hover:underline">Masuk</a> aja!</p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
</x-guest-layout>
