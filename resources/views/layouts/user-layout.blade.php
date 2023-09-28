<!DOCTYPE html>
<html x-cloak x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }"
      lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <script>
        function setMetaThemeColor(setting) {
            const metaThemeColor = document.getElementById("theme-color-meta");
            if (metaThemeColor) {
                switch (setting) {
                    case 'dark':
                        metaThemeColor.setAttribute("content", "#09090b");
                        break;
                    case 'light':
                        metaThemeColor.setAttribute("content", "#ffffff");
                        break;
                    case 'system':
                        window.matchMedia('(prefers-color-scheme: dark)').matches ? metaThemeColor.setAttribute("content", "#020713") : metaThemeColor.setAttribute("content", "#ffffff");
                        break;
                    default:
                        metaThemeColor.setAttribute("content", "#ffffff")
                }
            }
        }

        function updateTheme() {
            const themes = ['light', 'dark', 'system'];
            const currentTheme = localStorage.getItem('theme') || 'system';
            themes.forEach((theme) => {
                document.documentElement.classList.remove(theme)
            });
            if (currentTheme === 'system') {
                window.matchMedia('(prefers-color-scheme: dark)').matches ? document.documentElement.classList.add('dark') : document.documentElement.classList.add('light')
            } else {
                document.documentElement.classList.add(currentTheme)
            }
            setMetaThemeColor(currentTheme)
        }

        updateTheme();
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            if (localStorage.getItem('theme') === 'system') {
                e.matches ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark');
                setMetaThemeColor('system')
            }
        })
    </script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen">
    <x-responsive-navigation/>

        <x-theme-toggle class="hidden lg:block fixed bottom-0 left-0 ml-8 mb-4 p-0 border-0 [&>svg]:w-3.5 [&>svg]:w-h.5 text-muted-foreground bg-transparent hover:bg-transparent mr-2"/>
    <!-- Page Content -->
    <div class="flex max-w-screen-2x mx-auto">
        <x-aside>
            <li class="flex items-center justify-between mb-8">
                <a wire:navigate href="/" class="block">
                    <x-application-logo class="w-10 h-10 shrink-0 fill-foreground mr-6"/>
                </a>
            </li>

            <x-aside.link wire:navigate href="/dashboard" active="{{ request()->path() === 'dashboard' }}">
                Dashboard
            </x-aside.link>
            <x-aside.link wire:navigate href="/profile" active="{{ request()->path() === 'profile' }}">
                Settings
            </x-aside.link>
            <x-aside.link wire:navigate href="/users" active="{{ request()->path() === 'users' }}">
                Users
            </x-aside.link>
            <x-aside.link wire:navigate href="/articles" active="{{ request()->path() === 'articles' }}">
                Articles
            </x-aside.link>
        </x-aside>
        <div class="w-full">
            @isset($header)
                <header class="flex border-b justify-between items-center px-6 sm:px-8 py-4 sm:py-6 bg-card">
                    <h1 class="font-semibold text-lg text-foreground">
                        {{ $header }}
                    </h1>
                </header>
            @endisset

            <div class="sm:p-8 p-6">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
@livewireScripts
</body>
</html>
