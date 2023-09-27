@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-foreground'
            : 'text-muted-foreground hover:text-foreground';
@endphp

<a wire:navigate {{ $attributes->twMerge(
    'px-4 py-2 inline-block text-sm hover:bg-accent rounded-md',
    $classes) }}>
    {{ $slot }}
</a>
