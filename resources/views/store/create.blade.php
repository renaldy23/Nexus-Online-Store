<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Store</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- End Icons -->
</head>
<body class="font-sans antialiased bg-gray-100">
    
    <div class="container mx-auto max-w-7xl">
        <div class="min-h-screen py-14">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <img src="{{ asset("img/ilustration.png") }}" alt="Ilustration" class="mt-4">
                <div>
                    <div class="hidden justify-start mb-3 items-end lg:flex">
                        <img src="{{ asset("img/logo.png") }}" alt="">
                    </div>
                    <h2 class="font-semibold text-xl">Open a new store</h2>
                    <p class="font-medium text-gray-400 mb-2">Welcome to nexus seller . You don't have a store yet then let's create a new one and start selling your own products!</p>
                    <div class="bg-white rounded p-4 shadow-md">
                        <p class="font-semibold mb-1">Store Identity</p>
                        <hr>
                        <form action="{{ route("store.insert") }}" method="post" class="mt-3">
                            @csrf
                            <div class="mb-2">
                                <label for="">Store Name</label>
                                <input type="text" name="store_name" id="store_name" class="border block w-full rounded-lg border-gray-300 mt-1 focus:border-black" required>
                                @error('store_name')
                                    <span class="text-red-500 font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="">Phone Number</label>
                                <input type="number" name="store_phone_number" id="store_phone_number" class="border block w-full rounded-lg border-gray-300 mt-1 focus:border-black" required>
                                @error('store_phone_number')
                                    <span class="text-red-500 font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="">Description</label>
                                <textarea name="description" id="description" rows="4" class="block w-full border rounded border-gray-300 mt-1 focus:border-black resize-none" required></textarea>
                                @error('description')
                                    <span class="text-red-500 font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="">Store Provinces</label>
                                <select name="province" id="province" class="border block w-full rounded-lg border-gray-300 mt-1 focus:border-black" required>
                                    @foreach ($province as $prov)
                                        <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                    @endforeach
                                </select>
                                @error('province')
                                    <span class="text-red-500 font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2" id="regencies-content" style="display: none;">
                                <label for="">Store Regencies</label>
                                <select name="regencies" id="regencies" class="border block w-full rounded-lg border-gray-300 mt-1 focus:border-black" required>
                                
                                </select>
                                @error('regencies')
                                    <span class="text-red-500 font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2" id="districts-content" style="display: none;">
                                <label for="">Store District</label>
                                <select name="districts" id="districts" class="border block w-full rounded-lg border-gray-300 mt-1 focus:border-black" required>
                                
                                </select>
                                @error('districts')
                                    <span class="text-red-500 font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2" id="address-content" style="display: none">
                                <label for="">Address</label>
                                <textarea name="address" id="address" rows="4" class="block w-full border rounded-lg border-gray-300 mt-1 focus:border-black resize-none" required></textarea>
                                @error('address')
                                    <span class="text-red-500 font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="mt-2 bg-blue-500 px-4 py-2 text-white rounded" style="display: none" id="btn-save">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset("js/menu.js") }}"></script>
    <script src="{{ asset("js/jquery.js") }}"></script>
    <script>
        $("#province").on("change", function () {
            let id = this.value;
            $.ajax({
                type: "GET",
                url: "{{ route('indoregion.provinces') }}",
                data: {
                    id: id,
                },
                dataType: "json",
                success: function (response) {
                    $("#regencies-content").css("display", "block");
                    $("#regencies").html("");
                    $.each(response.regencies, (i, n) => {
                        $("#regencies").append(
                            `<option value="` + n.id + `">` + n.name + `</option>`
                        );
                    });
                },
            });
        });
        $("#regencies").on("change", function () {
            let id = this.value;
            $.ajax({
                type: "GET",
                url: "{{ route('indoregion.districts') }}",
                data: {
                    id: id,
                },
                dataType: "json",
                success: function (response) {
                    $("#districts-content").css("display", "block");
                    $("#districts").html("");
                    $.each(response.districts, (i,n) => {
                        $("#districts").append(
                            `<option value="` + n.id + `">` + n.name + `</option>`
                        );
                    });
                    $("#address-content").css("display", "block");
                    $("#btn-save").css("display", "block");
                },
            });
        });
    </script>
</body>
</html>