<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxAppearance

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">

    <x-header></x-header>

    <flux:main container>
        {{ $slot }}
    </flux:main>

        @fluxScripts
    </body>
</html>
