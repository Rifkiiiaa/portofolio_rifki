@extends('layouts.admin')

@section('header', 'Kelola Sertifikat & Pencapaian')

@section('content')
<div>
    {{-- Form --}}
    <form method="POST" action="{{ route('admin.certifications.store') }}" enctype="multipart/form-data" class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7 mb-6">
        @csrf
        <h3 class="text-sm font-display font-bold text-navy mb-4">Tambah Sertifikat Baru</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Nama Sertifikat / Pencapaian *</label>
                <input type="text" name="name" required placeholder="contoh: Laravel Certified Developer"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Penerbit / Lembaga</label>
                <input type="text" name="issuer" placeholder="contoh: Laravel, Dicoding, Google"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Tanggal / Tahun</label>
                <input type="text" name="date" placeholder="contoh: Maret 2024 atau 2024"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Credential ID</label>
                <input type="text" name="credential_id" placeholder="contoh: abc123-xyz456"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">URL (opsional)</label>
                <input type="url" name="url" placeholder="https://..."
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Gambar Depan (Front)</label>
                <div class="flex items-center gap-4">
                    <label class="flex-1 flex flex-col items-center justify-center px-4 py-6 bg-slate-50 border-2 border-dashed border-slate-200 rounded-xl cursor-pointer hover:border-brand/40 hover:bg-brand/5 transition-all">
                        <svg class="w-8 h-8 text-slate-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span class="text-xs text-slate-500 font-medium">Klik untuk upload gambar</span>
                        <span class="text-[11px] text-slate-400 mt-0.5">JPG, PNG, max 5MB</span>
                        <input type="file" name="image" accept="image/*" class="hidden" onchange="previewImage(this, 'preview-add-front')">
                    </label>
                    <div id="preview-add-front" class="w-24 h-24 rounded-xl overflow-hidden bg-slate-100 flex-shrink-0 hidden">
                        <img src="" alt="Preview" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Gambar Belakang (Back)</label>
                <div class="flex items-center gap-4">
                    <label class="flex-1 flex flex-col items-center justify-center px-4 py-6 bg-slate-50 border-2 border-dashed border-slate-200 rounded-xl cursor-pointer hover:border-brand/40 hover:bg-brand/5 transition-all">
                        <svg class="w-8 h-8 text-slate-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span class="text-xs text-slate-500 font-medium">Klik untuk upload gambar</span>
                        <span class="text-[11px] text-slate-400 mt-0.5">JPG, PNG, max 5MB</span>
                        <input type="file" name="back_image" accept="image/*" class="hidden" onchange="previewImage(this, 'preview-add-back')">
                    </label>
                    <div id="preview-add-back" class="w-24 h-24 rounded-xl overflow-hidden bg-slate-100 flex-shrink-0 hidden">
                        <img src="" alt="Preview" class="w-full h-full object-cover">
                    </div>
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
            + Tambah Sertifikat
        </button>
    </form>

    {{-- List --}}
    <div class="space-y-4">
        @forelse($certifications as $cert)
            <div class="bg-white rounded-2xl border border-slate-100 p-5">
                <div class="flex items-start gap-4">
                    @if($cert->image)
                        <div class="w-20 h-20 rounded-xl overflow-hidden bg-slate-100 flex-shrink-0 border border-slate-100">
                            <img src="{{ route('file.show', $cert->image) }}" alt="{{ $cert->name }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-teal-500 to-emerald-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        </div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <h4 class="font-display font-bold text-navy">{{ $cert->name }}</h4>
                        <p class="text-sm text-slate-500 mt-1">
                            @if($cert->issuer)
                                {{ $cert->issuer }}
                            @endif
                            @if($cert->date)
                                <span class="text-xs font-mono text-slate-400 ml-1">{{ $cert->date }}</span>
                            @endif
                        </p>
                        @if($cert->description)
                            <p class="text-sm text-slate-500 mt-2 line-clamp-2">{{ $cert->description }}</p>
                        @endif
                        @if($cert->url)
                            <a href="{{ $cert->url }}" target="_blank" class="text-xs text-brand hover:underline mt-2 inline-block">Lihat Sertifikat &rarr;</a>
                        @endif
                        @if($cert->credential_id)
                            <p class="text-xs text-slate-400 font-mono mt-1.5">ID: {{ $cert->credential_id }}</p>
                        @endif
                    </div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <a href="{{ route('admin.certifications.edit', $cert) }}"
                           class="text-xs font-semibold text-brand hover:text-brand/80 hover:bg-brand/5 px-3 py-1.5 rounded-lg transition-all">Edit</a>
                        <form id="del-cert-{{ $cert->id }}" method="POST" action="{{ route('admin.certifications.destroy', $cert) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="openModal('Hapus Sertifikat', 'Sertifikat {{ addslashes($cert->name) }} akan dihapus permanen.', function(){ document.getElementById('del-cert-{{ $cert->id }}').submit(); })" class="text-xs font-semibold text-red-400 hover:text-red-600 hover:bg-red-50 px-3 py-1.5 rounded-lg transition-all">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl border border-slate-100 p-12 text-center text-slate-400">Belum ada sertifikat atau pencapaian.</div>
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
