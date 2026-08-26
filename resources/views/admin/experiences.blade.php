@extends('layouts.admin')

@section('header', 'Kelola Pengalaman Kerja')

@section('content')
<div>
    {{-- Form --}}
    <form method="POST" action="{{ route('admin.experiences.store') }}" enctype="multipart/form-data" class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7 mb-6">
        @csrf
        <h3 class="text-sm font-display font-bold text-navy mb-4">Tambah Pengalaman Baru</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Nama Perusahaan *</label>
                <input type="text" name="company" required placeholder="contoh: PT Contoh Digital"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Posisi / Jabatan</label>
                <input type="text" name="position" placeholder="contoh: Fullstack Developer"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Tanggal Mulai</label>
                <input type="text" name="start_date" placeholder="contoh: Jan 2023 atau 2021"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Tanggal Selesai</label>
                <input type="text" name="end_date" placeholder="contoh: Sekarang atau Des 2024"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div class="sm:col-span-2">
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Logo Perusahaan</label>
                <div class="flex items-center gap-4">
                    <label class="flex-1 flex flex-col items-center justify-center px-4 py-6 bg-slate-50 border-2 border-dashed border-slate-200 rounded-xl cursor-pointer hover:border-brand/40 hover:bg-brand/5 transition-all">
                        <svg class="w-8 h-8 text-slate-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span class="text-xs text-slate-500 font-medium">Klik untuk upload logo</span>
                        <span class="text-[11px] text-slate-400 mt-0.5">JPG, PNG, max 2MB</span>
                        <input type="file" name="logo" accept="image/*" class="hidden" onchange="previewImage(this, 'preview-add')">
                    </label>
                    <div id="preview-add" class="w-20 h-20 rounded-xl overflow-hidden bg-slate-100 flex-shrink-0 hidden">
                        <img src="" alt="Preview" class="w-full h-full object-contain p-1">
                    </div>
                </div>
            </div>
            <div class="sm:col-span-2">
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Deskripsi Pekerjaan</label>
                <textarea name="description" rows="2" placeholder="Deskripsi singkat tanggung jawab / pencapaian..."
                          class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all"></textarea>
            </div>
        </div>
        <button type="submit"
                class="mt-5 px-5 py-3 bg-gradient-to-r from-brand to-purple-500 hover:shadow-lg hover:shadow-brand/30 text-white text-sm font-semibold rounded-xl transition-all">
            + Tambah Pengalaman
        </button>
    </form>

    {{-- List --}}
    <div class="space-y-4">
        @forelse($experiences as $exp)
            <div class="bg-white rounded-2xl border border-slate-100 p-5">
                <div class="flex items-start gap-4">
                    @if($exp->logo)
                        <div class="w-14 h-14 rounded-xl overflow-hidden bg-slate-50 flex-shrink-0 border border-slate-100">
                            <img src="{{ route('file.show', $exp->logo) }}" alt="{{ $exp->company }}" class="w-full h-full object-contain p-1">
                        </div>
                    @else
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-cyan-500 to-blue-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <h4 class="font-display font-bold text-navy">{{ $exp->company }}</h4>
                        @if($exp->position)
                            <p class="text-sm text-brand font-medium mt-0.5">{{ $exp->position }}</p>
                        @endif
                        <p class="text-xs text-slate-400 font-mono mt-1">
                            {{ $exp->start_date ?? '?' }} — {{ $exp->end_date ?? 'Sekarang' }}
                        </p>
                        @if($exp->description)
                            <p class="text-sm text-slate-500 mt-2 line-clamp-2">{{ $exp->description }}</p>
                        @endif
                    </div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <a href="{{ route('admin.experiences.edit', $exp) }}"
                           class="text-xs font-semibold text-brand hover:text-brand/80 hover:bg-brand/5 px-3 py-1.5 rounded-lg transition-all">Edit</a>
                        <form id="del-exp-{{ $exp->id }}" method="POST" action="{{ route('admin.experiences.destroy', $exp) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="openModal('Hapus Pengalaman', 'Pengalaman di {{ addslashes($exp->company) }} akan dihapus permanen.', function(){ document.getElementById('del-exp-{{ $exp->id }}').submit(); })" class="text-xs font-semibold text-red-400 hover:text-red-600 hover:bg-red-50 px-3 py-1.5 rounded-lg transition-all">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl border border-slate-100 p-12 text-center text-slate-400">Belum ada pengalaman kerja.</div>
        @endforelse
    </div>
</div>

<script>
function previewImage(input, previewId) {
    var preview = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            preview.querySelector('img').src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
