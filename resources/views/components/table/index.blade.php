<div className="relative w-full overflow-auto">
    <table {{ $attributes->twMerge('w-full caption-bottom text-sm') }}>
        {{ $slot }}
    </table>
</div>
