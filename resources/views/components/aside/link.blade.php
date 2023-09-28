<li class="-mx-4">
    <a {{ $attributes->twMerge("block hover:bg-accent/50 tracking-tight text-sm hover:text-foreground px-4 py-2 rounded-md", $active ? 'text-foreground font-semibold' : 'text-muted-foreground') }}>
        {{ $slot }}
    </a>
</li>
