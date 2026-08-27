@extends('layouts.admin')

@section('header', 'Edit Sertifikat & Pencapaian')

@section('content')
<form method="POST" action="{{ route('admin.certifications.update', $certification) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7 space-y-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Sertifikat / Pencapaian *</label>
                <input type="text" name="name" value="{{ old('name', $certification->name) }}" required
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Penerbit / Lembaga</label>
                <input type="text" name="issuer" value="{{ old('issuer', $certification->issuer) }}"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal / Tahun</label>
                <input type="text" name="date" value="{{ old('date', $certification->date) }}" placeholder="Maret 2024"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Credential ID</label>
                <input type="text" name="credential_id" value="{{ old('credential_id', $certification->credential_id) }}" placeholder="abc123-xyz456"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">URL</label>
                <input type="url" name="url" value="{{ old('url', $certification->url) }}" placeholder="https://..."
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Gambar Sertifikat</label>
                <div class="flex items-center gap-4">
                    <label class="flex-1 flex flex-col items-center justify-center px-4 py-6 bg-slate-50 border-2 border-dashed border-slate-200 rounded-xl cursor-pointer hover:border-brand/40 hover:bg-brand/5 transition-all">
                        <svg class="w-8 h-8 text-slate-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span class="text-xs text-slate-500 font-medium">Klik untuk ganti gambar</span>
                        <span class="text-[11px] text-slate-400 mt-0.5">JPG, PNG, max 5MB</span>
                        <input type="file" name="image" accept="image/*" class="hidden" onchange="previewImage(this, 'preview-edit')">
                    </label>
                    <div id="preview-edit" class="w-24 h-24 rounded-xl overflow-hidden bg-slate-100 flex-shrink-0 {{ $certification->image ? '' : 'hidden' }}">
                        @if($certification->image)
                            <img src="{{ route('file.show', $certification->image) }}" alt="Preview" class="w-full h-full object-cover">
                        @else
                            <img src="" alt="Preview" class="w-full h-full object-cover">
                        @endif
                    </div>
                </div>
                @if($certification->image)
                    <p class="text-[11px] text-slate-400 mt-1.5">Gambar saat ini akan diganti jika upload baru.</p>
                @endif
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Deskripsi</label>
                <textarea name="description" rows="3"
                          class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">{{ old('description', $certification->description) }}</textarea>
            </div>
        </div>
    </div>

    <div class="mt-6 flex gap-3">
        <button type="submit"
                class="px-6 py-3 bg-gradient-to-r from-brand to-purple-500 hover:shadow-lg hover:shadow-brand/30 text-white text-sm font-semibold rounded-xl transition-all">
            Simpan Perubahan
        </button>
        <a href="{{ route('admin.certifications') }}"
           class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-xl transition-all">
            Batal
        </a>
    </div>
</form>

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
