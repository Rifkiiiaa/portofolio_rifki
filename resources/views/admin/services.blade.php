@extends('layouts.admin')

@section('header', 'Kelola Jasa')

@section('content')
<div class="max-w-4xl">
    <!-- Form Tambah -->
    <form method="POST" action="{{ route('admin.services.store') }}" class="bg-white rounded-lg shadow p-6 mb-6">
        @csrf
        <h3 class="text-sm font-semibold text-gray-700 mb-3">Tambah Jasa Baru</h3>
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label class="block text-xs text-gray-500 mb-1">Judul Jasa *</label>
                <input type="text" name="title" required placeholder="contoh: Website Profil"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Deskripsi</label>
                <textarea name="description" rows="3" placeholder="Deskripsi jasa..."
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500"></textarea>
            </div>
        </div>
        <button type="submit"
                class="mt-4 px-5 py-2 bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium rounded-lg transition">
            + Tambah Jasa
        </button>
    </form>

    <!-- Daftar Jasa -->
    <div class="space-y-4">
        @forelse($services as $service)
            <div class="bg-white rounded-lg shadow p-4 md:p-5">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex-1 min-w-0">
                        <h4 class="font-semibold text-gray-800 text-sm md:text-base">{{ $service->title }}</h4>
                        @if($service->description)
                            <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{ $service->description }}</p>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('admin.services.destroy', $service) }}"
                          onsubmit="return confirm('Hapus jasa ini?')" class="flex-shrink-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs text-red-500 hover:text-red-700 font-medium px-2 py-1">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-lg shadow p-8 text-center text-gray-400">Belum ada jasa.</div>
        @endforelse
    </div>
</div>
@endsection
