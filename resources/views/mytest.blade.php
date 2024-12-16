<x-layouts.guest>
    @php
        $name = 'Zenitsu Agatsuma';
    @endphp

    <x-test :$name />
    <livewire:counter />
</x-layouts.guest>
