<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- !FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@100;300;400;700&display=swap"
        rel="stylesheet"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;400&display=swap"
        rel="stylesheet"
        />
        @vite('resources/css/app.css')
        {{-- стили для карусели --}}
        {{-- <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/config.carousel.js"></script> --}}
    </head>
    <style>
        body {
            width: 100vw;
            height: 100vh;
            display: flex;
            background-color: #000000;
            flex-direction: column;
            overflow: hidden;
        }
    </style>
    <body id="app">
        @vite('resources/js/app.js')
    </body>
</html>
