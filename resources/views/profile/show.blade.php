<x-layout>
    <x-slot:heading>My profile</x-slot:heading>

    <div class="space-y-8">
        <section class="rounded-xl border border-slate-200 bg-white shadow-card p-6 sm:p-8">
            <h2 class="text-lg font-semibold text-slate-900">Account</h2>
            <dl class="mt-4 grid gap-3 sm:grid-cols-2">
                <div>
                    <dt class="text-sm font-medium text-slate-500">Name</dt>
                    <dd class="mt-0.5 text-slate-900">{{ $user->name }} {{ $user->last_name }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-slate-500">Email</dt>
                    <dd class="mt-0.5 text-slate-900">{{ $user->email }}</dd>
                </div>
                @if($user->employer)
                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-slate-500">Employer / company</dt>
                        <dd class="mt-0.5 text-slate-900">{{ $user->employer->name }}</dd>
                    </div>
                @endif
            </dl>
        </section>

        <section>
            <h2 class="text-lg font-semibold text-slate-900">My job listings</h2>
            @if($jobs->isEmpty())
                <div class="mt-4 rounded-xl border border-slate-200 bg-white p-8 text-center">
                    <p class="text-slate-600">You haven't posted any jobs yet.</p>
                    <a href="/jobs/create" class="mt-4 inline-flex items-center text-sm font-semibold text-primary-600 hover:text-primary-700">Post a job</a>
                </div>
            @else
                <div class="mt-4 space-y-4">
                    @foreach ($jobs as $job)
                        <div class="flex flex-wrap items-start justify-between gap-3 rounded-xl border border-slate-200 bg-white p-5 shadow-card">
                            <a href="/jobs/{{ $job->id }}" class="group min-w-0 flex-1">
                                <h3 class="font-semibold text-slate-900 group-hover:text-primary-600 transition-colors">{{ $job->title }}</h3>
                                <p class="mt-1 text-sm text-slate-500">{{ $job->formatted_salary }}</p>
                                @if($job->description)
                                    <p class="mt-2 text-sm text-slate-600 line-clamp-2">{{ \Illuminate\Support\Str::limit($job->description, 160) }}</p>
                                @endif
                            </a>
                            <div class="flex items-center gap-2 shrink-0">
                                <a href="/jobs/{{ $job->id }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">View</a>
                                <a href="/jobs/{{ $job->id }}/edit" class="text-sm font-semibold text-primary-600 hover:text-primary-700">Edit</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
</x-layout>
