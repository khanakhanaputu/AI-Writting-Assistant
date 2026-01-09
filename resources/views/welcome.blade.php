@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="relative pt-32 pb-20 px-6 overflow-hidden bg-slate-50/50">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full -z-10 overflow-hidden">
            <div class="absolute top-[-20%] left-[-10%] w-[70%] h-[70%] bg-indigo-100/50 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[60%] h-[60%] bg-blue-100/40 rounded-full blur-[100px]"></div>
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-gradient-to-b from-transparent via-indigo-50/30 to-white">
            </div>
        </div>

        <div class="max-w-5xl mx-auto text-center relative">


            <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 tracking-tight mb-8">
                The AI Writing Assistant <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-500">
                    That Feels Human.
                </span>
            </h1>

            <p class="max-w-2xl mx-auto text-lg md:text-xl text-slate-600 leading-relaxed mb-12">
                Transform your ideas into polished content instantly. Whether it's for social media, blogs, or business,
                <span class="text-indigo-600 font-semibold">Glyphz</span> masters your tone and delivers precision in
                seconds.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <button
                    class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white px-10 py-5 rounded-2xl text-lg font-bold shadow-[0_20px_50px_rgba(79,70,229,0.3)] transition-all transform hover:-translate-y-1 active:scale-95">
                    Start Writing for Free
                    <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                </button>
            </div>

            <div class="mt-8 flex items-center justify-center gap-6 text-sm text-slate-400">
                <span class="flex items-center gap-1.5">
                    <i class="fa-solid fa-check text-indigo-500"></i> No credit card
                </span>
                <span class="flex items-center gap-1.5">
                    <i class="fa-solid fa-check text-indigo-500"></i> Unlimited drafts
                </span>
            </div>

            <div
                class="mt-20 relative mx-auto max-w-4xl border border-white rounded-3xl shadow-[0_50px_100px_-20px_rgba(0,0,0,0.12)] overflow-hidden bg-white/80 backdrop-blur-md transition-all hover:shadow-[0_60px_110px_-15px_rgba(79,70,229,0.15)]">
                <div class="bg-slate-50/80 border-b border-gray-100 px-4 py-3 flex items-center gap-2">
                    <div class="flex gap-1.5">
                        <div class="w-3 h-3 rounded-full bg-slate-300"></div>
                        <div class="w-3 h-3 rounded-full bg-slate-300"></div>
                        <div class="w-3 h-3 rounded-full bg-slate-300"></div>
                    </div>
                    <div
                        class="mx-auto bg-white/50 px-8 py-1 rounded-lg border border-gray-200/50 text-[10px] text-gray-400 font-medium tracking-wide">
                        glyphz.ai/new-draft
                    </div>
                </div>
                <div class="p-8 md:p-12 text-left">
                    <div class="space-y-4">
                        <div class="h-4 bg-slate-100 rounded-full w-3/4"></div>
                        <div class="h-4 bg-slate-100 rounded-full w-full"></div>
                        <div class="h-4 bg-slate-100 rounded-full w-5/6 mb-8"></div>
                    </div>
                    <div
                        class="mt-8 h-32 bg-indigo-50/30 rounded-2xl border-2 border-dashed border-indigo-100 flex items-center justify-center">
                        <div class="flex items-center gap-3 text-indigo-500 font-medium italic">
                            <i class="fa-solid fa-wand-magic-sparkles animate-bounce"></i>
                            <span>Glyphz is crafting your masterpiece...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-24 px-10 bg-white relative overflow-hidden">
        <div class="absolute top-1/2 left-0 w-72 h-72 bg-indigo-50 rounded-full blur-[120px] opacity-60 -z-10"></div>

        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-20">
                <span
                    class="px-4 py-1.5 rounded-full bg-indigo-50 text-indigo-600 font-bold text-xs uppercase tracking-widest border border-indigo-100">
                    One Stop Solution
                </span>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 mt-6 tracking-tight">
                    Why choose <span class="text-indigo-600">Glyphz?</span>
                </h2>
                <p class="text-slate-500 mt-4 max-w-xl mx-auto text-lg">
                    Designed for modern creators who need to balance speed with high-quality, authentic content.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div
                    class="group relative bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-[0_20px_50px_rgba(0,0,0,0.03)] transition-all duration-500 hover:shadow-indigo-500/10 hover:-translate-y-3 overflow-hidden">
                    <div
                        class="absolute -top-10 -right-10 w-32 h-32 bg-indigo-50 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10">
                    </div>

                    <div
                        class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-blue-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-indigo-200 group-hover:rotate-6 transition-transform duration-500">
                        <i class="fa-regular fa-lightbulb text-xl"></i>
                    </div>

                    <h3 class="text-xl font-bold text-slate-900 mb-4 tracking-tight leading-none">Kill Writer's Block
                        Instantly</h3>
                    <p class="text-slate-500 leading-relaxed text-sm">
                        Stuck on the first sentence? Turn a blank page into a polished draft in seconds. Glyphz generates
                        ideas and outlines the moment inspiration stalls.
                    </p>

                    <div
                        class="mt-6 flex items-center text-indigo-600 font-bold text-xs uppercase tracking-wider opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        Learn More <i class="fa-solid fa-arrow-right ml-2"></i>
                    </div>
                </div>

                <div
                    class="group relative bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-[0_20px_50px_rgba(0,0,0,0.03)] transition-all duration-500 hover:shadow-indigo-500/10 hover:-translate-y-3 overflow-hidden">
                    <div
                        class="absolute -top-10 -right-10 w-32 h-32 bg-indigo-50 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10">
                    </div>

                    <div
                        class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-blue-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-indigo-200 group-hover:rotate-6 transition-transform duration-500">
                        <i class="fa-regular fa-user text-xl"></i>
                    </div>

                    <h3 class="text-xl font-bold text-slate-900 mb-4 tracking-tight leading-none">Human-Grade Precision</h3>
                    <p class="text-slate-500 leading-relaxed text-sm">
                        No more generic, robotic AI output. Glyphz masters your unique tone, ensuring every word sounds like
                        you—only more refined and professional.
                    </p>

                    <div
                        class="mt-6 flex items-center text-indigo-600 font-bold text-xs uppercase tracking-wider opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        Learn More <i class="fa-solid fa-arrow-right ml-2"></i>
                    </div>
                </div>

                <div
                    class="group relative bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-[0_20px_50px_rgba(0,0,0,0.03)] transition-all duration-500 hover:shadow-indigo-500/10 hover:-translate-y-3 overflow-hidden">
                    <div
                        class="absolute -top-10 -right-10 w-32 h-32 bg-indigo-50 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10">
                    </div>

                    <div
                        class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-blue-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-indigo-200 group-hover:rotate-6 transition-transform duration-500">
                        <i class="fa-solid fa-bolt text-xl"></i>
                    </div>

                    <h3 class="text-xl font-bold text-slate-900 mb-4 tracking-tight leading-none">Write 10x Faster</h3>
                    <p class="text-slate-500 leading-relaxed text-sm">
                        Meet tight deadlines without sacrificing quality. Streamline your workflow from research to final
                        edit and reclaim your most valuable resource: time.
                    </p>

                    <div
                        class="mt-6 flex items-center text-indigo-600 font-bold text-xs uppercase tracking-wider opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        Learn More <i class="fa-solid fa-arrow-right ml-2"></i>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <x-home-features />
    <x-home-testimonials />
    <x-home-footer />
@endsection
