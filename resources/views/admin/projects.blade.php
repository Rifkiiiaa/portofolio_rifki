@extends('layouts.admin')

@section('header', 'Kelola Proyek')

@section('content')
<div class="max-w-5xl">
    <!-- Form Tambah -->
    <form method="POST" action="{{ route('admin.projects.store') }}" class="bg-white rounded-lg shadow p-6 mb-6">
        @csrf
        <h3 class="text-sm font-semibold text-gray-700 mb-3">Tambah Proyek Baru</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs text-gray-500 mb-1">Judul Proyek *</label>
                <input type="text" name="title" required placeholder="Nama proyek"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Tahun</label>
                <input type="text" name="year" placeholder="2025"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs text-gray-500 mb-1">Ringkasan</label>
                <textarea name="summary" rows="2" placeholder="Deskripsi singkat proyek"
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500"></textarea>
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Tech Stack (koma)</label>
                <input type="text" name="stack" placeholder="Laravel, MySQL, Tailwind"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">URL</label>
                <input type="url" name="url" placeholder="https://..."
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
        </div>
        <button type="submit"
                class="mt-4 px-5 py-2 bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium rounded-lg transition">
            + Tambah Proyek
        </button>
    </form>

    <!-- Daftar Proyek -->
    <div class="space-y-4">
        @forelse($projects as $project)
            <div class="bg-white rounded-lg shadow p-4 md:p-5">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 flex-wrap">
                            <h4 class="font-semibold text-gray-800 text-sm md:text-base">{{ $project->title }}</h4>
                            @if($project->year)
                                <span class="text-xs text-gray-400">{{ $project->year }}</span>
                            @endif
                        </div>
                        @if($project->summary)
                            <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{ $project->summary }}</p>
                        @endif
                        @if($project->stack)
                            <div class="flex flex-wrap gap-1 mt-2">
                                @foreach($project->stack as $tech)
                                    <span class="inline-block px-2 py-0.5 bg-gray-100 text-gray-600 rounded text-xs">{{ $tech }}</span>
                                @endforeach
                            </div>
                        @endif
                        @if($project->url)
                            <a href="{{ $project->url }}" target="_blank" class="text-xs text-amber-600 hover:underline mt-2 inline-block truncate max-w-full">{{ $project->url }}</a>
                        @endif
                    </div>
                    <div class="flex items-center gap-1 flex-shrink-0">
                        <a href="{{ route('admin.projects.edit', $project) }}"
                           class="text-xs text-blue-600 hover:text-blue-800 font-medium px-2 py-1">Edit</a>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}"
                              onsubmit="return confirm('Hapus proyek ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-red-500 hover:text-red-700 font-medium px-2 py-1">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-lg shadow p-8 text-center text-gray-400">Belum ada proyek.</div>
        @endforelse
    </div>
</div>
@endsection
