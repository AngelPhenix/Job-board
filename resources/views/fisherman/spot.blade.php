<x-layout>
    <x-slot:heading>Information about the spot : {{$spot->name}}</x-slot:heading>

    <h2>Those fish are present in that <strong>specific</strong> spot :</h2>
    <ul>
        @foreach ($spot->fish as $fish)
            <li>
                {{ $fish->name }}
            </li>
        @endforeach
    </ul>
</x-layout>