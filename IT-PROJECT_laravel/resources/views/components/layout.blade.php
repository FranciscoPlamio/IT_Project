@props([
    'title' => 'NTC CAR Baguio',
    'head' => '',
    'formHeader' => null,
    'showNavbar' => true,
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/formValidation.js'])

    {{ $head }}

</head>

<body>
    <header>
        <x-top-bar :form-header="$formHeader" />

        @if ($showNavbar)
            <x-navbar />
        @endif
    </header>
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-footer />

    <x-flash-message />

    <script>
        const toggle = document.getElementById("menuToggle");
        const navList = document.getElementById("navList");
        if (toggle) {
            toggle.addEventListener("click", () => {
                navList.classList.toggle("open");
            });
        }
    </script>
    <!-- Include Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>

</html>
