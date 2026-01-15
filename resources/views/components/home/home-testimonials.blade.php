<section class="relative py-32 px-6 overflow-hidden bg-slate-50" id="reviews">

    <div class="absolute inset-0 -z-20 overflow-hidden pointer-events-none">
        <div
            class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-100/40 rounded-full mix-blend-multiply filter blur-[128px] opacity-70 animate-blob">
        </div>
        <div
            class="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-100/40 rounded-full mix-blend-multiply filter blur-[128px] opacity-70 animate-blob animation-delay-2000">
        </div>
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
    </div>

    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-24">
            <div
                class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-indigo-100 shadow-sm mb-6">
                <i class="fa-solid fa-heart text-rose-500 text-xs animate-pulse"></i>
                <span class="text-xs font-bold text-slate-600 uppercase tracking-widest">Wall of Love</span>
            </div>

            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mt-2 tracking-tight">
                Loved by creators <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-violet-600 font-serif italic">worldwide.</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div x-data="{ x: 0, y: 0 }"
                @mousemove="const rect = $el.getBoundingClientRect(); x = e.clientX - rect.left; y = e.clientY - rect.top;"
                class="group relative rounded-[2.5rem] bg-slate-200 p-[1px] transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-500/10 hover:-translate-y-2">

                <div class="absolute inset-0 rounded-[2.5rem] opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                    :style="`background: radial-gradient(400px circle at ${x}px ${y}px, rgba(99, 102, 241, 0.4), transparent 40%);`">
                </div>

                <div
                    class="relative h-full bg-white rounded-[2.4rem] p-10 flex flex-col justify-between overflow-hidden isolate">

                    <div
                        class="absolute -top-6 -right-6 text-9xl text-slate-50 group-hover:text-indigo-50 transition-colors duration-500 -z-10 font-serif">
                        "</div>

                    <div>
                        <div class="flex text-amber-400 gap-1 mb-6 text-sm">
                            <i class="fa-solid fa-star drop-shadow-sm"></i>
                            <i class="fa-solid fa-star drop-shadow-sm"></i>
                            <i class="fa-solid fa-star drop-shadow-sm"></i>
                            <i class="fa-solid fa-star drop-shadow-sm"></i>
                            <i class="fa-solid fa-star drop-shadow-sm"></i>
                        </div>

                        <p class="text-slate-600 text-lg leading-relaxed mb-8 relative z-10">
                            "The tone selector is a <span
                                class="bg-indigo-50 text-indigo-700 px-1 font-semibold rounded">game-changer</span>. I
                            can switch from a professional LinkedIn post to a witty Instagram caption in one click."
                        </p>
                    </div>

                    <div class="flex items-center gap-4 border-t border-slate-50 pt-6">
                        <div class="relative">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-violet-500 rounded-full opacity-0 group-hover:opacity-100 blur transition duration-500">
                            </div>
                            <img src="https://ui-avatars.com/api/?name=Sarah+J&background=6366f1&color=fff"
                                alt="User"
                                class="relative w-12 h-12 rounded-full border-2 border-white object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">Sarah Jenkins</h4>
                            <p class="text-[11px] font-bold text-indigo-500 uppercase tracking-wider">Social Media
                                Manager</p>
                        </div>
                    </div>
                </div>
            </div>

            <div x-data="{ x: 0, y: 0 }"
                @mousemove="const rect = $el.getBoundingClientRect(); x = e.clientX - rect.left; y = e.clientY - rect.top;"
                class="group relative rounded-[2.5rem] bg-slate-200 p-[1px] transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-500/10 hover:-translate-y-2">

                <div class="absolute inset-0 rounded-[2.5rem] opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                    :style="`background: radial-gradient(400px circle at ${x}px ${y}px, rgba(99, 102, 241, 0.4), transparent 40%);`">
                </div>

                <div
                    class="relative h-full bg-white rounded-[2.4rem] p-10 flex flex-col justify-between overflow-hidden isolate">
                    <div
                        class="absolute -top-6 -right-6 text-9xl text-slate-50 group-hover:text-indigo-50 transition-colors duration-500 -z-10 font-serif">
                        "</div>

                    <div>
                        <div class="flex text-amber-400 gap-1 mb-6 text-sm">
                            <i class="fa-solid fa-star drop-shadow-sm"></i>
                            <i class="fa-solid fa-star drop-shadow-sm"></i>
                            <i class="fa-solid fa-star drop-shadow-sm"></i>
                            <i class="fa-solid fa-star drop-shadow-sm"></i>
                            <i class="fa-solid fa-star drop-shadow-sm"></i>
                        </div>

                        <p class="text-slate-600 text-lg leading-relaxed mb-8 relative z-10">
                            "As a founder, I don't have time to write. The <span
                                class="bg-indigo-50 text-indigo-700 px-1 font-semibold rounded">Smart Context</span>
                            feature lets me dump my messy thoughts, and Glyphz turns them into a polished pitch."
                        </p>
                    </div>

                    <div class="flex items-center gap-4 border-t border-slate-50 pt-6">
                        <div class="relative">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-violet-500 rounded-full opacity-0 group-hover:opacity-100 blur transition duration-500">
                            </div>
                            <img src="https://ui-avatars.com/api/?name=Marcus+T&background=4f46e5&color=fff"
                                alt="User"
                                class="relative w-12 h-12 rounded-full border-2 border-white object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">Marcus Thorne</h4>
                            <p class="text-[11px] font-bold text-indigo-500 uppercase tracking-wider">Tech Entrepreneur
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div x-data="{ x: 0, y: 0 }"
                @mousemove="const rect = $el.getBoundingClientRect(); x = e.clientX - rect.left; y = e.clientY - rect.top;"
                class="group relative rounded-[2.5rem] bg-slate-200 p-[1px] transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-500/10 hover:-translate-y-2">

                <div class="absolute inset-0 rounded-[2.5rem] opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                    :style="`background: radial-gradient(400px circle at ${x}px ${y}px, rgba(99, 102, 241, 0.4), transparent 40%);`">
                </div>

                <div
                    class="relative h-full bg-white rounded-[2.4rem] p-10 flex flex-col justify-between overflow-hidden isolate">
                    <div
                        class="absolute -top-6 -right-6 text-9xl text-slate-50 group-hover:text-indigo-50 transition-colors duration-500 -z-10 font-serif">
                        "</div>

                    <div>
                        <div class="flex text-amber-400 gap-1 mb-6 text-sm">
                            <i class="fa-solid fa-star drop-shadow-sm"></i>
                            <i class="fa-solid fa-star drop-shadow-sm"></i>
                            <i class="fa-solid fa-star drop-shadow-sm"></i>
                            <i class="fa-solid fa-star drop-shadow-sm"></i>
                            <i class="fa-solid fa-star-half-stroke drop-shadow-sm"></i>
                        </div>

                        <p class="text-slate-600 text-lg leading-relaxed mb-8 relative z-10">
                            "The multi-language support is <span
                                class="bg-indigo-50 text-indigo-700 px-1 font-semibold rounded">flawless</span>. I've
                            been using it to localize my blog posts for global markets. Saves me thousands!"
                        </p>
                    </div>

                    <div class="flex items-center gap-4 border-t border-slate-50 pt-6">
                        <div class="relative">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-violet-500 rounded-full opacity-0 group-hover:opacity-100 blur transition duration-500">
                            </div>
                            <img src="https://ui-avatars.com/api/?name=Elena+R&background=818cf8&color=fff"
                                alt="User"
                                class="relative w-12 h-12 rounded-full border-2 border-white object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">Elena Rodriguez</h4>
                            <p class="text-[11px] font-bold text-indigo-500 uppercase tracking-wider">Global Strategist
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
