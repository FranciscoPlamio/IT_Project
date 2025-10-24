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
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

    <script>
        const toggle = document.getElementById("menuToggle");
        const navList = document.getElementById("navList");

        toggle.addEventListener("click", () => {
            navList.classList.toggle("open");
        });
    </script>
</body>

</html>
