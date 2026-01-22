@extends('layouts.dashboard-layout')

@section('dashboard-content')
    {{-- DEFINISI VARIABEL: Cek apakah user login via Google --}}
    @php
        $isGoogleUser = !empty(auth()->user()->g_id);
    @endphp

    <div class="max-w-full mx-auto p-6">

        {{-- Page Header --}}
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Account Settings</h2>
            <p class="text-slate-500 mt-2 text-base">Manage your profile information and account security.</p>
        </div>

        {{-- Flash Messages --}}
        @if (session('status'))
            <div
                class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl flex items-center gap-3 text-emerald-800 text-sm font-bold shadow-sm">
                <i class="fa-solid fa-circle-check text-emerald-600"></i>
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div
                class="mb-6 p-4 bg-rose-50 border border-rose-200 rounded-xl flex items-start gap-3 text-rose-800 text-sm font-bold shadow-sm">
                <i class="fa-solid fa-circle-exclamation mt-0.5 text-rose-600"></i>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- GOOGLE ACCOUNT ALERT: Tampil hanya jika user punya g_id --}}
        @if ($isGoogleUser)
            <div
                class="mb-8 p-4 bg-blue-50 border border-blue-200 rounded-xl flex items-start gap-3 text-blue-800 text-sm font-bold shadow-sm">
                <i class="fa-brands fa-google mt-0.5 text-blue-600 text-lg"></i>
                <div>
                    <p>Your account is managed via Google.</p>
                    <p class="font-medium text-blue-600/80 text-xs mt-1">Profile details and password cannot be changed
                        here.</p>
                </div>
            </div>
        @endif

        {{-- SECTION 1: Public Profile --}}
        <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-200 mb-8 overflow-hidden">
            <div class="p-8 border-b border-slate-100">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 rounded-lg bg-indigo-50 text-indigo-600 border border-indigo-100 flex items-center justify-center text-xl shadow-sm">
                        <i class="fa-regular fa-id-card"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Public Profile</h3>
                        <p class="text-sm text-slate-500 font-medium">This information will be displayed publicly.</p>
                    </div>
                </div>
            </div>

            <div class="p-8 bg-slate-50/30">
                <form action="" method="POST" class="flex flex-col md:flex-row gap-8">
                    @csrf
                    @method('PUT')

                    {{-- Avatar Section --}}
                    <div class="flex-shrink-0 flex flex-col items-center space-y-3">
                        <div class="relative group">
                            <div
                                class="absolute -inset-0.5 rounded-full opacity-70 blur group-hover:opacity-100 transition duration-200">
                            </div>
                            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=6366f1&color=fff&size=128"
                                class="relative w-28 h-28 rounded-full border-4 border-white shadow-sm object-cover">
                        </div>
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-wide">Profile Picture</span>
                    </div>

                    {{-- Inputs --}}
                    <div class="flex-1 space-y-6">
                        <div class="grid grid-cols-1 gap-6">

                            {{-- Username (Locked) --}}
                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Username</label>
                                <div class="relative group">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                        <i class="fa-solid fa-at"></i>
                                    </span>
                                    <input type="text" value="{{ auth()->user()->name }}" readonly disabled
                                        class="w-full pl-10 pr-16 py-3 bg-slate-100 border border-slate-200 text-slate-500 rounded-xl text-sm font-semibold select-none shadow-inner cursor-not-allowed">
                                    <div
                                        class="absolute right-2 top-1/2 -translate-y-1/2 flex items-center gap-1 bg-white border border-slate-200 px-2 py-1 rounded-md shadow-sm">
                                        <i class="fa-solid fa-lock text-[10px] text-slate-400"></i>
                                        <span class="text-[10px] font-bold text-slate-500">LOCKED</span>
                                    </div>
                                </div>
                                <p class="text-[11px] text-slate-400 mt-1.5 font-medium">Username cannot be changed once
                                    set.</p>
                            </div>

                            {{-- Email --}}
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Email
                                    Address</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                        <i class="fa-regular fa-envelope"></i>
                                    </span>

                                    {{-- LOGIC: Disabled jika Google User --}}
                                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                                        readonly disabled {{ $isGoogleUser ? 'disabled' : '' }}
                                        class="w-full pl-10 pr-4 py-3 bg-white border border-slate-200 text-slate-900 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all text-sm font-bold shadow-sm placeholder:font-medium 
                                        disabled:bg-slate-100 disabled:text-slate-500 disabled:cursor-not-allowed disabled:shadow-inner">

                                    @if ($isGoogleUser)
                                        <div class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400"
                                            title="Managed by Google">
                                            <i class="fa-brands fa-google"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- SECTION 2: Security --}}
        <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-200 mb-8 overflow-hidden">
            <div class="p-8 border-b border-slate-100">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 rounded-lg bg-slate-900 text-white border border-slate-800 flex items-center justify-center text-xl shadow-sm">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Password & Security</h3>
                        <p class="text-sm text-slate-500 font-medium">Ensure your account uses a strong password.</p>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <form action="{{ route('update.password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative">

                        {{-- Overlay jika disabled (Optional visual cue) --}}
                        @if ($isGoogleUser)
                            <div class="absolute inset-0 z-10 bg-white/50 cursor-not-allowed"></div>
                        @endif

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Current
                                Password</label>
                            <input type="password" name="current_password" placeholder="••••••••" required
                                {{ $isGoogleUser ? 'disabled' : '' }}
                                class="w-full px-4 py-3 bg-white border border-slate-200 text-slate-900 rounded-xl focus:outline-none focus:border-slate-800 focus:ring-4 focus:ring-slate-200 transition-all text-sm font-bold shadow-sm disabled:bg-slate-100 disabled:text-slate-400">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">New
                                Password</label>
                            <input type="password" name="password" placeholder="••••••••" required
                                {{ $isGoogleUser ? 'disabled' : '' }}
                                class="w-full px-4 py-3 bg-white border border-slate-200 text-slate-900 rounded-xl focus:outline-none focus:border-slate-800 focus:ring-4 focus:ring-slate-200 transition-all text-sm font-bold shadow-sm disabled:bg-slate-100 disabled:text-slate-400">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Confirm
                                Password</label>
                            <input type="password" name="password_confirmation" placeholder="••••••••" required
                                {{ $isGoogleUser ? 'disabled' : '' }}
                                class="w-full px-4 py-3 bg-white border border-slate-200 text-slate-900 rounded-xl focus:outline-none focus:border-slate-800 focus:ring-4 focus:ring-slate-200 transition-all text-sm font-bold shadow-sm disabled:bg-slate-100 disabled:text-slate-400">
                        </div>
                    </div>

                    <div class="mt-8 flex items-center justify-between pt-6 border-t border-slate-100">
                        <div class="flex items-center gap-2 text-xs text-slate-400 font-medium">
                            <i class="fa-solid fa-lock"></i>
                            <span>Your password is encrypted securely.</span>
                        </div>

                        {{-- LOGIC: Button Disabled jika Google User --}}
                        <button type="submit" {{ $isGoogleUser ? 'disabled' : '' }}
                            class="px-6 py-2.5 rounded-xl text-sm font-bold shadow-lg transition-all active:scale-[0.98]
                            {{ $isGoogleUser
                                ? 'bg-slate-300 text-slate-500 cursor-not-allowed shadow-none'
                                : 'bg-slate-900 hover:bg-slate-800 text-white shadow-slate-300' }}">
                            Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- SECTION 3: Danger Zone (Logout) --}}
        {{-- Logout tetap aktif (tidak di-disable) --}}
        <div class="border border-rose-100 rounded-2xl overflow-hidden bg-rose-50/30">
            <div class="p-6 flex flex-col sm:flex-row items-center justify-between gap-6">
                <div>
                    <h3 class="text-base font-bold text-rose-700">Sign Out</h3>
                    <p class="text-sm text-rose-600/70 font-medium mt-1">End your current session securely.</p>
                </div>

                <form action="{{ route('user.logout') }}" method="post">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-2 px-6 py-2.5 bg-white border-2 border-rose-100 text-rose-600 rounded-xl text-sm font-bold hover:bg-rose-50 hover:border-rose-200 hover:text-rose-700 transition-all shadow-sm active:scale-[0.98]">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        Log Out
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
