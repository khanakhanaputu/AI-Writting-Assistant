@extends('layouts.dashboard-layout')

@section('title', 'Dashboard')
@section('name', auth()->user()->name)

@section('dashboard-content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="max-w-full mx-auto p-6 space-y-8">

        {{-- Page Header --}}
        <div class="flex items-end justify-between">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Overview</h2>
                <p class="text-slate-500 mt-1 font-medium">Welcome back, {{ auth()->user()->name }}! Here's what's happening.
                </p>
            </div>
            <div
                class="hidden sm:block text-sm font-bold text-slate-400 bg-white px-4 py-2 rounded-lg border border-slate-200 shadow-sm">
                <i class="fa-regular fa-calendar mr-2"></i> {{ now()->format('M d, Y') }}
            </div>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Card 1: Credit Balance --}}
            <div
                class="bg-white p-8 rounded-3xl border border-slate-200 shadow-xl shadow-slate-200/60 flex flex-col justify-between relative overflow-hidden h-full">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <h3 class="text-xl font-extrabold text-slate-900">Credit Balance</h3>
                        <p class="text-sm text-slate-500 font-medium mt-1">Available quota.</p>
                    </div>
                    <div
                        class="w-10 h-10 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-400">
                        <i class="fa-solid fa-chart-pie"></i>
                    </div>
                </div>

                <div class="relative w-56 h-56 mx-auto my-6">
                    <canvas id="creditChart"></canvas>
                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <span class="text-5xl font-black text-slate-900 tracking-tight">{{ auth()->user()->credit }}</span>
                        <span class="text-xs text-slate-400 font-bold uppercase tracking-widest mt-1">Credits Left</span>
                    </div>
                </div>

                <div
                    class="mt-auto bg-slate-50 rounded-2xl p-4 flex justify-between text-xs font-bold text-slate-600 border border-slate-100">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-indigo-600 shadow-sm shadow-indigo-300"></span> Used
                        ({{ 10 - auth()->user()->credit }})
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Card 2: Total Content (Hero Card) --}}
                <div
                    class="bg-gradient-to-br from-indigo-600 to-indigo-700 p-8 rounded-3xl text-white shadow-xl shadow-indigo-500/30 relative overflow-hidden group col-span-1 md:col-span-2 flex items-center justify-between min-h-[200px]">
                    {{-- Abstract Background Shapes --}}
                    <div
                        class="absolute top-0 right-0 w-80 h-80 bg-white/10 rounded-full blur-3xl -mr-20 -mt-20 transition-transform duration-700 group-hover:scale-110">
                    </div>
                    <div class="absolute bottom-0 left-0 w-40 h-40 bg-indigo-500/30 rounded-full blur-2xl -ml-10 -mb-10">
                    </div>

                    <div class="relative z-10 flex-1">
                        <div class="flex items-center gap-3 mb-6">
                            <div
                                class="w-12 h-12 rounded-xl bg-white/20 border border-white/10 flex items-center justify-center text-white text-xl backdrop-blur-md shadow-inner">
                                <i class="fa-solid fa-wand-magic-sparkles"></i>
                            </div>
                            <span
                                class="inline-block px-3 py-1 rounded-full bg-indigo-500/50 border border-indigo-400/30 text-xs font-bold uppercase tracking-wider text-indigo-100">
                                Lifetime Stats
                            </span>
                        </div>

                        <div>
                            <p class="text-indigo-100 text-sm font-bold uppercase tracking-widest mb-1 opacity-80">Total
                                Content Generated</p>
                            <h3 class="text-6xl font-black tracking-tighter text-white drop-shadow-sm">
                                {{ $countUserCreated }}</h3>
                        </div>
                    </div>

                    {{-- Decorative Icon Right --}}
                    <div
                        class="hidden sm:block relative z-10 opacity-20 transform rotate-12 group-hover:rotate-0 transition-transform duration-500">
                        <i class="fa-solid fa-layer-group text-9xl"></i>
                    </div>
                </div>

                {{-- Card 3: Top Platform --}}
                <div
                    class="bg-white p-8 rounded-3xl border border-slate-200 shadow-xl shadow-slate-200/40 flex flex-col justify-center h-full hover:border-indigo-200 transition-colors">
                    <div class="flex items-start justify-between mb-6">
                        <span
                            class="px-2 py-1 rounded bg-slate-100 text-[10px] font-bold uppercase tracking-wider text-blue-500">Most
                            Active</span>
                    </div>

                    <div>
                        <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-1">Top Platform</p>
                        <h4 class="text-2xl font-extrabold text-slate-900 mb-4">{{ $platformUsed ?? 'None' }}</h4>
                    </div>
                </div>

                {{-- Card 4: Daily Activity --}}
                <div
                    class="bg-white p-8 rounded-3xl border border-slate-200 shadow-xl shadow-slate-200/40 flex flex-col justify-center h-full hover:border-emerald-200 transition-colors">
                    <div class="flex items-start justify-between mb-6">
                        <div
                            class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 border border-emerald-100 flex items-center justify-center text-2xl shadow-sm">
                            <i class="fa-solid fa-calendar-day"></i>
                        </div>
                    </div>

                    <div>
                        <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-1">Daily Output</p>
                        <h4 class="text-2xl font-extrabold text-slate-900 mb-4">{{ $resultToday }} Posts</h4>

                    </div>
                </div>

            </div>
        </div>

        {{-- Recent Activity Table --}}
        <div
            class="bg-white rounded-2xl border border-slate-200 shadow-xl shadow-slate-200/60 overflow-hidden flex flex-col ">

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

                        @foreach ($recent as $h)
                            <tr class="group hover:bg-slate-50/80 transition-all duration-200 relative">


                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-11 h-11 rounded-lg bg-indigo-50 text-indigo-600 border border-indigo-100 flex items-center justify-center flex-shrink-0 shadow-sm">
                                            <i class="fa-solid fa-wand-magic-sparkles text-lg"></i>
                                        </div>
                                        <div class="max-w-md">
                                            <a href="{{ route('generate.result', $h->id) }}"
                                                class="block text-base font-bold text-slate-900 group-hover:text-indigo-600 transition-colors line-clamp-1">
                                                {{ Str::limit($h->context_description, 40) }}
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

        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('creditChart').getContext('2d');

            const usedCredit = 10 - {{ auth()->user()->credit }};
            const remainingCredit = {{ auth()->user()->credit }};

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Used', 'Remaining'],
                    datasets: [{
                        data: [usedCredit, remainingCredit],
                        backgroundColor: [
                            '#4f46e5', // Indigo-600 (Darker/Bolder)
                            '#e2e8f0' // Slate-200
                        ],
                        borderWidth: 0,
                        hoverOffset: 10,
                        hoverBorderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '82%',
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: '#1e293b',
                            titleFont: {
                                family: 'inherit',
                                size: 13
                            },
                            bodyFont: {
                                family: 'inherit',
                                size: 13
                            },
                            padding: 10,
                            cornerRadius: 8,
                            displayColors: false
                        }
                    }
                }
            });
        });
    </script>
@endsection
