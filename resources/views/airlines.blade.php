<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Airlines</title>

    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body>

    <div class="px-6 py-20 text-center">
        <h1 class="text-5xl font-bold">Airlines</h1>
    </div>

    {{-- Load a table of all the airlines --}}
    @livewire('airlines-list')


    @livewireScripts
</body>
</html>