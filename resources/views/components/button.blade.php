@props([
    'variant' => 'default',
    'size' => 'default',
])

@php
    $variantClasses = [
        'default' => "bg-primary text-primary-foreground hover:bg-primary/90",
        'destructive' => "bg-destructive text-destructive-foreground hover:bg-destructive/90",
        'outline' => "border border-input bg-background hover:bg-accent hover:text-accent-foreground",
        'secondary' => "bg-secondary/50 text-secondary-foreground hover:bg-secondary/70 border",
        'ghost' => "hover:bg-accent hover:text-accent-foreground",
        'link' => "text-primary underline-offset-4 hover:underline"
    ];

    $sizeClasses = [
        'default' => "px-4 py-2 text-sm",
        'sm' => "px-3 py-1.5 text-sm",
        'lg' => "px-5 py-3 text-lg",
        'icon' => "w-10 h-10"
    ];

    $mergedClasses = 'inline-flex h-10 items-center justify-center rounded-md transition-colors focus:outline-none disabled:pointer-events-none disabled:opacity-50 ' . $sizeClasses[$size] . ' ' . $variantClasses[$variant];
@endphp

<button {{ $attributes->twMerge(['class' => $mergedClasses]) }}>
    {{ $slot }}
</button>
