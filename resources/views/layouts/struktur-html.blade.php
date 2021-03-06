<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="Menjual furniture" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta property="og:title" content="Luxspace ~ Saingan IKEA" />
    <meta property="og:description" content="Menjual furniture" />
    <meta property="og:url" content="https://luxspace.com" />
    <meta
      property="og:image"
      content="https://luxspace.com/images/content/preview-homepage.jpg"
    />

    <link rel="apple-touch-icon" href="images/content/favicon.png" />
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
