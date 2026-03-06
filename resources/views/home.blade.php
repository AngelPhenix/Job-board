<x-layout>
    <x-slot:heading>Find your next role</x-slot:heading>

    <section class="relative overflow-hidden rounded-2xl bg-slate-900 px-8 py-16 sm:px-12 sm:py-20 lg:px-16">
        <div class="relative z-10 max-w-2xl">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                The right job is out there.
            </h2>
            <p class="mt-4 text-lg text-slate-300">
                Browse {{ $jobCount }} open positions from top employers. Create an account to post jobs or apply.
            </p>
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="/jobs" class="inline-flex items-center justify-center rounded-lg bg-primary-500 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 focus:ring-offset-slate-900 transition-colors">
                    Browse jobs
                </a>
                @guest
                    <a href="/register" class="inline-flex items-center justify-center rounded-lg border border-slate-500 bg-transparent px-6 py-3 text-sm font-semibold text-white hover:bg-white/10 transition-colors">
                        Sign up to post a job
                    </a>
                @endguest
            </div>
        </div>
        <div class="absolute right-0 top-0 h-full w-1/3 bg-gradient-to-l from-primary-600/20 to-transparent pointer-events-none" aria-hidden="true"></div>
    </section>

    @if($recentJobs->isNotEmpty())
        <section class="mt-12">
            <h3 class="text-lg font-semibold text-slate-900">Recent listings</h3>
            <div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($recentJobs as $job)
                    <a href="/jobs/{{ $job->id }}" class="group flex flex-col rounded-xl border border-slate-200 bg-white p-5 shadow-card transition-shadow hover:shadow-card-hover">
                        <span class="text-sm font-medium text-primary-600">{{ $job->employer->name }}</span>
                        <span class="mt-1 font-semibold text-slate-900 group-hover:text-primary-600 transition-colors">{{ $job->title }}</span>
                        <span class="mt-2 text-sm text-slate-500">{{ $job->formatted_salary }}</span>
                    </a>
                @endforeach
            </div>
            <div class="mt-6">
                <a href="/jobs" class="text-sm font-semibold text-primary-600 hover:text-primary-700">View all jobs →</a>
            </div>
        </section>
    @else
        <section class="mt-12 rounded-xl border border-slate-200 bg-white p-8 text-center">
            <p class="text-slate-600">No jobs yet. Be the first to post one.</p>
            @guest
                <a href="/register" class="mt-4 inline-flex items-center text-sm font-semibold text-primary-600 hover:text-primary-700">Sign up to post a job</a>
            @else
                <a href="/jobs/create" class="mt-4 inline-flex items-center text-sm font-semibold text-primary-600 hover:text-primary-700">Post a job</a>
            @endguest
        </section>
    @endif
</x-layout>
