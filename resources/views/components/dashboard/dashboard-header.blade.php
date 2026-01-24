<header
    class="w-full bg-white border-b border-gray-200 px-4 lg:px-8 py-4 flex justify-between items-center sticky top-0 z-20">

    <div class="flex items-center gap-3">
        <button @click="sidebarOpen = !sidebarOpen" class="text-slate-500 hover:text-indigo-600 lg:hidden">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>

        <div>
            <h2 class="text-lg lg:text-xl font-bold text-slate-800">Dashboard</h2>
            <p class="text-[10px] lg:text-xs text-gray-500">Welcome back, {{ auth()->user()->name }}</p>
        </div>
    </div>

    <div class="flex items-center gap-4 lg:gap-6">

        <div class="h-6 w-px bg-gray-200 hidden md:block"></div>

        <div class="flex items-center gap-4">
            <a href="{{ route('profile') }}">
                <div class="flex items-center gap-3 cursor-pointer group">
                    <div class="text-right hidden md:block">
                        <div class="text-sm font-bold text-slate-700 leading-none">{{ $name ?? 'User' }}</div>
                        <div class="text-[10px] font-medium text-gray-400 mt-1">
                            {{ auth()->user()->email ?? 'email@example.com' }}</div>
                    </div>

                    <img src="https://ui-avatars.com/api/?name={{ $name ?? 'JD' }}&background=6366f1&color=fff&size=128"
                        alt="Profile"
                        class="w-8 h-8 lg:w-9 lg:h-9 rounded-full ring-2 ring-white shadow-sm object-cover">
                </div>
            </a>
        </div>
    </div>
</header>
