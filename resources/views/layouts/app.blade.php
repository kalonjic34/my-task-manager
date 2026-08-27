<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Task Manager</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style type="text/tailwindcss">
    :root {
      --ink: #172026;
      --muted: #66737a;
      --paper: #f7f6f1;
      --card: #fffefa;
      --line: #dce1dc;
      --accent: #e7654e;
    }
    body {
      @apply min-h-screen bg-[#f7f6f1] text-[#172026];
      font-family: 'Manrope', ui-sans-serif, sans-serif;
      background-image: radial-gradient(#dfe4de 0.7px, transparent 0.7px);
      background-size: 18px 18px;
    }
    .site-shell {
      @apply mx-auto min-h-screen max-w-5xl px-5 py-8 sm:px-8 sm:py-12;
    }
    .site-header {
      @apply mb-12 flex items-center justify-between border-b border-[#dce1dc] pb-5;
    }
    .brand {
      @apply flex items-center gap-3 text-sm font-extrabold uppercase tracking-[0.16em] text-[#172026];
    }
    .brand-mark {
      @apply flex h-9 w-9 items-center justify-center rounded-full bg-[#e7654e] text-sm text-white;
    }
    .eyebrow {
      @apply mb-3 font-mono text-xs uppercase tracking-[0.18em] text-[#e7654e];
    }
    .page-title {
      @apply mb-8 text-4xl font-extrabold tracking-[-0.04em] text-[#172026] sm:text-5xl;
    }
    .btn {
      @apply inline-flex items-center justify-center rounded-full bg-[#172026] px-4 py-2.5 text-sm font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#e7654e] focus:outline-none focus:ring-2 focus:ring-[#e7654e] focus:ring-offset-2;
    }
    label{
      @apply mb-2 block text-sm font-bold text-[#172026]
    }
    input,textarea{
      @apply w-full appearance-none rounded-xl border border-[#dce1dc] bg-white px-4 py-3 leading-tight text-[#172026] shadow-sm transition focus:border-[#e7654e] focus:outline-none focus:ring-2 focus:ring-[#e7654e]/20
    }
    .link{
      @apply font-bold text-[#172026] underline decoration-[#e7654e] decoration-2 underline-offset-4 transition hover:text-[#e7654e]
    }
    .error{
      @apply mt-2 text-sm font-medium text-red-600
    }
    .panel {
      @apply rounded-3xl border border-[#dce1dc] bg-[#fffefa] p-6 shadow-[0_16px_40px_rgba(23,32,38,0.06)] sm:p-8;
    }
    .task-row {
      @apply flex items-center justify-between gap-4 border-b border-[#dce1dc] py-5 first:pt-0 last:border-b-0 last:pb-0;
    }
    </style>

    @yield('styles')
</head>
<body>
  <div class="site-shell">
    <header class="site-header">
      <a href="{{ route('tasks.index') }}" class="brand"><span class="brand-mark">✓</span> Taskflow</a>
      <span class="font-mono text-xs uppercase tracking-[0.14em] text-[#66737a]">Focus / Finish</span>
    </header>
    <main>
      <p class="eyebrow">Your workspace</p>
      <h1 class="page-title">@yield('title')</h1>
      <div x-data="{ flash: true }">

        @if(session()->has('success'))
        <div x-show="flash"
        class="relative mb-8 rounded-2xl border border-[#b9d8c5] bg-[#eef8f0] px-5 py-4 text-sm text-[#28613c]"
        role="alert">
        <strong class="font-bold">Nice work. </strong>
        <div>{{ session('success') }}</div>

        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" @click="flash = false"
            stroke="currentColor" class="h-5 w-5 cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </span>
      </div>
    @endif
        @yield('content')
      </div>
    </main>
    <footer class="mt-16 border-t border-[#dce1dc] pt-5 font-mono text-xs uppercase tracking-[0.14em] text-[#66737a]">Small steps, visible progress.</footer>
  </div>
</body>
</html>