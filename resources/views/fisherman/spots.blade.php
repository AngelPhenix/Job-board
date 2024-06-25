<x-layout>
    <x-slot:heading>
        Fishing Spots :
    </x-slot:heading>

    <ul>
        @foreach ($spots as $spot)
            <li>
                @if($spot->fish()->exists())
                    <a href="/spot/{{$spot->id}}" class="text-emerald-600 hover:text-emerald-400">{{ $spot->name }}</a>
                @else
                    <span class="text-red-600">{{ $spot->name }}</span>
                @endif
            </li>
        @endforeach
    </ul>
</x-layout>