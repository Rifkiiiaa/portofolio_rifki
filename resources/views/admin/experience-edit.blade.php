@extends('layouts.admin')

@section('header', 'Edit Pengalaman Kerja')

@section('content')
<form method="POST" action="{{ route('admin.experiences.update', $experience) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7 space-y-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Perusahaan *</label>
                <input type="text" name="company" value="{{ old('company', $experience->company) }}" required
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Posisi / Jabatan</label>
                <input type="text" name="position" value="{{ old('position', $experience->position) }}"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Mulai</label>
                <input type="text" name="start_date" value="{{ old('start_date', $experience->start_date) }}" placeholder="Jan 2023"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Selesai</label>
                <input type="text" name="end_date" value="{{ old('end_date', $experience->end_date) }}" placeholder="Sekarang"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Logo Perusahaan</label>
                <div class="flex items-center gap-4">
                    <label class="flex-1 flex flex-col items-center justify-center px-4 py-6 bg-slate-50 border-2 border-dashed border-slate-200 rounded-xl cursor-pointer hover:border-brand/40 hover:bg-brand/5 transition-all">
                        <svg class="w-8 h-8 text-slate-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span class="text-xs text-slate-500 font-medium">Klik untuk ganti logo</span>
                        <span class="text-[11px] text-slate-400 mt-0.5">JPG, PNG, max 2MB</span>
                        <input type="file" name="logo" accept="image/*" class="hidden" onchange="previewImage(this, 'preview-edit')">
                    </label>
                    <div id="preview-edit" class="w-20 h-20 rounded-xl overflow-hidden bg-slate-100 flex-shrink-0 {{ $experience->logo ? '' : 'hidden' }}">
                        @if($experience->logo)
                            <img src="{{ route('file.show', $experience->logo) }}" alt="Preview" class="w-full h-full object-contain p-1">
                        @else
                            <img src="" alt="Preview" class="w-full h-full object-contain p-1">
                        @endif
                    </div>
                </div>
                @if($experience->logo)
                    <p class="text-[11px] text-slate-400 mt-1.5">Logo saat ini akan diganti jika upload baru.</p>
                @endif
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Deskripsi Pekerjaan</label>
                <textarea name="description" rows="3"
                          class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">{{ old('description', $experience->description) }}</textarea>
            </div>
        </div>
    </div>

    <div class="mt-6 flex gap-3">
        <button type="submit"
                class="px-6 py-3 bg-gradient-to-r from-brand to-purple-500 hover:shadow-lg hover:shadow-brand/30 text-white text-sm font-semibold rounded-xl transition-all">
            Simpan Perubahan
        </button>
        <a href="{{ route('admin.experiences') }}"
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
