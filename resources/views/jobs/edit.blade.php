<x-layout>
    <x-slot:heading>Edit job</x-slot:heading>

    <div class="rounded-xl mx-auto mt-8 border border-slate-200 bg-white shadow-card p-6 sm:p-8 max-w-3xl">
        <form method="POST" action="/jobs/{{ $job->id }}" class="space-y-8" id="edit-form">
            @csrf
            @method('PATCH')

            <div class="space-y-6">
                <x-form-field>
                    <x-form-label for="title">Job title</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="title" id="title" :value="old('title', $job->title)" required />
                        <x-form-error name="title" />
                    </div>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="salary">Salary</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="salary" id="salary" :value="old('salary', $job->salary)" required />
                        <x-form-error name="salary" />
                        <p class="mt-1.5 text-xs text-slate-500">€ is added automatically when displayed.</p>
                    </div>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="employment_type">Employment type</x-form-label>
                    <div class="mt-2">
                        <select name="employment_type" id="employment_type" class="block w-full rounded-lg border border-slate-300 py-2.5 px-3.5 text-slate-900 focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 focus:outline-none transition-colors sm:text-sm sm:leading-6">
                            <option value="">— Select type —</option>
                            <option value="Full-time" {{ old('employment_type', $job->employment_type) === 'Full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time" {{ old('employment_type', $job->employment_type) === 'Part-time' ? 'selected' : '' }}>Part-time</option>
                            <option value="Contract" {{ old('employment_type', $job->employment_type) === 'Contract' ? 'selected' : '' }}>Contract</option>
                            <option value="Internship" {{ old('employment_type', $job->employment_type) === 'Internship' ? 'selected' : '' }}>Internship</option>
                            <option value="Freelance" {{ old('employment_type', $job->employment_type) === 'Freelance' ? 'selected' : '' }}>Freelance</option>
                        </select>
                        <x-form-error name="employment_type" />
                    </div>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="location">Location</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="location" id="location" :value="old('location', $job->location)" placeholder="e.g. Paris, France or Remote" />
                        <x-form-error name="location" />
                    </div>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="description">Job description</x-form-label>
                    <div class="mt-2">
                        <x-form-textarea name="description" id="description" rows="6">{{ old('description', $job->description) }}</x-form-textarea>
                        <x-form-error name="description" />
                        <p class="mt-1.5 text-xs text-slate-500">Optional for existing listings. Minimum 20 characters if provided.</p>
                    </div>
                </x-form-field>
            </div>

            <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-slate-200">
                <button type="submit" form="delete-form" class="text-sm font-semibold text-red-600 hover:text-red-700">
                    Delete job
                </button>
                <div class="flex items-center gap-4">
                    <a href="/jobs/{{ $job->id }}" class="text-sm font-semibold text-slate-600 hover:text-slate-900">Cancel</a>
                    <x-form-button>Update job</x-form-button>
                </div>
            </div>
        </form>
    </div>

    <form method="post" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
