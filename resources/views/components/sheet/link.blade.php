@props([
    'active' => false,
])

    <a {{ $attributes->twMerge(
    "py-2 flex items-center justify-between text-sm",
    $active ? "font-semibold text-foreground" :
    "font-normal text-muted-foreground active:text-muted-foreground hover:text-foreground") }}>
        {{ $slot }}
    </a>
