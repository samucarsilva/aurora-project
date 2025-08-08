<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title', 'Aurora Platform') </title>
    <link rel="icon" type="image/png" href="{{ asset('images/aurora/aurora-logo-white.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('styles')

</head>
<body>


    @include('components.partials.header')


    <main class="aurora-main @yield('properties')">

        <div class="container-fluid">
            @yield('content')
        </div>

    </main>


    @include('components.partials.footer')


    @yield('scripts')


</body>
</html>