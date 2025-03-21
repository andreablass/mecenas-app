<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="bg-[#d9cbac]  flex flex-col justify-center items-center text-black p-6 overflow-y-auto">
    <div class="flex flex-col justify-center items-center w-full max-w-full">
        @if ($image = $page->main_image()->toFile())
        <img src="{{ $image->url() }}" alt="Image" class="w-32 h-32 sm:w-40 sm:h-40 mx-auto">
        @endif
        @if ($logo = $page->logo()->toFile())
        <img src="{{ $logo->url() }}" alt="Logo" class="w-40 sm:w-48 mx-auto mt-4">
        @endif
    </div>

    <div class="mt-6 max-w-full text-center mx-auto px-4 sm:px-6 w-full">
        <p class="text-sm sm:text-lg md:text-xl">{!! $page->description()->kirbytext() !!}</p>
    </div>

    <div class="mt-6 flex flex-col sm:flex-row gap-4 justify-center w-full max-w-full mx-auto px-4 sm:px-6">
        @foreach ($page->buttons()->toStructure() as $button)
        <a href="{{ $button->link() }}" class="bg-black text-white px-6 py-3 rounded-lg shadow-md hover:bg-gray-800 focus:bg-gray-700 focus:outline-none active:bg-gray-600 transition w-full sm:w-auto text-center">
            {{ $button->text() }}
        </a>
        @endforeach
    </div>

    <div class="mt-8 text-center mx-auto px-4 sm:px-6 w-full max-w-full">
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

            <a href="{{ $page->share() }}" class="text-xl sm:text-2xl hover:text-gray-700 transition">
                <i class="fas fa-share-alt text-2xl"></i>
            </a>
        </div>
    </div>

    <div class="absolute bottom-4 right-4">
        <button id="colorToggleButton" class="bg-[#6f4f37] text-white px-6 py-3 rounded-lg shadow-md transition hover:bg-black focus:outline-none">
            Cambiar Color
        </button>
    </div>
</div>

