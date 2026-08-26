@extends('layouts.admin')

@section('header', 'Kelola Jasa')

@section('content')
<div>
    {{-- Form --}}
    <form method="POST" action="{{ route('admin.services.store') }}" class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7 mb-6">
        @csrf
        <h3 class="text-sm font-display font-bold text-navy mb-4">Tambah Jasa Baru</h3>
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Judul Jasa *</label>
                <input type="text" name="title" required placeholder="contoh: Website Profil"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Deskripsi</label>
                <textarea name="description" rows="3" placeholder="Deskripsi jasa..."
                          class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all"></textarea>
            </div>
        </div>
        <button type="submit"
                class="mt-5 px-5 py-3 bg-gradient-to-r from-brand to-purple-500 hover:shadow-lg hover:shadow-brand/30 text-white text-sm font-semibold rounded-xl transition-all">
            + Tambah Jasa
        </button>
    </form>

    {{-- List --}}
    <div class="space-y-4">
        @forelse($services as $service)
            <div class="bg-white rounded-2xl border border-slate-100 p-5">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex-1 min-w-0">
                        <h4 class="font-display font-bold text-navy">{{ $service->title }}</h4>
                        @if($service->description)
                            <p class="text-sm text-slate-500 mt-1.5 line-clamp-2">{{ $service->description }}</p>
                        @endif
                    </div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <a href="{{ route('admin.services.edit', $service) }}"
                           class="text-xs font-semibold text-brand hover:text-brand/80 hover:bg-brand/5 px-3 py-1.5 rounded-lg transition-all">Edit</a>
                        <form id="del-service-{{ $service->id }}" method="POST" action="{{ route('admin.services.destroy', $service) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="openModal('Hapus Jasa', 'Jasa {{ addslashes($service->title) }} akan dihapus permanen.', function(){ document.getElementById('del-service-{{ $service->id }}').submit(); })" class="text-xs font-semibold text-red-400 hover:text-red-600 hover:bg-red-50 px-3 py-1.5 rounded-lg transition-all">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl border border-slate-100 p-12 text-center text-slate-400">Belum ada jasa.</div>
        @endforelse
    </div>
</div>
@endsection
