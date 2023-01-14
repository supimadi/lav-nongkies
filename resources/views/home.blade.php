<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Nongkies</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="https://unpkg.com/@glidejs/glide@3.6.0/dist/css/glide.core.min.css">
        <link rel="stylesheet" href="https://unpkg.com/@glidejs/glide@3.6.0/dist/css/glide.theme.min.css">
        <link rel="stylesheet" href="{{ asset('storage/star-rating.css') }}">

        <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
        <script type="text/javascript" src="{{ asset('storage/start-rating.js') }}"></script>
    </head>
<body>  

    <nav class="w-screen bg-transparent z-10 fixed top-0 flex flex-wrap items-center justify-between px-2 py-5 ">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full flex justify-between lg:w-auto lg:static lg:block lg:justify-start ">
                <a href="#home"> <img class="w-20" src="{{ asset ('images/logo.png')}}" alt="Logo Nongkies"> </a>
            </div>
            <div class="lg:flex  bg-transparent flex-grow items-center lg:bg-transparent lg:shadow-none hidden">
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                    <li class="flex items-center"> 
                        <a class="lg:text-black lg:hover:text-gray-200 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-md uppercase font-bold hover:underline" href="#home">Home</a>
                    </li>
                    <li class="flex items-center">
                        <a class="lg:text-black lg:hover:text-gray-200 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-md uppercase font-bold hover:underline" href="#nearby">Nearby</a>
                    </li>
                    <li class="flex items-center">
                        <a class="lg:text-black lg:hover:text-gray-200 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-md uppercase font-bold hover:underline" href="#reserve">Reserve</a>
                    </li>
                    <li class="flex items-center">
                        <a class="lg:text-black lg:hover:text-gray-200 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-md uppercase font-bold hover:underline" href="#about">About</a>
                    </li>
                    <li class="flex items-center">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            @if(Auth::check())
                                <button type="submit" class="bg-sky-100 hover:bg-sky-200 text-emerald-500 font-bold py-2 px-4 rounded-full">
                                    Logout
                                </button>
                            @else
                                <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-md uppercase font-bold" href="#home">
                                    <button class="bg-sky-100 hover:bg-sky-200 text-emerald-500 font-bold py-2 px-4 rounded-full">
                                        Login
                                    </button>
                                </a>
                            @endif
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="home" class="overflow-x-hidden">
        <div class="h-screen w-screen bg-no-repeat" style="background-image:url('images/home.png')">
            <div class="grid grid-cols-1 md:grid-cols-2 gaps-4 h-screen">
                <div class="ml-5">
                    <div class="ml-1 lg:ml-44">
                        <h2 class="text-lg font-semibold pt-48 mb-2">Easy Chill Nongkies <span class="text-emerald-800">Here!</span></h2>
                        <h1 class="text-4xl font-bold">Nongkrong Berkualitas</h1>
                        <h1 class="text-4xl mb-5">& Estetis.</h1>
                        <p class="mb-5 sm:mb-36">Cari tempat nongkrong favoritmu dengan mudah dan cepat <br> bersama nongkies.</p>
                        <div class="flex items-center flex-wrap">
                            <div>
                                <a href="" class="text-base font-semibold text-white bg-emerald-800 py-3 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">
                                    Get Started
                                </a>
                            </div>
                            <div class="mt-10 sm:mt-0 ml-0 sm:ml-5">
                                <a href="" class="first-letter:text-base font-semibold border-2 border-gray-400  text-black bg-white py-3 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">
                                    See Live Demo
                                    <img src="{{asset('images/Frame 1.png')}}" alt="" class="inline-block h-10 ml-2 pt-1 py-2">
                                </a>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block" style="background: url('images/wallpaper.png') no-repeat; background-size: cover;"></div>
            </div>
        </div>
    </section>

    <div class="hidden lg:block container relative mx-auto shadow-lg bg-white w-1/2 rounded-md -top-16">
        <div class="flex justify-between px-5 py-3">
            <img src="{{asset('images/instagram.png')}}" alt="Logo Instagram" class="">
            <div class="flex ">
                <img src="{{asset('images/fb.png')}}" alt="Logo Facebook" class="h-13 my-auto">
                <img src="{{asset('images/facebook.png')}}" alt="Facebook" class="h-13 ml-2 my-auto">
            </div>
            <div class="flex">
                <img src="{{asset('images/tt.png')}}" alt="Logo Tiktok" class="w-13 h-16 my-auto">
                <img src="{{asset('images/TikTok.png')}}" alt="Logo Tiktok" class=" my-auto">
            </div>
        </div>
    </div>

    <section id="about" class="overflow-x-hidden overflow-y-hidden" style=background-image:url('images/doodle.png')>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 place-content-center">
            <div class="p-6 ml-1 lg:ml-44">
                <h2 class="text-xl font-bold text-emerald-800 mb-2">ABOUT US</h2>
                <h1 class="text-4xl font-bold mb-6">Your Happiness is The <br>Best MakeUp </h1>
                <p class="text-lg mb-20">Nongkies hadir untuk memberikan informasi <br>mengenai tempat nongkrong terdekat, estetis, dan murah. <br> Edward Eninfull, - Dengan orang-orang berkumpul dan <br> merayakan ide kebersamaan, hal-hal besar dapat terjadi.</p>
                <a href="" class="text-base font-semibold text-white bg-emerald-800 pt-2 pb-3 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">
                    More Details
                    <img src="{{asset('images/Frame 1.png')}}" alt="" class="inline-block 100vh h-10 ml-2 pb-2 pt-1">
                </a>
            </div>
            <div class="hidden md:block">
                <img src="{{asset('images/image.png')}}" alt="gambar" class="mb-6 text-right">
            </div>
        </div>
    </section>

    <section id="nearby" class="overflow-x-hidden">

        <div class="h-screen w-screen bg-no-repeat" style="background-image:url('images/nearby.png')">
            <div class="h-screen w-screen bg-no-repeat bg-right" style="background-image:url('images/maps.png')">
                <div class="pl-12 pr-16 lg:pl-36">
                    <div class="flex justify-between items-end pt-12">
                        <h1 class="text-emerald-800 font-semibold text-xl inline-block ">Nearby</h1>
                        <div class="flex">                       
                            <img src="{{asset ('images/logo.png')}}" alt="Logo Nongkies" class="flex justify-end w-10">
                        </div>
                    </div>
                    <h2 class="mt-2 inline-block">Lokasi kamu</h2>
                    <img src="{{ asset('images/arrow.svg') }}" alt="" class="inline-block h-6 w-6">
                    <p class="font-semibold"></p>
                </div>
                <div class="pl-12 mt-12 mb-10 lg:pl-36">
                    <div class="relative w-1/2 inline-block">
                        <input id="s-cafe" type="text" id="location" class="bg-gray-50 border border-gray-900 text-black text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 " placeholder="Mager? di sekitarmu ada tempat nongkrong loh">
                    </div>
                    <div class="inline-block ml-3 ">
                        <a href="" class="text-base font-semibold text-white bg-emerald-800 py-3 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">
                            <img src="{{asset('images/tune.png')}}" alt="" class="inline-block h-10 mr-2 pb-2 pt-1">
                            Filter
                        </a>
                    </div>
                </div>
                <div class="pl-12 lg:pl-36"> 
                    <div class="container w-1/2">
                        <div id="cafe-container" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                            @foreach($cafe as $c)
                            <div class="mb-20 sm:mb-0">
                                <img class="rounded h-full" src="{{ asset($c->image) }}" alt="">
                                <p class="text-center mt-3">
                                    <a href="{{ route('home.show.cafe', $c->id) }}" class="font-bold font-l hover:underline">{{ $c->cafe_name }}</a> <br>
                                    {{ $c->distance }} km
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="relative ">
                    <div class="w-10 h-10 bg-emerald-800 rounded-full flex fixed bottom-10 right-10">
                        <a href="#home" class="m-auto">
                            <img src="{{asset('images/arrow.png')}}" alt="">
                        </a>
                    </div>

                </div>
            </div>    
        </div>
    </section>

    <section id="reserve" class="overflow-x-hidden">
        <div class="h-screen w-screen bg-no-repeat" style="background-image:url('images/reserve')">
            <div class="container mx-auto p-12 mb-16">
                <h2 class=" flex justify-start md:justify-center mb-2 font-bold text-3xl text-emerald-800 ">RESERVE</h2>
                <h1 class="flex justify-start md:justify-center text-4xl font-bold mb-2">Our Recommendation Places</h1>
                <div class="text-lg">
                    <p class="flex justify-start md:justify-center">
                        Berikut adalah rekomendasi tempat nongkrong yang sering dikunjungi
                    </p>
                    <p class="flex justify-start md:justify-center">kalangan remaja.</p>
                </div>
            </div>        
            <div class="glide">
              <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach($cafe as $c)
                        <li class="glide__slide">
                            <div class="relative w-full h-96 max-w-sm ml-12 lg:ml-36 rounded-lg shadow-md" style="background: linear-gradient(rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)), url('{{ asset($c->image) }}') no-repeat; background-size: cover;">
                                <div class="absolute bottom-0 left-0 px-5 pb-5">
                                    <div class="flex items-center justify-between mb-3">
                                        <a href="{{ route('home.show.review', $c->id) }}" class="rounded-full text-white bg-emerald-800 px-3 py-1">Review</a>
                                    </div>
                                    <a class="mb-2" href="{{ route('home.show.cafe', $c->id) }}">
                                        <h5 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $c->cafe_name }}</h5>
                                    </a>
                                    <p class="text-white mb-3">
                                        {{ Str::limit($c->description, 50) }}
                                    </p>
                                    <div>
                                        <span id="rating-{{ $c->id }}"></span>
                                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ $c->rating }}</span>
                                    </div>
                                    <script type="text/javascript">
                                        $("#rating-{{ $c->id }}").starRating({
                                            initialRating: '{{ $c->rating }}',
                                            starSize: 15,
                                            readOnly: true
                                        });
                                    </script>
                                </div>    
                            </div>
                        </li>
                    @endforeach
                </ul>
              </div>
            </div>
        </div>
    </section>

    <section id="contact" class="overflow-x-hidden">
        <div class="h-screen w-screen bg-no-repeat" style="background-image:url('images/contact.png')">
            <div class="container mx-auto p-12 lg:pt-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 h-10">
                    <div class="my-5">
                        <h1 class="font-bold text-3xl items-center text-emerald-800 mb-5 lg:mb-0">Contact Us</h1>
                        <h2 class="font-bold text-3xl text-black">Let's Know If You</h2>
                        <h2 class="font-bold text-3xl text-black">Need <span class="font-normal text-3xl text-black">Help</span></h2>
                        <p class="mt-4 mb-2 text-lg">You may contact us from below information</p>
                        <img src="{{asset('images/sosmed.png')}}" alt="">
                    </div>
                    <div class="mt-2">
                        <h1 class="font-bold text-3xl flex items-center text-emerald-800 ">Get in Touch</h1>
                        <p class="text-lg">Feel free to drop us, a line below!</p>
                        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md">
                            <form method="POST" action="{{ route('messages.create') }}">
                                @csrf
                                <div class="form-group mb-6">
                                    <input name="name" type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-emerald-600 focus:outline-none" id="exampleInput7" placeholder="Name">
                                </div>
                                <div class="form-group mb-6">
                                    <input name="email" type="email" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-emerald-600 focus:outline-none" id="exampleInput8"placeholder="Email address">
                                </div>
                                <div class="form-group mb-6">
                                    <textarea name="messages" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-paddin border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-emerald-600 focus:outline-none "id="message" rows="3" placeholder="Message"
                                    ></textarea>
                                </div>
                                <button type="submit" class="w-full px-6 py-2.5 bg-emerald-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-emerald-700 hover:shadow-lg focus:bg-emerald-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-emerald-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <footer class="p-4 bg-[#FAFFFD] sm:p-6 z-40">
        <div class="md:flex md:justify-between opacity-100">
            <div class="mb-6 md:mb-0">
                <a href="#home" class="flex items-center mb-6">
                    <img src="{{asset('images/logo.png')}}" class="h-10 " alt="Logo Nongkies" />
                </a>
                <p class="mb-4">nongkies@gmail.com</p>
                <a href="" class="text-sm font-semibold text-white bg-emerald-800 py-2 px-6 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out first-letter first-letter m-auto">
                    Live Chat
                </a>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">About US.</h2>
                    <ul class="text-gray-400">
                        <li class="mb-4">
                            <a href="#home" class="hover:underline">Home</a>
                        </li>
                        <li class="mb-4">
                            <a href="#about" class="hover:underline">About</a>
                        </li>
                        <li class="mb-4">
                            <a href="#nearby" class="hover:underline">Nearby</a>
                        </li>
                        <li class="mb-4">
                            <a href="#reserve" class="hover:underline">Reserve</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="hover:underline">Login</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Ask a Question?</h2>
                    <ul class="text-gray-400">
                        <li class="mb-4">
                            <a href="" class="hover:underline ">Nongkies itu apa?</a>
                        </li>
                        <li class="mb-4">
                            <a href="" class="hover:underline ">Nongkrong dimana saja?</a>
                        </li>
                        <li class="mb-4">
                            <a href="" class="hover:underline ">Cara booking tempat gimana??</a>
                        </li>
                        <li class="mb-4">
                            <a href="" class="hover:underline ">Cara nongkrong ala NONGKIES?</a>
                        </li>
                        <li>
                            <a href="" class="hover:underline">Cafe terunik dimana?</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Our Address.</h2>
                    <ul class="text-gray-400">
                        <li class="mb-2">
                            <a href="#" class="hover:underline">Telkom, Bandung</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Indonesia</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6  border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between bg-[#67928A] p-4">
            <span class="text-md sm:text-sm text-gray-900 sm:text-center">© 2023 <a href="#" class="hover:underline">Nongkies™</a>. All Rights Reserved.
            </span>
            <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                <a href="#" class="text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                    <span class="sr-only">Instagram page</span>
                </a>
                <a href="#" class="text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                    <span class="sr-only">GitHub account</span>
                </a>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="https://unpkg.com/@glidejs/glide@3.6.0/dist/glide.js"></script>
    <script type="text/javascript">
    $("#s-cafe").on("keyup", () => {
        $.ajax({
            url: "{{ route('search.cafes') }}?q=" + $("#s-cafe").val(),
            success: (data) => {
                $("#cafe-container").html("");
                for (let i = 0; i < data["data"].length; i++ ) {
                    $("#cafe-container").append(`
                        <div class="mb-20 sm:mb-0">
                            <img class="rounded h-full" src="${data["data"][i]["image"]}" alt="">
                            <p class="text-center mt-3">
                                <a href="/cafe/${data["data"][i]["id"]}" class="font-bold font-l hover:underline">${data["data"][i]["cafe_name"]}</a> <br>
                                ${data["data"][i]["distance"]} km
                            </p>
                        </div>
                    `);
                }
            },
        });
    });
    </script>

    <script type="text/javascript">
      new Glide('.glide', {
        type: 'carousel',
        startAt: 0,
        perView: 3,
        breakpoints: {
        900: {
            perView: 2
        },
        700: {
          perView: 1
        }
      }
      }).mount()
    </script>
</html>


