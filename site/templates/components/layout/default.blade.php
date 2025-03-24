<!doctype html>
<html x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" \>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ page()->title() }} | {{ site()->title() }}</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body :class="{ 'bg-[#1b1b1b] text-[#d9cbac]': darkMode, 'bg-[#d9cbac] text-black': !darkMode }" class="transition-all duration-300">
    <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)" class="p-2 bg-gray-400  rounded">
        <span x-show="!darkMode">🌞</span>
        <span x-show="darkMode">🌙</span>
    </button>

    <main class="pt-16 flex-1 p-4">
        {{ $slot }}
    </main>

    <x-footer.footer title="Footer" />
</body>

</html>

