<div x-data="{
        slideOverOpen: false
    }"
     class="relative z-50 w-auto h-auto">
    <span @click="slideOverOpen=true">
        {{ $trigger }}
    </span>
    <template x-teleport="body">
        <div
            x-show="slideOverOpen"
            @keydown.window.escape="slideOverOpen=false"
            class="relative z-[99]">
            <div x-show="slideOverOpen" x-transition.opacity.duration.600ms @click="slideOverOpen = false" class="fixed inset-0 bg-background/80"></div>
            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <div
                            x-show="slideOverOpen"
                            @click.away="slideOverOpen = false"
                            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                            x-transition:enter-start="translate-x-full"
                            x-transition:enter-end="translate-x-0"
                            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                            x-transition:leave-start="translate-x-0"
                            x-transition:leave-end="translate-x-full"
                            class="w-screen max-w-xs">
                            <div class="flex flex-col h-full py-5 overflow-y-scroll bg-card border-l shadow-lg">
                                <button @click="slideOverOpen=false" class="focus:ring focus:ring-primary/10 rounded-full absolute top-4 right-4 z-30">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    <span class="sr-only">Close</span>
                                </button>
                                <div class="relative flex-1">
                                    <div class="absolute inset-0 px-6 py-4">
                                        {{ $slot }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
