@extends('layouts.app')

@section('content')

    {{-- ===================== NAVBAR ===================== --}}
    <header class="sticky top-0 z-40 bg-[var(--paper)]/90 backdrop-blur border-b border-[var(--line)]">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="#top" class="font-display text-lg font-semibold text-[var(--navy)]">
                {{ $profile['name'] }}
            </a>
            <nav class="hidden md:flex items-center gap-8 font-mono text-xs uppercase tracking-wider text-[var(--slate)]">
                <a href="#tentang" class="hover:text-[var(--navy)]">Tentang</a>
                <a href="#keahlian" class="hover:text-[var(--navy)]">Keahlian</a>
                <a href="#portofolio" class="hover:text-[var(--navy)]">Portofolio</a>
                <a href="#jasa" class="hover:text-[var(--navy)]">Jasa</a>
                <a href="#kontak" class="inline-flex items-center border border-[var(--navy)] text-[var(--navy)] px-3 py-1.5 hover:bg-[var(--navy)] hover:text-white transition-colors">Kontak</a>
            </nav>
            <button id="menu-toggle" class="md:hidden text-[var(--navy)]" aria-label="Buka menu">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
        <div id="mobile-menu" class="hidden md:hidden border-t border-[var(--line)] bg-[var(--paper)] px-6 py-4 flex flex-col gap-3 font-mono text-xs uppercase tracking-wider text-[var(--slate)]">
            <a href="#tentang">Tentang</a>
            <a href="#keahlian">Keahlian</a>
            <a href="#portofolio">Portofolio</a>
            <a href="#jasa">Jasa</a>
            <a href="#kontak">Kontak</a>
        </div>
    </header>

    <div id="top"></div>

    {{-- ===================== HERO / COVER ===================== --}}
    <section class="max-w-6xl mx-auto px-6 pt-16 pb-20 grid md:grid-cols-[1.2fr_0.8fr] gap-14 items-center">
        <div>
            <p class="section-eyebrow mb-4">Profil Profesional · {{ $profile['location'] }}</p>
            <h1 class="font-display text-4xl md:text-6xl font-semibold text-[var(--navy)] leading-[1.05]">
                {{ $profile['name'] }}
            </h1>
            <p class="mt-3 text-lg md:text-xl text-[var(--slate)] font-medium">{{ $profile['role'] }}</p>
            <p class="mt-6 text-base leading-relaxed text-[var(--ink)] max-w-xl">{{ $profile['bio'] }}</p>

            <div class="mt-8 flex flex-wrap gap-3">
                <a href="#portofolio" class="bg-[var(--navy)] text-white px-5 py-3 text-sm font-medium hover:bg-[var(--navy-2)] transition-colors">
                    Lihat Portofolio
                </a>
                @if(!empty($profile['cv_path']))
                    <a href="{{ route('file.show', $profile['cv_path']) }}" download class="border border-[var(--navy)] text-[var(--navy)] px-5 py-3 text-sm font-medium hover:bg-white transition-colors">
                        Unduh CV
                    </a>
                @else
                    <span class="border border-dashed border-[var(--line)] text-[var(--slate)] px-5 py-3 text-sm font-medium" title="Taruh file CV di public/files/cv.pdf lalu set 'cv_path' di config/portfolio.php">
                        Unduh CV (tambahkan file CV)
                    </span>
                @endif
            </div>

            <div class="mt-8 flex items-center gap-5 font-mono text-xs text-[var(--slate)]">
                <a href="mailto:{{ $profile['email'] }}" class="hover:text-[var(--navy)]">{{ $profile['email'] }}</a>
                <span class="text-[var(--line)]">|</span>
                @if(!empty($profile['socials']['github']))
                    <a href="{{ $profile['socials']['github'] }}" target="_blank" class="hover:text-[var(--navy)]">GitHub</a>
                @endif
                @if(!empty($profile['socials']['linkedin']))
                    <a href="{{ $profile['socials']['linkedin'] }}" target="_blank" class="hover:text-[var(--navy)]">LinkedIn</a>
                @endif
            </div>
        </div>

        <div class="flex justify-center md:justify-end">
            <div class="bracket-frame w-56 h-56 md:w-64 md:h-64 bg-[var(--paper-2)] flex items-center justify-center overflow-hidden">
                <span class="bl"></span><span class="br"></span>
                @if(!empty($profile['photo']))
                    <img src="{{ route('file.show', $profile['photo']) }}" alt="Foto {{ $profile['name'] }}" class="w-full h-full object-cover">
                @else
                    <span class="font-display text-6xl text-[var(--slate)]">
                        {{ collect(explode(' ', $profile['name']))->map(fn($w) => mb_substr($w, 0, 1))->take(2)->implode('') }}
                    </span>
                @endif
            </div>
        </div>
    </section>

    {{-- ===================== BODY: INDEX SIDEBAR + CONTENT ===================== --}}
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-[220px_1fr] gap-14">

        {{-- Sticky index / table of contents --}}
        <aside class="hidden md:block">
            <div class="sticky top-24">
                <p class="section-eyebrow mb-3">Daftar Isi</p>
                <nav class="flex flex-col border-t border-[var(--line)]">
                    <a href="#tentang" class="toc-item border-b border-[var(--line)]"><span class="num">01</span><span class="leader"></span><span>Tentang</span></a>
                    <a href="#keahlian" class="toc-item border-b border-[var(--line)]"><span class="num">02</span><span class="leader"></span><span>Keahlian</span></a>
                    <a href="#portofolio" class="toc-item border-b border-[var(--line)]"><span class="num">03</span><span class="leader"></span><span>Portofolio</span></a>
                    <a href="#jasa" class="toc-item border-b border-[var(--line)]"><span class="num">04</span><span class="leader"></span><span>Jasa</span></a>
                    <a href="#testimoni" class="toc-item border-b border-[var(--line)]"><span class="num">05</span><span class="leader"></span><span>Testimoni</span></a>
                    <a href="#kontak" class="toc-item"><span class="num">06</span><span class="leader"></span><span>Kontak</span></a>
                </nav>
            </div>
        </aside>

        <main class="min-w-0">

            {{-- 01 TENTANG --}}
            <section id="tentang" data-section class="py-14 border-b border-[var(--line)]">
                <p class="section-eyebrow mb-2">01 · Tentang</p>
                <h2 class="font-display text-3xl font-semibold text-[var(--navy)] mb-5">Tentang Saya</h2>
                <p class="text-[var(--ink)] leading-relaxed max-w-2xl">{{ $profile['bio'] }}</p>
            </section>

            {{-- 02 KEAHLIAN --}}
            <section id="keahlian" data-section class="py-14 border-b border-[var(--line)]">
                <p class="section-eyebrow mb-2">02 · Keahlian</p>
                <h2 class="font-display text-3xl font-semibold text-[var(--navy)] mb-6">Keahlian & Tools</h2>

                @php $grouped = collect($skills)->groupBy('group'); @endphp

                <div class="grid sm:grid-cols-3 gap-8">
                    @foreach($grouped as $group => $items)
                        <div>
                            <p class="font-mono text-xs uppercase tracking-wider text-[var(--slate)] mb-3">{{ $group }}</p>
                            <ul class="space-y-2">
                                @foreach($items as $item)
                                    <li class="text-sm text-[var(--ink)] border-l-2 border-[var(--brass)] pl-3 py-0.5">{{ $item['label'] }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- 03 PORTOFOLIO --}}
            <section id="portofolio" data-section class="py-14 border-b border-[var(--line)]">
                <p class="section-eyebrow mb-2">03 · Portofolio</p>
                <h2 class="font-display text-3xl font-semibold text-[var(--navy)] mb-6">Proyek Terpilih</h2>

                <div class="grid sm:grid-cols-2 gap-6">
                    @foreach($projects as $project)
                        <a href="{{ $project['url'] }}" target="_blank" class="group block bg-white border border-[var(--line)] p-6 hover:border-[var(--brass)] transition-colors">
                            <div class="flex items-start justify-between mb-3">
                                <h3 class="font-display text-xl font-semibold text-[var(--navy)] group-hover:text-[var(--brass)] transition-colors">{{ $project['title'] }}</h3>
                                <span class="font-mono text-xs text-[var(--slate)]">{{ $project['year'] }}</span>
                            </div>
                            <p class="text-sm text-[var(--slate)] leading-relaxed mb-4">{{ $project['summary'] }}</p>
                            <div class="flex flex-wrap gap-2">
                                @foreach($project['stack'] as $tech)
                                    <span class="font-mono text-[11px] uppercase tracking-wide text-[var(--navy)] bg-[var(--paper-2)] px-2 py-1">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>

            {{-- 04 JASA / CTA --}}
            <section id="jasa" data-section class="py-14 border-b border-[var(--line)]">
                <p class="section-eyebrow mb-2">04 · Jasa</p>
                <div class="bg-[var(--navy)] text-white p-8 md:p-10">
                    <h2 class="font-display text-2xl md:text-3xl font-semibold mb-3">Buka Jasa Pembuatan Website</h2>
                    <p class="text-white/80 max-w-2xl mb-8 leading-relaxed">
                        Selain menampilkan portofolio, saya juga menerima proyek pembuatan website — dari profil sederhana hingga aplikasi custom berbasis Laravel.
                    </p>
                    <div class="grid sm:grid-cols-3 gap-6 mb-8">
                        @foreach($services as $service)
                            <div class="border-l-2 border-[var(--brass)] pl-4">
                                <p class="font-medium mb-1">{{ $service['title'] }}</p>
                                <p class="text-sm text-white/70 leading-relaxed">{{ $service['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                    <a href="#kontak" class="inline-block bg-[var(--brass)] text-[var(--navy)] px-6 py-3 text-sm font-semibold hover:bg-[var(--brass-lt)] transition-colors">
                        Diskusikan Proyek Anda
                    </a>
                </div>
            </section>

            {{-- 05 TESTIMONI --}}
            <section id="testimoni" data-section class="py-14 border-b border-[var(--line)]">
                <p class="section-eyebrow mb-2">05 · Testimoni</p>
                <h2 class="font-display text-3xl font-semibold text-[var(--navy)] mb-6">Apa Kata Klien</h2>
                <div class="grid sm:grid-cols-2 gap-6">
                    @forelse($testimonials as $t)
                        <blockquote class="bg-white border border-[var(--line)] p-6">
                            <p class="text-[var(--ink)] leading-relaxed mb-4">&ldquo;{{ $t['quote'] }}&rdquo;</p>
                            <footer class="font-mono text-xs text-[var(--slate)]">{{ $t['name'] }} — {{ $t['role'] }}</footer>
                        </blockquote>
                    @empty
                        <p class="text-sm text-[var(--slate)]">Testimoni akan ditambahkan setelah proyek pertama selesai.</p>
                    @endforelse
                </div>
            </section>

            {{-- 06 KONTAK --}}
            <section id="kontak" data-section class="py-14">
                <p class="section-eyebrow mb-2">06 · Kontak</p>
                <h2 class="font-display text-3xl font-semibold text-[var(--navy)] mb-6">Hubungi Saya</h2>

                @if(session('contact_success'))
                    <div class="mb-6 border border-[var(--brass)] bg-[var(--paper-2)] text-[var(--navy)] px-4 py-3 text-sm">
                        {{ session('contact_success') }}
                    </div>
                @endif

                <div class="grid md:grid-cols-2 gap-10">
                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-4 max-w-md">
                        @csrf
                        <div>
                            <label for="name" class="block font-mono text-xs uppercase tracking-wide text-[var(--slate)] mb-1">Nama</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="w-full border border-[var(--line)] bg-white px-3 py-2.5 text-sm focus:outline-none focus:border-[var(--navy)]">
                            @error('name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="email" class="block font-mono text-xs uppercase tracking-wide text-[var(--slate)] mb-1">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="w-full border border-[var(--line)] bg-white px-3 py-2.5 text-sm focus:outline-none focus:border-[var(--navy)]">
                            @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="message" class="block font-mono text-xs uppercase tracking-wide text-[var(--slate)] mb-1">Pesan</label>
                            <textarea id="message" name="message" rows="5"
                                class="w-full border border-[var(--line)] bg-white px-3 py-2.5 text-sm focus:outline-none focus:border-[var(--navy)]">{{ old('message') }}</textarea>
                            @error('message') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <button type="submit" class="bg-[var(--navy)] text-white px-6 py-3 text-sm font-medium hover:bg-[var(--navy-2)] transition-colors">
                            Kirim Pesan
                        </button>
                    </form>

                    <div class="font-mono text-sm text-[var(--slate)] space-y-3">
                        <p><span class="text-[var(--navy)]">Email</span> — {{ $profile['email'] }}</p>
                        <p><span class="text-[var(--navy)]">Telepon</span> — {{ $profile['phone'] }}</p>
                        <p><span class="text-[var(--navy)]">Lokasi</span> — {{ $profile['location'] }}</p>
                    </div>
                </div>
            </section>

        </main>
    </div>

    <footer class="border-t border-[var(--line)] mt-10">
        <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col sm:flex-row justify-between gap-3 font-mono text-xs text-[var(--slate)]">
            <p>&copy; {{ date('Y') }} {{ $profile['name'] }}. Dibangun dengan Laravel.</p>
            <p>Tersedia untuk proyek pembuatan website baru.</p>
        </div>
    </footer>

@endsection
