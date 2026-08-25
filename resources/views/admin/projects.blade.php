@extends('layouts.admin')

@section('header', 'Kelola Proyek')

@section('content')
<div class="max-w-5xl">
    {{-- Form --}}
    <form method="POST" action="{{ route('admin.projects.store') }}" class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7 mb-6">
        @csrf
        <h3 class="text-sm font-display font-bold text-navy mb-4">Tambah Proyek Baru</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Judul Proyek *</label>
                <input type="text" name="title" required placeholder="Nama proyek"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Tahun</label>
                <input type="text" name="year" placeholder="2025"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Ringkasan</label>
                <textarea name="summary" rows="2" placeholder="Deskripsi singkat proyek"
                          class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all"></textarea>
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Tech Stack (koma)</label>
                <input type="text" name="stack" placeholder="Laravel, MySQL, Tailwind"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">URL</label>
                <input type="url" name="url" placeholder="https://..."
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
        </div>
        <button type="submit"
                class="mt-5 px-5 py-3 bg-gradient-to-r from-brand to-purple-500 hover:shadow-lg hover:shadow-brand/30 text-white text-sm font-semibold rounded-xl transition-all">
            + Tambah Proyek
        </button>
    </form>

    {{-- List --}}
    <div class="space-y-4">
        @forelse($projects as $project)
            <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden">
                <div class="h-1 bg-gradient-to-r from-brand to-purple-500"></div>
                <div class="p-5">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <h4 class="font-display font-bold text-navy">{{ $project->title }}</h4>
                                @if($project->year)
                                    <span class="text-xs font-mono text-slate-400 bg-slate-50 px-2 py-0.5 rounded-md">{{ $project->year }}</span>
                                @endif
                            </div>
                            @if($project->summary)
                                <p class="text-sm text-slate-500 mt-1.5 line-clamp-2">{{ $project->summary }}</p>
                            @endif
                            @if($project->stack)
                                <div class="flex flex-wrap gap-1.5 mt-3">
                                    @foreach($project->stack as $tech)
                                        <span class="font-mono text-[11px] font-medium text-brand bg-brand/5 px-2 py-0.5 rounded-md">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            @endif
                            @if($project->url)
                                <a href="{{ $project->url }}" target="_blank" class="text-xs text-brand font-medium hover:underline mt-2 inline-block truncate max-w-full">{{ $project->url }}</a>
                            @endif
                        </div>
                        <div class="flex items-center gap-1 flex-shrink-0">
                            <a href="{{ route('admin.projects.edit', $project) }}"
                               class="text-xs font-semibold text-brand hover:bg-brand/5 px-3 py-1.5 rounded-lg transition-all">Edit</a>
                            <form method="POST" action="{{ route('admin.projects.destroy', $project) }}"
                                  onsubmit="return confirm('Hapus proyek ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-semibold text-red-400 hover:text-red-600 hover:bg-red-50 px-3 py-1.5 rounded-lg transition-all">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl border border-slate-100 p-12 text-center text-slate-400">Belum ada proyek.</div>
        @endforelse
    </div>
</div>
@endsection
