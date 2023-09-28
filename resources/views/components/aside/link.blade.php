@props(['active' => false])

<li class="-mx-4">
    <a {{ $attributes->twMerge("flex items-center [&>svg]:w-3.5 [&>svg]:h-3.5 [&>svg]:mr-3 hover:bg-accent/50 tracking-tight text-sm hover:text-foreground px-4 py-2 rounded-md", $active ? 'text-foreground font-semibold' : 'text-muted-foreground') }}>
        {{ $slot }}
    </a>
</li>
