<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-slate-50 font-sans" x-data="{ sidebarOpen: false }">

    <div class="flex min-h-screen">

        <x-dashboard.dashboard-sidebar>
            <x-slot name="name">
                {{ auth()->user()->name }}
            </x-slot>
        </x-dashboard.dashboard-sidebar>

        <main class="flex-1 w-full transition-all duration-300 flex flex-col md:ml-64">

            <x-dashboard.dashboard-header>
                <x-slot name="name">
                    {{ auth()->user()->name }}
                </x-slot>
            </x-dashboard.dashboard-header>

            <div class="p-4 lg:p-8 overflow-y-auto">
                @yield('dashboard-content')
            </div>

        </main>

    </div>

    <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity
        class="fixed inset-0 bg-gray-900/50 z-30 lg:hidden">
    </div>

</body>

</html>
