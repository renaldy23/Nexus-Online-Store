@extends('layouts.store')

@section('content')
    <div class="bg-white p-4 rounded">
        <h2 class="mb-3 text-xl font-bold">New Category</h2>
        <hr>
        @error('category_name')
            <p class="text-red-500 font-semibold mt-2">{{ $message }}</p>
        @enderror
        <form action="{{ route("category.store") }}" method="post" class="mt-3 flex">
            @csrf
            <input type="text" name="category_name" id="category_name" class="bg-gray-200 w-full outline-none border-none rounded-lg mr-2" required>
            <button type="submit" class="bg-red-600 px-3 rounded-lg text-white hover:bg-red-700 transition-colors duration-150">Save</button>
        </form>
    </div>
    <div class="mt-4 bg-white p-4 rounded">
        <h2 class="mb-3 text-xl font-bold">Categories</h2>
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Category Name</th>
                    <th class="py-3 px-6 text-left">Status</th>
                    <th class="py-3 px-6 text-center">Total Products</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($categories as $category)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            {{ $category->category_name }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                @if ($category->isActive == 1)
                                    <span class="px-2 bg-green-400 text-white font-bold rounded">Active</span>
                                @else
                                    <span class="px-2 bg-red-500 text-white font-bold rounded">Not Active</span>
                                @endif
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                {{ $category->product->count() }} Product
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
