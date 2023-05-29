<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trip-Builder</title>

    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body>
    
    {{-- Load Navbar --}}
    @livewire('navbar')

    {{-- Load Header --}}
    @livewire('header')

    @livewireScripts

</body>
</html>