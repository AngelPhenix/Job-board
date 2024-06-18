<x-layout>
    <x-slot:heading>
        Fishing Spot : {{ $spot['name'] }}
    </x-slot:heading>

    <p>
        You can find those fish in this specific spot :
    </p>
    <ul>
        @foreach ($spots as $spot)
            <li>
                <a href="/jobs/{{$job['id']}}" class="text-blue-700 hover:underline">
                    {{ $job['title'] }}: {{ $job['salary'] }}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>