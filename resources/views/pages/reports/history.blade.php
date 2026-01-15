@extends('layouts.dashboard-layout')

@section('dashboard-content')
    <div class="max-w-full mx-auto p-6">

        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Generation History</h2>
                <p class="text-slate-500 mt-2 text-base">Archive and manage all content you have created.</p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                {{-- Search --}}
                <div class="relative group w-full sm:w-auto">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i
                            class="fa-solid fa-magnifying-glass text-slate-400 group-focus-within:text-indigo-600 transition-colors"></i>
                    </div>
                    <input type="text" placeholder="Search history..."
                        class="pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 placeholder:text-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 w-full sm:w-64 transition-all shadow-sm">
                </div>

                {{-- Filter Button --}}
                <button
                    class="flex items-center justify-center gap-2 px-4 py-2.5 bg-white border border-slate-200 rounded-lg text-sm font-bold text-slate-700 hover:bg-slate-50 hover:text-indigo-600 hover:border-indigo-200 transition-all shadow-sm active:scale-95">
                    <i class="fa-solid fa-filter text-slate-400"></i>
                    <span>Filters</span>
                </button>

                {{-- Export Button --}}
                <button
                    class="flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-bold hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-500/30 transition-all active:scale-95 active:shadow-none">
                    <i class="fa-solid fa-download"></i>
                    <span>Export CSV</span>
                </button>
            </div>
        </div>

        {{-- Main Content Card --}}
        <div
            class="bg-white rounded-2xl border border-slate-200 shadow-xl shadow-slate-200/60 overflow-hidden flex flex-col min-h-[600px]">

            <div class="overflow-x-auto flex-1">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-slate-50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-bold">
                            <th class="px-6 py-5">Generated Content</th> {{-- Renamed from Content Details --}}
                            <th class="px-6 py-5">Platform</th>
                            <th class="px-6 py-5">Tone</th>
                            <th class="px-6 py-5">Date Created</th>
                            <th class="px-6 py-5 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">

                        {{-- Row Item 1 --}}
                        <tr class="group hover:bg-slate-50/80 transition-all duration-200 relative">
                            <td
                                class="absolute left-0 top-0 bottom-0 w-1 bg-indigo-600 opacity-0 group-hover:opacity-100 transition-opacity">
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4"> {{-- Changed items-start to items-center --}}
                                    <div
                                        class="w-11 h-11 rounded-lg bg-indigo-50 text-indigo-600 border border-indigo-100 flex items-center justify-center flex-shrink-0 shadow-sm">
                                        <i class="fa-solid fa-wand-magic-sparkles text-lg"></i>
                                    </div>
                                    <div class="max-w-md">
                                        <a href="#"
                                            class="block text-base font-bold text-slate-900 group-hover:text-indigo-600 transition-colors line-clamp-1">
                                            Big News: We've Raised Series A! 🚀
                                        </a>
                                        {{-- Removed Prompt Details <p> --}}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <div
                                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-blue-100 bg-blue-50 text-xs font-bold text-blue-700">
                                    <i class="fa-brands fa-linkedin"></i> LinkedIn
                                </div>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <span
                                    class="inline-block px-3 py-1 rounded-md bg-slate-100 text-slate-600 text-xs font-bold border border-slate-200">
                                    Professional
                                </span>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-700">Jan 15, 2026</span>
                                    <span class="text-xs text-slate-400 font-medium">10:42 AM</span>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-center align-middle">
                                <button
                                    class="w-9 h-9 inline-flex items-center justify-center rounded-lg border border-transparent text-slate-400 hover:text-indigo-600 hover:bg-white hover:border-slate-200 hover:shadow-sm transition-all">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </button>
                            </td>
                        </tr>

                        {{-- Row Item 2 --}}
                        <tr class="group hover:bg-slate-50/80 transition-all duration-200 relative">
                            <td
                                class="absolute left-0 top-0 bottom-0 w-1 bg-indigo-600 opacity-0 group-hover:opacity-100 transition-opacity">
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-11 h-11 rounded-lg bg-pink-50 text-pink-600 border border-pink-100 flex items-center justify-center flex-shrink-0 shadow-sm">
                                        <i class="fa-solid fa-camera text-lg"></i>
                                    </div>
                                    <div class="max-w-md">
                                        <a href="#"
                                            class="block text-base font-bold text-slate-900 group-hover:text-indigo-600 transition-colors line-clamp-1">
                                            Bali Hidden Gems 🌴
                                        </a>
                                        {{-- Removed Prompt Details <p> --}}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <div
                                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-pink-100 bg-pink-50 text-xs font-bold text-pink-700">
                                    <i class="fa-brands fa-instagram"></i> Instagram
                                </div>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <span
                                    class="inline-block px-3 py-1 rounded-md bg-slate-100 text-slate-600 text-xs font-bold border border-slate-200">
                                    Excited
                                </span>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-700">Jan 14, 2026</span>
                                    <span class="text-xs text-slate-400 font-medium">04:20 PM</span>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-center align-middle">
                                <button
                                    class="w-9 h-9 inline-flex items-center justify-center rounded-lg border border-transparent text-slate-400 hover:text-indigo-600 hover:bg-white hover:border-slate-200 hover:shadow-sm transition-all">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </button>
                            </td>
                        </tr>

                        {{-- Row Item 3 --}}
                        <tr class="group hover:bg-slate-50/80 transition-all duration-200 relative">
                            <td
                                class="absolute left-0 top-0 bottom-0 w-1 bg-indigo-600 opacity-0 group-hover:opacity-100 transition-opacity">
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-11 h-11 rounded-lg bg-amber-50 text-amber-600 border border-amber-100 flex items-center justify-center flex-shrink-0 shadow-sm">
                                        <i class="fa-solid fa-envelope text-lg"></i>
                                    </div>
                                    <div class="max-w-md">
                                        <a href="#"
                                            class="block text-base font-bold text-slate-900 group-hover:text-indigo-600 transition-colors line-clamp-1">
                                            Cold Outreach: Partnership
                                        </a>
                                        {{-- Removed Prompt Details <p> --}}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <div
                                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-amber-100 bg-amber-50 text-xs font-bold text-amber-700">
                                    <i class="fa-regular fa-envelope"></i> Email
                                </div>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <span
                                    class="inline-block px-3 py-1 rounded-md bg-slate-100 text-slate-600 text-xs font-bold border border-slate-200">
                                    Persuasive
                                </span>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-700">Jan 12, 2026</span>
                                    <span class="text-xs text-slate-400 font-medium">09:15 AM</span>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-center align-middle">
                                <button
                                    class="w-9 h-9 inline-flex items-center justify-center rounded-lg border border-transparent text-slate-400 hover:text-indigo-600 hover:bg-white hover:border-slate-200 hover:shadow-sm transition-all">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            {{-- Footer Pagination --}}
            <div
                class="px-6 py-5 border-t border-slate-200 bg-slate-50/50 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-sm text-slate-500 font-medium">
                    Showing <span class="font-bold text-slate-900">1-4</span> of <span
                        class="font-bold text-slate-900">24</span> results
                </p>

                <div class="flex items-center gap-2">
                    <button
                        class="px-4 py-2 bg-white border border-slate-200 rounded-lg text-xs font-bold text-slate-400 cursor-not-allowed shadow-sm opacity-60"
                        disabled>
                        Previous
                    </button>
                    <button
                        class="px-4 py-2 bg-white border border-slate-200 rounded-lg text-xs font-bold text-slate-700 hover:bg-indigo-600 hover:text-white hover:border-indigo-600 transition-all shadow-sm">
                        Next
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection
