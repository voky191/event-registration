<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        @fluxAppearance
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
        <flux:navbar class="-mb-px max-lg:hidden">
            <flux:navbar.item icon="home" href="{{route('home')}}" current>Home</flux:navbar.item>
            <flux:navbar.item icon="document-text" href="#">Event List</flux:navbar.item>
            <flux:navbar.item icon="calendar" href="#">Event Registration</flux:navbar.item>
        </flux:navbar>
    </flux:header>
    <flux:sidebar sticky collapsible="mobile" class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.nav>
            <flux:sidebar.item icon="home" href="{{route('home')}}" current>Home</flux:sidebar.item>
            <flux:sidebar.item icon="document-text" href="#">Event List</flux:sidebar.item>
            <flux:sidebar.item icon="calendar" href="#">Event Registration</flux:sidebar.item>
        </flux:sidebar.nav>
    </flux:sidebar>
    <flux:main container>
        {{ $slot }}
    </flux:main>
        @fluxScripts
    </body>
</html>
