<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="flex h-screen bg-slate-50 font-sans">

        <aside class="w-64 bg-white border-r border-gray-100 flex flex-col fixed h-full z-10">
            <div class="h-20 flex items-center px-8 border-b border-gray-50">
                <h1 class="text-2xl font-bold text-slate-900">glyphz<span class="text-indigo-600">.</span></h1>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 bg-indigo-50 text-indigo-600 rounded-xl font-bold transition-all">
                    <i class="fa-solid fa-layer-group"></i>
                    Dashboard
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-indigo-600 rounded-xl font-medium transition-all group">
                    <i class="fa-solid fa-pen-nib group-hover:text-indigo-500"></i>
                    My Drafts
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-indigo-600 rounded-xl font-medium transition-all group">
                    <i class="fa-solid fa-wand-magic-sparkles group-hover:text-indigo-500"></i>
                    Templates
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-indigo-600 rounded-xl font-medium transition-all group">
                    <i class="fa-solid fa-gear group-hover:text-indigo-500"></i>
                    Settings
                </a>
            </nav>

            <div class="p-4 border-t border-gray-50">
                <div class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-xl cursor-pointer transition-colors">
                    <img src="https://ui-avatars.com/api/?name=User&background=6366f1&color=fff"
                        class="w-10 h-10 rounded-full">
                    <div>
                        <p class="text-sm font-bold text-slate-700">John Doe</p>
                        <p class="text-xs text-gray-400">Free Plan</p>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1 ml-64 overflow-y-auto">
            <header
                class="w-full bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center sticky top-0 z-20">
                <div>
                    <h2 class="text-xl font-bold text-slate-800">Dashboard</h2>
                    <p class="text-xs text-gray-500">Welcome back, John</p>
                </div>

                <div class="flex items-center gap-6">

                    <div class="relative hidden md:block">
                        <i
                            class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                        <input type="text" placeholder="Search..."
                            class="pl-9 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs focus:outline-none focus:border-indigo-500 focus:bg-white transition-colors w-48">
                    </div>

                    <div class="h-6 w-px bg-gray-200 hidden md:block"></div>

                    <div class="flex items-center gap-4">

                        <button class="relative text-gray-400 hover:text-indigo-600 transition-colors">
                            <i class="fa-regular fa-bell text-lg"></i>
                            <span class="absolute -top-1 -right-1 flex h-2.5 w-2.5">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-rose-500"></span>
                            </span>
                        </button>

                        <div class="flex items-center gap-3 cursor-pointer group">
                            <div class="text-right hidden md:block">
                                <div class="text-sm font-bold text-slate-700 leading-none">John Doe</div>
                                <div class="text-[10px] font-medium text-gray-400 mt-1">john@glyphz.ai</div>
                            </div>

                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=6366f1&color=fff&size=128"
                                alt="Profile" class="w-9 h-9 rounded-full ring-2 ring-white shadow-sm object-cover">

                            <i
                                class="fa-solid fa-chevron-down text-[10px] text-gray-400 group-hover:text-indigo-600 transition-colors"></i>
                        </div>
                    </div>
                </div>
            </header>


            @yield('dashboard-content')
        </main>
    </div>
</body>

</html>
