<div x-data="{ sidebarOpen: false }">

    <div
        class="lg:hidden flex items-center justify-between bg-white border-b border-gray-100 p-4 fixed top-0 w-full z-30">
        <div class="flex items-center gap-2">
            <div
                class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-600 to-violet-600 flex items-center justify-center text-white text-xs">
                <i class="fa-solid fa-feather-pointed"></i>
            </div>
            <span class="font-bold text-slate-900">glyphz.</span>
        </div>
        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 hover:text-indigo-600 focus:outline-none">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
    </div>

    <div x-show="sidebarOpen" @click="sidebarOpen = false"
        x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-900/50 z-40 lg:hidden glass">
    </div>

    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-100 max-h-screen flex flex-col h-full transition-transform duration-300 ease-in-out 
               lg:translate-x-0 lg:fixed lg:inset-y-0 shadow-2xl lg:shadow-none">

        <div class="h-20 flex flex-shrink-0 items-center px-8 border-b border-gray-50 gap-2">
            <div
                class="w-8 h-8 rounded-xl bg-gradient-to-br from-indigo-600 to-violet-600 flex items-center justify-center text-white text-sm shadow-lg shadow-indigo-500/20 transition-transform group-hover:rotate-12">
                <i class="fa-solid fa-feather-pointed"></i>
            </div>
            <h1 class="text-2xl font-bold text-slate-900">glyphz<span class="text-indigo-600">.</span></h1>

            <button @click="sidebarOpen = false" class="ml-auto lg:hidden text-gray-400 hover:text-indigo-600">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            {{-- Dashboard --}}
            <a href="/dashboard"
                class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->is('dashboard') ? 'bg-indigo-50 text-indigo-600 font-bold' : 'text-gray-500 hover:bg-gray-50 hover:text-indigo-600 font-medium group' }}">
                <i
                    class="fa-solid fa-layer-group {{ request()->is('dashboard') ? '' : 'group-hover:text-indigo-500' }}"></i>
                Dashboard
            </a>

            {{-- Generate --}}
            <a href="/generate"
                class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->is('generate') ? 'bg-indigo-50 text-indigo-600 font-bold' : 'text-gray-500 hover:bg-gray-50 hover:text-indigo-600 font-medium group' }}">
                <i
                    class="fa-solid fa-wand-magic-sparkles {{ request()->is('generate') ? '' : 'group-hover:text-indigo-500' }}"></i>
                Generate
            </a>

            {{-- History --}}
            <a href="/history"
                class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->is('history') ? 'bg-indigo-50 text-indigo-600 font-bold' : 'text-gray-500 hover:bg-gray-50 hover:text-indigo-600 font-medium group' }}">
                <i class="fa-solid fa-clock {{ request()->is('history') ? '' : 'group-hover:text-indigo-500' }}"></i>
                History
            </a>

            {{-- Profile --}}
            <a href="/profile"
                class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->is('profile') ? 'bg-indigo-50 text-indigo-600 font-bold' : 'text-gray-500 hover:bg-gray-50 hover:text-indigo-600 font-medium group' }}">
                <i class="fa-solid fa-user {{ request()->is('profile') ? '' : 'group-hover:text-indigo-500' }}"></i>
                Profile
            </a>
        </nav>

        <div class="p-4 border-t border-gray-50 mt-auto flex-shrink-0">
            <a href="{{ route('profile') }}">
                <div class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-xl cursor-pointer transition-colors">
                    <img src="https://ui-avatars.com/api/?name={{ $name }}&background=6366f1&color=fff"
                        class="w-10 h-10 rounded-full">
                    <div>
                        <p class="text-sm font-bold text-slate-700">{{ $name }}</p>
                        <p class="text-xs text-gray-400">Free Plan</p>
                    </div>
                </div>
            </a>
        </div>
    </aside>

</div>
