<x-layout>
    <x-slot:heading>Job Listings</x-slot:heading>

    <h1>Hello from the jobs page !</h1>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{$job['id']}}" class="text-blue-700 hover:underline">
                    {{ $job['title'] }}: {{ $job['salary'] }}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>