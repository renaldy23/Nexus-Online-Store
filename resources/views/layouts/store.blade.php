<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">


        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- End Icons -->

        @livewireStyles
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="py-4 px-3 bg-white flex items-center justify-between">
            <div class="flex items-end">
                <img src="{{ asset("img/logo.png") }}" alt="Image Logo" class="">
            </div>
            <div class="flex">
                <div class="flex items-center">
                    <i class="fas fa-user-circle text-2xl mr-2"></i>
                    {{ Auth::user()->store->store_name }}
                    <div class="h-full bg-black ml-2" style="padding: 0px 1px"></div>
                </div>
                <span class="relative inline-block ml-2 mr-2">
                    <a href="">
                        <svg class="w-6 h-6 text-gray-700 fill-current" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="absolute top-0 right-0 inline-block text-xs px-1 text-white font-bold transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">0</span>
                    </a>
                </span>
            </div>
        </div>
        <div class="md:flex md:flex-row md:min-h-screen w-auto">
            <div @click.away="open = false" class="border-t flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0" x-data="{ open: false }">
                <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
                    <span class="flex lg:hidden md:hidden">
                        Seller Center
                    </span>
                    <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold {{ request()->is("my-dashboard") ? "bg-gray-200 text-gray-900" : "" }} rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route("store.dashboard") }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="ml-1">Dashboard</span>
                    </a>
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="{{ request()->is("product/create") || request()->is("category/create") ? "bg-gray-200 text-gray-900" : "" }} justify-between flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <span>
                                <i class="fas fa-boxes"></i>
                                <span class="ml-1">Products</span>
                            </span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route("product.create") }}">Create Products</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Show Products</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route("category.create") }}">Manage Category</a>
                            </div>
                        </div>
                    </div>
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">
                        <i class="fas fa-comment"></i>
                        <span class="ml-1">Disscussion</span>
                    </a>
                </nav>
            </div>
            <div class="container mx-auto max-w-7xl py-4">
                @yield('content')
            </div>
        </div>


        @stack('modals')

        @livewireScripts

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js" integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        @stack('script')
    </body>
</html>
