@extends('layouts.auth')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center p-6">

        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-slate-900">glyphz<span class="text-indigo-600">.</span></h1>
            <p class="text-gray-500 text-sm mt-2">Elevate your writing with AI.</p>
        </div>

        <div
            class="bg-white p-8 md:p-10 rounded-[2.5rem] shadow-2xl shadow-indigo-100 border border-gray-100 w-full max-w-md">

            <h2 class="text-2xl font-bold text-slate-900 mb-2">Welcome Back</h2>
            <p class="text-sm text-gray-400 mb-8">Please enter your details to sign in.</p>

            @if ($errors->any())
                <div
                    class="mb-6 p-4 bg-rose-50 border border-rose-100 rounded-2xl flex items-start gap-3 animate-head-shake">
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

                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase ml-1 mb-2 block">Username</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                            <i class="fa-regular fa-user"></i>
                        </span>
                        <input type="text" name="name" placeholder="Enter your username" required
                            class="w-full pl-11 pr-4 py-3 bg-gray-50 border {{ $errors->has('name') ? 'border-rose-300 ring-2 ring-rose-50' : 'border-gray-200' }} rounded-2xl focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all text-sm shadow-sm">
                    </div>
                </div>

                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase ml-1 mb-2 block">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" name="password" placeholder="••••••••" required
                            class="w-full pl-11 pr-4 py-3 bg-gray-50 border {{ $errors->has('password') ? 'border-rose-300 ring-2 ring-rose-50' : 'border-gray-200' }} rounded-2xl focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all text-sm shadow-sm">
                    </div>
                </div>

                <div class="flex justify-end">
                    <a href="#"
                        class="text-xs font-medium text-indigo-600 hover:text-indigo-700 transition-colors">Forgot
                        Password?</a>
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-indigo-200 transition-all transform hover:-translate-y-1 active:scale-[0.98]">
                    Sign In
                </button>
            </form>

            <div class="relative my-10">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-100"></div>
                </div>
                <div class="relative flex justify-center text-xs uppercase">
                    <span class="bg-white px-4 text-gray-400 font-medium tracking-wider">Or continue with</span>
                </div>
            </div>

            <a href="/auth/google"
                class="flex items-center justify-center gap-3 w-full bg-white border border-gray-200 py-3 rounded-2xl hover:bg-gray-50 transition-all font-bold text-sm text-slate-700">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-5 h-5"
                    alt="Google">
                Sign in with Google
            </a>

            <p class="text-center text-sm text-gray-500 mt-10">
                Don't have an account?
                <a href="#" class="font-bold text-indigo-600 hover:underline">Create Account</a>
            </p>
        </div>
    </div>

    <style>
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
