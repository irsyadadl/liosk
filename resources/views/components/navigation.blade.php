<nav class='border-b hidden lg:block py-3'>
    <div class="flex items-center justify-between max-w-screen-2xl px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="flex items-center">
            <a wire:navigate href="/">
                <x-application-logo class="w-8 h-8 shrink-0 fill-foreground mr-6"/>
            </a>

            <x-nav-link wire:navigate active="{{ request()->path() === '/' }}" href="/">
                {{ __('Home') }}
            </x-nav-link>
            <x-nav-link wire:navigate href="/about" active="{{ request()->path() === 'about' }}">
                {{ __('About') }}
            </x-nav-link>
            <x-nav-link wire:navigate href="/gallery" active="{{ request()->path() === 'gallery' }}">
                {{ __('Gallery') }}
            </x-nav-link>
        </div>

        <div class="flex items-center gap-x-1">
            <x-theme-toggle/>

            @auth
                <x-dropdown-menu align="right" width="60">
                    <x-slot name="trigger">
                        <x-button variant="secondary">
                            <x-bi-person-circle class="mr-3"/>
                            <div>{{ Auth::user()->name }}</div>

                            <x-bi-chevron-down class="ml-2 w-3 h-3 -mr-1"/>
                        </x-button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-menu.label>
                            <div>{{ auth()->user()->name }}</div>
                            <small class="text-muted-foreground">{{ auth()->user()->email }}</small>
                        </x-dropdown-menu.label>
                        <x-dropdown-menu.link wire:navigate :href="route('dashboard')">
                            {{ __('Dashboard') }}
                        </x-dropdown-menu.link>
                        <x-dropdown-menu.link class="justify-between" wire:navigate :href="route('profile')">
                            {{ __('Settings') }}
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
                    </x-slot>
                </x-dropdown-menu>
            @else
                <x-dropdown-menu align="right" width="60">
                    <x-slot name="trigger">
                        <x-button variant="secondary">
                            <div>Login</div>

                            <x-bi-chevron-down class="ml-2 w-3 h-3 -mr-1"/>
                        </x-button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-menu.link wire:navigate :href="route('login')">
                            <x-bi-box-arrow-left/>
                            {{ __('Login') }}
                        </x-dropdown-menu.link>
                        <x-dropdown-menu.link wire:navigate :href="route('register')">
                            <x-bi-person-circle/>
                            {{ __('Register') }}
                        </x-dropdown-menu.link>
                    </x-slot>
                </x-dropdown-menu>
            @endauth
        </div>
    </div>
</nav>
