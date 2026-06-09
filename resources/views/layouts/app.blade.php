<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Salario Dashboard' }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/salario-logo.png') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased">


    <div class="flex min-h-screen">
        <aside class="w-64 bg-primary shadow-md flex flex-col m-6 rounded-lg ">

            {{-- Logo --}}
            <div class="h-16 flex items-center justify-center mt-3">
                <span
                    class="text-xl flex items-center gap-x-2 font-bold bg-white py-1.5 px-3 rounded-lg text-primary"><img
                        src="{{ asset('assets/salario-logo.png') }}" class=" h-5" alt="Salario Logo"> Salario</span>
            </div>

            {{-- Menu --}}
            <nav class="flex-1 px-4 py-6 space-y-1 bg-primary">
                <p class="text-xs font-semibold text-white uppercase tracking-wider mb-3">Main Menu</p>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium
                         {{ request()->routeIs('dashboard') ? 'bg-secondary text-primary' : 'text-white hover:bg-white/20 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('karyawan.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium
                         {{ request()->routeIs('karyawan.*') ? 'bg-secondary text-primary' : 'text-white hover:bg-white/20 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Employees Data
                </a>
                <a href="{{ route('salary.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium
                         {{ request()->routeIs('salary.*') ? 'bg-secondary text-primary' : 'text-white hover:bg-white/20 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                    </svg>
                    Payroll
                </a>
            </nav>

            {{-- User Info + Logout --}}
            <div class="border-t bg-secondary border-gray-100 px-4 py-4 rounded-b-lg">
                <div class="flex items-center gap-3 mb-3">
                    <div
                        class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-semibold text-sm">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-primary truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-black">
                            {{ auth()->user()->role_as == 0 ? 'HRD / Admin' : 'Karyawan' }}
                        </p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm bg-primary text-white hover:bg-primary/80 font-medium transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>
        <div class="flex-1 flex flex-col">

            {{-- Topbar --}}
            <header
                class="h-16 m-6 rounded-lg bg-white shadow-sm flex items-center justify-between px-6 border-b border-gray-100">
                <h1 class="text-lg font-semibold text-primary">{{ $title ?? 'Dashboard' }}</h1>
                <span
                    class="text-sm text-black bg-secondary p-2 rounded-lg">{{ now()->translatedFormat('l, d F Y') }}</span>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 px-6 overflow-auto">
                @yield('content')
            </main>


        </div>


    </div>


</body>

</html>
