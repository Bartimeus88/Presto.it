<!doctype html>
<html lang="it">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presto.it</title>

    {{-- aggiunto link per fontawesome --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    @if(!Route::is('login', 'register'))
        <x-navbar2 />
    @endif
    
    <main class="min-vh-100 @if (!Route::is('login', 'register')) mt-5 pt-2 @endif">
        {{ $slot }}
    </main>

    @if(!Route::is('login', 'register'))
        <x-footer />
    @endif


    
    @livewireScripts
    <script src="https://kit.fontawesome.com/b8bf2cd9cb.js" crossorigin="anonymous"></script>
</body>

</html>
