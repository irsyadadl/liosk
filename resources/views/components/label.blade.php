@props(['value'])

<label {{ $attributes->twMerge('text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70') }}>
    {{ $value ?? $slot }}
</label>
