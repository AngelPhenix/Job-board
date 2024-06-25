<x-layout>
    <x-slot:heading>Fish Listings</x-slot:heading>

    <ul>
        @foreach ($fishs as $fish)
            <li class="mb-10">
                <u>{{ $fish->name }}</u> can be found at :
                <ul class="ml-10">
                    @foreach ($fish->spots as $spot)
                        <li>
                            <a href="/spot/{{$spot->id}}" class="text-emerald-600 hover:text-emerald-400"> {{ $spot->name }} </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</x-layout>