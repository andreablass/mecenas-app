<x-layout.default>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <div class="flex flex-col justify-center items-center p-6 overflow-y-auto">
        <div class="flex flex-col justify-center items-center p-6 overflow-y-auto">
            <div class="flex flex-col justify-center items-center w-full max-w-full">
                @if ($imageLight = $page->main_image()->toFile())
                @if ($imageDark = $page->darkMain_image()->toFile())
                <img :src="darkMode ? '{{ $imageDark->url() }}' : '{{ $imageLight->url() }}'" alt="Image" class="w-45 h-32 sm:w-40 sm:h-40 mx-auto ">
                @else
                <img src="{{ $imageLight->url() }}" alt="Image" class="w-45 h-32 sm:w-40 sm:h-40 mx-auto">
                @endif
                @endif

                @if ($logoLight = $page->logo()->toFile())
                @if ($logoDark = $page->darkLogo()->toFile())
                <img :src="darkMode ? '{{ $logoDark->url() }}' : '{{ $logoLight->url() }}'" alt="Logo" class="w-80 sm:w-80 mx-auto mt-4">
                @else
                <img src="{{ $logoLight->url() }}" alt="Logo" class="w-80 sm:w-80 mx-auto mt-4">
                @endif
                @endif
            </div>
        </div>



        <div class="mt-6 max-w-full text-center mx-auto px-4 sm:px-6 w-full">
            <p class="text-sm sm:text-lg md:text-xl">{!! $page->description()->kirbytext() !!}</p>
        </div>

        <div class="mt-6 flex flex-row gap-4 justify-center w-full max-w-full mx-auto px-4 sm:px-6">
            <a href="{{ $page->menuButtonLink() }}" class="dark:border-[#d9cbac] dark:text-[#d9cbac] bg-transparent border-2 border-black text-black px-12 py-3 rounded-md text-center w-full sm:w-auto">
                {{ $page->menuButtonText() }}
            </a>
            <a href="{{ $page->reservasionesButtonLink() }}" class="dark:bg-[#d9cbac] dark:text-black bg-black text-[#d9cbac] px-12 py-3 rounded-md text-center w-full sm:w-auto">
                {{ $page->reservasionesButtonText() }}
            </a>
        </div>

        <div class="mt-6 max-w-full text-center mx-auto px-4 sm:px-6 w-full">
            <h2 class="text-2xl sm:text-3xl font-bold">Horario</h2>
            <ul class="mt-2 space-y-1">
                @foreach ($page->schedule()->toStructure() as $schedule)
                <li class="text-sm sm:text-lg md:text-xl">{{ $schedule->day() }}: {{ $schedule->hours() }}</li>
                @endforeach
            </ul>
        </div>

        <div class="mt-8 text-center mx-auto px-4 sm:px-6 w-full max-w-full">
            <h2 class="text-2xl sm:text-3xl font-bold">Ubicación</h2>
            <p class="text-sm sm:text-lg md:text-xl">{{ $page->location() }}</p>
        </div>

        <div class="mt-6 mx-auto px-4 sm:px-6 w-full max-w-full">
            <h2 class="text-2xl sm:text-3xl font-bold text-center">Síguenos</h2>
            <div class="mt-2 flex justify-center gap-6">
                @foreach ($page->social()->toStructure() as $social)
                <a href="{{ $social->link() }}" target="_blank" class="text-xl sm:text-2xl hover:text-gray-700 transition">
                    @if ($social->icon() == 'instagram')
                    <i class="fab fa-instagram"></i>
                    @elseif ($social->icon() == 'facebook')
                    <i class="fab fa-facebook-f"></i>
                    @elseif ($social->icon() == 'twitter')
                    <i class="fab fa-twitter"></i>
                    @elseif ($social->icon() == 'linkedin')
                    <i class="fab fa-linkedin-in"></i>
                    @else
                    <i class="fab fa-share-alt"></i>
                    @endif
                </a>
                @endforeach

                <a class="text-xl sm:text-2xl hover:text-gray-700 transition">
                    <i class="fas fa-share-alt text-2xl"></i>
                </a>
            </div>
        </div>
    </div>
</x-layout.default>
