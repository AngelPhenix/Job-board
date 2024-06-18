<x-layout>
    <x-slot:heading>
        Fishing Spots :
    </x-slot:heading>

    <ul>
        @foreach ($spots as $spot)
            <li>
                {{ $spot->name }}
            </li>
        @endforeach
    </ul>
</x-layout>