@extends('layouts.sidebar')

@section('content')
    <div class="w-full flex justify-center items-center min-h-screen">

        <form class="w-full max-w-lg" action="{{ route('login') }}" method="POST">
            @csrf
            <h1 class="text-5xl text-center text-primary font-bold mb-6">
                Howdy, Welcome back!
            </h1>
            <div class="mb-5">
                <label class="block mb-2">
                    Email
                </label>
                <input type="email" id="email" name="email" placeholder="email@gmail.com" required
                    class="input-field w-full pl-10 pr-12 py-3 rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 text-sm placeholder-gray-400 transition-all duration-200 hover:border-blue-300 focus:border-primary focus:bg-white">
            </div>
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label for="password" class="block text-sm font-600 text-gray-700">
                        Password
                    </label>

                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                        <i class="ri-lock-2-line text-gray-400"></i>
                    </div>
                    <input type="password" id="password" name="password" placeholder="Input password" required
                        autocomplete="current-password"
                        class="input-field w-full pl-10 pr-12 py-3 rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 text-sm placeholder-gray-400 transition-all duration-200 hover:border-blue-300 focus:border-primary focus:bg-white">

                    <button type="button" onclick="togglePassword('password', this)"
                        class="absolute inset-y-0 right-3.5 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                        <svg id="eye-password" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="my-4 flex justify-between items-center w-full">
                <div class="flex items-center gap-2">

                    <input type="checkbox" id="remember" name="remember"
                        class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary cursor-pointer">

                    <label for="remember" class="text-sm text-gray-600 cursor-pointer select-none">
                        Remember Me
                    </label>

                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-primary hover:underline font-medium">
                        Forgot Password?
                    </a>
                @endif

            </div>
            <button type="submit" class="bg-primary text-white px-4 py-3 rounded-lg w-full">
                Login
            </button>
            <p class=" text-primary text-center mt-4">Don't have an account? <a href="#" class=" font-bold">Sign
                    Up</a></p>
        </form>
    </div>
@endsection
