@extends('layouts.dashboard-layout')

@section('dashboard-content')
    <div class="max-w-full mx-auto p-6">

        {{-- Navigation & Title Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
            <div class="flex items-center gap-4">
                <a href="{{ url()->previous() }}"
                    class="w-12 h-12 rounded-xl bg-white border border-slate-200 text-slate-500 hover:text-indigo-600 hover:border-indigo-200 flex items-center justify-center transition-all hover:-translate-x-1 shadow-sm group">
                    <i class="fa-solid fa-arrow-left group-hover:scale-110 transition-transform"></i>
                </a>
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Result Details</h2>
                    <div class="flex items-center gap-2 text-sm text-slate-500 font-medium mt-1">
                        <span>Generated Content</span>
                        <i class="fa-solid fa-circle text-[4px] text-slate-300"></i>
                        <span>ID: {{ $promptGeneration->id }}</span>
                    </div>
                </div>
            </div>

            <div class="flex gap-3">
                <button
                    class="px-5 py-2.5 rounded-xl bg-white border border-rose-100 text-rose-600 font-bold text-sm hover:bg-rose-50 hover:border-rose-200 transition-all shadow-sm flex items-center gap-2">
                    <i class="fa-regular fa-trash-can"></i>
                    <span class="hidden sm:inline">Delete</span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Main Column --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Prompt Section (Styled distinctively as Input) --}}
                <div class="bg-slate-900 rounded-2xl p-6 shadow-lg shadow-slate-200/50 relative overflow-hidden group">
                    {{-- Decorative blur --}}
                    <div
                        class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl -mr-10 -mt-10 pointer-events-none">
                    </div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-2 mb-3 text-indigo-300">
                            <i class="fa-solid fa-terminal text-sm"></i>
                            <span class="text-xs font-bold uppercase tracking-widest">Original Prompt</span>
                        </div>
                        <p class="text-slate-100 font-medium text-lg leading-relaxed">
                            {{ $promptGeneration->context_description }}
                        </p>
                    </div>
                </div>

                {{-- Output Content Card --}}
                <div
                    class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/60 border border-slate-200 overflow-hidden flex flex-col min-h-[500px]">

                    {{-- Card Toolbar --}}
                    <div class="px-8 py-5 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                        <div class="flex gap-1.5">
                            <div class="w-3 h-3 rounded-full bg-rose-400"></div>
                            <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                            <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                        </div>

                    </div>

                    {{-- Content Body --}}
                    <div class="p-10 flex-1">
                        <div class="prose prose-lg prose-slate max-w-none text-slate-600 leading-relaxed font-serif">
                            <div>
                                {!! $promptGeneration->generated_result !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Sidebar Column --}}
            <div class="space-y-6">

                {{-- Meta Details Card --}}
                <div class="bg-white rounded-3xl shadow-lg shadow-slate-200/50 border border-slate-200 overflow-hidden">
                    <div class="p-6 border-b border-slate-100">
                        <h3 class="text-lg font-bold text-slate-900">Configuration</h3>
                    </div>

                    <div class="p-6 space-y-5">
                        {{-- Item --}}
                        <div class="flex items-center justify-between group">
                            <span class="text-xs text-slate-500 font-bold uppercase tracking-wider">Platform</span>
                            <div class="flex items-center gap-2 bg-blue-50 px-3 py-1.5 rounded-lg border border-blue-100">
                                <span class="text-sm font-bold text-blue-700">{{ $promptGeneration->platform->name }}</span>
                            </div>
                        </div>

                        {{-- Item --}}
                        <div class="flex items-center justify-between group">
                            <span class="text-xs text-slate-500 font-bold uppercase tracking-wider">Tone</span>
                            <span
                                class="px-3 py-1.5 rounded-lg bg-slate-100 text-slate-600 text-sm font-bold border border-slate-200">
                                {{ $promptGeneration->tone->name }}
                            </span>
                        </div>

                        {{-- Item --}}
                        <div class="flex items-center justify-between group">
                            <span class="text-xs text-slate-500 font-bold uppercase tracking-wider">Date</span>
                            <span
                                class="text-sm font-bold text-slate-700">{{ $promptGeneration->created_at->translatedFormat('l, d F Y') }}</span>
                        </div>

                        {{-- Cost Badge --}}
                        <div
                            class="bg-slate-50 rounded-xl p-4 border border-slate-100 flex items-center justify-between mt-2">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center text-xs">
                                    <i class="fa-solid fa-bolt"></i>
                                </div>
                                <span class="text-xs font-bold text-slate-500 uppercase">Cost</span>
                            </div>
                            <span class="text-sm font-black text-slate-800">1 Credit</span>
                        </div>
                    </div>
                </div>



                {{-- Export Actions --}}
                <div
                    class="bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-3xl p-6 text-white shadow-xl shadow-indigo-200 relative overflow-hidden group">
                    {{-- Abstract Shapes --}}
                    <div
                        class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full blur-2xl -mr-10 -mt-10 group-hover:scale-110 transition-transform duration-700">
                    </div>

                    <h3 class="text-lg font-bold mb-1 relative z-10">Export</h3>
                    <p class="text-xs text-indigo-100 mb-6 relative z-10 font-medium opacity-80">Download or copy your
                        result.</p>

                    <div class="space-y-3 relative z-10">
                        <button
                            class="w-full flex items-center justify-center gap-3 py-3.5 rounded-xl bg-white text-indigo-900 text-sm font-bold hover:bg-indigo-50 transition-all shadow-lg active:scale-95">
                            <i class="fa-solid fa-file-pdf text-rose-500"></i>
                            Export to PDF
                        </button>

                        <button
                            class="w-full flex items-center justify-center gap-3 py-3.5 rounded-xl bg-indigo-500/30 border border-white/20 text-white text-sm font-bold hover:bg-indigo-500/50 hover:border-white/40 transition-all backdrop-blur-sm">
                            <i class="fa-solid fa-file-lines"></i>
                            Copy Plain Text
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
