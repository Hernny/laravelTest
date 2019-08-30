<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <title>Test - @yield('title')</title>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>