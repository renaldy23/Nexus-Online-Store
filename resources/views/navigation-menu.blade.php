<header class="bg-white py-4 px-2 lg:px-0 border-b">
    <div class="container mx-auto max-w-6xl">
        <div class="flex justify-between items-center">
            <a href="">Contact Us</a>
            <div class="flex gap-4 items-center">
                @if (Auth::guard("web")->check())
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="bg-gray-100 inline-flex px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition">
                                    <i class="fas fa-user mr-2"></i>
                                    {{ Str::limit(Auth::guard("web")->user()->name, "10", '...') }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Manage Account
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                    @if (Auth::user()->store)
                        <a href="{{ route("store.index") }}">
                            <div class="flex items-center">
                                <img src="{{ asset("img/".Auth::user()->store->store_image) ?? "" }}" alt="store image" class="w-10 h-10 mr-2">
                                <p class="font-semibold">{{ Auth::user()->store->store_name ?? "" }}</p>
                            </div>
                        </a>
                    @else
                        <a href="{{route("store.index") }}" class="bg-blue-500 transition-colors duration-150 hover:bg-blue-600 flex items-center py-1 text-white px-2 rounded-lg">My Store</a>
                    @endif
                @else 
                    <a href="{{ route("login") }}" class="bg-blue-500 px-2 py-1 text-white rounded hover:bg-blue-600 transition-colors duration-150">
                        <i class="fas fa-sign-in-alt"></i>
                        Sign In
                    </a>
                @endif
            </div>
        </div>
    </div>
</header>
<nav class="bg-white py-4 px-2 lg:px-0">
    <div class="container mx-auto max-w-6xl">
        <div class="flex justify-between items-center">
            <div class="flex space-x-12 items-center">
                <div>
                    <a href="/">
                        <img src="{{ asset("img/logo.png") }}" alt="Image Logo">
                    </a>
                </div>
                <div class="hidden lg:flex">
                    <a href="/" class="{{ request()->is("/") ? "text-blue-600 border-b-2 border-blue-600" : "text-gray-400 border-none" }} font-semibold px-4 py-4 hover:text-blue-600">Home</a>
                    <a href="" class="text-gray-400 font-semibold px-4 hover:text-blue-600 py-4">All Products</a>
                </div>
            </div>
            <div class="hidden lg:flex items-center">
                <form action="" method="get">
                    <input type="text" name="search" id="search" class="border rounded-lg border-gray-300 bg-gray-100 focus:border-gray-500">
                    <button class="bg-gray-700 hover:bg-gray-800 py-2 px-3 text-white rounded-lg"><i class="fas fa-search"></i></button>
                </form>
                <a href="#" role="button" class="relative flex ml-2">
                    <svg class="flex-1 fill-current" viewbox="0 0 24 24" style="width: 1.70rem">
                        <path
                        d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"
                        />
                    </svg>
                    <span class="absolute right-0 rounded-full bg-red-600 w-4 h-4 top right p-0 m-0 text-white font-mono text-sm leading-tight text-center"
                        >0
                    </span>
                </a>
            </div>
            <div class="flex lg:hidden mobile-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </div>
        </div>
    </div>
    <div class="hidden lg:hidden md:hidden border-t mt-2 mobile-menu">
        <ul>
            <li>
                <a href="" class="block {{ request()->is("/") ? "bg-blue-600 text-white" : "text-gray-400 bg-none" }} font-semibold hover:text-blue-600 px-2 py-4">Home</a>
            </li>
            <li>
                <a href="" class="block text-gray-400 font-semibold hover:text-blue-600 px-2 py-4">All Products</a>
            </li>
            <hr/>
            <li>
                <form action="" method="get" class="py-4 flex">
                    <input type="text" name="search" id="search" class="w-full border rounded-lg border-gray-300 bg-gray-100 focus:border-gray-500">
                    <button class=" ml-2 bg-gray-700 py-2 px-3 text-white rounded-lg"><i class="fas fa-search"></i></button>
                </form>
            </li>
            <li class="inline-block">
                <a href="#" role="button" class="relative flex">
                    <svg class="flex-1 fill-current" viewbox="0 0 24 24" style="width: 1.70rem">
                        <path
                        d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"
                        />
                    </svg>
                    <span class="absolute right-0 rounded-full bg-red-600 w-4 h-4 top right p-0 m-0 text-white font-mono text-sm leading-tight text-center"
                        >0
                    </span>
                </a>
            </li>
        </ul>
    </div>
</nav>