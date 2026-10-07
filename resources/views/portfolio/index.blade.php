@extends('layouts.app')

@section('content')

    {{-- ===================== NAVBAR ===================== --}}
    <header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-xl border-b border-slate-200/50">
        <div class="max-w-6xl mx-auto px-4 md:px-6 py-3 md:py-4 flex items-center justify-between">
            {{-- Brand --}}
            <a href="#top" class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-brand to-purple-500 flex items-center justify-center">
                    <span class="text-white font-bold text-sm">iC</span>
                </div>
                <span class="font-display font-bold text-lg text-navy">Iki<span class="gradient-text">Code</span></span>
            </a>

            {{-- Desktop Nav --}}
            <nav class="hidden md:flex items-center gap-6">
                <a href="#tentang" class="nav-link text-sm font-medium text-slate-600 hover:text-brand">Tentang</a>
                <a href="#pendidikan" class="nav-link text-sm font-medium text-slate-600 hover:text-brand">Pendidikan</a>
                <a href="#achievements" class="nav-link text-sm font-medium text-slate-600 hover:text-brand">Sertifikat</a>
                <a href="#pengalaman" class="nav-link text-sm font-medium text-slate-600 hover:text-brand">Pengalaman</a>
                <a href="#keahlian" class="nav-link text-sm font-medium text-slate-600 hover:text-brand">Keahlian</a>
                <a href="#portofolio" class="nav-link text-sm font-medium text-slate-600 hover:text-brand">Proyek</a>
                <a href="#jasa" class="nav-link text-sm font-medium text-slate-600 hover:text-brand">Jasa</a>
                <a href="#kontak" class="ml-2 px-5 py-2 bg-gradient-to-r from-brand to-purple-500 text-white text-sm font-semibold rounded-full hover:shadow-lg hover:shadow-brand/30 transition-all">
                    Hubungi Saya
                </a>
            </nav>

            {{-- Mobile Toggle --}}
            <button id="menu-toggle" class="md:hidden p-2 text-slate-600 hover:text-brand transition-colors" aria-label="Menu">
                <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden md:hidden border-t border-slate-100 bg-white px-4 py-4">
            <div class="flex flex-col gap-2">
                <a href="#tentang" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-brand/5 hover:text-brand transition-colors">Tentang</a>
                <a href="#pendidikan" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-brand/5 hover:text-brand transition-colors">Pendidikan</a>
                <a href="#achievements" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-brand/5 hover:text-brand transition-colors">Sertifikat</a>
                <a href="#pengalaman" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-brand/5 hover:text-brand transition-colors">Pengalaman</a>
                <a href="#keahlian" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-brand/5 hover:text-brand transition-colors">Keahlian</a>
                <a href="#portofolio" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-brand/5 hover:text-brand transition-colors">Proyek</a>
                <a href="#jasa" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-brand/5 hover:text-brand transition-colors">Jasa</a>
                <a href="#kontak" class="mt-2 px-4 py-2.5 bg-gradient-to-r from-brand to-purple-500 text-white text-sm font-semibold rounded-xl text-center">Hubungi Saya</a>
            </div>
        </div>
    </header>

    <div id="top"></div>

    {{-- ===================== HERO ===================== --}}
    <section class="relative min-h-screen flex items-center overflow-hidden pt-20">
        {{-- Background Decoration --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-[500px] h-[500px] bg-gradient-to-br from-brand/20 to-purple-500/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-40 -left-40 w-[500px] h-[500px] bg-gradient-to-tr from-pink-500/10 to-brand/10 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-to-r from-brand/5 to-purple-500/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-6xl mx-auto px-4 md:px-6 py-16 md:py-24 grid md:grid-cols-[1fr_0.8fr] gap-12 md:gap-16 items-center w-full">
            <div class="animate-slide-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-brand/10 rounded-full mb-6">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    <span class="text-sm font-medium text-brand">Fresh Graduate</span>
                </div>

                <h1 class="font-display text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-navy leading-[1.1] mb-4">
                    Halo, saya<br>
                    <span class="gradient-text">{{ $profile['name'] }}</span>
                </h1>

                <p class="text-lg md:text-xl text-slate-500 font-medium mb-2">{{ $profile['role'] }}</p>
                <p class="text-sm font-mono text-slate-400 mb-6">📍 {{ $profile['location'] }}</p>
                <p class="text-base leading-relaxed text-slate-600 max-w-lg mb-8">{{ $profile['bio'] }}</p>

                <div class="flex flex-wrap gap-3 mb-8">
                    <a href="#portofolio" class="px-6 py-3 bg-gradient-to-r from-brand to-purple-500 text-white text-sm font-semibold rounded-full hover:shadow-xl hover:shadow-brand/30 transition-all hover:-translate-y-0.5">
                        Lihat Proyek
                    </a>
                    @if(!empty($profile['cv_path']))
                        <a href="{{ route('file.show', $profile['cv_path']) }}" download
                           class="px-6 py-3 border-2 border-slate-200 text-slate-700 text-sm font-semibold rounded-full hover:border-brand hover:text-brand transition-all hover:-translate-y-0.5">
                            Unduh CV
                        </a>
                    @endif
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <a href="mailto:{{ $profile['email'] }}" class="text-sm text-slate-500 hover:text-brand transition-colors font-mono">{{ $profile['email'] }}</a>
                    @if(!empty($profile['socials']['github']))
                        <a href="{{ $profile['socials']['github'] }}" target="_blank" class="inline-flex items-center gap-1.5 w-9 h-9 rounded-full bg-slate-100 justify-center text-slate-500 hover:bg-[#24292F] hover:text-white transition-all group" title="GitHub">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            <span class="hidden group-hover:inline text-[10px] font-semibold absolute -bottom-5 bg-navy text-white px-1.5 py-0.5 rounded">GitHub</span>
                        </a>
                    @endif
                    @if(!empty($profile['socials']['linkedin']))
                        <a href="{{ $profile['socials']['linkedin'] }}" target="_blank" class="inline-flex items-center gap-1.5 w-9 h-9 rounded-full bg-slate-100 justify-center text-slate-500 hover:bg-[#0A66C2] hover:text-white transition-all group" title="LinkedIn">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            <span class="hidden group-hover:inline text-[10px] font-semibold absolute -bottom-5 bg-navy text-white px-1.5 py-0.5 rounded">LinkedIn</span>
                        </a>
                    @endif
                    @if(!empty($profile['socials']['instagram']))
                        <a href="{{ $profile['socials']['instagram'] }}" target="_blank" class="inline-flex items-center gap-1.5 w-9 h-9 rounded-full bg-slate-100 justify-center text-slate-500 hover:bg-gradient-to-tr hover:from-[#F58529] hover:via-[#DD2A7B] hover:to-[#8134AF] hover:text-white transition-all group" title="Instagram">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            <span class="hidden group-hover:inline text-[10px] font-semibold absolute -bottom-5 bg-navy text-white px-1.5 py-0.5 rounded">Instagram</span>
                        </a>
                    @endif
                    @if(!empty($profile['socials']['tiktok']))
                        <a href="{{ $profile['socials']['tiktok'] }}" target="_blank" class="inline-flex items-center gap-1.5 w-9 h-9 rounded-full bg-slate-100 justify-center text-slate-500 hover:bg-[#000000] hover:text-white transition-all group" title="TikTok">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1v-3.5a6.37 6.37 0 00-.79-.05A6.34 6.34 0 003.15 15.2a6.34 6.34 0 0010.86 4.46V13.2a8.16 8.16 0 005.58 2.16v-3.44a4.85 4.85 0 01-3.77-1.58V6.69h3.77z"/></svg>
                            <span class="hidden group-hover:inline text-[10px] font-semibold absolute -bottom-5 bg-navy text-white px-1.5 py-0.5 rounded">TikTok</span>
                        </a>
                    @endif
                    @if(!empty($profile['socials']['whatsapp']))
                        <a href="{{ $profile['socials']['whatsapp'] }}" target="_blank" class="inline-flex items-center gap-1.5 w-9 h-9 rounded-full bg-slate-100 justify-center text-slate-500 hover:bg-[#25D366] hover:text-white transition-all group" title="WhatsApp">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            <span class="hidden group-hover:inline text-[10px] font-semibold absolute -bottom-5 bg-navy text-white px-1.5 py-0.5 rounded">WhatsApp</span>
                        </a>
                    @endif
                </div>
            </div>

            {{-- Photo --}}
            <div class="flex justify-center md:justify-end animate-slide-left">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-br from-brand to-purple-500 rounded-3xl blur-2xl opacity-20 animate-glow"></div>
                    <div class="relative w-56 h-56 sm:w-64 sm:h-64 md:w-72 md:h-72 lg:w-80 lg:h-80 rounded-3xl overflow-hidden bg-gradient-to-br from-brand to-purple-500 p-1">
                        <div class="w-full h-full rounded-3xl overflow-hidden bg-paper-2 flex items-center justify-center">
                            @if(!empty($profile['photo']))
                                <img src="{{ route('file.show', $profile['photo']) }}" alt="Foto {{ $profile['name'] }}" class="w-full h-full object-cover">
                            @else
                                <span class="font-display text-5xl md:text-6xl font-bold gradient-text">
                                    {{ collect(explode(' ', $profile['name']))->map(fn($w) => mb_substr($w, 0, 1))->take(2)->implode('') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce hidden md:block">
            <a href="#tentang" class="flex flex-col items-center gap-2 text-slate-400 hover:text-brand transition-colors">
                <span class="text-xs font-mono">Scroll</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
            </a>
        </div>
    </section>

    {{-- ===================== TENTANG ===================== --}}
    <section id="tentang" class="py-20 md:py-28">
        <div class="max-w-6xl mx-auto px-4 md:px-6">
            <div class="grid md:grid-cols-2 gap-12 md:gap-16 items-center">
                <div class="animate-on-scroll">
                    <span class="section-number">01</span>
                    <h2 class="font-display text-3xl md:text-4xl font-bold text-navy mt-2 mb-6">Tentang Saya</h2>
                    <p class="text-slate-600 leading-relaxed mb-6">{{ $profile['bio'] }}</p>
                    <div class="flex flex-wrap gap-3">
                        <div class="flex items-center gap-2 px-4 py-2 bg-brand/5 rounded-full">
                            <svg class="w-4 h-4 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="text-sm font-medium text-slate-600">{{ $profile['location'] }}</span>
                        </div>
                        <div class="flex items-center gap-2 px-4 py-2 bg-green-500/5 rounded-full">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                            <span class="text-sm font-medium text-slate-600">Tersedia</span>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 animate-on-scroll">
                    <div class="p-6 bg-white rounded-2xl border border-slate-100 card-hover">
                        <div class="w-10 h-10 rounded-xl bg-brand/10 flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        </div>
                        <h3 class="font-display font-bold text-navy mb-1">Full-Stack</h3>
                        <p class="text-xs text-slate-500">Web Developer</p>
                    </div>
                    <div class="p-6 bg-white rounded-2xl border border-slate-100 card-hover">
                        <div class="w-10 h-10 rounded-xl bg-purple-500/10 flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h3 class="font-display font-bold text-navy mb-1">Laravel</h3>
                        <p class="text-xs text-slate-500">Specialist</p>
                    </div>
                    <div class="p-6 bg-white rounded-2xl border border-slate-100 card-hover">
                        <div class="w-10 h-10 rounded-xl bg-pink-500/10 flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                        </div>
                        <h3 class="font-display font-bold text-navy mb-1">Responsive</h3>
                        <p class="text-xs text-slate-500">Design</p>
                    </div>
                    <div class="p-6 bg-white rounded-2xl border border-slate-100 card-hover">
                        <div class="w-10 h-10 rounded-xl bg-amber-500/10 flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <h3 class="font-display font-bold text-navy mb-1">Reliable</h3>
                        <p class="text-xs text-slate-500">& Secure</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== PENDIDIKAN ===================== --}}
    <section id="pendidikan" class="py-20 md:py-28 bg-white">
        <div class="max-w-6xl mx-auto px-4 md:px-6">
            <div class="text-center mb-12 animate-on-scroll">
                <span class="section-number">02</span>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-navy mt-2 mb-4">Riwayat Pendidikan</h2>
                <p class="text-slate-500 max-w-lg mx-auto">Pendidikan formal yang telah saya tempuh</p>
            </div>

            <div class="max-w-3xl mx-auto animate-on-scroll">
                @forelse($educations as $index => $edu)
                    <div class="relative pl-8 pb-10 {{ !$loop->last ? 'border-l-2 border-slate-200' : 'border-l-2 border-transparent' }}">
                        <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-gradient-to-br from-brand to-purple-500 border-4 border-white shadow-sm"></div>
                        <div class="bg-gradient-to-br from-slate-50 to-white rounded-2xl border border-slate-100 p-6 card-hover">
                            <div class="flex flex-wrap items-center gap-2 mb-2">
                                <h3 class="font-display text-lg font-bold text-navy">{{ $edu['institution'] }}</h3>
                                @if(!empty($edu['start_year']))
                                    <span class="font-mono text-xs text-slate-400 bg-slate-100 px-2.5 py-1 rounded-md">
                                        {{ $edu['start_year'] }} — {{ $edu['end_year'] ?? 'Sekarang' }}
                                    </span>
                                @endif
                            </div>
                            @if(!empty($edu['degree']) || !empty($edu['field_of_study']))
                                <p class="text-sm font-medium text-brand mb-1">
                                    {{ collect([$edu['degree'], $edu['field_of_study']])->filter()->implode(' — ') }}
                                </p>
                            @endif
                            @if(!empty($edu['description']))
                                <p class="text-sm text-slate-500 leading-relaxed mt-2">{{ $edu['description'] }}</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center text-slate-400 py-10">Riwayat pendidikan akan ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===================== SERTIFIKAT ===================== --}}
    <section id="achievements" class="relative bg-slate-950 overflow-hidden px-6 md:px-16 pt-16 pb-16">
        <div class="absolute top-10 left-1/4 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-10 right-1/4 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>

        @php
            $certs = collect($certifications)->map(function($c) {
                $front = null;
                if (!empty($c['image'])) {
                    $front = route('file.show', $c['image']);
                } elseif (!empty($c['url']) && preg_match('/\.(jpg|jpeg|png|gif|webp|svg)$/i', $c['url'])) {
                    $front = $c['url'];
                }
                return [
                    'id' => $c['id'] ?? null,
                    'title' => $c['title'] ?? $c['name'] ?? '',
                    'url' => $front ?? $c['url'] ?? '',
                    'link' => $c['url'] ?? '',
                    'back_url' => $c['back_url'] ?? null,
                    'issuer' => $c['issuer'] ?? '',
                    'issue_date' => $c['issue_date'] ?? $c['date'] ?? '',
                    'credential_id' => $c['credential_id'] ?? '',
                    'description' => $c['description'] ?? '',
                ];
            })->filter(fn($c) => !empty($c['url']) || !empty($c['back_url']) || !empty($c['title']))->values();
            $hasCerts = $certs->isNotEmpty();
            $itemsJson = $certs->toJson();
        @endphp

        <div class="border-t border-slate-800/80 w-full max-w-7xl mx-auto mb-16"></div>

        @if($hasCerts)
        <div 
            x-data="certificationCarousel({{ $itemsJson }})"
            x-init="init()"
            class="w-full mx-auto max-w-7xl"
        >
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                <div class="lg:col-span-5 flex flex-col items-center lg:items-start text-center lg:text-left space-y-4 lg:hidden">
                    <span class="text-blue-500 font-bold tracking-widest text-xs uppercase border-b-2 border-blue-500 pb-1 inline-block">
                        Achievements
                    </span>
                </div>
                <div class="lg:col-span-7 w-full lg:order-2">
                    <div
                        class="relative w-full overflow-hidden rounded-2xl group"
                        x-ref="container"
                        @mousedown="dragStart($event)"
                        @mousemove.window="dragMove($event)"
                        @mouseup.window="dragEnd($event)"
                        @touchstart="dragStart($event)"
                        @touchmove.window="dragMove($event)"
                        @touchend.window="dragEnd($event)"
                    >
                        <div
                            class="flex transition-transform ease-out"
                            :class="isDragging ? 'duration-0' : 'duration-300'"
                            :style="`transform: translateX(${currentTranslate}px); cursor: ${isDragging ? 'grabbing' : 'grab'};`"
                        >
                            <template x-for="(item, i) in items" :key="item.id || i">
                                <div class="shrink-0 w-full">
                                    <div 
                                        class="relative w-full aspect-[16/10] sm:aspect-[16/9] min-h-[250px] sm:min-h-[280px] rounded-2xl cursor-pointer select-none [perspective:1000px] overflow-hidden bg-slate-950"
                                        @click="toggleFlip(i)"
                                    >
                                        <div 
                                            class="relative w-full h-full duration-700 transition-all [transform-style:preserve-3d]"
                                            :class="isFlipped[i] ? '[transform:rotateY(180deg)]' : ''"
                                        >
                                            <div class="absolute inset-0 w-full h-full [backface-visibility:hidden] bg-slate-950 flex items-center justify-center overflow-hidden rounded-2xl">
                                                <img
                                                    x-show="item.url"
                                                    :src="item.url"
                                                    :alt="item.title"
                                                    class="w-full h-full object-cover pointer-events-none rounded-2xl"
                                                    draggable="false"
                                                >
                                                <div
                                                    x-show="!item.url"
                                                    class="w-full h-full bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 flex items-center justify-center"
                                                >
                                                    <div class="text-center">
                                                        <svg class="w-14 h-14 text-white/90 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 01-1.946.806 3.42 3.42 0 00-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 01-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 01.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                                        <span class="text-white/70 text-xs font-medium tracking-widest uppercase">Certificate</span>
                                                    </div>
                                                </div>
                                                <div class="absolute bottom-3 right-3 bg-slate-950/80 border border-slate-700/60 text-blue-400 text-[10px] font-medium px-2.5 py-1 rounded-lg flex items-center space-x-1.5 backdrop-blur-md pointer-events-none shadow-md z-10">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                                    <span>Klik untuk Balik</span>
                                                </div>
                                            </div>
                                            <div class="absolute inset-0 w-full h-full [backface-visibility:hidden] [transform:rotateY(180deg)] bg-slate-950 flex items-center justify-center overflow-hidden rounded-2xl">
                                                <template x-if="item.back_url">
                                                    <img
                                                        :src="item.back_url"
                                                        :alt="item.title + ' Back'"
                                                        class="w-full h-full object-cover pointer-events-none rounded-2xl"
                                                        draggable="false"
                                                    >
                                                </template>
                                                <template x-if="!item.back_url">
                                                    <div class="max-w-md p-6 space-y-3 text-center">
                                                        <div class="w-10 h-10 rounded-xl bg-blue-500/10 border border-blue-500/30 text-blue-400 flex items-center justify-center mx-auto">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        </div>
                                                        <h4 class="text-white font-bold text-base sm:text-lg line-clamp-2" x-text="item.title"></h4>
                                                        <p class="text-xs text-blue-400 font-medium" x-text="'Issued by: ' + (item.issuer || '-') + (item.issue_date ? ' (' + item.issue_date + ')' : '')"></p>
                                                        <p class="text-gray-300 text-xs leading-relaxed line-clamp-3" x-text="item.description || 'Verified authentic credential certificate record.'"></p>
                                                    </div>
                                                </template>
                                                <div class="absolute bottom-3 right-3 bg-slate-950/80 border border-slate-700/60 text-blue-400 text-[10px] font-medium px-2.5 py-1 rounded-lg flex items-center space-x-1.5 backdrop-blur-md pointer-events-none shadow-md z-10">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                                    <span>Klik untuk Depan</span>
                                                </div>
                                                <a
                                                    x-show="item.link"
                                                    :href="item.link"
                                                    target="_blank"
                                                    rel="noopener noreferrer"
                                                    @click.stop
                                                    class="absolute bottom-3 left-3 bg-slate-950/80 border border-slate-700/60 text-blue-400 hover:bg-blue-600 hover:text-white text-[10px] font-medium px-2.5 py-1 rounded-lg flex items-center space-x-1.5 backdrop-blur-md shadow-md z-10 transition-colors"
                                                >
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                                    <span>Buka Kredensial</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <button
                            type="button"
                            :disabled="index === 0"
                            @click="goTo(index - 1)"
                            :class="index === 0
                                ? 'opacity-0 pointer-events-none'
                                : 'bg-slate-900/80 hover:bg-blue-600 text-white opacity-90 hover:opacity-100'"
                            class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 w-9 h-9 sm:w-10 sm:h-10 rounded-full flex items-center justify-center transition-all duration-200 z-20 backdrop-blur-md shadow-lg"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button
                            type="button"
                            :disabled="index === items.length - 1"
                            @click="goTo(index + 1)"
                            :class="index === items.length - 1
                                ? 'opacity-0 pointer-events-none'
                                : 'bg-slate-900/80 hover:bg-blue-600 text-white opacity-90 hover:opacity-100'"
                            class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 w-9 h-9 sm:w-10 sm:h-10 rounded-full flex items-center justify-center transition-all duration-200 z-20 backdrop-blur-md shadow-lg"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="lg:col-span-5 flex flex-col justify-between space-y-6 lg:order-1">
                    <div class="hidden lg:block">
                        <span class="text-blue-500 font-bold tracking-widest text-xs uppercase border-b-2 border-blue-500 pb-1 inline-block">
                            Achievements
                        </span>
                    </div>
                    <div class="flex flex-col space-y-2 items-center lg:items-start text-center lg:text-left">
                        <div class="flex items-center justify-between w-full text-xs text-gray-400">
                            <span class="font-medium text-[10px] uppercase tracking-wider text-slate-400">Select Certificate</span>
                            <span class="font-mono text-xs font-bold text-blue-400" x-text="(items.length > 0 ? index + 1 : 0) + ' / ' + items.length"></span>
                        </div>
                        <div
                            x-ref="thumbnails"
                            class="w-full overflow-x-auto scrollbar-hide py-1 flex justify-center lg:justify-start"
                            style="scrollbar-width: none; -ms-overflow-style: none;"
                        >
                            <div class="flex gap-2.5 items-center mx-auto lg:mx-0" style="width: fit-content;">
                                <template x-for="(item, i) in items" :key="item.id || i">
                                    <button
                                        type="button"
                                        @click="goTo(i)"
                                        :class="i === index 
                                            ? 'ring-2 ring-blue-500 opacity-100 scale-105' 
                                            : 'opacity-40 hover:opacity-80 border-slate-800'"
                                        class="relative shrink-0 h-10 w-16 rounded-xl overflow-hidden bg-slate-950 border transition-all duration-200"
                                    >
                                        <img
                                            x-show="item.url"
                                            :src="item.url"
                                            :alt="item.title"
                                            class="w-full h-full object-cover pointer-events-none select-none"
                                        >
                                        <div
                                            x-show="!item.url"
                                            class="w-full h-full bg-gradient-to-br from-blue-600 to-purple-700"
                                        ></div>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2.5 text-center lg:text-left">
                        <h2 class="text-xl sm:text-2xl lg:text-4xl font-bold text-white leading-snug tracking-tight" x-text="items[index]?.title || 'Certifications & Credentials'">
                        </h2>
                    </div>
                    <div class="space-y-2.5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div class="bg-slate-950/70 border border-slate-800/80 rounded-xl p-3 flex items-center space-x-3 min-w-0 shadow-inner">
                                <div class="p-2 rounded-lg bg-blue-500/10 text-blue-400 shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                </div>
                                <div class="min-w-0 text-left">
                                    <p class="text-slate-400 text-[10px] uppercase font-bold tracking-wider">Issuer</p>
                                    <p class="text-gray-200 font-medium truncate text-xs" x-text="items[index]?.issuer || '-'"></p>
                                </div>
                            </div>
                            <div class="bg-slate-950/70 border border-slate-800/80 rounded-xl p-3 flex items-center space-x-3 min-w-0 shadow-inner">
                                <div class="p-2 rounded-lg bg-blue-500/10 text-blue-400 shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <div class="min-w-0 text-left">
                                    <p class="text-slate-400 text-[10px] uppercase font-bold tracking-wider">Issued Date</p>
                                    <p class="text-gray-200 font-medium truncate text-xs" x-text="items[index]?.issue_date || '-'"></p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-slate-950/70 border border-slate-800/80 rounded-xl p-3 flex items-center space-x-3 shadow-inner">
                            <div class="p-2 rounded-lg bg-blue-500/10 text-blue-400 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="min-w-0 flex-1 text-left">
                                <p class="text-slate-400 text-[10px] uppercase font-bold tracking-wider">Credential ID / No.</p>
                                <p class="text-gray-200 font-semibold font-mono text-xs break-all leading-normal" x-text="items[index]?.credential_id || '-'"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }
        </style>
        <script>
            function certificationCarousel(items = []) {
                return {
                    items: Array.isArray(items) ? items : [],
                    index: 0,
                    isDragging: false,
                    startX: 0,
                    dragOffset: 0,
                    currentTranslate: 0,
                    isFlipped: {},
                    init() {
                        this.items.forEach((_, i) => {
                            this.isFlipped[i] = false;
                        });
                        this.$nextTick(() => this.updateTranslate());
                        window.addEventListener('resize', () => this.updateTranslate());
                    },
                    toggleFlip(i) {
                        if (Math.abs(this.dragOffset) > 10) return;
                        this.isFlipped[i] = !this.isFlipped[i];
                    },
                    containerWidth() {
                        return this.$refs.container?.offsetWidth || 0;
                    },
                    updateTranslate() {
                        this.currentTranslate = -this.index * this.containerWidth();
                    },
                    getClientX(e) {
                        return e.touches ? e.touches[0].clientX : e.clientX;
                    },
                    dragStart(e) {
                        if (this.items.length <= 1) return;
                        this.isDragging = true;
                        this.startX = this.getClientX(e);
                        this.dragOffset = 0;
                    },
                    dragMove(e) {
                        if (!this.isDragging) return;
                        this.dragOffset = this.getClientX(e) - this.startX;
                        this.currentTranslate = -this.index * this.containerWidth() + this.dragOffset;
                    },
                    dragEnd() {
                        if (!this.isDragging) return;
                        this.isDragging = false;
                        const width = this.containerWidth();
                        let newIndex = this.index;
                        if (Math.abs(this.dragOffset) > width * 0.15) {
                            newIndex = this.dragOffset > 0 ? this.index - 1 : this.index + 1;
                        }
                        this.goTo(newIndex);
                    },
                    goTo(i) {
                        if (this.items.length === 0) return;
                        this.index = Math.max(0, Math.min(this.items.length - 1, i));
                        this.dragOffset = 0;
                        this.updateTranslate();
                        this.scrollThumbnails();
                    },
                    scrollThumbnails() {
                        this.$nextTick(() => {
                            const el = this.$refs.thumbnails;
                            if (!el) return;
                            const activeThumb = el.querySelectorAll('button')[this.index];
                            if (activeThumb) {
                                activeThumb.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'nearest',
                                    inline: 'center'
                                });
                            }
                        });
                    },
                };
            }
        </script>
        @else
            <div class="max-w-7xl mx-auto text-center text-slate-400 py-10">Sertifikat akan ditambahkan.</div>
        @endif
    </section>

    {{-- ===================== PENGALAMAN ===================== --}}
    <section id="pengalaman" class="py-20 md:py-28 bg-white">
        <div class="max-w-6xl mx-auto px-4 md:px-6">
            <div class="text-center mb-12 animate-on-scroll">
                <span class="section-number">04</span>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-navy mt-2 mb-4">Pengalaman Kerja & Magang</h2>
                <p class="text-slate-500 max-w-lg mx-auto">Riwayat pekerjaan dan pengalaman profesional saya</p>
            </div>

            <div class="max-w-3xl mx-auto animate-on-scroll">
                @forelse($experiences as $index => $exp)
                    <div class="relative pl-8 pb-10 {{ !$loop->last ? 'border-l-2 border-slate-200' : 'border-l-2 border-transparent' }}">
                        <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-gradient-to-br from-cyan-500 to-blue-500 border-4 border-white shadow-sm"></div>
                        <div class="bg-gradient-to-br from-slate-50 to-white rounded-2xl border border-slate-100 p-6 card-hover">
                            <div class="flex items-start gap-4">
                                @if(!empty($exp['logo']))
                                    <div class="w-12 h-12 rounded-xl overflow-hidden bg-white flex-shrink-0 border border-slate-100">
                                        <img src="{{ route('file.show', $exp['logo']) }}" alt="{{ $exp['company'] }}" class="w-full h-full object-contain p-1">
                                    </div>
                                @else
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-cyan-500 to-blue-500 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <h3 class="font-display text-lg font-bold text-navy">{{ $exp['company'] }}</h3>
                                        @if(!empty($exp['start_date']))
                                            <span class="font-mono text-xs text-slate-400 bg-slate-100 px-2.5 py-1 rounded-md">
                                                {{ $exp['start_date'] }} — {{ $exp['end_date'] ?? 'Sekarang' }}
                                            </span>
                                        @endif
                                    </div>
                                    @if(!empty($exp['position']))
                                        <p class="text-sm font-medium text-brand mb-1">{{ $exp['position'] }}</p>
                                    @endif
                                    @if(!empty($exp['description']))
                                        <p class="text-sm text-slate-500 leading-relaxed mt-2">{{ $exp['description'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-slate-400 py-10">Pengalaman kerja akan ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===================== KEAHLIAN ===================== --}}
    <section id="keahlian" class="py-20 md:py-28 bg-white">
        <div class="max-w-6xl mx-auto px-4 md:px-6">
            <div class="text-center mb-12 animate-on-scroll">
                <span class="section-number">05</span>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-navy mt-2 mb-4">Keahlian</h2>
                <p class="text-slate-500 max-w-lg mx-auto">Kemampuan teknis dan interpersonal yang saya miliki</p>
            </div>

            @php
                $hardSkills  = collect($skills)->where('category', 'hard')->groupBy('group');
                $softSkills  = collect($skills)->where('category', 'soft')->groupBy('group');
            @endphp

            {{-- ── Keahlian Teknis (Hard Skills) ── --}}
            <div class="mb-14 animate-on-scroll">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-brand/10 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-display text-xl md:text-2xl font-bold text-navy">Keahlian Teknis</h3>
                        <p class="text-sm text-slate-500">Hard Skills — alat, kemampuan teknis, serta metode & bahasa</p>
                    </div>
                </div>

                @if($hardSkills->isNotEmpty())
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($hardSkills as $group => $items)
                            <div class="p-6 bg-gradient-to-br from-slate-50 to-white rounded-2xl border border-slate-100 card-hover">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-8 h-8 rounded-lg
                                        {{ $group === 'Backend' ? 'bg-brand/10 text-brand' : ($group === 'Frontend' ? 'bg-purple-500/10 text-purple-500' : 'bg-amber-500/10 text-amber-500') }}
                                        flex items-center justify-center">
                                        @if($group === 'Backend')
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2"/></svg>
                                        @elseif($group === 'Frontend')
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                        @else
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        @endif
                                    </div>
                                    <h4 class="font-display font-bold text-navy">{{ $group }}</h4>
                                </div>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($items as $item)
                                        <span class="skill-pill px-3 py-1.5 bg-slate-100 text-slate-700 text-xs font-medium rounded-lg cursor-default">{{ $item['label'] }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center text-slate-400 py-10">Keahlian teknis belum diisi.</p>
                @endif
            </div>

            {{-- ── Keahlian Interpersonal (Soft Skills) ── --}}
            <div class="animate-on-scroll">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-display text-xl md:text-2xl font-bold text-navy">Keahlian Interpersonal</h3>
                        <p class="text-sm text-slate-500">Soft Skills — komunikasi, manajemen kerja & kepemimpinan</p>
                    </div>
                </div>

                @if($softSkills->isNotEmpty())
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($softSkills as $group => $items)
                            <div class="p-6 bg-gradient-to-br from-emerald-50/60 to-white rounded-2xl border border-emerald-100/70 card-hover">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-500/10 text-emerald-500 flex items-center justify-center">
                                        @if($group === 'Komunikasi & Kolaborasi')
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                        @elseif($group === 'Manajemen Kerja')
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        @else
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                        @endif
                                    </div>
                                    <h4 class="font-display font-bold text-navy">{{ $group }}</h4>
                                </div>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($items as $item)
                                        <span class="skill-pill px-3 py-1.5 bg-emerald-500/5 text-emerald-700 text-xs font-medium rounded-lg cursor-default">{{ $item['label'] }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center text-slate-400 py-10">Keahlian interpersonal belum diisi.</p>
                @endif
            </div>
        </div>
    </section>

    {{-- ===================== PORTOFOLIO ===================== --}}
    <section id="portofolio" class="py-20 md:py-28">
        <div class="max-w-6xl mx-auto px-4 md:px-6">
            <div class="text-center mb-12 animate-on-scroll">
                <span class="section-number">06</span>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-navy mt-2 mb-4">Proyek Terpilih</h2>
                <p class="text-slate-500 max-w-lg mx-auto">Beberapa proyek yang telah saya kerjakan</p>
            </div>

            <div class="grid sm:grid-cols-2 gap-6 animate-on-scroll">
                @foreach($projects as $project)
                    <a href="{{ $project['url'] }}" target="_blank" class="group block bg-white rounded-2xl border border-slate-100 overflow-hidden card-hover">
                        <div class="h-2 bg-gradient-to-r from-brand to-purple-500"></div>
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-3">
                                <h3 class="font-display text-lg font-bold text-navy group-hover:text-brand transition-colors">{{ $project['title'] }}</h3>
                                <span class="font-mono text-xs text-slate-400 bg-slate-50 px-2 py-1 rounded-md">{{ $project['year'] }}</span>
                            </div>
                            <p class="text-sm text-slate-500 leading-relaxed mb-4">{{ $project['summary'] }}</p>
                            <div class="flex flex-wrap gap-2">
                                @foreach($project['stack'] as $tech)
                                    <span class="font-mono text-[11px] font-medium text-brand bg-brand/5 px-2.5 py-1 rounded-md">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== JASA ===================== --}}
    <section id="jasa" class="py-20 md:py-28 bg-gradient-to-br from-navy to-navy2 text-white relative overflow-hidden">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-brand/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-purple-500/20 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-6xl mx-auto px-4 md:px-6">
            <div class="text-center mb-12 animate-on-scroll">
                <span class="section-number text-brand-light">07</span>
                <h2 class="font-display text-3xl md:text-4xl font-bold mt-2 mb-4">Jasa Pembuatan Website</h2>
                <p class="text-white/60 max-w-lg mx-auto">Siap membantu mewujudkan website impian Anda</p>
            </div>

            <div class="grid sm:grid-cols-3 gap-6 mb-10 animate-on-scroll">
                @foreach($services as $service)
                    <div class="p-6 bg-white/5 backdrop-blur-sm rounded-2xl border border-white/10 card-hover hover:bg-white/10">
                        <div class="w-10 h-10 rounded-xl bg-brand/20 flex items-center justify-center mb-4">
                            <svg class="w-5 h-5 text-brand-light" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                        </div>
                        <h3 class="font-display font-bold text-lg mb-2">{{ $service['title'] }}</h3>
                        <p class="text-sm text-white/60 leading-relaxed">{{ $service['description'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="text-center animate-on-scroll">
                <a href="#kontak" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-brand to-purple-500 text-white font-semibold rounded-full hover:shadow-xl hover:shadow-brand/30 transition-all hover:-translate-y-0.5">
                    Mulai Diskusi
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ===================== TESTIMONI ===================== --}}
    <section id="testimoni" class="py-20 md:py-28 bg-white">
        <div class="max-w-6xl mx-auto px-4 md:px-6">
            <div class="text-center mb-12 animate-on-scroll">
                <span class="section-number">08</span>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-navy mt-2 mb-4">Apa Kata Klien</h2>
                <p class="text-slate-500 max-w-lg mx-auto">Feedback dari klien yang puas</p>
            </div>

            <div class="grid sm:grid-cols-2 gap-6 animate-on-scroll">
                @forelse($testimonials as $t)
                    <div class="p-6 bg-gradient-to-br from-slate-50 to-white rounded-2xl border border-slate-100 card-hover">
                        <div class="flex items-center gap-1 mb-4">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <blockquote class="text-slate-600 leading-relaxed mb-4">&ldquo;{{ $t['quote'] }}&rdquo;</blockquote>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brand to-purple-500 flex items-center justify-center text-white font-bold text-sm">
                                {{ mb_substr($t['name'], 0, 1) }}
                            </div>
                            <div>
                                <p class="font-semibold text-navy text-sm">{{ $t['name'] }}</p>
                                @if(!empty($t['role']))
                                    <p class="text-xs text-slate-400">{{ $t['role'] }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-slate-400 col-span-2 py-10">Testimoni akan ditambahkan setelah proyek selesai.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===================== KONTAK ===================== --}}
    <section id="kontak" class="py-20 md:py-28">
        <div class="max-w-6xl mx-auto px-4 md:px-6">
            <div class="text-center mb-12 animate-on-scroll">
                <span class="section-number">09</span>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-navy mt-2 mb-4">Hubungi Saya</h2>
                <p class="text-slate-500 max-w-lg mx-auto">Punya proyek atau pertanyaan? Kirim pesan.</p>
            </div>

            @if(session('contact_success'))
                <div class="mb-6 max-w-xl mx-auto px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm flex items-center gap-2">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ session('contact_success') }}
                </div>
            @endif

            @php
                $waPhone = preg_replace('/[^0-9]/', '', $profile['phone'] ?? '');
            @endphp
            <div class="grid md:grid-cols-2 gap-10 md:gap-16 animate-on-scroll">
                <form id="waForm" autocomplete="off" class="bg-white p-6 md:p-8 rounded-2xl border border-slate-100 shadow-sm space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">Nama</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-slate-700 mb-1.5">Pesan</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all"></textarea>
                    </div>
                    <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-brand to-purple-500 text-white text-sm font-semibold rounded-xl hover:shadow-lg hover:shadow-brand/30 transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Kirim via WhatsApp
                    </button>
                </form>
                <script>
                    document.getElementById('waForm').addEventListener('submit', function(e) {
                        e.preventDefault();
                        const form = this;
                        const name = document.getElementById('name').value.trim();
                        const email = document.getElementById('email').value.trim();
                        const message = document.getElementById('message').value.trim();
                        const phone = '{{ $waPhone }}';
                        if (!phone) { alert('Nomor WhatsApp belum diatur di profil.'); return; }
                        const text = `Halo, saya ${name} (${email}).%0A%0A${encodeURIComponent(message)}`;
                        window.open('https://wa.me/' + phone + '?text=' + text, '_blank');
                        setTimeout(function() {
                            form.querySelector('#name').value = '';
                            form.querySelector('#email').value = '';
                            form.querySelector('#message').value = '';
                        }, 100);
                    });
                </script>

                <div class="flex flex-col justify-center gap-6">
                    <div class="flex items-start gap-4 p-4 bg-white rounded-2xl border border-slate-100">
                        <div class="w-10 h-10 rounded-xl bg-brand/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400 mb-0.5">Email</p>
                            <p class="text-sm font-medium text-navy">{{ $profile['email'] }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-4 bg-white rounded-2xl border border-slate-100">
                        <div class="w-10 h-10 rounded-xl bg-green-500/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400 mb-0.5">Telepon</p>
                            <p class="text-sm font-medium text-navy">{{ $profile['phone'] }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-4 bg-white rounded-2xl border border-slate-100">
                        <div class="w-10 h-10 rounded-xl bg-purple-500/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400 mb-0.5">Lokasi</p>
                            <p class="text-sm font-medium text-navy">{{ $profile['location'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== FOOTER ===================== --}}
    <footer class="bg-navy text-white py-10">
        <div class="max-w-6xl mx-auto px-4 md:px-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-lg bg-gradient-to-br from-brand to-purple-500 flex items-center justify-center">
                        <span class="text-white font-bold text-xs">iC</span>
                    </div>
                    <span class="font-display font-bold">Iki<span class="text-brand-light">Code</span></span>
                </div>
                <p class="text-sm text-white/40">&copy; {{ date('Y') }} IkiCode. Dibangun dengan Laravel.</p>
            </div>
        </div>
    </footer>

@endsection
