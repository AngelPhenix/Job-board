<x-layout>
    <x-slot:heading>Fish Listings</x-slot:heading>

    <ul>
        @foreach ($fishs as $fish)
            <li>
                <strong>{{ $fish['name'] }}</strong> found at <strong>{{ $fish['spot'] }}</strong>
            </li>
        @endforeach
    </ul>
</x-layout>