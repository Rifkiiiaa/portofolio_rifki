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
                    <span class="text-sm font-medium text-brand">Tersedia untuk proyek baru</span>
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

                <div class="flex items-center gap-4">
                    <a href="mailto:{{ $profile['email'] }}" class="text-sm text-slate-500 hover:text-brand transition-colors font-mono">{{ $profile['email'] }}</a>
                    @if(!empty($profile['socials']['github']))
                        <a href="{{ $profile['socials']['github'] }}" target="_blank" class="w-9 h-9 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-brand hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                    @endif
                    @if(!empty($profile['socials']['linkedin']))
                        <a href="{{ $profile['socials']['linkedin'] }}" target="_blank" class="w-9 h-9 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-brand hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    @endif
                    @if(!empty($profile['socials']['whatsapp']))
                        <a href="{{ $profile['socials']['whatsapp'] }}" target="_blank" class="w-9 h-9 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-green-500 hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
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
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
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

    {{-- ===================== KEAHLIAN ===================== --}}
    <section id="keahlian" class="py-20 md:py-28 bg-white">
        <div class="max-w-6xl mx-auto px-4 md:px-6">
            <div class="text-center mb-12 animate-on-scroll">
                <span class="section-number">02</span>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-navy mt-2 mb-4">Keahlian & Tools</h2>
                <p class="text-slate-500 max-w-lg mx-auto">Teknologi dan tools yang saya kuasai untuk membangun web modern</p>
            </div>

            @php $grouped = collect($skills)->groupBy('group'); @endphp

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 animate-on-scroll">
                @foreach($grouped as $group => $items)
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
                            <h3 class="font-display font-bold text-navy">{{ $group }}</h3>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @foreach($items as $item)
                                <span class="skill-pill px-3 py-1.5 bg-slate-100 text-slate-700 text-xs font-medium rounded-lg cursor-default">{{ $item['label'] }}</span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== PORTOFOLIO ===================== --}}
    <section id="portofolio" class="py-20 md:py-28">
        <div class="max-w-6xl mx-auto px-4 md:px-6">
            <div class="text-center mb-12 animate-on-scroll">
                <span class="section-number">03</span>
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
                <span class="section-number text-brand-light">04</span>
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
                <span class="section-number">05</span>
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
                <span class="section-number">06</span>
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
