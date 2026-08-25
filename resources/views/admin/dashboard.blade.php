@extends('layouts.admin')

@section('header', 'Dashboard')

@section('content')
<div class="space-y-6">

    {{-- Welcome + Profile Progress --}}
    <div class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7">
        <div class="flex flex-col md:flex-row md:items-center gap-6">
            {{-- Profile Info --}}
            <div class="flex items-center gap-4 flex-1 min-w-0">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-brand to-purple-500 flex items-center justify-center text-white font-bold text-xl flex-shrink-0">
                    @if($profile && !empty($profile->photo))
                        <img src="{{ route('file.show', $profile->photo) }}" alt="Foto" class="w-14 h-14 rounded-2xl object-cover">
                    @else
                        {{ mb_substr($profile->name ?? 'A', 0, 1) }}
                    @endif
                </div>
                <div class="min-w-0">
                    <h2 class="font-display font-bold text-navy text-lg truncate">Selamat datang, {{ $profile->name ?? 'Admin' }} 👋</h2>
                    <p class="text-sm text-slate-500 truncate">{{ $profile->role ?? 'Belum diatur' }}</p>
                </div>
            </div>

            {{-- Progress --}}
            <div class="flex-1 max-w-sm w-full">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-semibold text-slate-600">Kelengkapan Profil</span>
                    <span class="text-xs font-bold text-brand">{{ $profilePercent }}%</span>
                </div>
                <div class="w-full h-2.5 bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-brand to-purple-500 rounded-full transition-all duration-500" style="width: {{ $profilePercent }}%"></div>
                </div>
                <p class="text-xs text-slate-400 mt-1.5">{{ $filledFields }} dari {{ $totalFields }} field terisi</p>
            </div>
        </div>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('admin.skills') }}"
           class="group bg-white rounded-2xl border border-slate-100 p-5 hover:shadow-lg hover:shadow-brand/5 hover:border-brand/20 transition-all">
            <div class="w-9 h-9 rounded-xl bg-brand/10 flex items-center justify-center mb-3 group-hover:bg-brand/20 transition-colors">
                <svg class="w-4.5 h-4.5 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
            </div>
            <p class="text-2xl font-bold text-navy">{{ $skillCount }}</p>
            <p class="text-sm text-slate-500 mt-0.5">Keahlian</p>
        </a>

        <a href="{{ route('admin.projects') }}"
           class="group bg-white rounded-2xl border border-slate-100 p-5 hover:shadow-lg hover:shadow-pink-500/5 hover:border-pink-500/20 transition-all">
            <div class="w-9 h-9 rounded-xl bg-pink-500/10 flex items-center justify-center mb-3 group-hover:bg-pink-500/20 transition-colors">
                <svg class="w-4.5 h-4.5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
            <p class="text-2xl font-bold text-navy">{{ $projectCount }}</p>
            <p class="text-sm text-slate-500 mt-0.5">Proyek</p>
        </a>

        <a href="{{ route('admin.testimonials') }}"
           class="group bg-white rounded-2xl border border-slate-100 p-5 hover:shadow-lg hover:shadow-amber-500/5 hover:border-amber-500/20 transition-all">
            <div class="w-9 h-9 rounded-xl bg-amber-500/10 flex items-center justify-center mb-3 group-hover:bg-amber-500/20 transition-colors">
                <svg class="w-4.5 h-4.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            </div>
            <p class="text-2xl font-bold text-navy">{{ $testimonialCount }}</p>
            <p class="text-sm text-slate-500 mt-0.5">Testimoni</p>
        </a>

        <a href="{{ route('admin.services') }}"
           class="group bg-white rounded-2xl border border-slate-100 p-5 hover:shadow-lg hover:shadow-green-500/5 hover:border-green-500/20 transition-all">
            <div class="w-9 h-9 rounded-xl bg-green-500/10 flex items-center justify-center mb-3 group-hover:bg-green-500/20 transition-colors">
                <svg class="w-4.5 h-4.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <p class="text-2xl font-bold text-navy">{{ $serviceCount }}</p>
            <p class="text-sm text-slate-500 mt-0.5">Jasa</p>
        </a>
    </div>

    {{-- Quick Actions --}}
    <div class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7">
        <h3 class="text-sm font-display font-bold text-navy mb-4">Aksi Cepat</h3>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
            <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 p-3.5 bg-slate-50 hover:bg-brand/5 hover:border-brand/20 border border-transparent rounded-xl transition-all group">
                <div class="w-9 h-9 rounded-lg bg-brand/10 flex items-center justify-center group-hover:bg-brand/20 transition-colors flex-shrink-0">
                    <svg class="w-4 h-4 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <div class="min-w-0">
                    <span class="text-sm font-semibold text-slate-700 group-hover:text-brand transition-colors block truncate">Edit Profil</span>
                    <span class="text-xs text-slate-400">Lengkapi data</span>
                </div>
            </a>

            <a href="{{ route('admin.skills') }}" class="flex items-center gap-3 p-3.5 bg-slate-50 hover:bg-purple-500/5 hover:border-purple-500/20 border border-transparent rounded-xl transition-all group">
                <div class="w-9 h-9 rounded-lg bg-purple-500/10 flex items-center justify-center group-hover:bg-purple-500/20 transition-colors flex-shrink-0">
                    <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                </div>
                <div class="min-w-0">
                    <span class="text-sm font-semibold text-slate-700 group-hover:text-purple-500 transition-colors block truncate">Tambah Skill</span>
                    <span class="text-xs text-slate-400">{{ $skillCount }} terdaftar</span>
                </div>
            </a>

            <a href="{{ route('admin.projects') }}" class="flex items-center gap-3 p-3.5 bg-slate-50 hover:bg-pink-500/5 hover:border-pink-500/20 border border-transparent rounded-xl transition-all group">
                <div class="w-9 h-9 rounded-lg bg-pink-500/10 flex items-center justify-center group-hover:bg-pink-500/20 transition-colors flex-shrink-0">
                    <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                </div>
                <div class="min-w-0">
                    <span class="text-sm font-semibold text-slate-700 group-hover:text-pink-500 transition-colors block truncate">Tambah Proyek</span>
                    <span class="text-xs text-slate-400">{{ $projectCount }} terdaftar</span>
                </div>
            </a>

            <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 p-3.5 bg-slate-50 hover:bg-amber-500/5 hover:border-amber-500/20 border border-transparent rounded-xl transition-all group">
                <div class="w-9 h-9 rounded-lg bg-amber-500/10 flex items-center justify-center group-hover:bg-amber-500/20 transition-colors flex-shrink-0">
                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </div>
                <div class="min-w-0">
                    <span class="text-sm font-semibold text-slate-700 group-hover:text-amber-500 transition-colors block truncate">Lihat Website</span>
                    <span class="text-xs text-slate-400">Buka tab baru</span>
                </div>
            </a>
        </div>
    </div>

</div>
@endsection
