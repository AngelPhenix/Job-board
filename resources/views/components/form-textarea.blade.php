<textarea
  {{ $attributes->merge(['rows' => 5, 'class' => 'block w-full rounded-lg border border-slate-300 py-2.5 px-3.5 text-slate-900 placeholder:text-slate-400 focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 focus:outline-none transition-colors sm:text-sm sm:leading-6 resize-y min-h-[120px]']) }}
>{{ $slot }}</textarea>
