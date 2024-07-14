<x-layout>
    <x-slot:heading>
        Create a new fish
    </x-slot:heading>

<form method="POST" action="/fish">
    @csrf

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

        <x-form-field>
          <x-form-label for="name">Name</x-form-label>
          <div class="mt-2">
            <x-form-input name="name" id="name" placeholder="Sardine" value="{{ old('name') }}" required/>
            <x-form-error name="name"/>
          </div>
        </x-form-field>

        <x-form-field>
          <x-form-label for="level">Level</x-form-label>
          <div class="mt-2">
            <x-form-input name="level" id="level" placeholder="50" value="{{ old('level') }}" required/>
            <x-form-error name="level"/>
          </div>
        </x-form-field>

      </div>
    </div>

  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
    <x-form-button>Save</x-form-button>
  </div>
</form>

</x-layout>