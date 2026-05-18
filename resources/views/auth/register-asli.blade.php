@extends('layouts.sidebar')

@section('content')
    <div class="w-full flex justify-center items-center min-h-screen">

        <form class="w-full max-w-lg" action="{{ route('register') }}" method="POST">
            @csrf
            <h1 class="text-5xl text-center text-primary font-bold mb-6">
                Hiya, welcome!
            </h1>
            <div class="mb-5">
                <label class="block mb-2">
                    Name
                </label>
                <input type="text" id="name" name="name" placeholder="Eula Lawrence" required
                    class="input-field w-full pl-10 pr-12 py-3 rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 text-sm placeholder-gray-400 transition-all duration-200 hover:border-blue-300 focus:border-primary focus:bg-white">
            </div>
            <div class="mb-5">
                <label class="block mb-2">
                    Email
                </label>
                <input type="email" id="email" name="email" placeholder="email@gmail.com" required
                    class="input-field w-full pl-10 pr-12 py-3 rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 text-sm placeholder-gray-400 transition-all duration-200 hover:border-blue-300 focus:border-primary focus:bg-white">
            </div>
            <div class="mb-5">
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
            <div class="mb-5">
                <div class="flex items-center justify-between mb-1.5">
                    <label for="confirmPassword" class="block text-sm font-600 text-gray-700">
                        Confirm Password
                    </label>
                </div>

                <div class="relative">
                    <div class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                        <i class="ri-lock-2-line text-gray-400"></i>
                    </div>

                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm password" required autocomplete="current-password"
                        class="input-field w-full pl-10 pr-12 py-3 rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 text-sm placeholder-gray-400 transition-all duration-200 hover:border-blue-300 focus:border-primary focus:bg-white">

                    <button type="button" onclick="togglePassword('confirmPassword', this)"
                        class="absolute inset-y-0 right-3.5 flex items-center text-gray-400 hover:text-gray-600 transition-colors">

                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>
            <button type="submit" class="bg-primary text-white px-4 py-3 rounded-lg w-full">
                Sign Up
            </button>
            <p class=" text-primary text-center mt-4">Have an account? <a href="{{ route('login') }}"
                    class=" font-bold">Login</a></p>
        </form>
    </div>
@endsection
