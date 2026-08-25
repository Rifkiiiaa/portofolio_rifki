<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy:  '#10213F',
                        brass: '#A9812F',
                        paper: '#F5F6F8',
                        ink:   '#1A1D24',
                    }
                }
            }
        }
    </script>
    <style>
        body { background: #F5F6F8; color: #1A1D24; font-family: 'Inter', system-ui, sans-serif; }
        @media (max-width: 767px) {
            .sidebar-open .sidebar { transform: translateX(0); }
            .sidebar-open .sidebar-overlay { opacity: 1; pointer-events: auto; }
        }
    </style>
</head>
<body class="antialiased">
    <div id="app" class="flex min-h-screen">

        <!-- Overlay (mobile) -->
        <div id="sidebar-overlay" class="sidebar-overlay fixed inset-0 bg-black/50 z-40 opacity-0 pointer-events-none transition-opacity md:hidden" onclick="toggleSidebar()"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar fixed md:sticky top-0 left-0 z-50 w-64 bg-navy text-white flex-shrink-0 flex flex-col h-screen transform -translate-x-full md:translate-x-0 transition-transform duration-200">
            <div class="p-5 border-b border-white/10 flex items-center justify-between">
                <div>
                    <h1 class="text-lg font-bold tracking-wide">Portfolio Admin</h1>
                    <p class="text-xs text-white/50 mt-0.5">{{ Auth::user()->name ?? 'Admin' }}</p>
                </div>
                <button onclick="toggleSidebar()" class="md:hidden text-white/60 hover:text-white p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <nav class="flex-1 p-3 space-y-0.5 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded text-sm {{ request()->routeIs('admin.dashboard') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.profile') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded text-sm {{ request()->routeIs('admin.profile') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Profil
                </a>
                <a href="{{ route('admin.skills') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded text-sm {{ request()->routeIs('admin.skills') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    Keahlian
                </a>
                <a href="{{ route('admin.projects') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded text-sm {{ request()->routeIs('admin.projects*') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    Proyek
                </a>
                <a href="{{ route('admin.testimonials') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded text-sm {{ request()->routeIs('admin.testimonials') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    Testimoni
                </a>
                <a href="{{ route('admin.services') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded text-sm {{ request()->routeIs('admin.services') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Jasa
                </a>
            </nav>
            <div class="p-3 border-t border-white/10 space-y-0.5">
                <a href="{{ route('home') }}" target="_blank"
                   class="flex items-center gap-3 px-3 py-2.5 rounded text-sm text-white/50 hover:bg-white/10 hover:text-white">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Lihat Website
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center gap-3 px-3 py-2.5 rounded text-sm text-white/50 hover:bg-white/10 hover:text-white">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 min-w-0">
            <!-- Top Bar (mobile) -->
            <header class="bg-white border-b px-4 md:px-8 py-3 md:py-4 flex items-center gap-3 sticky top-0 z-30">
                <button onclick="toggleSidebar()" class="md:hidden text-gray-600 hover:text-gray-800 p-1 -ml-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <h2 class="text-base md:text-lg font-semibold text-navy flex-1 min-w-0 truncate">
                    @yield('header', 'Dashboard')
                </h2>
                <span class="text-xs text-slate-400 hidden sm:block">{{ now()->format('d M Y') }}</span>
            </header>

            <div class="p-4 md:p-8">
                @if(session('success'))
                    <div class="mb-4 md:mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-4 md:mb-6 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded text-sm">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('app').classList.toggle('sidebar-open');
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.getElementById('app').classList.remove('sidebar-open');
            }
        });
    </script>
</body>
</html>
