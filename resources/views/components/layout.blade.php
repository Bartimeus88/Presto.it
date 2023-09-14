<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- aggiunto link per fontawesome --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <x-navbar2/>
    {{ $slot }}



    <x-footer />
    @livewireScripts
    <script src="https://kit.fontawesome.com/b8bf2cd9cb.js" crossorigin="anonymous"></script>
</body>

</html>
