@extends('layouts.admin')

@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
    <a href="{{ route('admin.profile') }}"
       class="bg-white rounded-lg shadow p-4 md:p-6 hover:shadow-md transition">
        <div class="text-2xl md:text-3xl font-bold text-amber-600">1</div>
        <div class="text-sm text-gray-600 mt-1">Profil</div>
        <div class="text-xs text-gray-400 mt-2 truncate">{{ $profile ? $profile->name : 'Belum diatur' }}</div>
    </a>
    <a href="{{ route('admin.skills') }}"
       class="bg-white rounded-lg shadow p-4 md:p-6 hover:shadow-md transition">
        <div class="text-2xl md:text-3xl font-bold text-amber-600">{{ $skillCount }}</div>
        <div class="text-sm text-gray-600 mt-1">Keahlian</div>
        <div class="text-xs text-gray-400 mt-2">skill tersimpan</div>
    </a>
    <a href="{{ route('admin.projects') }}"
       class="bg-white rounded-lg shadow p-4 md:p-6 hover:shadow-md transition">
        <div class="text-2xl md:text-3xl font-bold text-amber-600">{{ $projectCount }}</div>
        <div class="text-sm text-gray-600 mt-1">Proyek</div>
        <div class="text-xs text-gray-400 mt-2">proyek tersimpan</div>
    </a>
    <a href="{{ route('admin.testimonials') }}"
       class="bg-white rounded-lg shadow p-4 md:p-6 hover:shadow-md transition">
        <div class="text-2xl md:text-3xl font-bold text-amber-600">{{ $testimonialCount }}</div>
        <div class="text-sm text-gray-600 mt-1">Testimoni</div>
        <div class="text-xs text-gray-400 mt-2">testimoni tersimpan</div>
    </a>
</div>
@endsection
