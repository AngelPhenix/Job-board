<x-layout>
    <x-slot:heading>Fish Listings</x-slot:heading>

    <ul>
        @foreach ($fishs as $fish)
            <li>
                <strong>{{ $fish['name'] }}</strong> found at <a href="/spot/{{$fish['spot']->id}}"><strong>{{ $fish['spot']->name }}</strong></a>  
            </li>
        @endforeach
    </ul>
</x-layout>