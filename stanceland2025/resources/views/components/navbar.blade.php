{{-- <nav class="bg-background fixed w-full z-20 top-0 start-0 border-b border-gray-700">
    <div class="flex flex-wrap items-center justify-between mx-auto p-4">

        <!-- Logo -->
        <a href="https://stanceland.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/img/logo/logo3.png" class="h-8 sm:h-8 md:h-8 w-auto" alt="Stanceland Logo">
        </a>

        <!-- Bottone Login + Toggle -->
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @if (Route::has('login'))
            <div>
                @auth
                <a href="{{ url('/dashboard') }}"
                    class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 transition-colors">
                    Dashboard
                </a>
                @else
                <a href="{{ route('login') }}"
                    class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 transition-colors">
                    Log in
                </a>
                @endauth
            </div>
            @endif
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-fontcolor rounded-lg md:hidden hover:bg-fontcolor hover:text-background focus:outline-none focus:ring-2 focus:ring-fontcolor"
                aria-controls="navbar-sticky" aria-expanded="false">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

        <!-- Menu -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-700 rounded-lg bg-background md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-background">

                <li>
                    <a href="/"
                        class="block py-2 px-3 text-fontcolor rounded-sm md:p-0 hover:text-white transition-colors"
                        aria-current="page">HOME</a>
                </li>
                <li>
                    <a href="https://shop.stanceland.com"
                        class="block py-2 px-3 text-fontcolor rounded-sm md:p-0 hover:text-white transition-colors">SHOP</a>
                </li>
                <li>
                    <a href="{{ route('event') }}"
                        class="block py-2 px-3 text-fontcolor rounded-sm md:p-0 hover:text-white transition-colors">EVENT</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}"
                        class="block py-2 px-3 text-fontcolor rounded-sm md:p-0 hover:text-white transition-colors">CONTACT</a>
                </li>
            </ul>
        </div>

    </div>
</nav> --}}

<nav class="bg-background fixed w-full z-20 top-0 start-0 border-b border-gray-700">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between p-4 relative">

        <!-- Sinistra: HOME e SHOP -->
        <div class="hidden md:flex space-x-6 absolute left-[20rem] md:left-[10rem]">
            <a href="/" class="text-fontcolor hover:text-white transition-colors">HOME</a>
            <a href="https://shop.stanceland.com" class="text-fontcolor hover:text-white transition-colors">SHOP</a>
        </div>

        <!-- Centro: LOGO -->
        <div class="mx-auto">
            <a href="/" class="flex items-center space-x-3">
                <img src="/img/logo/logo3.png" class="h-8 w-auto" alt="Stanceland Logo">
            </a>
        </div>

        <!-- Destra: EVENT e CONTACT -->
        <div class="hidden md:flex space-x-6 absolute right-[20rem] md:right-[10rem]">
            <a href="{{ route('event') }}" class="text-fontcolor hover:text-white transition-colors">EVENT</a>
            <a href="{{ route('contact') }}" class="text-fontcolor hover:text-white transition-colors">CONTACT</a>
        </div>

        <!-- Login (desktop fisso a destra) -->
        <div class="hidden md:flex absolute right-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 transition-colors">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 transition-colors">
                        Log in
                    </a>
                @endauth
            @endif
        </div>

        <!-- Hamburger e Login (mobile) -->
        <div class="md:hidden flex items-center space-x-3">
            <button data-collapse-toggle="mobile-menu" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-fontcolor rounded-lg hover:bg-fontcolor hover:text-background focus:outline-none focus:ring-2 focus:ring-fontcolor"
                aria-controls="mobile-menu" aria-expanded="false">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="md:hidden hidden px-4 pb-4" id="mobile-menu">
        <ul class="flex flex-col space-y-2 font-medium bg-background border-t border-gray-700 pt-4 items-center m-5 p-4">
            <li><a href="/" class="text-fontcolor hover:text-white transition-colors m-5 p-4">HOME</a></li>
            <li><a href="https://shop.stanceland.com" class="text-fontcolor hover:text-white transition-colors m-5 p-4">SHOP</a>
            </li>
            <li><a href="{{ route('event') }}" class="text-fontcolor hover:text-white transition-colors m-5 p-4">EVENT</a></li>
            <li><a href="{{ route('contact') }}" class="text-fontcolor hover:text-white transition-colors m-5 p-4">CONTACT</a>
            </li>
            <li>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="block text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background rounded-lg text-sm px-4 py-2 text-center transition-colors mt-5 p-4">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="block text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background rounded-lg text-sm px-4 py-2 text-center transition-colors mt-5 p-4">
                            Log in
                        </a>
                    @endauth
                @endif
            </li>
        </ul>
    </div>

</nav>