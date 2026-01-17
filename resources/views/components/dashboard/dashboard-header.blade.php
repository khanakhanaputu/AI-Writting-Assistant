<header class="w-full bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center sticky top-0 z-20">
    <div>
        <h2 class="text-xl font-bold text-slate-800">Dashboard</h2>
        <p class="text-xs text-gray-500">Welcome back, John</p>
    </div>

    <div class="flex items-center gap-6">


        <div class="h-6 w-px bg-gray-200 hidden md:block"></div>

        <div class="flex items-center gap-4">


            <a href="{{ route('profile') }}">
                <div class="flex items-center gap-3 cursor-pointer group">
                    <div class="text-right hidden md:block">
                        <div class="text-sm font-bold text-slate-700 leading-none">{{ $name }}</div>
                        <div class="text-[10px] font-medium text-gray-400 mt-1">{{ auth()->user()->email }}</div>
                    </div>

                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=6366f1&color=fff&size=128"
                        alt="Profile" class="w-9 h-9 rounded-full ring-2 ring-white shadow-sm object-cover">

                </div>
            </a>
        </div>
    </div>
</header>
