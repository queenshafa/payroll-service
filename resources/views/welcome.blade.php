<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Salario</title>
    <link rel="shortcut icon" href="{{ asset('assets/salario-logo.png') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" bg-gray-100">
    <section class="h-screen px-12 py-8  flex flex-col">
        <header
            class=" mb-24 rounded-xl bg-white shadow-sm flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <div class="flex items-center gap-2 font-bold text-primary">
                <span
                    class="text-lg flex items-center gap-x-2 font-bold bg-white py-1.5 px-3 rounded-lg text-primary"><img
                        src="{{ asset('assets/salario-logo.png') }}" class=" h-5" alt="Salario Logo"> Salario</span>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('login') }}"
                    class="inline-flex items-center gap-1.5 px-6 py-2 bg-primary text-white text-lg font-medium rounded-lg hover:bg-primary/80 transition">Login</a>
                <a href="{{ route('register') }}"
                    class="inline-flex items-center gap-1.5 px-6 py-2 bg-secondary text-primary text-lg font-medium rounded-lg hover:bg-secondary/80 transition">Register</a>
            </div>
        </header>

        <div class="flex flex-col flex-1 justify-between ">
            {{-- Hero --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center mb-20">
                <div>
                    <h1 class="text-7xl text-primary tracking-tight leading-tight"><span
                            class="font-semibold">Salario;</span> Everything
                        done in one click.
                    </h1>
                </div>
                <div>
                    <p class="tracking-tight text-xl font-light mb-8"><span
                            class="text-primary font-semibold">Salario</span>
                        helps managing
                        employee
                        payroll easily and efficiently with a
                        simple web-based
                        application.</p>

                    <div class="flex gap-x-5">
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center gap-1.5 px-12 py-3 bg-primary text-white text-lg font-medium rounded-lg hover:bg-primary/80 transition">Get
                            Started</a>
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center gap-1.5 px-12 py-3 border border-gray-600 text-gray-600 text-lg font-medium rounded-lg hover:bg-secondary hover:text-primary transition">Login</a>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-12 h-96 gap-6">
                {{-- Card 1 --}}
                <div class="col-span-6 lg:col-span-3 bg-secondary flex flex-col justify-between p-6 rounded-xl">
                    <h3 class="text-4xl font-semibold text-primary mb-4">
                        Features
                    </h3>
                    <ul class="space-y-2 text-lg tracking-tight">
                        <li>Automatic salary calculation</li>
                        <li>Overtime & deductions</li>
                        <li>Accurate payroll process</li>
                    </ul>
                </div>
                {{-- Card 2 --}}
                <div class="col-span-6 lg:col-span-4">
                    <img src="{{ asset('assets/landing-img.png') }}" alt="Salario" class="rounded-xl">
                </div>
                {{-- Card 3 --}}
                <div
                    class="col-span-6 lg:col-span-5 bg-gradient-to-r from-primary via-tertiary to-secondary p-6 rounded-xl flex items-center justify-center">
                    <div class="relative inline-block">
                        <img src="{{ asset('assets/dashboard-preview.png') }}" alt="Dashboard Preview"
                            class="rounded-lg block">
                    </div>
                </div>

            </div>
        </div>
    </section>
</body>

</html>
