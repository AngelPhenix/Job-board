<a
  {{ $attributes->merge(['class' => 'block rounded-lg px-3 py-2 text-sm font-medium transition-colors ' . ($active ? 'bg-primary-50 text-primary-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900')]) }}
>
  {{ $slot }}
</a>
