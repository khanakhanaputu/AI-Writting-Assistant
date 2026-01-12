@extends('layouts.dashboard-layout')

@section('dashboard-content')
    {{-- <form action="{{ route('ai.post') }}" method="post">
        @csrf
        <input type="text" name="prompt">
        <button type="submit">Generate</button>
    </form> --}}

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 m-4">
        <div
            class="bg-white p-6 rounded-3xl border border-gray-100 shadow-[0_4px_20px_rgb(0,0,0,0.03)] flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-indigo-50 flex items-center justify-center text-indigo-600 text-xl">
                <i class="fa-solid fa-file-lines"></i>
            </div>
            <div>
                <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Words Generated</p>
                <h3 class="text-2xl font-black text-slate-900">12,450</h3>
            </div>
        </div>

        <div
            class="bg-white p-6 rounded-3xl border border-gray-100 shadow-[0_4px_20px_rgb(0,0,0,0.03)] flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 text-xl">
                <i class="fa-solid fa-layer-group"></i>
            </div>
            <div>
                <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Total Drafts</p>
                <h3 class="text-2xl font-black text-slate-900">45</h3>
            </div>
        </div>

        <div
            class="bg-white p-6 rounded-3xl border border-gray-100 shadow-[0_4px_20px_rgb(0,0,0,0.03)] flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-600 text-xl">
                <i class="fa-solid fa-bolt"></i>
            </div>
            <div>
                <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Credits Left</p>
                <h3 class="text-2xl font-black text-slate-900">850</h3>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm p-8 m-4">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold text-slate-800">Recent Documents</h3>
            <a href="#" class="text-sm font-bold text-indigo-600 hover:text-indigo-700">View All</a>
        </div>

        <div class="space-y-4">
            <div
                class="flex items-center justify-between p-4 hover:bg-gray-50 rounded-2xl transition-colors group cursor-pointer border border-transparent hover:border-gray-100">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center">
                        <i class="fa-brands fa-linkedin"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">LinkedIn Post: AI Trends</h4>
                        <p class="text-xs text-gray-400">Edited 2 hours ago</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-600 text-xs font-bold">Finished</span>
                    <button class="text-gray-300 hover:text-slate-600 transition-colors"><i
                            class="fa-solid fa-ellipsis-vertical"></i></button>
                </div>
            </div>

            <div
                class="flex items-center justify-between p-4 hover:bg-gray-50 rounded-2xl transition-colors group cursor-pointer border border-transparent hover:border-gray-100">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Instagram Caption: Product Launch</h4>
                        <p class="text-xs text-gray-400">Edited 5 hours ago</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-600 text-xs font-bold">Draft</span>
                    <button class="text-gray-300 hover:text-slate-600 transition-colors"><i
                            class="fa-solid fa-ellipsis-vertical"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-[2rem] shadow-xl shadow-indigo-100/50 border border-gray-100 p-2 mb-6 m-4">
        <div class="p-4">
            <label class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2 block">What do you want to
                write?</label>
            <textarea placeholder="e.g. Write a professional email to a client about project delay..."
                class="w-full text-slate-700 placeholder-gray-300 text-lg font-medium bg-transparent border-none focus:ring-0 p-0 resize-none h-20"></textarea>
        </div>

        <div class="bg-gray-50 rounded-2xl p-3 flex justify-between items-center">
            <div class="flex gap-2">
                <select
                    class="bg-white border border-gray-200 text-gray-600 text-xs font-bold rounded-xl px-3 py-2 focus:outline-none focus:border-indigo-500 cursor-pointer">
                    <option>Professional Tone</option>
                    <option>Casual Tone</option>
                    <option>Witty Tone</option>
                    <option>Persuasive Tone</option>
                </select>

                <select
                    class="bg-white border border-gray-200 text-gray-600 text-xs font-bold rounded-xl px-3 py-2 focus:outline-none focus:border-indigo-500 cursor-pointer">
                    <option>English (US)</option>
                    <option>Indonesia</option>
                    <option>Spanish</option>
                </select>
            </div>

            <button
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl font-bold text-sm shadow-lg shadow-indigo-200 transition-all flex items-center gap-2">
                <i class="fa-solid fa-wand-magic-sparkles"></i> Generate
            </button>
        </div>
    </div>
    <footer class="w-full bg-white border-t border-gray-200 py-6 px-8 mt-auto bottom-0">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">

            <div class="flex items-center gap-4">
                <p class="text-xs text-gray-500">
                    &copy; 2026 <span class="font-bold text-slate-700">Glyphz AI</span> Inc.
                </p>

                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-gray-100 text-gray-500 border border-gray-200">
                    v2.4.0
                </span>
            </div>

            <div class="flex items-center gap-6 text-xs font-medium text-gray-500">

                <div class="flex gap-6">
                    <a href="#" class="hover:text-indigo-600 transition-colors">Help Center</a>
                    <a href="#" class="hover:text-indigo-600 transition-colors">Privacy</a>
                    <a href="#" class="hover:text-indigo-600 transition-colors">Terms</a>
                </div>

                <div class="h-3 w-px bg-gray-300 hidden md:block"></div>

                <a href="#"
                    class="flex items-center gap-2 hover:bg-gray-50 px-2 py-1 rounded-md transition-colors group">
                    <span class="relative flex h-2 w-2">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    <span class="text-slate-600 group-hover:text-emerald-600 transition-colors">System Normal</span>
                </a>

            </div>
        </div>
    </footer>
@endsection
