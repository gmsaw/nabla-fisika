<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="description" content="@yield('description', 'Nabla Fisika — Platform pembelajaran fisika resmi HIMAFI UNUD.')">
    <meta name="theme-color" content="#020617">
    <title>@yield('title', 'Nabla Fisika — Platform Pembelajaran Fisika HIMAFI UNUD')</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logoweb.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo1.png') }}">

    {{-- Pre-render dark mode --}}
    <script>
        (function() {
            const saved = localStorage.getItem('theme');
            const isDark = saved ? saved === 'dark' : true;
            if (isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>
<body class="bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 antialiased font-sans">

    @include('layouts.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    @stack('scripts')
</body>
</html>