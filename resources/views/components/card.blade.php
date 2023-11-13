<div {{ $attributes->twMerge('rounded-lg border bg-card text-card-foreground shadow-sm') }}>
    {{ $slot }}
    @isset($header)
        <div class="flex flex-col space-y-1.5 p-6">
            @isset($title)
                <h3 class="text-2xl font-semibold leading-none tracking-tight">
                    {{ $title }}
                </h3>
            @endisset
            @isset($description)
            <div class="text-sm text-muted-foreground">
                {{ $description }}
            </div>
                @endisset
        </div>
    @endisset

    @isset($content)
        <div class="p-6 pt-0">
            {{ $content }}</div>
    @endisset

    @isset($footer)
        <div class="flex items-center p-6 pt-0">
            {{ $footer }}
        </div>
    @endisset
</div>
