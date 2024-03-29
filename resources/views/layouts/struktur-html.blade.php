<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="Menjual furniture" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta property="og:title" content="Luxspace ~ Saingan IKEA" />
    <meta property="og:description" content="Menjual furniture" />
    <meta property="og:url" content="{{ url('') }}" />
    <meta property="og:image" content="{{ asset('images/content/logo.png') }}" />

    <link rel="apple-touch-icon" href="{{ asset('images/content/favicon.png') }}" />
    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" />
    <meta name="theme-color" content="#000" />
    @stack('include-css')
</head>

<body>
    @yield('content')
    @stack('include-js')
</body>

</html>
