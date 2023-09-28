<nav class='flex lg:hidden items-center justify-between px-4 py-3 border-b'>
    <a href="/" wire:navigate>
        <x-application-logo class="w-8 h-8 fill-foreground"/>
    </a>
    <div class="flex items-center gap-x-2">
        <x-sheet>
            <x-slot name="trigger">
            @auth
                <img class="w-8 h-8 rounded-full" src="{{ auth()->user()->gravatar() }}"
                     alt="{{ auth()->user()->name }}">
                @else
                <x-bi-layout-sidebar-reverse class="w-4 h-4"/>
            @endauth
            </x-slot>
            <div>
                <x-application-logo class="w-8 h-8 fill-foreground"/>
                <x-sheet.label class="mt-6 flex items-center justify-between">
                    @auth
                    <div>
                        <div>{{ auth()->user()->name }}</div>
                        <small class="text-muted-foreground">{{ auth()->user()->email }}</small>
                    </div>
                        @else
                        <h4 class="font-semibold tracking-tight">
                            {{ config('app.name') }}
                        </h4>
                    @endauth
                    <x-theme-toggle
                        class="border-0 [&>svg]:w-3.5 [&>svg]:w-h.5 bg-transparent hover:bg-transparent -mr-2"/>
                </x-sheet.label>
                <x-sheet.link wire:navigate active="{{ request()->path() === '/' }}" href="/">
                    {{ __('Home') }}
                </x-sheet.link>
                <x-sheet.link wire:navigate href="/about" active="{{ request()->path() === 'about' }}">
                    {{ __('About') }}
                </x-sheet.link>
                <x-sheet.link wire:navigate href="/gallery" active="{{ request()->path() === 'gallery' }}">
                    {{ __('Gallery') }}
                </x-sheet.link>
                @auth
                    <x-sheet.link wire:navigate :href="route('dashboard')"
                                  active="{{ request()->path() === 'dashboard' }}">
                        {{ __('Dashboard') }}
                    </x-sheet.link>
                    <x-sheet.link class="justify-between" wire:navigate :href="route('profile')"
                                  active="{{ request()->path() === 'profile' }}">
                        {{ __('Settings') }}
                        <x-bi-gear/>
                    </x-sheet.link>
                    <x-sheet.link class="justify-between" wire:navigate href="/users"
                                  active="{{ request()->path() === 'users' }}">
                        {{ __('Users') }}
                    </x-sheet.link>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-sheet.link :href="route('logout')"
                                      onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-sheet.link>
                    </form>
                @else
                    <x-sheet.link wire:navigate :href="route('login')">
                        {{ __('Login') }}
                    </x-sheet.link>
                    <x-sheet.link wire:navigate :href="route('register')">
                        {{ __('Register') }}
                    </x-sheet.link>
                @endauth
            </div>
        </x-sheet>
    </div>
</nav>
