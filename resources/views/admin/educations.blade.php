@extends('layouts.admin')

@section('header', 'Kelola Riwayat Pendidikan')

@section('content')
<div>
    {{-- Form --}}
    <form method="POST" action="{{ route('admin.educations.store') }}" class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7 mb-6">
        @csrf
        <h3 class="text-sm font-display font-bold text-navy mb-4">Tambah Pendidikan Baru</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Institusi / Sekolah *</label>
                <input type="text" name="institution" required placeholder="contoh: Universitas Lampung"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Gelar / Jenjang</label>
                <input type="text" name="degree" placeholder="contoh: S.T., SMA, S.Kom"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Bidang Studi</label>
                <input type="text" name="field_of_study" placeholder="contoh: Teknik Informatika"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1.5">Tahun Mulai</label>
                    <input type="text" name="start_year" placeholder="2020"
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1.5">Tahun Selesai</label>
                    <input type="text" name="end_year" placeholder="2024 / Sekarang"
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Deskripsi</label>
                <textarea name="description" rows="2" placeholder="Deskripsi singkat (opsional)..."
                          class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all"></textarea>
            </div>
        </div>
        <button type="submit"
                class="mt-5 px-5 py-3 bg-gradient-to-r from-brand to-purple-500 hover:shadow-lg hover:shadow-brand/30 text-white text-sm font-semibold rounded-xl transition-all">
            + Tambah Pendidikan
        </button>
    </form>

    {{-- List --}}
    <div class="space-y-4">
        @forelse($educations as $edu)
            <div class="bg-white rounded-2xl border border-slate-100 p-5">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex-1 min-w-0">
                        <h4 class="font-display font-bold text-navy">{{ $edu->institution }}</h4>
                        <p class="text-sm text-slate-500 mt-1">
                            @if($edu->degree || $edu->field_of_study)
                                {{ collect([$edu->degree, $edu->field_of_study])->filter()->implode(' — ') }}
                            @endif
                        </p>
                        @if($edu->start_year)
                            <p class="text-xs font-mono text-slate-400 mt-1">
                                {{ $edu->start_year }} — {{ $edu->end_year ?? 'Sekarang' }}
                            </p>
                        @endif
                        @if($edu->description)
                            <p class="text-sm text-slate-500 mt-2 line-clamp-2">{{ $edu->description }}</p>
                        @endif
                    </div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <a href="{{ route('admin.educations.edit', $edu) }}"
                           class="text-xs font-semibold text-brand hover:text-brand/80 hover:bg-brand/5 px-3 py-1.5 rounded-lg transition-all">Edit</a>
                        <form id="del-edu-{{ $edu->id }}" method="POST" action="{{ route('admin.educations.destroy', $edu) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="openModal('Hapus Pendidikan', 'Riwayat {{ addslashes($edu->institution) }} akan dihapus permanen.', function(){ document.getElementById('del-edu-{{ $edu->id }}').submit(); })" class="text-xs font-semibold text-red-400 hover:text-red-600 hover:bg-red-50 px-3 py-1.5 rounded-lg transition-all">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl border border-slate-100 p-12 text-center text-slate-400">Belum ada riwayat pendidikan.</div>
        @endforelse
    </div>
</div>
@endsection
