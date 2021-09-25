<x-app-layout>
    <div class="container mx-auto py-4 max-w-6xl">
        <div class="p-4 bg-white rounded">
            <div class="grid lg:grid-cols-2 grid-cols-1">
                <img src="{{ asset("img/".$store->store_image) }}" alt="" class="">
                <div>
                    <h2 class="text-xl font-semibold mb-2">{{ $store->store_name }}</h2>
                    <p>{{ $store->description }}</p>
                    <div class="mt-4">
                        <div class="grid lg:grid-cols-3 grid-cols-2">
                            <div class="mb-2">
                                <h2 class="text-gray-400 font-medium">All Products</h2>
                                <p class="font-bold text-lg">0</p>
                            </div>
                            <div class="mb-2">
                                <h2 class="text-gray-400 font-medium">All Transaction</h2>
                                <p class="font-bold text-lg">0</p>
                            </div>
                            <div class="mb-2">
                                <h2 class="text-gray-400 font-medium">Success Transaction</h2>
                                <p class="font-bold text-lg">0</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route("store.dashboard") }}" class="border-2 border-gray-800 px-2 py-2 rounded hover:bg-gray-800 hover:text-white transition-colors duration-150">My Dashboard</a>
                    </div>
                    <div class="mt-9 flex">
                        <p class="text-gray-400">Since : &nbsp;</p><p class="font-semibold">{{ date("M-Y",strtotime($store->created_at)) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <h2 class="text-xl">My Products</h2>
            <div class="bg-gray-300" style="padding: 1px"></div>
            <p class="text-center mt-3">No products to show</p>
        </div>
    </div>
</x-app-layout>