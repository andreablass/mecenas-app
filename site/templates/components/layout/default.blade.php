<!doctype html>
<html lang="en" class="dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ page()->title() }} | {{ site()->title() }}</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-[#d9cbac] dark:bg-black">
        <main class="pt-16 flex-1 p-4">
            {{ $slot }}
        </main>
        <x-footer.footer title="Footer" />
</body>

</html>
