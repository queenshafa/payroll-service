<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('assets/salario-logo.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])

    <title>Salario</title>
</head>

<body class="font-helvetica">

    <div class="flex min-h-screen">
        <aside class="relative w-96 overflow-hidden hidden lg:block">
            <div class="absolute top-6 left-1/2 -translate-x-1/2 z-50">
                <div class="flex items-center gap-x-3 px-4 py-2 bg-white rounded-xl">
                    <img src="{{ asset('assets/salario-logo.png') }}" alt="Salario Logo" class="w-5">
                    <p class="text-primary text-xl font-semibold">
                        Salario
                    </p>
                </div>
            </div>
            <img src="{{ asset('assets/login-sidebar.png') }}" alt="Sidebar Image"
                class="h-screen w-full object-cover ">

        </aside>

        <main class="flex-1 flex items-center justify-center p-10 max-h-screen">
            @yield('content')
        </main>

    </div>

</body>

</html>
