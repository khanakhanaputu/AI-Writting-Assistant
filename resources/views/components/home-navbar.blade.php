<nav class="fixed w-full z-50 top-0 left-0 bg-white/70 backdrop-blur-md border-b border-gray-100 px-6 md:px-10 py-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">

        <a href="#" class="flex items-center gap-2 font-bold text-2xl tracking-tighter text-slate-900">
            glyphz<span class="text-indigo-600">.</span>
        </a>

        <ul class="hidden md:flex items-center gap-10 text-gray-500 font-semibold text-sm">
            <li><a href="#features" class="hover:text-indigo-600 transition-colors">Features</a></li>
            <li><a href="#solutions" class="hover:text-indigo-600 transition-colors">Use Cases</a></li>
            <li><a href="#reviews" class="hover:text-indigo-600 transition-colors">Testimonials</a></li>
        </ul>

        <div class="hidden md:flex items-center gap-4">
            <a href="/login" class="text-sm font-bold text-gray-600 hover:text-indigo-600 px-4">Login</a>
            <button
                class="bg-slate-900 hover:bg-indigo-600 text-white px-6 py-2.5 rounded-2xl font-bold text-sm transition-all shadow-lg shadow-gray-200 hover:shadow-indigo-100">
                Get Started
            </button>
        </div>

        <button id="mobile-menu-button" class="md:hidden text-gray-600 text-2xl focus:outline-none">
            <i class="fa-solid fa-bars-staggered"></i>
        </button>
    </div>

    <div id="mobile-menu"
        class="hidden absolute top-full left-0 w-full bg-white border-b border-gray-100 p-6 flex flex-col gap-6 shadow-xl md:hidden transition-all">
        <ul class="flex flex-col gap-4 text-gray-600 font-bold">
            <li><a href="#" class="block hover:text-indigo-600">Features</a></li>
            <li><a href="#" class="block hover:text-indigo-600">Use Cases</a></li>
            <li><a href="#" class="block hover:text-indigo-600">Testimonials</a></li>
        </ul>
        <hr class="border-gray-50">
        <div class="flex flex-col gap-3">
            <a href="/login" class="text-center font-bold text-gray-600 py-2">Login</a>
            <button class="bg-indigo-600 text-white py-4 rounded-2xl font-bold">
                Get Started for Free
            </button>
        </div>
    </div>
</nav>

<script>
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        // Optional: Ganti ikon saat diklik
        const icon = btn.querySelector('i');
        icon.classList.toggle('fa-bars-staggered');
        icon.classList.toggle('fa-xmark');
    });
</script>

<style>
    body {
        padding-top: 80px;
    }
</style>
