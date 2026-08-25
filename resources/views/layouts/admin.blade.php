<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — IkiCode</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy:  '#0F172A',
                        navy2: '#1E293B',
                        brand: '#6366F1',
                        'brand-light': '#818CF8',
                        paper: '#F8FAFC',
                        'paper-2': '#F1F5F9',
                    },
                    fontFamily: {
                        display: ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
                        body:    ['Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; background: #F8FAFC; }
        .gradient-text { background: linear-gradient(135deg, #6366F1, #A855F7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        @media (max-width: 767px) {
            .sidebar-open .sidebar { transform: translateX(0); }
            .sidebar-open .sidebar-overlay { opacity: 1; pointer-events: auto; }
        }
    </style>
</head>
<body class="bg-paper text-slate-800 antialiased">
    <div id="app" class="flex min-h-screen">

        <!-- Overlay -->
        <div id="sidebar-overlay" class="sidebar-overlay fixed inset-0 bg-black/50 z-40 opacity-0 pointer-events-none transition-opacity md:hidden backdrop-blur-sm" onclick="toggleSidebar()"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar fixed md:sticky top-0 left-0 z-50 w-64 bg-navy text-white flex-shrink-0 flex flex-col h-screen transform -translate-x-full md:translate-x-0 transition-transform duration-300">
            {{-- Brand --}}
            <div class="p-5 border-b border-white/10">
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-brand to-purple-500 flex items-center justify-center">
                            <span class="text-white font-bold text-sm">iC</span>
                        </div>
                        <div>
                            <span class="font-display font-bold text-base">Iki<span class="text-brand-light">Code</span></span>
                            <p class="text-[10px] text-white/40 -mt-0.5">Admin Panel</p>
                        </div>
                    </a>
                    <button onclick="toggleSidebar()" class="md:hidden text-white/50 hover:text-white p-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>

            {{-- User --}}
            <div class="px-5 py-4 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-brand to-purple-500 flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                        {{ mb_substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-[11px] text-white/40 truncate">{{ Auth::user()->email ?? '' }}</p>
                    </div>
                </div>
            </div>

            {{-- Nav --}}
            <nav class="flex-1 p-3 space-y-1 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-brand to-purple-500 text-white shadow-lg shadow-brand/20' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.profile') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.profile') ? 'bg-gradient-to-r from-brand to-purple-500 text-white shadow-lg shadow-brand/20' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Profil
                </a>
                <a href="{{ route('admin.skills') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.skills') ? 'bg-gradient-to-r from-brand to-purple-500 text-white shadow-lg shadow-brand/20' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    Keahlian
                </a>
                <a href="{{ route('admin.projects') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.projects*') ? 'bg-gradient-to-r from-brand to-purple-500 text-white shadow-lg shadow-brand/20' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    Proyek
                </a>
                <a href="{{ route('admin.testimonials') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.testimonials') ? 'bg-gradient-to-r from-brand to-purple-500 text-white shadow-lg shadow-brand/20' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    Testimoni
                </a>
                <a href="{{ route('admin.services') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.services') ? 'bg-gradient-to-r from-brand to-purple-500 text-white shadow-lg shadow-brand/20' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Jasa
                </a>
                <a href="{{ route('admin.account') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.account') ? 'bg-gradient-to-r from-brand to-purple-500 text-white shadow-lg shadow-brand/20' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Akun
                </a>
            </nav>

            {{-- Bottom --}}
            <div class="p-3 border-t border-white/10 space-y-1">
                <a href="{{ route('home') }}" target="_blank"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-white/50 hover:bg-white/10 hover:text-white transition-all">
                    <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Lihat Website
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-white/50 hover:bg-red-500/20 hover:text-red-400 transition-all">
                        <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main -->
        <main class="flex-1 min-w-0">
            {{-- Top Bar --}}
            <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 px-4 md:px-8 py-3 md:py-4 flex items-center gap-3 sticky top-0 z-30">
                <button onclick="toggleSidebar()" class="md:hidden p-2 -ml-2 text-slate-500 hover:text-brand hover:bg-brand/5 rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <h2 class="text-base md:text-lg font-display font-bold text-navy flex-1 min-w-0 truncate">
                    @yield('header', 'Dashboard')
                </h2>
                <span id="live-clock" class="text-xs font-mono text-slate-400 hidden sm:block"></span>
                <script>
                    (function(){
                        var el = document.getElementById('live-clock');
                        function tick(){
                            var n = new Date();
                            var d = String(n.getDate()).padStart(2,'0');
                            var months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
                            var m = months[n.getMonth()];
                            var y = n.getFullYear();
                            var hh = String(n.getHours()).padStart(2,'0');
                            var mm = String(n.getMinutes()).padStart(2,'0');
                            var ss = String(n.getSeconds()).padStart(2,'0');
                            el.textContent = d+' '+m+' '+y+', '+hh+':'+mm+':'+ss;
                        }
                        tick();
                        setInterval(tick, 1000);
                    })();
                </script>
            </header>

            <div class="p-4 md:p-8">
                {{-- Flash Messages --}}
                @if(session('success'))
                    <div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm flex items-center gap-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm">
                        <ul class="list-disc list-inside space-y-0.5">
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

    <div id="confirm-modal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-navy/40 backdrop-blur-sm" onclick="closeModal()"></div>
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-sm p-6 text-center">
            <div class="w-14 h-14 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </div>
            <h3 id="modal-title" class="font-display font-bold text-navy text-lg mb-1">Hapus?</h3>
            <p id="modal-desc" class="text-sm text-slate-500 mb-6">Apakah Anda yakin ingin menghapus ini?</p>
            <div class="flex gap-3">
                <button onclick="closeModal()" class="flex-1 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-xl transition-all">Batal</button>
                <button id="modal-confirm-btn" class="flex-1 px-4 py-2.5 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-xl transition-all">Hapus</button>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('app').classList.toggle('sidebar-open');
        }
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.getElementById('app').classList.remove('sidebar-open');
                closeModal();
            }
        });

        function openModal(title, desc, onConfirm) {
            var modal = document.getElementById('confirm-modal');
            document.getElementById('modal-title').textContent = title;
            document.getElementById('modal-desc').textContent = desc;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.getElementById('modal-confirm-btn').onclick = function() {
                closeModal();
                onConfirm();
            };
        }
        function closeModal() {
            var modal = document.getElementById('confirm-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
</body>
</html>
