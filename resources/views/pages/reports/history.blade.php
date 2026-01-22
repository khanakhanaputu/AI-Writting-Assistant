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
                {{-- <div class="relative group w-full sm:w-auto">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i
                            class="fa-solid fa-magnifying-glass text-slate-400 group-focus-within:text-indigo-600 transition-colors"></i>
                    </div>
                    <input type="text" placeholder="Search history..."
                        class="pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 placeholder:text-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 w-full sm:w-64 transition-all shadow-sm">
                </div> --}}

                {{-- Filter Button --}}
                {{-- <button
                    class="flex items-center justify-center gap-2 px-4 py-2.5 bg-white border border-slate-200 rounded-lg text-sm font-bold text-slate-700 hover:bg-slate-50 hover:text-indigo-600 hover:border-indigo-200 transition-all shadow-sm active:scale-95">
                    <i class="fa-solid fa-filter text-slate-400"></i>
                    <span>Filters</span>
                </button> --}}

                {{-- Export Button --}}
                <a href="{{ route('export.excel') }}"
                    class="flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-bold hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-500/30 transition-all active:scale-95 active:shadow-none">
                    <i class="fa-solid fa-download"></i>
                    <span>Export CSV</span>
                </a>
            </div>
        </div>

        {{-- Main Content Card --}}
        <div
            class="bg-white rounded-2xl border border-slate-200 shadow-xl shadow-slate-200/60 overflow-hidden flex flex-col">

            <div class="overflow-x-auto flex-1">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-slate-50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-bold">
                            <th class="px-6 py-5">Generated Content</th>
                            <th class="px-6 py-5">Platform</th>
                            <th class="px-6 py-5">Tone</th>
                            <th class="px-6 py-5">Date Created</th>
                            <th class="px-6 py-5 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">

                        @foreach ($historys as $h)
                            <tr class="group hover:bg-slate-50/80 transition-all duration-200 relative">


                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-4"> {{-- Changed items-start to items-center --}}
                                        <div
                                            class="w-11 h-11 rounded-lg bg-indigo-50 text-indigo-600 border border-indigo-100 flex items-center justify-center flex-shrink-0 shadow-sm">
                                            <i class="fa-solid fa-wand-magic-sparkles text-lg"></i>
                                        </div>
                                        <div class="max-w-md">
                                            <a href="{{ route('generate.result', $h->id) }}"
                                                class="block text-base font-bold text-slate-900 group-hover:text-indigo-600 transition-colors line-clamp-1">
                                                {{ Str::limit($h->context_description, 100) }}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5 align-middle">
                                    <div
                                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-blue-100 bg-blue-50 text-xs font-bold text-blue-700">
                                        {{ $h->platform->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-5 align-middle">
                                    <span
                                        class="inline-block px-3 py-1 rounded-md bg-slate-100 text-slate-600 text-xs font-bold border border-slate-200">
                                        {{ $h->tone->name }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 align-middle">
                                    <div class="flex flex-col">
                                        <span
                                            class="text-sm font-bold text-slate-700">{{ $h->created_at->translatedFormat('l, d F Y') }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-center align-middle">
                                    <button
                                        class="w-9 h-9 inline-flex items-center justify-center rounded-lg border border-transparent text-slate-400 hover:text-indigo-600 hover:bg-white hover:border-slate-200 hover:shadow-sm transition-all">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Footer Pagination --}}
            <div
                class="px-6 py-5 border-t border-slate-200 bg-slate-50/50 flex flex-col sm:flex-row items-center justify-between gap-4">
                {{ $historys->links() }}
            </div>

        </div>
    </div>
@endsection
