<nav x-data="{
    mobileOpen: false,
    scrolled: false
}" @scroll.window="scrolled = (window.pageYOffset > 20)"
    class="fixed w-full z-50 top-0 left-0 transition-all duration-300 border-b"
    :class="scrolled ? 'bg-white/80 backdrop-blur-lg border-indigo-100 shadow-sm py-3' :
        'bg-transparent border-transparent py-5'">

    <div class="max-w-7xl mx-auto px-6 md:px-10 flex items-center justify-between">

        <a href="#" class="flex items-center gap-2.5 group">
            <div
                class="w-8 h-8 rounded-xl bg-gradient-to-br from-indigo-600 to-violet-600 flex items-center justify-center text-white text-sm shadow-lg shadow-indigo-500/20 transition-transform group-hover:rotate-12">
                <i class="fa-solid fa-feather-pointed"></i>
            </div>
            <span class="font-bold text-2xl tracking-tighter text-slate-900">
                glyphz<span class="text-indigo-600">.</span>
            </span>
        </a>

        <ul class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-500">
            <li>
                <a href="#features" class="relative hover:text-indigo-600 transition-colors py-2 group">
                    Features
                    <span
                        class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </li>
            <li>
                <a href="#solutions" class="relative hover:text-indigo-600 transition-colors py-2 group">
                    Use Cases
                    <span
                        class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </li>
            <li>
                <a href="#reviews" class="relative hover:text-indigo-600 transition-colors py-2 group">
                    Testimonials
                    <span
                        class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </li>
        </ul>

        <div class="hidden md:flex items-center gap-4">
            <a href="/login" class="text-sm font-bold text-slate-600 hover:text-indigo-600 px-4 transition-colors">
                Login
            </a>

            <button
                class="group relative overflow-hidden bg-slate-900 text-white px-6 py-2.5 rounded-2xl font-bold text-sm transition-all hover:bg-indigo-600 hover:shadow-lg hover:shadow-indigo-500/30 hover:-translate-y-0.5">
                <span class="relative z-10">Get Started</span>
                <div
                    class="absolute inset-0 -translate-x-full group-hover:animate-[shimmer_1.5s_infinite] bg-gradient-to-r from-transparent via-white/20 to-transparent z-0">
                </div>
            </button>
        </div>

        <button @click="mobileOpen = !mobileOpen"
            class="md:hidden text-slate-600 text-2xl focus:outline-none transition-transform"
            :class="mobileOpen ? 'rotate-90' : ''">
            <i class="fa-solid" :class="mobileOpen ? 'fa-xmark' : 'fa-bars-staggered'"></i>
        </button>
    </div>

    <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-5" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-5" @click.outside="mobileOpen = false"
        class="absolute top-full left-0 w-full bg-white/95 backdrop-blur-xl border-b border-gray-100 p-6 flex flex-col gap-6 shadow-xl md:hidden">

        <ul class="flex flex-col gap-4 text-slate-600 font-bold text-lg">
            <li><a href="#features" @click="mobileOpen = false"
                    class="block hover:text-indigo-600 hover:translate-x-2 transition-all">Features</a></li>
            <li><a href="#solutions" @click="mobileOpen = false"
                    class="block hover:text-indigo-600 hover:translate-x-2 transition-all">Use Cases</a></li>
            <li><a href="#reviews" @click="mobileOpen = false"
                    class="block hover:text-indigo-600 hover:translate-x-2 transition-all">Testimonials</a></li>
        </ul>

        <hr class="border-gray-100">

        <div class="flex flex-col gap-3">
            <a href="/login"
                class="text-center font-bold text-slate-600 py-3 hover:bg-gray-50 rounded-xl transition-colors">Login</a>
            <button
                class="bg-indigo-600 text-white py-4 rounded-xl font-bold shadow-lg shadow-indigo-200 active:scale-95 transition-all">
                Get Started for Free
            </button>
        </div>
    </div>
</nav>

<style>
    @keyframes shimmer {
        100% {
            transform: translateX(100%);
        }
    }

    /* Mencegah konten tertutup navbar karena fixed position */
    body {
        /* Tidak perlu padding-top besar jika navbar transparan di awal,
           tapi sesuaikan dengan kebutuhan Hero section */
    }
</style>
