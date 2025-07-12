<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ site()->title() }}</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/web.css', 'resources/js/web.js','resources/js/app.js','resources/css/app.css']) {{-- CSS y JS para SPA --}}
    @endif
</head>
<body>

</body>
</html>
