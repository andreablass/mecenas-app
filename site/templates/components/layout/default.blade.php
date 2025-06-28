<!doctype html>
<html x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" >

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ page()->title() }} | {{ site()->title() }}</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

    <main>
        {{ $slot }}
    </main>

</body>

</html>
