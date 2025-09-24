<flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
    <flux:navbar class="-mb-px max-lg:hidden">
        <flux:navbar.item icon="home" href="{{route('home')}}" :current="request()->routeIs('home')">Home</flux:navbar.item>
        <flux:navbar.item icon="document-text" href="{{route('events.index')}}" :current="request()->routeIs('events.index')">Event List</flux:navbar.item>
        <flux:navbar.item icon="calendar" href="#">Event Registration</flux:navbar.item>
    </flux:navbar>
</flux:header>
<flux:sidebar sticky collapsible="mobile" class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.nav>
        <flux:sidebar.item icon="home" href="{{route('home')}}" :current="request()->routeIs('home')">Home</flux:sidebar.item>
        <flux:sidebar.item icon="document-text" href="{{route('events.index')}}" :current="request()->routeIs('events.index')">Event List</flux:sidebar.item>
        <flux:sidebar.item icon="calendar" href="#">Event Registration</flux:sidebar.item>
    </flux:sidebar.nav>
</flux:sidebar>
