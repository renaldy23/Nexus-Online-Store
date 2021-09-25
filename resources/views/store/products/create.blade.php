@extends('layouts.store')

@section('content')
    <h2 class="text-xl font-extrabold">New Product</h2>
    <hr>
    <form action="" method="post">
        @csrf
        <div class="mt-3 p-4 rounded bg-white">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div>
                    <span class="flex">
                        <h1 class="font-semibold">Product Image</h1>
                        <p class="ml-2 bg-gray-200 text-gray-500 px-1 rounded text-xs flex items-center">required</p>
                    </span>
                    <p class="text-gray-400">
                        Product image can contain various of image extension such as .jpg , .jpeg , .png
                        You have to upload minimum 3 photos so you're product can make your customer interest
                        and trustable
                    </p>
                </div>
                <div class="col-span-2 grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div class="bg-white p-4 rounded shadow">
                        <p class="mb-2 font-semibold">Image Cover</p>
                        <input type="file" name="cover" id="cover" class="" onchange="loadCoverImge(event)">
                        <img src="{{ asset("img/default_img_product.jpg") }}" width="100" class="mt-2 rounded" id="coverImg">
                    </div>
                    <div class="bg-white p-4 rounded shadow">
                        <p class="mb-2 font-semibold">Image 1</p>
                        <input type="file" name="image1" id="cover" class="" onchange="loadImage1(event)">
                        <img src="{{ asset("img/default_img_product.jpg") }}" width="100" class="mt-2 rounded" id="image1">
                    </div>
                    <div class="bg-white p-4 rounded shadow">
                        <p class="mb-2 font-semibold">Image 2</p>
                        <input type="file" name="image2" id="cover" class="" onchange="loadImage2(event)">
                        <img src="{{ asset("img/default_img_product.jpg") }}" width="100" class="mt-2 rounded" id="image2">
                    </div>
                    <div class="bg-white p-4 rounded shadow">
                        <p class="mb-2 font-semibold">Image 3</p>
                        <input type="file" name="image3" id="cover" class="" onchange="loadImage3(event)">
                        <img src="{{ asset("img/default_img_product.jpg") }}" width="100" class="mt-2 rounded" id="image3">
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 p-4 rounded bg-white">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div>
                    <span class="flex">
                        <h1 class="font-semibold">Product Information</h1>
                        <p class="ml-2 bg-gray-200 text-gray-500 px-1 rounded text-xs flex items-center">required</p>
                    </span>
                    <p class="text-gray-400">
                        You have to added a general information about your product product name and price .
                        Use spesific name so your customer can find your product much easier
                    </p>
                </div>
                <div class="col-span-2">
                    <div class="mb-3">
                        <label for="name" class="block mb-2">Product Name</label>
                        <input type="text" name="name" id="name" class="outline-none w-full rounded border-none bg-gray-200 focus:ring-1 focus:ring-blue-500">
                    </div>
                    <div class="">
                        <label for="categories" class="block mb-2">Category</label>
                        <select name="categories" id="categories" class="outline-none w-full rounded border-none bg-gray-200 focus:ring-1 focus:ring-blue-500">
                            <option selected disabled>Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 p-4 rounded bg-white">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div>
                    <span class="flex">
                        <h1 class="font-semibold">Product Variant</h1>
                    </span>
                    <p class="text-gray-400">
                        Add some variant such as color , size and other . Pick minimum 2 variant for your products
                    </p>
                </div>
                <div class="col-span-2">
                    <div class="flex justify-end items-center">
                        <button type="button" class="border-black border-2 rounded-lg px-5 py-1 text-black font-bold transition-colors mr-3" value="save-and-new" name="savenew">
                            <i class="fas fa-plus"></i>
                            Add Variant
                        </button>
                    </div>
                    <div class="mt-3">
                        <div class=" grid grid-cols-1 lg:grid-cols-3 gap-4 items-center">
                           <div>
                                <label for="type">Variant Type</label>
                                <select name="type" id="type" class="outline-none w-full rounded border-none bg-gray-200 focus:ring-1 focus:ring-blue-500">
                                    <option disabled>Select Type</option>
                                </select>
                           </div>
                           <div>
                                <label for="variant_name">Variant Name</label>
                                <input type="text" name="variant_name" id="variant_name" class="outline-none w-full rounded border-none bg-gray-200 focus:ring-1 focus:ring-blue-500">
                           </div>
                           <div>
                               <label for="variant_sku">Variant SKU</label>
                               <input type="text" name="variant_name" id="variant_name" class="outline-none w-full rounded border-none bg-gray-200 focus:ring-1 focus:ring-blue-500">
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 p-4 rounded bg-white">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div>
                    <span class="flex">
                        <h1 class="font-semibold">Product Detail</h1>
                        <p class="ml-2 bg-gray-200 text-gray-500 px-1 rounded text-xs flex items-center">required</p>
                    </span>
                    <p class="text-gray-400">
                        Include a complete description and price according to the product, such as excellence,
                        specifications, material, size, validity period, and others. The length of
                        the description is between 450-2000 characters.
                    </p>
                </div>
                <div class="col-span-2">
                    <div class="mb-3">
                        <label for="name" class="block mb-2">Description</label>
                        <textarea name="description" id="editor1"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="block mb-2">Price</label>
                        <div class="flex items-center">
                            <p class="bg-gray-400 pl-2 pr-3 py-2 text-center rounded-l text-white">RP</p>
                            <input type="text" name="price" id="price" class="outline-none w-full rounded-r border-none bg-gray-200 focus:ring-1 focus:ring-blue-500">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="sku" class="block mb-2">SKU</label>
                        <input type="text" name="sku" id="sku" class="outline-none w-full rounded border-none bg-gray-200 focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 p-4 rounded bg-white">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div>
                    <span class="flex">
                        <h1 class="font-semibold">Product Shipping</h1>
                        <p class="ml-2 bg-gray-200 text-gray-500 px-1 rounded text-xs flex items-center">required</p>
                    </span>
                    <p class="text-gray-400">
                        Input product volume and weight after packing , for shipping requirement .
                    </p>
                </div>
                <div class="col-span-2">
                    <div class="mb-3">
                        <label for="price" class="block mb-2">Weight</label>
                        <div class="flex items-center">
                            <input type="text" name="weight" id="price" class="outline-none w-1/2 rounded-l border-none bg-gray-200 focus:ring-1 focus:ring-blue-500">
                            <p class="bg-gray-400 pl-2 pr-2 py-2 text-center rounded-r  text-white">Gram</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="block mb-2">Volume</label>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="flex items-center">
                                <input type="text" name="width" id="width" class="outline-none w-full rounded-l border-none bg-gray-200 focus:ring-1 focus:ring-blue-500" placeholder="Width">
                                <p class="bg-gray-400 pl-2 pr-2 py-2 text-center rounded-r  text-white">Cm</p>
                            </div>
                            <div class="flex items-center">
                                <input type="text" name="length" id="length" class="outline-none w-full rounded-l border-none bg-gray-200 focus:ring-1 focus:ring-blue-500" placeholder="Length">
                                <p class="bg-gray-400 pl-2 pr-2 py-2 text-center rounded-r  text-white">Cm</p>
                            </div>
                            <div class="flex items-center">
                                <input type="text" name="height" id="height" class="outline-none w-full rounded-l border-none bg-gray-200 focus:ring-1 focus:ring-blue-500" placeholder="Height">
                                <p class="bg-gray-400 pl-2 pr-2 py-2 text-center rounded-r  text-white">Cm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end mt-5">
            <button type="submit" class="border-red-500 border-2 rounded-lg px-10 py-2 text-red-500 font-bold hover:border-red-600 hover:text-red-600 transition-colors mr-3" value="save-and-new" name="savenew">Save & New</button>
            <button type="submit" class="bg-red-500 rounded-lg px-10 py-2 mr-2 lg:mr-0 text-white font-bold hover:bg-red-600 duration-100 transition-colors" value="only-save" name="onlysave">Save</button>
        </div>
    </form>
@endsection
@push('script')
    <script>
        CKEDITOR.replace( 'editor1' );
        function loadCoverImge(event){
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.querySelector('#coverImg');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function loadImage1(event) {
            var reader = new FileReader();
            reader.onload = ()=>{
                var output = document.querySelector("#image1")
                output.src = reader.result
            }
            reader.readAsDataURL(event.target.files[0])
        }

        function loadImage2(event) {
            var reader = new FileReader()
            reader.onload = ()=>{
                var output = document.querySelector("#image2")
                output.src = reader.result
            }
            reader.readAsDataURL(event.target.files[0])
        }

        function loadImage3(event) {
            var reader = new FileReader()
            reader.onload = ()=>{
                var output = document.querySelector("#image3")
                output.src = reader.result
            }
            reader.readAsDataURL(event.target.files[0])
        }
    </script>
@endpush
