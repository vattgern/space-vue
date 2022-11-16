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
    </head>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html,body{
            overflow-x: hidden;
        }
        body {
            width: 100vw;
            height: 100vh;
            display: flex;
            background-color: #000000;
            flex-direction: column;
        }
    </style>
    <body id="app">
        @vite('resources/js/app.js')
    </body>
    {{-- <script type="importmap">
        {
            "imports": {
                "three": "https://unpkg.com/three@0.139.0/build/three.module.js",
                "OrbitControls": "https://unpkg.com/three@0.139.0/examples/jsm/controls/OrbitControls.js",
                "GLTFLoader": "https://unpkg.com/three@0.139.0/examples/jsm/loaders/GLTFLoader.js",
                "RectAreaLightHelper": "https://unpkg.com/three@0.139.0/examples/jsm/helpers/RectAreaLightHelper.js",
                "RectAreaLightUniformsLib": "https://unpkg.com/three@0.139.0/examples/jsm/lights/RectAreaLightUniformsLib.js"
            }
        }
    </script> --}}
</html>
