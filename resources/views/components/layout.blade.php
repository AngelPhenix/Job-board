<!DOCTYPE html>
<html lang="en" class="h-full bg-surface-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Job Board') — Find Your Next Role</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="h-full font-sans">

<div class="min-h-full flex flex-col">
  <nav class="bg-white border-b border-slate-200/80 sticky top-0 z-50">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center gap-10">
          <a href="/" class="flex items-center gap-2">
            <span class="text-xl font-bold tracking-tight text-slate-900">JobBoard</span>
          </a>
          <div class="hidden md:flex items-center gap-1">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
            <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
          </div>
        </div>
        <div class="flex items-center gap-3">
          @auth
            <x-nav-link href="/profile" :active="request()->is('profile')">Profile</x-nav-link>
            <a href="/jobs/create" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-primary-600 rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-colors">
              Post a job
            </a>
            <form method="POST" action="/logout" class="inline">
              @csrf
              <button type="submit" class="text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors">Log out</button>
            </form>
          @else
            <x-nav-link href="/login" :active="request()->is('login')">Log in</x-nav-link>
            <a href="/register" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-primary-600 bg-primary-50 rounded-lg hover:bg-primary-100 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-colors">
              Sign up
            </a>
          @endauth
        </div>
        <div class="flex md:hidden">
          <button type="button" class="p-2 text-slate-500 hover:text-slate-700 rounded-lg" aria-label="Open menu" id="mobile-menu-btn">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div class="md:hidden hidden border-t border-slate-200 bg-white px-4 py-3 space-y-1" id="mobile-menu">
      <x-mob-nav-link href="/" :active="request()->is('/')">Home</x-mob-nav-link>
      <x-mob-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-mob-nav-link>
      <x-mob-nav-link href="/contact" :active="request()->is('contact')">Contact</x-mob-nav-link>
      @auth
        <x-mob-nav-link href="/profile" :active="request()->is('profile')">Profile</x-mob-nav-link>
      @endauth
      @guest
        <x-mob-nav-link href="/login" :active="request()->is('login')">Log in</x-mob-nav-link>
        <x-mob-nav-link href="/register" :active="request()->is('register')">Sign up</x-mob-nav-link>
      @endguest
    </div>
  </nav>

  <header class="bg-white border-b border-slate-200/80">
    <div class="mx-auto max-w-6xl px-4 py-5 sm:px-6 lg:px-8 flex flex-wrap items-center justify-between gap-4">
      <h1 class="text-2xl font-bold tracking-tight text-slate-900">{{ $heading }}</h1>
      @isset($headerAction)
        <div>{{ $headerAction }}</div>
      @endisset
    </div>
  </header>

  <main class="flex-1">
    <div class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
      {{ $slot }}
    </div>
  </main>

  <footer class="bg-white border-t border-slate-200 mt-auto">
    <div class="mx-auto max-w-6xl px-4 py-6 sm:px-6 lg:px-8 text-center text-sm text-slate-500">
      <p>JobBoard — Find your next role. Built with Laravel.</p>
    </div>
  </footer>
</div>

<script>
  document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
    const menu = document.getElementById('mobile-menu');
    menu?.classList.toggle('hidden');
  });
</script>
</body>
</html>
