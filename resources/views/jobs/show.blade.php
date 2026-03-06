<x-layout>
    <x-slot:heading>{{ $job->title }}</x-slot:heading>
    <x-slot:headerAction>
        @can('edit', $job)
            <x-button href="/jobs/{{ $job->id }}/edit">Edit job</x-button>
        @endcan
    </x-slot:headerAction>

    <article class="rounded-xl border border-slate-200 bg-white shadow-card overflow-hidden">
        <div class="p-6 sm:p-8">
            <p class="text-sm font-medium text-primary-600">{{ $job->employer->name }}</p>
            <h2 class="mt-2 text-2xl font-bold text-slate-900">{{ $job->title }}</h2>

            <dl class="mt-6 flex flex-wrap gap-x-8 gap-y-3">
                <div>
                    <dt class="text-sm font-medium text-slate-500">Salary</dt>
                    <dd class="mt-0.5 text-base font-semibold text-slate-900">{{ $job->formatted_salary }}</dd>
                </div>
                @if($job->employment_type)
                    <div>
                        <dt class="text-sm font-medium text-slate-500">Employment type</dt>
                        <dd class="mt-0.5 text-base text-slate-900">{{ $job->employment_type }}</dd>
                    </div>
                @endif
                @if($job->location)
                    <div>
                        <dt class="text-sm font-medium text-slate-500">Location</dt>
                        <dd class="mt-0.5 text-base text-slate-900">{{ $job->location }}</dd>
                    </div>
                @endif
                <div>
                    <dt class="text-sm font-medium text-slate-500">Employer</dt>
                    <dd class="mt-0.5 text-base text-slate-900">{{ $job->employer->name }}</dd>
                </div>
            </dl>

            @if($job->description)
                <div class="mt-8 pt-6 border-t border-slate-200">
                    <h3 class="text-sm font-semibold text-slate-900">About the role</h3>
                    <div class="mt-3 prose prose-slate max-w-none text-slate-700 whitespace-pre-wrap">{{ $job->description }}</div>
                </div>
            @endif
        </div>
        @can('edit', $job)
            <div class="border-t border-slate-200 bg-slate-50 px-6 py-4 sm:px-8">
                <a href="/jobs/{{ $job->id }}/edit" class="text-sm font-semibold text-primary-600 hover:text-primary-700">Edit this job →</a>
            </div>
        @endcan
    </article>
</x-layout>
