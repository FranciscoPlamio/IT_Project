<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'NTC CAR Baguio' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{ $head ?? '' }}
</head>

<body>
    <main>
        {{ $slot }}
    </main>

    <script>
        const toggle = document.getElementById("menuToggle");
        const navList = document.getElementById("navList");

        toggle.addEventListener("click", () => {
            navList.classList.toggle("open");
        });
    </script>
</body>

</html>
