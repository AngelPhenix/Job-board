<x-layout>
    <x-slot:heading>Log in</x-slot:heading>

    <div class="max-w-md mx-auto mt-8 rounded-xl border border-slate-200 bg-white shadow-card p-6 sm:p-8">
        <form method="POST" action="/login" class="space-y-6">
            @csrf

            <x-form-field>
                <x-form-label for="email">Email</x-form-label>
                <div class="mt-2">
                    <x-form-input name="email" id="email" type="email" :value="old('email')" placeholder="you@example.com" required />
                    <x-form-error name="email" />
                </div>
            </x-form-field>

            <x-form-field>
                <x-form-label for="password">Password</x-form-label>
                <div class="mt-2">
                    <x-form-input name="password" id="password" type="password" placeholder="Your password" required />
                    <x-form-error name="password" />
                </div>
            </x-form-field>

            <div class="flex flex-wrap items-center justify-end gap-4 pt-2">
                <a href="/" class="text-sm font-semibold text-slate-600 hover:text-slate-900">Cancel</a>
                <x-form-button>Log in</x-form-button>
            </div>
        </form>
    </div>
</x-layout>
