<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

    @vite([
        'resources/assets/css/bootstrap.min.css',
        'resources/assets/plugin/nice-select/nice-select.css',
        'resources/assets/plugin/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css',
        'resources/assets/plugin/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css',
        'resources/assets/plugin/nouislider/nouislider.min.css',
        'resources/assets/css/style.css',
    ])
</head>
<body>
    @include('layouts.header')

    <main>
        @yield('main')
    </main>

    @include('layouts.footer')
</body>
</html>
