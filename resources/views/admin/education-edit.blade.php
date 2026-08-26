@extends('layouts.admin')

@section('header', 'Edit Riwayat Pendidikan')

@section('content')
<form method="POST" action="{{ route('admin.educations.update', $education) }}">
    @csrf
    @method('PUT')

    <div class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7 space-y-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Institusi / Sekolah *</label>
                <input type="text" name="institution" value="{{ old('institution', $education->institution) }}" required
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Gelar / Jenjang</label>
                <input type="text" name="degree" value="{{ old('degree', $education->degree) }}"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Bidang Studi</label>
                <input type="text" name="field_of_study" value="{{ old('field_of_study', $education->field_of_study) }}"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tahun Mulai</label>
                    <input type="text" name="start_year" value="{{ old('start_year', $education->start_year) }}" placeholder="2020"
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tahun Selesai</label>
                    <input type="text" name="end_year" value="{{ old('end_year', $education->end_year) }}" placeholder="2024 / Sekarang"
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Deskripsi</label>
                <textarea name="description" rows="3"
                          class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">{{ old('description', $education->description) }}</textarea>
            </div>
        </div>
    </div>

    <div class="mt-6 flex gap-3">
        <button type="submit"
                class="px-6 py-3 bg-gradient-to-r from-brand to-purple-500 hover:shadow-lg hover:shadow-brand/30 text-white text-sm font-semibold rounded-xl transition-all">
            Simpan Perubahan
        </button>
        <a href="{{ route('admin.educations') }}"
           class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-xl transition-all">
            Batal
        </a>
    </div>
</form>
@endsection
