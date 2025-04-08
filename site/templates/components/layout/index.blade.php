<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <x-meta />

    <title>{{ page()->title() }} | {{ site()->title() }}</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/web.css', 'resources/js/web.js'])
    @endif
</head>

  
<body>

    <main >
        {{ $slot }}
    </main>

    <x-footer.footer title="Footer" />
</body>

</html>

