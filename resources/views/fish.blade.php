<x-layout>
    <x-slot:heading>Fish Listings</x-slot:heading>

    <ul>
        @foreach ($fishs as $fish)
            <li>
                {{ $fish->name }}
            </li>
        @endforeach
    </ul>
</x-layout>