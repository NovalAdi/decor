<header class="fixed top-0 w-full py-5 flex justify-between items-center px-5 md:px-10 bg-white/85 z-10">
    <div class="w-full flex flex-col sm:flex-row sm:items-center sm:w-max gap-5 sm:gap-10">
        <div class="flex justify-between w-full">
            <div class="flex items-center gap-3">
                <i id="burger-icon" class="fa-solid fa-bars text-xl text-gray-700 sm:hidden block"></i>
                <div>
                    <a href="{{ url('../home') }}">
                        <img width="100px" src="{{ asset('img/logo-decor.svg') }}" class="p-1" alt="">
                    </a>
                    @if (session('role') === 'admin')
                        <p class="text-sm font-bold text-[#B5733A]">Admin</p>
                    @endif
                </div>
            </div>
            <div class="flex items-center gap-7 text-xl text-gray-700 sm:hidden">
                <a href="{{ url('/cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                <img class="rounded-[100%] h-[30px]" src="{{ asset('img/default_pp.png') }}" alt="">
            </div>
        </div>

        {{-- Navigation --}}
        <div id="burger" class="sm:flex flex-col sm:flex-row sm:items-end gap-5 sm:gap-10 inactive-burger">
            {{-- @php
                $routes = include base_path('routes.php');
            @endphp --}}

            {{-- @foreach ($routes as $route)
                @if (gettype($route['path']) !== 'string')
                    <div class="relative group">
                        <div id="categories" class="flex gap-3 items-center hover:text-[#B5733A] cursor-pointer">
                            <p>Categories</p>
                            <i
                                class="fa-solid fa-caret-down transition-transform duration-300 group-hover:rotate-180"></i>
                        </div>
                        <div
                            class="absolute text-sm bg-white border rounded shadow-md mt-2 w-48 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-20">
                            @foreach ($route['path'] as $subroute)
                                <a href="{{ url($subroute['path']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100">{{ $subroute['name'] }}</a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a class="hover:text-[#B5733A] {{ request()->is(ltrim(explode('../', $route['path'])[1], '/')) ? 'underline' : '' }}"
                        href="{{ url($route['path']) }}">{{ $route['name'] }}</a>
                @endif
            @endforeach --}}
        </div>
    </div>

    <div class="sm:flex items-center gap-7 text-xl text-gray-700 hidden">
        {{-- Search (for non-admin users) --}}
        @if (session('role') !== 'admin')
            <form method="post" action="{{ url()->current() }}" class="relative w-full max-w-md">
                @csrf
                <div
                    class="flex items-center bg-white border border-gray-300 rounded-full overflow-hidden shadow-sm focus-within:ring-2 focus-within:ring-[#B5733A] transition">
                    <i class="fa-solid fa-magnifying-glass px-4 text-gray-500"></i>
                    <input type="text" name="search_query" value="{{ session('search_query') ?? '' }}"
                        placeholder="Search for products..." class="flex-1 py-2 pr-10 text-sm focus:outline-none">
                    <input type="submit" name="btnSearch" class="hidden">
                    @if (!empty(session('search_query')))
                        <button type="submit" name="clearSearch" value="1"
                            class="px-3 text-gray-400 hover:text-black transition" title="Clear search">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    @endif
                </div>
            </form>
        @endif

        {{-- Auth Buttons or Profile --}}
        @if (!session('username'))
            <div class="sm:flex items-center gap-3 text-xl text-gray-700 hidden">
                <a href="{{ url('login') }}">
                    <button
                        class="rounded py-1 px-4 text-sm bg-[#B5733A] text-white hover:bg-[#9a5e2e] transition-all">Masuk</button>
                </a>
                <a href="{{ url('register') }}">
                    <button
                        class="rounded py-1 px-4 text-sm bg-[#B5733A] text-white hover:bg-[#9a5e2e] transition-all">Daftar</button>
                </a>
            </div>
        @else
            @if (session('role') !== 'admin')
                <a href="{{ url('../cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
            @endif
            <div class="relative group">
                @if (session('gambar'))
                    <img class="rounded-full w-[40px] cursor-pointer"
                        src="{{ asset('img/upload/' . session('gambar')) }}" alt="">
                @else
                    <img class="rounded-full w-[40px] cursor-pointer" src="{{ asset('img/default_pp.png') }}"
                        alt="">
                @endif

                <div
                    class="text-sm absolute right-0 bg-white border rounded shadow-md mt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-20">
                    <a href="{{ url('../profile') }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                    <a href="{{ url('../logout') }}" class="text-red-600 block px-4 py-2 hover:bg-gray-100">Logout</a>
                </div>
            </div>
        @endif
    </div>
</header>
