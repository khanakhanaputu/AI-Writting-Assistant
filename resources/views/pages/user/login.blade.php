@extends('layouts.auth')

@section('content')
    <div class="min-h-screen relative flex flex-col items-center justify-center p-6 overflow-hidden bg-slate-50 font-sans"
        x-data="{
            mouseX: 0,
            mouseY: 0,
            handleMouseMove(e) {
                this.mouseX = e.clientX;
                this.mouseY = e.clientY;
            }
        }" @mousemove="handleMouseMove">

        <div class="absolute inset-0 -z-20 overflow-hidden pointer-events-none">
            <div
                class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-300/40 rounded-full mix-blend-multiply filter blur-[128px] opacity-70 animate-blob">
            </div>
            <div
                class="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-300/40 rounded-full mix-blend-multiply filter blur-[128px] opacity-70 animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-300/40 rounded-full mix-blend-multiply filter blur-[128px] opacity-70 animate-blob animation-delay-4000">
            </div>

            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
        </div>

        <div class="absolute inset-0 -z-10 transition-opacity duration-300 pointer-events-none"
            :style="`background: radial-gradient(800px circle at ${mouseX}px ${mouseY}px, rgba(255, 255, 255, 0.6), transparent 40%);`">
        </div>

        <div class="relative w-full max-w-md">

            <div class="mb-8 text-center relative z-10">
                <a href="/" class="inline-block hover:scale-105 transition-transform duration-300">
                    <h1 class="text-4xl font-bold text-slate-900 tracking-tight">glyphz<span
                            class="text-indigo-600">.</span></h1>
                </a>
                <p class="text-slate-500 text-sm mt-3 font-medium">Elevate your writing with AI.</p>
            </div>

            <div
                class="bg-white/60 backdrop-blur-xl p-8 md:p-10 rounded-[2.5rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/50 relative overflow-hidden group hover:shadow-[0_20px_50px_rgba(79,70,229,0.1)] transition-all duration-500">

                <div
                    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-indigo-400 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>

                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-slate-900 mb-2">Welcome Back</h2>
                    <p class="text-sm text-slate-500">Enter your credentials to access your workspace.</p>
                </div>

                @if ($errors->any())
                    <div
                        class="mb-6 p-4 bg-rose-50/80 backdrop-blur-sm border border-rose-100 rounded-2xl flex items-start gap-3 animate-head-shake">
                        <i class="fa-solid fa-circle-exclamation text-rose-500 mt-0.5"></i>
                        <div class="text-sm text-rose-700 font-medium leading-relaxed">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form action="{{ route('user.login') }}" method="post" class="space-y-5">
                    @csrf

                    <div class="group/input">
                        <label
                            class="text-xs font-bold text-slate-500 uppercase ml-1 mb-2 block tracking-wider">Username</label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 group-focus-within/input:text-indigo-500 transition-colors">
                                <i class="fa-regular fa-user"></i>
                            </span>
                            <input type="text" name="name" placeholder="Enter your username" required
                                class="w-full pl-11 pr-4 py-4 bg-white/50 border {{ $errors->has('name') ? 'border-rose-300 ring-2 ring-rose-50' : 'border-slate-200' }} rounded-2xl focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 focus:bg-white transition-all text-sm font-medium placeholder-slate-400">
                        </div>
                    </div>

                    <div class="group/input">
                        <label
                            class="text-xs font-bold text-slate-500 uppercase ml-1 mb-2 block tracking-wider">Password</label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 group-focus-within/input:text-indigo-500 transition-colors">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" name="password" placeholder="••••••••" required
                                class="w-full pl-11 pr-4 py-4 bg-white/50 border {{ $errors->has('password') ? 'border-rose-300 ring-2 ring-rose-50' : 'border-slate-200' }} rounded-2xl focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 focus:bg-white transition-all text-sm font-medium placeholder-slate-400">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <a href="#"
                            class="text-xs font-bold text-indigo-600 hover:text-indigo-500 hover:underline transition-all">
                            Forgot Password?
                        </a>
                    </div>

                    <button type="submit"
                        class="w-full bg-slate-900 hover:bg-indigo-600 text-white font-bold py-4 rounded-2xl shadow-xl shadow-slate-200 hover:shadow-indigo-500/30 transition-all transform hover:-translate-y-1 active:scale-[0.98] flex items-center justify-center gap-2 group/btn">
                        <span>Sign In</span>
                        <i
                            class="fa-solid fa-arrow-right text-xs opacity-50 group-hover/btn:translate-x-1 group-hover/btn:opacity-100 transition-all"></i>
                    </button>
                </form>

                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-200"></div>
                    </div>
                    <div class="relative flex justify-center text-[10px] uppercase font-bold tracking-widest">
                        <span class="bg-white/50 px-3 text-slate-400 backdrop-blur-sm rounded-full">Or continue with</span>
                    </div>
                </div>

                <a href="/auth/google"
                    class="flex items-center justify-center gap-3 w-full bg-white border border-slate-200 py-3.5 rounded-2xl hover:bg-slate-50 hover:border-slate-300 transition-all font-bold text-sm text-slate-700 group/google">
                    <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg"
                        class="w-5 h-5 group-hover/google:scale-110 transition-transform" alt="Google">
                    Sign in with Google
                </a>

                <p class="text-center text-sm text-slate-500 mt-8">
                    Don't have an account?
                    <a href="#"
                        class="font-bold text-indigo-600 hover:text-indigo-500 hover:underline transition-all">Create
                        Account</a>
                </p>
            </div>

            <div class="mt-8 text-center">
                <a href="#" class="text-xs text-slate-400 hover:text-indigo-500 transition-colors">
                    Privacy Policy &bull; Terms of Service
                </a>
            </div>
        </div>
    </div>

    <style>
        /* Animasi Blob */
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

        /* Animasi Error Shake */
        @keyframes head-shake {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-4px);
            }

            50% {
                transform: translateX(4px);
            }

            75% {
                transform: translateX(-4px);
            }

            100% {
                transform: translateX(0);
            }
        }

        .animate-head-shake {
            animation: head-shake 0.4s ease-in-out;
        }
    </style>
@endsection
