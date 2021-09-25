@extends('layouts.store')

@section('content')
    <div class="bg-blue-600 py-4 px-3 rounded">
        <p class="text-lg text-white font-semibold">Hello welcome to seller center .</p>
        <p class="text-gray-200">So many thing that you can do here . Manage your own products with many features inside it . See available disscussion for every each products that you have . And manage your customers transaction , until customer order is arrived . </p>
    </div>
    <div class="mt-4">
        <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
            <div class="bg-white py-3 px-4 rounded-lg">
                <p class="text-gray-400">Total Products</p>
                <p class="mt-5 text-xl font-semibold">0</p>
            </div>
            <div class="bg-white py-3 px-4 rounded-lg">
                <p class="text-gray-400">Total Transaction</p>
                <p class="mt-5 text-xl font-semibold">0</p>
            </div>
            <div class="bg-white py-3 px-4 rounded-lg">
                <p class="text-gray-400">Succes Transaction</p>
                <p class="mt-5 text-xl font-semibold">0</p>
            </div>
            <div class="bg-white py-3 px-4 rounded-lg">
                <p class="text-gray-400">Total Discussion</p>
                <p class="mt-5 text-xl font-semibold">0</p>
            </div>
            <div class="bg-white py-3 px-4 rounded-lg">
                <p class="text-gray-400">Store Balance</p>
                <p class="mt-5 text-xl font-semibold">Rp . 0-,</p>
            </div>
        </div>
    </div>

    <div class="mt-7">
        <h1 class="font-bold text-xl px-2 lg:px-0">
            <i class="fas fa-chart-bar"></i>
            Store Statistics
        </h1>
        <div class="bg-gray-300 w-full mt-2" style="padding: 1.2px"></div>
        <div class="mt-4 grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div class="bg-white p-4 rounded-lg">
                <canvas id="myChart1"></canvas>
            </div>
            <div class="bg-white p-4 rounded-lg">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
    var ctx = document.getElementById('myChart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January','February','March','April','May','June','July','August','September','October','November','December'],
            datasets: [{
                label: 'Success Transaction',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
@push('script')
    <script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January','February','March','April','May','June','July','August','September','October','November','December'],
            datasets: [{
                label: 'Balance',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush