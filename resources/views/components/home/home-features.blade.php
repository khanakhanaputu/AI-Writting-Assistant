<section class="relative py-24 px-6 md:px-10 bg-slate-50 overflow-hidden">

    <div class="absolute inset-0 -z-20 overflow-hidden pointer-events-none">
        <div
            class="absolute top-1/2 left-1/4 w-64 h-64 bg-indigo-100/60 rounded-full mix-blend-multiply filter blur-[96px] opacity-70 animate-blob">
        </div>
        <div
            class="absolute bottom-0 right-1/4 w-64 h-64 bg-blue-100/60 rounded-full mix-blend-multiply filter blur-[96px] opacity-70 animate-blob animation-delay-2000">
        </div>
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
    </div>

    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-20">
            <span
                class="inline-block px-4 py-1.5 rounded-full bg-white text-indigo-600 font-bold text-xs uppercase tracking-[0.2em] border border-indigo-100 shadow-sm mb-4">
                Capabilities
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">
                Everything you need to <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-500">write
                    better.</span>
            </h2>
            <p class="text-slate-500 mt-6 max-w-2xl mx-auto text-lg leading-relaxed">
                Powerful tools designed to help you craft the perfect message for any platform, in any language.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div x-data="{ x: 0, y: 0 }"
                @mousemove="const rect = $el.getBoundingClientRect(); x = e.clientX - rect.left; y = e.clientY - rect.top;"
                class="group relative rounded-[2.5rem] bg-slate-200 p-[1px] transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-500/10 hover:-translate-y-2">

                <div class="absolute inset-0 rounded-[2.5rem] opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                    :style="`background: radial-gradient(400px circle at ${x}px ${y}px, rgba(99, 102, 241, 0.4), transparent 40%);`">
                </div>

                <div class="relative h-full bg-white/80 backdrop-blur-sm rounded-[2.4rem] p-8 overflow-hidden">
                    <div class="mb-8 relative w-14 h-14">
                        <div
                            class="absolute inset-0 bg-indigo-500/20 rounded-2xl rotate-6 group-hover:rotate-12 transition-transform duration-500">
                        </div>
                        <div
                            class="relative w-full h-full bg-indigo-600 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-200">
                            <i class="fa-solid fa-share-nodes text-xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Multi-Platform</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Tailor-made content for LinkedIn, Instagram, and more. Optimized for each platform's unique DNA.
                    </p>
                </div>
            </div>

            <div x-data="{ x: 0, y: 0 }"
                @mousemove="const rect = $el.getBoundingClientRect(); x = e.clientX - rect.left; y = e.clientY - rect.top;"
                class="group relative rounded-[2.5rem] bg-slate-200 p-[1px] transition-all duration-300 hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-2">

                <div class="absolute inset-0 rounded-[2.5rem] opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                    :style="`background: radial-gradient(400px circle at ${x}px ${y}px, rgba(59, 130, 246, 0.4), transparent 40%);`">
                </div>

                <div class="relative h-full bg-white/80 backdrop-blur-sm rounded-[2.4rem] p-8 overflow-hidden">
                    <div class="mb-8 relative w-14 h-14">
                        <div
                            class="absolute inset-0 bg-blue-500/20 rounded-2xl -rotate-6 group-hover:-rotate-12 transition-transform duration-500">
                        </div>
                        <div
                            class="relative w-full h-full bg-blue-600 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-blue-200">
                            <i class="fa-solid fa-sliders text-xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Adjustable Tones</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Switch between professional, witty, or persuasive voices to match your brand's personality
                        perfectly.
                    </p>
                </div>
            </div>

            <div x-data="{ x: 0, y: 0 }"
                @mousemove="const rect = $el.getBoundingClientRect(); x = e.clientX - rect.left; y = e.clientY - rect.top;"
                class="group relative rounded-[2.5rem] bg-slate-200 p-[1px] transition-all duration-300 hover:shadow-2xl hover:shadow-violet-500/10 hover:-translate-y-2">

                <div class="absolute inset-0 rounded-[2.5rem] opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                    :style="`background: radial-gradient(400px circle at ${x}px ${y}px, rgba(139, 92, 246, 0.4), transparent 40%);`">
                </div>

                <div class="relative h-full bg-white/80 backdrop-blur-sm rounded-[2.4rem] p-8 overflow-hidden">
                    <div class="mb-8 relative w-14 h-14">
                        <div
                            class="absolute inset-0 bg-violet-500/20 rounded-2xl rotate-6 group-hover:rotate-12 transition-transform duration-500">
                        </div>
                        <div
                            class="relative w-full h-full bg-violet-600 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-violet-200">
                            <i class="fa-solid fa-language text-xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Global Reach</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Write fluently in 50+ languages while maintaining natural nuance, local idioms, and perfect
                        grammar.
                    </p>
                </div>
            </div>

            <div x-data="{ x: 0, y: 0 }"
                @mousemove="const rect = $el.getBoundingClientRect(); x = e.clientX - rect.left; y = e.clientY - rect.top;"
                class="group relative rounded-[2.5rem] bg-slate-200 p-[1px] transition-all duration-300 hover:shadow-2xl hover:shadow-slate-500/10 hover:-translate-y-2">

                <div class="absolute inset-0 rounded-[2.5rem] opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                    :style="`background: radial-gradient(400px circle at ${x}px ${y}px, rgba(100, 116, 139, 0.4), transparent 40%);`">
                </div>

                <div class="relative h-full bg-white/80 backdrop-blur-sm rounded-[2.4rem] p-8 overflow-hidden">
                    <div class="mb-8 relative w-14 h-14">
                        <div
                            class="absolute inset-0 bg-slate-500/20 rounded-2xl -rotate-6 group-hover:-rotate-12 transition-transform duration-500">
                        </div>
                        <div
                            class="relative w-full h-full bg-slate-800 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-slate-200">
                            <i class="fa-solid fa-wand-magic-sparkles text-xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Smart Context</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Feed specific instructions or background info to guide the AI for highly accurate results.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
