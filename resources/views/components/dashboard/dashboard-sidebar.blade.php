<aside class="w-64 bg-white border-r border-gray-100 flex flex-col fixed h-full z-10">
    <div class="h-20 flex items-center px-8 border-b border-gray-50 gap-2 items-center">
        <div
            class="w-8 h-8 rounded-xl bg-gradient-to-br from-indigo-600 to-violet-600 flex items-center justify-center text-white text-sm shadow-lg shadow-indigo-500/20 transition-transform group-hover:rotate-12">
            <i class="fa-solid fa-feather-pointed"></i>
        </div>
        <h1 class="text-2xl font-bold text-slate-900">glyphz<span class="text-indigo-600">.</span></h1>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-2">

        {{-- Dashboard --}}
        <a href="/dashboard"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->is('dashboard') ? 'bg-indigo-50 text-indigo-600 font-bold' : 'text-gray-500 hover:bg-gray-50 hover:text-indigo-600 font-medium group' }}">
            <i class="fa-solid fa-layer-group {{ request()->is('dashboard') ? '' : 'group-hover:text-indigo-500' }}"></i>
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

    <div class="p-4 border-t border-gray-50">
        <div class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-xl cursor-pointer transition-colors">
            <img src="https://ui-avatars.com/api/?name={{ $name }}&background=6366f1&color=fff"
                class="w-10 h-10 rounded-full">
            <div>
                <p class="text-sm font-bold text-slate-700">{{ $name }}</p>
                <p class="text-xs text-gray-400">Free Plan</p>
            </div>
        </div>
    </div>
</aside>
