<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex">

<!-- Sidebar -->
<aside class="w-64 bg-white shadow-md hidden md:flex flex-col">
    <div class="p-4 text-2xl font-bold text-blue-600 border-b">
        <a href="{{ route('admin.dashboard') }}">Admin</a>
    </div>

    <nav class="flex-1 p-4 space-y-1">
        <a href="{{ route('admin.dashboard') }}"
           class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-100 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-200 font-semibold' : '' }}">
            Dashboard
        </a>

        <a href="#"
           class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-100">
            Orders
        </a>

        <a href="#"
           class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-100">
            Products
        </a>

        <a href="#"
           class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-100">
            Users
        </a>
    </nav>

    <div class="p-4 border-t">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit"
                    class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600">
                Logout
            </button>
        </form>
    </div>
</aside>

<!-- Main content -->
<main class="flex-1 flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow-sm p-4 flex justify-between items-center">
        <h1 class="text-xl font-semibold">@yield('title', 'Dashboard')</h1>
        <div class="flex items-center gap-3">
                <span class="text-gray-600 text-sm">
                    {{ auth()->user()->name ?? 'Admin' }}
                </span>
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'A') }}&background=random"
                 alt="avatar" class="w-8 h-8 rounded-full">
        </div>
    </header>

    <!-- Page content -->
    <section class="flex-1 p-6">
        @yield('content')
    </section>
</main>

</body>
</html>
