<x-layout>
    <x-slot:heading>Home Page</x-slot:heading>

    <p><u>Here's some informations you can find in there :</u></p>
    <div class="pl-5">
        <p>This website contains informations about the Fisherman job in Final Fantasy XIV</p>
        <p>For now, we currently have : <u class="text-green-500 font-bold">{{ $fishNum }} fish</u> and <u class="text-red-500 font-bold">{{ $spotNum }} spots</u> in the database.</p>
    </div>
</x-layout>