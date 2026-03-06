<x-layout>
    <x-slot:heading>Create a job</x-slot:heading>

    <div class="rounded-xl mx-auto mt-8 border border-slate-200 bg-white shadow-card p-6 sm:p-8 max-w-2xl">
        <p class="text-slate-600 mb-8">Add a new job listing. Give candidates enough context so they can see if it’s a fit.</p>

        <form method="POST" action="/jobs" class="space-y-8">
            @csrf

            <div class="space-y-6">
                <x-form-field>
                    <x-form-label for="title">Job title</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="title" id="title" placeholder="e.g. Senior Laravel Developer" required />
                        <x-form-error name="title" />
                    </div>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="salary">Salary</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="salary" id="salary" placeholder="e.g. 50,000" required />
                        <x-form-error name="salary" />
                        <p class="mt-1.5 text-xs text-slate-500">€ is added automatically when displayed.</p>
                    </div>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="employment_type">Employment type</x-form-label>
                    <div class="mt-2">
                        <select name="employment_type" id="employment_type" class="block w-full rounded-lg border border-slate-300 py-2.5 px-3.5 text-slate-900 focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 focus:outline-none transition-colors sm:text-sm sm:leading-6">
                            <option value="">— Select type —</option>
                            <option value="Full-time" {{ old('employment_type') === 'Full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time" {{ old('employment_type') === 'Part-time' ? 'selected' : '' }}>Part-time</option>
                            <option value="Contract" {{ old('employment_type') === 'Contract' ? 'selected' : '' }}>Contract</option>
                            <option value="Internship" {{ old('employment_type') === 'Internship' ? 'selected' : '' }}>Internship</option>
                            <option value="Freelance" {{ old('employment_type') === 'Freelance' ? 'selected' : '' }}>Freelance</option>
                        </select>
                        <x-form-error name="employment_type" />
                    </div>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="location">Location</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="location" id="location" placeholder="e.g. Paris, France or Remote" :value="old('location')" />
                        <x-form-error name="location" />
                    </div>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="description">Job description</x-form-label>
                    <div class="mt-2">
                        <x-form-textarea name="description" id="description" placeholder="Describe the role, responsibilities, required skills, and what you offer. Minimum 20 characters." required>{{ old('description') }}</x-form-textarea>
                        <x-form-error name="description" />
                        <p class="mt-1.5 text-xs text-slate-500">Give candidates a clear picture of the role and your expectations.</p>
                    </div>
                </x-form-field>
            </div>

            <div class="flex flex-wrap items-center justify-end gap-4 pt-4">
                <a href="/jobs" class="text-sm font-semibold text-slate-600 hover:text-slate-900">Cancel</a>
                <x-form-button>Create job</x-form-button>
            </div>
        </form>
    </div>
</x-layout>
