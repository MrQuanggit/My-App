@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-gray-500 text-sm mb-1">Total Users</h3>
            <p class="text-2xl font-bold">{{ $stats['total_users'] }}</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-gray-500 text-sm mb-1">Total Orders</h3>
            <p class="text-2xl font-bold">{{ $stats['total_orders'] }}</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-gray-500 text-sm mb-1">Total Products</h3>
            <p class="text-2xl font-bold">{{ $stats['total_products'] }}</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-gray-500 text-sm mb-1">Revenue</h3>
            <p class="text-2xl font-bold text-green-600">${{ number_format($stats['revenue'], 2) }}</p>
        </div>
    </div>
@endsection
