@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <style>
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        .typing-cursor::after {
            content: '|';
            animation: blink 1s step-start infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0;
            }
        }

        @keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }
    </style>

    <section class="relative pt-36 pb-24 px-6 overflow-hidden bg-slate-50" x-data="{
        mouseX: 0,
        mouseY: 0,
        // Fungsi untuk update posisi mouse relative terhadap section ini
        handleMouseMove(e) {
            const rect = this.$el.getBoundingClientRect();
            this.mouseX = e.clientX - rect.left;
            this.mouseY = e.clientY - rect.top;
        },
        // Logika Typewriter (Tetap dipertahankan)
        texts: ['Human.', 'Creative.', 'Professional.', 'Witty.'],
        currentText: '',
        textIndex: 0,
        charIndex: 0,
        isDeleting: false,
        typeSpeed: 100,
        typewriter() {
            const current = this.texts[this.textIndex];
            if (!this.isDeleting) {
                this.currentText = current.substring(0, this.charIndex + 1);
                this.charIndex++;
                if (this.charIndex === current.length) {
                    this.isDeleting = true;
                    this.typeSpeed = 2000;
                } else { this.typeSpeed = 100; }
            } else {
                this.currentText = current.substring(0, this.charIndex - 1);
                this.charIndex--;
                if (this.charIndex === 0) {
                    this.isDeleting = false;
                    this.textIndex = (this.textIndex + 1) % this.texts.length;
                    this.typeSpeed = 500;
                } else { this.typeSpeed = 50; }
            }
            setTimeout(() => this.typewriter(), this.typeSpeed);
        },
        demoText: '',
        fullDemoText: 'Start by defining your goal. Glyphz analyzes your context, tone, and audience.',
        startDemo() {
            let i = 0;
            let interval = setInterval(() => {
                this.demoText += this.fullDemoText.charAt(i);
                i++;
                if (i > this.fullDemoText.length) clearInterval(interval);
            }, 40);
        }
    }" x-init="typewriter();
    setTimeout(() => startDemo(), 1000)"
        @mousemove="handleMouseMove">

        <div class="absolute inset-0 -z-20 overflow-hidden pointer-events-none">
            <div
                class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-200/60 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob">
            </div>
            <div
                class="absolute top-0 right-1/4 w-96 h-96 bg-blue-200/60 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute -bottom-32 left-1/3 w-96 h-96 bg-pink-100/60 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob animation-delay-4000">
            </div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
        </div>

        <div class="absolute inset-0 -z-10 transition-opacity duration-300 pointer-events-none"
            :style="`background: radial-gradient(600px circle at ${mouseX}px ${mouseY}px, rgba(99, 102, 241, 0.15), transparent 40%);`">
        </div>

        <div class="max-w-5xl mx-auto text-center relative z-10">

            <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 tracking-tight mb-8">
                The AI Writing Assistant <br>
                That Feels
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-500 typing-cursor"
                    x-text="currentText"></span>
            </h1>

            <p class="max-w-2xl mx-auto text-lg md:text-xl text-slate-600 leading-relaxed mb-12">
                Transform your ideas into polished content instantly. Whether it's for social media, blogs, or business,
                <span class="text-indigo-600 font-semibold bg-indigo-50 px-2 py-0.5 rounded-md">Glyphz</span> delivers
                precision in seconds.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 relative">
                <button
                    class="group relative w-full sm:w-auto bg-slate-900 hover:bg-indigo-600 text-white px-10 py-5 rounded-2xl text-lg font-bold shadow-2xl shadow-indigo-500/20 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        Start Writing for Free
                        <i class="fa-solid fa-arrow-right text-sm transition-transform group-hover:translate-x-1"></i>
                    </span>
                    <div
                        class="absolute inset-0 -translate-x-full group-hover:animate-[shimmer_1.5s_infinite] bg-gradient-to-r from-transparent via-white/10 to-transparent z-0">
                    </div>
                </button>
                <button
                    class="w-full sm:w-auto text-slate-600 hover:text-indigo-600 font-bold px-10 py-5 rounded-2xl border border-slate-200 hover:border-indigo-200 hover:bg-white transition-all">
                    View Demo
                </button>
            </div>

            <div class="mt-20 relative mx-auto max-w-4xl group">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-[2rem] blur opacity-20 group-hover:opacity-40 transition duration-1000">
                </div>

                <div
                    class="relative border border-white/50 rounded-[2rem] shadow-2xl overflow-hidden bg-white/60 backdrop-blur-xl">
                    <div class="bg-white/50 border-b border-white/50 px-6 py-4 flex items-center justify-between">
                        <div class="flex gap-2">
                            <div class="w-3 h-3 rounded-full bg-rose-400"></div>
                            <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                            <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                        </div>
                        <div class="text-[10px] font-mono text-slate-400">AI_EDITOR_V2.0</div>
                        <div class="text-slate-400 text-xs"><i class="fa-solid fa-ellipsis"></i></div>
                    </div>
                    <div class="p-8 md:p-12 text-left min-h-[250px] flex flex-col">
                        <div class="flex gap-4 mb-8 opacity-50">
                            <div class="w-8 h-8 rounded-full bg-slate-200 flex-shrink-0"></div>
                            <div class="bg-slate-100 rounded-2xl rounded-tl-none px-6 py-3 text-sm text-slate-500 w-fit">
                                Write a short intro about Glyphz AI capabilities.
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div
                                class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-white text-xs flex-shrink-0 shadow-lg shadow-indigo-200">
                                <i class="fa-solid fa-wand-magic-sparkles"></i>
                            </div>
                            <div class="w-full">
                                <div class="prose prose-slate text-slate-700 text-lg leading-relaxed">
                                    <span x-text="demoText"></span><span class="animate-pulse text-indigo-500">|</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative py-32 px-6 overflow-hidden bg-slate-50" id="features">

        <div class="absolute inset-0 -z-20 overflow-hidden pointer-events-none">
            <div
                class="absolute top-1/2 left-0 w-96 h-96 bg-indigo-100/50 rounded-full mix-blend-multiply filter blur-[128px] opacity-70 animate-pulse">
            </div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-100/50 rounded-full mix-blend-multiply filter blur-[128px] opacity-70 animate-pulse"
                style="animation-delay: 2s;"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
        </div>

        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-24 max-w-3xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-indigo-100 shadow-sm mb-6">
                    <span class="flex h-2 w-2 rounded-full bg-indigo-500 animate-pulse"></span>
                    <span class="text-xs font-bold text-indigo-900 uppercase tracking-widest">Core Capabilities</span>
                </div>

                <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight mb-6">
                    Why creators choose <span class="relative inline-block text-indigo-600">
                        Glyphz
                        <svg class="absolute w-full h-3 -bottom-1 left-0 text-indigo-200 -z-10" viewBox="0 0 100 10"
                            preserveAspectRatio="none">
                            <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="8" fill="none" />
                        </svg>
                    </span>
                </h2>
                <p class="text-lg text-slate-500 leading-relaxed">
                    We combined the speed of AI with the nuance of human creativity. It's not just about writing faster;
                    it's about writing <span class="text-slate-900 font-semibold">better</span>.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div x-data="{ x: 0, y: 0 }"
                    @mousemove="const rect = $el.getBoundingClientRect(); x = e.clientX - rect.left; y = e.clientY - rect.top;"
                    class="group relative rounded-[2.5rem] bg-slate-200 p-[1px] transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-500/10">

                    <div class="absolute inset-0 rounded-[2.5rem] opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                        :style="`background: radial-gradient(400px circle at ${x}px ${y}px, rgba(99, 102, 241, 0.4), transparent 40%);`">
                    </div>

                    <div class="relative h-full bg-white rounded-[2.4rem] p-10 overflow-hidden isolate">
                        <div
                            class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px] opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>

                        <div class="relative w-16 h-16 mb-8 group-hover:-translate-y-2 transition-transform duration-500">
                            <div
                                class="absolute inset-0 bg-indigo-500 blur-xl opacity-20 group-hover:opacity-40 transition-opacity">
                            </div>
                            <div
                                class="relative w-full h-full bg-gradient-to-br from-indigo-500 to-blue-600 rounded-2xl flex items-center justify-center text-white text-2xl shadow-lg shadow-indigo-200 border border-white/20">
                                <i class="fa-regular fa-lightbulb"></i>
                            </div>
                        </div>

                        <h3 class="text-xl font-bold text-slate-900 mb-4 tracking-tight">Kill Writer's Block</h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-8">
                            Stuck on the first sentence? Turn a blank page into a polished draft in seconds with our
                            AI-powered outline generator.
                        </p>

                        <a href="#" class="inline-flex items-center text-sm font-bold text-indigo-600 group/link">
                            Explore Feature
                            <i class="fa-solid fa-arrow-right ml-2 transition-transform group-hover/link:translate-x-1"></i>
                        </a>
                    </div>
                </div>

                <div x-data="{ x: 0, y: 0 }"
                    @mousemove="const rect = $el.getBoundingClientRect(); x = e.clientX - rect.left; y = e.clientY - rect.top;"
                    class="group relative rounded-[2.5rem] bg-slate-200 p-[1px] transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-500/10">

                    <div class="absolute inset-0 rounded-[2.5rem] opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                        :style="`background: radial-gradient(400px circle at ${x}px ${y}px, rgba(99, 102, 241, 0.4), transparent 40%);`">
                    </div>

                    <div class="relative h-full bg-white rounded-[2.4rem] p-10 overflow-hidden isolate">
                        <div
                            class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px] opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>

                        <div class="relative w-16 h-16 mb-8 group-hover:-translate-y-2 transition-transform duration-500">
                            <div
                                class="absolute inset-0 bg-indigo-500 blur-xl opacity-20 group-hover:opacity-40 transition-opacity">
                            </div>
                            <div
                                class="relative w-full h-full bg-gradient-to-br from-indigo-500 to-blue-600 rounded-2xl flex items-center justify-center text-white text-2xl shadow-lg shadow-indigo-200 border border-white/20">
                                <i class="fa-regular fa-user"></i>
                            </div>
                        </div>

                        <h3 class="text-xl font-bold text-slate-900 mb-4 tracking-tight">Human-Grade Precision</h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-8">
                            No more robotic output. Glyphz masters your unique tone, ensuring every word sounds like
                            you—only more refined.
                        </p>

                        <a href="#" class="inline-flex items-center text-sm font-bold text-indigo-600 group/link">
                            Explore Feature
                            <i class="fa-solid fa-arrow-right ml-2 transition-transform group-hover/link:translate-x-1"></i>
                        </a>
                    </div>
                </div>

                <div x-data="{ x: 0, y: 0 }"
                    @mousemove="const rect = $el.getBoundingClientRect(); x = e.clientX - rect.left; y = e.clientY - rect.top;"
                    class="group relative rounded-[2.5rem] bg-slate-200 p-[1px] transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-500/10">

                    <div class="absolute inset-0 rounded-[2.5rem] opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                        :style="`background: radial-gradient(400px circle at ${x}px ${y}px, rgba(99, 102, 241, 0.4), transparent 40%);`">
                    </div>

                    <div class="relative h-full bg-white rounded-[2.4rem] p-10 overflow-hidden isolate">
                        <div
                            class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px] opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>

                        <div class="relative w-16 h-16 mb-8 group-hover:-translate-y-2 transition-transform duration-500">
                            <div
                                class="absolute inset-0 bg-indigo-500 blur-xl opacity-20 group-hover:opacity-40 transition-opacity">
                            </div>
                            <div
                                class="relative w-full h-full bg-gradient-to-br from-indigo-500 to-blue-600 rounded-2xl flex items-center justify-center text-white text-2xl shadow-lg shadow-indigo-200 border border-white/20">
                                <i class="fa-solid fa-bolt"></i>
                            </div>
                        </div>

                        <h3 class="text-xl font-bold text-slate-900 mb-4 tracking-tight">Write 10x Faster</h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-8">
                            Meet tight deadlines without sacrificing quality. Streamline your workflow from research to
                            final edit and reclaim your time.
                        </p>

                        <a href="#" class="inline-flex items-center text-sm font-bold text-indigo-600 group/link">
                            Explore Feature
                            <i
                                class="fa-solid fa-arrow-right ml-2 transition-transform group-hover/link:translate-x-1"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <x-home.home-features />
    <x-home.home-testimonials />
    <x-home.home-footer />
@endsection
