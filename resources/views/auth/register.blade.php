<x-layout>
    <x-slot:heading>Create an account</x-slot:heading>

    <div class="max-w-md rounded-xl border border-slate-200 bg-white shadow-card p-6 sm:p-8">
        <p class="text-slate-600 mb-6">Sign up to post jobs and manage your listings.</p>

        <form method="POST" action="/register" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <x-form-field>
                    <x-form-label for="name">First name</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="name" id="name" :value="old('name')" required />
                        <x-form-error name="name" />
                    </div>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="last_name">Last name</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="last_name" id="last_name" :value="old('last_name')" required />
                        <x-form-error name="last_name" />
                    </div>
                </x-form-field>
            </div>

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
                    <x-form-input name="password" id="password" type="password" placeholder="Min. 8 characters" required />
                    <x-form-error name="password" />
                </div>
            </x-form-field>

            <x-form-field>
                <x-form-label for="password_confirmation">Confirm password</x-form-label>
                <div class="mt-2">
                    <x-form-input name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm your password" required />
                    <x-form-error name="password_confirmation" />
                </div>
            </x-form-field>

            <div class="flex flex-wrap items-center justify-end gap-4 pt-2">
                <a href="/" class="text-sm font-semibold text-slate-600 hover:text-slate-900">Cancel</a>
                <x-form-button>Create account</x-form-button>
            </div>
        </form>
    </div>
</x-layout>
