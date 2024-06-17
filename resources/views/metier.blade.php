<x-layout>
    <x-slot:heading>Liste des métiers sur FF14</x-slot:heading>

    <ul>
        @foreach ($metiers as $metier)
            <li>
                {{ $metier['title'] }}
            </li>
        @endforeach
    </ul>
</x-layout>