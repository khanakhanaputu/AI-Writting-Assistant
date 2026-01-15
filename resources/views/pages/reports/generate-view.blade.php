@extends('layouts.dashboard-layout')

@section('dashboard-content')
    <div class="max-w-full mx-auto p-6">

        {{-- Header Title (Outside Card for better hierarchy) --}}
        <div class="mb-8 text-center md:text-left">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">AI Writing Assistant</h2>
            <p class="text-slate-500 mt-2 text-base">Describe what you need, and let our AI craft the perfect content.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 border border-slate-200 overflow-hidden">

            {{-- Main Input Section --}}
            <div class="p-8 md:p-10 border-b border-slate-100">
                <label class="block text-sm font-bold text-slate-700 mb-3">
                    What would you like to create today?
                </label>
                <div class="relative group">
                    <div
                        class="absolute top-4 left-4 w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center pointer-events-none">
                        <i class="fa-solid fa-pen-nib"></i>
                    </div>
                    <textarea name="context" rows="4"
                        placeholder="e.g. Write a professional LinkedIn post about the importance of mental health in a startup environment..."
                        class="w-full block bg-slate-50 text-slate-900 placeholder:text-slate-400 text-lg font-medium py-4 pl-16 pr-6 rounded-xl border border-slate-200 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 focus:outline-none transition-all resize-none shadow-inner"></textarea>

                    <div class="absolute bottom-3 right-3 text-xs text-slate-400 font-medium bg-white/50 px-2 py-1 rounded">
                        Start typing...
                    </div>
                </div>
            </div>

            {{-- Configuration Grid --}}
            <div class="bg-slate-50/50 p-8 md:p-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                    {{-- Platform Dropdown --}}
                    <div x-data="{ open: false, selected: '', label: 'Select Platform' }" class="relative">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Platform</label>
                        <input type="hidden" name="platform_id" x-model="selected">

                        <button type="button" @click="open = !open" @click.outside="open = false"
                            class="w-full bg-white text-left font-bold text-sm py-3.5 px-4 rounded-lg border border-slate-200 text-slate-700 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 hover:border-indigo-300 transition-all flex items-center justify-between active:scale-[0.98]">
                            <span x-text="label" :class="selected ? 'text-slate-900' : 'text-slate-500'"></span>
                            <i class="fa-solid fa-chevron-down text-xs text-slate-400 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''"></i>
                        </button>

                        <div x-show="open" x-transition.opacity.duration.200ms
                            class="absolute top-full left-0 w-full mt-2 bg-white rounded-lg shadow-xl shadow-slate-200/50 border border-slate-100 z-50 overflow-hidden max-h-60 overflow-y-auto">
                            @foreach ($platforms as $p)
                                <div @click="selected = '{{ $p['id'] }}'; label = '{{ $p['name'] }}'; open = false"
                                    class="px-4 py-2.5 cursor-pointer hover:bg-indigo-50 transition-colors flex items-center justify-between group">
                                    <span
                                        class="text-sm font-bold text-slate-600 group-hover:text-indigo-700">{{ $p['name'] }}</span>
                                    <i x-show="selected == '{{ $p['id'] }}'"
                                        class="fa-solid fa-check text-indigo-600 text-xs"></i>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Language Dropdown --}}
                    <div x-data="{ open: false, selected: '1', label: 'English (US)' }" class="relative">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Language</label>
                        <input type="hidden" name="language_id" x-model="selected">

                        <button type="button" @click="open = !open" @click.outside="open = false"
                            class="w-full bg-white text-left font-bold text-sm py-3.5 px-4 rounded-lg border border-slate-200 text-slate-700 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 hover:border-indigo-300 transition-all flex items-center justify-between active:scale-[0.98]">
                            <span x-text="label" class="text-slate-900"></span>
                            <i class="fa-solid fa-chevron-down text-xs text-slate-400 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''"></i>
                        </button>

                        <div x-show="open" x-transition.opacity.duration.200ms
                            class="absolute top-full left-0 w-full mt-2 bg-white rounded-lg shadow-xl shadow-slate-200/50 border border-slate-100 z-40 overflow-hidden max-h-60 overflow-y-auto">
                            @foreach ($languages as $l)
                                <div @click="selected = '{{ $l['id'] }}'; label = '{{ $l['name'] }}'; open = false"
                                    class="px-4 py-2.5 cursor-pointer hover:bg-indigo-50 transition-colors flex items-center justify-between group">
                                    <span
                                        class="text-sm font-bold text-slate-600 group-hover:text-indigo-700">{{ $l['name'] }}</span>
                                    <i x-show="selected == '{{ $l['id'] }}'"
                                        class="fa-solid fa-check text-indigo-600 text-xs"></i>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Tone Dropdown --}}
                    <div x-data="{ open: false, selected: '', label: 'Select Tone' }" class="relative">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Tone</label>
                        <input type="hidden" name="tone_id" x-model="selected">

                        <button type="button" @click="open = !open" @click.outside="open = false"
                            class="w-full bg-white text-left font-bold text-sm py-3.5 px-4 rounded-lg border border-slate-200 text-slate-700 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 hover:border-indigo-300 transition-all flex items-center justify-between active:scale-[0.98]">
                            <span x-text="label" :class="selected ? 'text-slate-900' : 'text-slate-500'"></span>
                            <i class="fa-solid fa-chevron-down text-xs text-slate-400 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''"></i>
                        </button>

                        <div x-show="open" x-transition.opacity.duration.200ms
                            class="absolute top-full left-0 w-full mt-2 bg-white rounded-lg shadow-xl shadow-slate-200/50 border border-slate-100 z-30 overflow-hidden max-h-60 overflow-y-auto">
                            @foreach ($tones as $t)
                                <div @click="selected = '{{ $t['id'] }}'; label = '{{ $t['name'] }}'; open = false"
                                    class="px-4 py-2.5 cursor-pointer hover:bg-indigo-50 transition-colors flex items-center justify-between group">
                                    <span
                                        class="text-sm font-bold text-slate-600 group-hover:text-indigo-700">{{ $t['name'] }}</span>
                                    <i x-show="selected == '{{ $t['id'] }}'"
                                        class="fa-solid fa-check text-indigo-600 text-xs"></i>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Output Type --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Output
                            Length</label>
                        <input type="text" placeholder="e.g. Short, ~200 words"
                            class="w-full bg-white text-slate-900 font-bold text-sm py-3.5 px-4 rounded-lg border border-slate-200 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 hover:border-indigo-300 transition-all shadow-sm placeholder:text-slate-400 placeholder:font-normal">
                    </div>
                </div>

                {{-- Action Button --}}
                <div
                    class="mt-10 flex flex-col md:flex-row items-center justify-between gap-6 border-t border-slate-200 pt-8">
                    <p class="text-sm text-slate-500 italic hidden md:block">
                        <i class="fa-solid fa-lightbulb text-amber-400 mr-1"></i> Pro tip: Be specific about your target
                        audience.
                    </p>

                    <button
                        class="w-full md:w-auto bg-indigo-600 hover:bg-indigo-700 text-white text-base font-bold py-3.5 px-8 rounded-xl shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 hover:-translate-y-0.5 active:translate-y-0 active:shadow-none transition-all flex items-center justify-center gap-3">
                        <span>Generate Content</span>
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
