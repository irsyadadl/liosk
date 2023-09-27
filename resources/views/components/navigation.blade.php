<nav class='border-b hidden lg:block py-3'>
    <div class="flex items-center justify-between max-w-screen-2xl px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="flex items-center">
            <x-application-logo class="w-8 h-8 shrink-0 fill-foreground mr-6"/>

            <x-nav-link wire:navigate active="{{ request()->path() === '/' }}" href="/">
                {{ __('Home') }}
            </x-nav-link>
            <x-nav-link wire:navigate href="/about" active="{{ request()->path() === '/about' }}">
                {{ __('About') }}
            </x-nav-link>
            <x-nav-link wire:navigate href="/gallery" active="{{ request()->path() === '/gallery' }}">
                {{ __('Gallery') }}
            </x-nav-link>
        </div>

        @auth
            <x-dropdown-menu align="right" width="60">
                <x-slot name="trigger">
                    <x-button variant="secondary">
                        <x-icons.person-circle class="mr-3"/>
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ml-2 -mr-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </x-button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-menu.link wire:navigate :href="route('dashboard')">
                        <x-icons.dashboard/>
                        {{ __('Dashboard') }}
                    </x-dropdown-menu.link>
                    <x-dropdown-menu.link wire:navigate :href="route('profile')">
                        <x-icons.settings/>
                        {{ __('Profile') }}
                    </x-dropdown-menu.link>
                    <x-dropdown-menu.button-link type="button" @click="darkMode=!darkMode">
                        <x-icons.sun class="w-4 mr-2 h-4  block dark:hidden"/>
                        <x-icons.moon-start class="w-4  h-4 mr-2 dark:block hidden"/>
                        {{ __('Theme') }}
                    </x-dropdown-menu.button-link>

                    <x-dropdown-menu.separator/>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-menu.link :href="route('logout')"
                                              onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <x-icons.logout/>
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

                        <div class="ml-2 -mr-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </x-button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-menu.link wire:navigate :href="route('login')">
                        <x-icons.logout class="rotate-180"/>
                        {{ __('Login') }}
                    </x-dropdown-menu.link>
                    <x-dropdown-menu.link wire:navigate :href="route('register')">
                        <x-icons.person-circle/>
                        {{ __('Register') }}
                    </x-dropdown-menu.link>
                </x-slot>
            </x-dropdown-menu>
        @endauth
    </div>
</nav>
