<nav class='flex lg:hidden items-center justify-between px-4 py-3 border-b'>
    <a href="/" wire:navigate>
        <x-application-logo class="w-8 h-8 fill-foreground"/>
    </a>
    <div class="flex items-center gap-x-1">
        <x-theme-toggle/>
        <x-dropdown-menu align="right" width="60">
            <x-slot name="trigger">
                @auth
                    <x-button variant="secondary">
                        <x-bi-person-circle class="mr-2"/>
                        <span>{{ Auth::user()->name }}</span>

                        <x-bi-chevron-down class="ml-2 w-3 h-3 -mr-1"/>
                    </x-button>
                @else
                    <x-button variant="secondary" size="icon" class="h-9">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </x-button>
                @endauth
            </x-slot>

            <x-slot name="content">
                <x-dropdown-menu.link wire:navigate active="{{ request()->path() === '/' }}" href="/">
                    {{ __('Home') }}
                </x-dropdown-menu.link>
                <x-dropdown-menu.link wire:navigate href="/about" active="{{ request()->path() === '/about' }}">
                    {{ __('About') }}
                </x-dropdown-menu.link>
                <x-dropdown-menu.link wire:navigate href="/gallery" active="{{ request()->path() === '/gallery' }}">
                    {{ __('Gallery') }}
                </x-dropdown-menu.link>
                @auth
                    <x-dropdown-menu.link wire:navigate :href="route('dashboard')">
                        {{ __('Dashboard') }}
                    </x-dropdown-menu.link>
                    <x-dropdown-menu.link class="justify-between" wire:navigate :href="route('profile')">
                        {{ __('Profile') }}
                        <x-bi-gear/>
                    </x-dropdown-menu.link>
                    <x-dropdown-menu.separator/>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-menu.link :href="route('logout')"
                                              onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-menu.link>
                    </form>
                @else
                    <x-dropdown-menu.separator/>
                    <x-dropdown-menu.link wire:navigate :href="route('login')">
                        {{ __('Login') }}
                    </x-dropdown-menu.link>
                    <x-dropdown-menu.link wire:navigate :href="route('register')">
                        {{ __('Register') }}
                    </x-dropdown-menu.link>
                @endauth
            </x-slot>
        </x-dropdown-menu>
    </div>
</nav>
