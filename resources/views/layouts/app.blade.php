{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Dashboard Title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    {{-- Include your compiled CSS here, assuming you use Vite --}}
    {{-- @vite(['resources/css/app.css']) --}}
    {{-- Or, if linking directly from public folder: --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body data-theme="light">
    <div class="dashboard-container">
        @include('partials.sidebar')
        @include('partials.navbar')
        @include('partials.breadcrumb')

        <main class="content">
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- Include your compiled JS here, assuming you use Vite --}}
    {{-- @vite(['resources/js/app.js']) --}}
    {{-- Or, if linking directly from public folder: --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>