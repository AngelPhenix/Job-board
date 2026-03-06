<x-layout>
    <x-slot:heading>Job listings</x-slot:heading>
    <x-slot:headerAction>
        @auth
            <a href="/jobs/create" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-primary-600 rounded-lg hover:bg-primary-700 transition-colors">Post a job</a>
        @endauth
    </x-slot:headerAction>

    @if($jobs->isEmpty())
        <div class="rounded-xl border border-slate-200 bg-white p-12 text-center">
            <p class="text-slate-600">No job listings yet.</p>
            @auth
                <a href="/jobs/create" class="mt-4 inline-flex items-center text-sm font-semibold text-primary-600 hover:text-primary-700">Post the first job</a>
            @else
                <a href="/register" class="mt-4 inline-flex items-center text-sm font-semibold text-primary-600 hover:text-primary-700">Sign up to post a job</a>
            @endauth
        </div>
    @else
        <div class="space-y-4">
            @foreach ($jobs as $job)
                <a href="/jobs/{{ $job->id }}" class="group block rounded-xl border border-slate-200 bg-white p-5 shadow-card transition-shadow hover:shadow-card-hover hover:border-slate-300">
                    <div class="flex flex-wrap items-start justify-between gap-3">
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <p class="text-sm font-medium text-primary-600">{{ $job->employer->name }}</p>
                                @if($job->employment_type)
                                    <span class="text-xs font-medium text-slate-500 bg-slate-100 px-2 py-0.5 rounded">{{ $job->employment_type }}</span>
                                @endif
                                @if($job->location)
                                    <span class="text-xs text-slate-500">{{ $job->location }}</span>
                                @endif
                            </div>
                            <h3 class="mt-1 font-semibold text-slate-900 group-hover:text-primary-600 transition-colors">{{ $job->title }}</h3>
                            <p class="mt-2 text-sm text-slate-500">{{ $job->formatted_salary }}</p>
                            @if($job->description)
                                <p class="mt-2 text-sm text-slate-600 line-clamp-2">{{ \Illuminate\Support\Str::limit($job->description, 160) }}</p>
                            @endif
                        </div>
                        <span class="inline-flex items-center text-slate-400 group-hover:text-primary-500 transition-colors">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    </div>
                </a>
            @endforeach

            <div class="mt-8">
                {{ $jobs->links() }}
            </div>
        </div>
    @endif
</x-layout>
