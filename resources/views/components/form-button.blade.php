<button
  type="submit"
  {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-lg bg-primary-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-colors']) }}
>
  {{ $slot }}
</button>
