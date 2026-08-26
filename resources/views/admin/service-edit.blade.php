@extends('layouts.admin')

@section('header', 'Edit Jasa')

@section('content')
<form method="POST" action="{{ route('admin.services.update', $service) }}">
    @csrf
    @method('PUT')

    <div class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7 space-y-5">
        <div class="grid grid-cols-1 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Judul Jasa *</label>
                <input type="text" name="title" value="{{ old('title', $service->title) }}" required
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Deskripsi Jasa</label>
                <textarea name="description" rows="4"
                          class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">{{ old('description', $service->description) }}</textarea>
            </div>
        </div>
    </div>

    <div class="mt-6 flex gap-3">
        <button type="submit"
                class="px-6 py-3 bg-gradient-to-r from-brand to-purple-500 hover:shadow-lg hover:shadow-brand/30 text-white text-sm font-semibold rounded-xl transition-all">
            Simpan Perubahan
        </button>
        <a href="{{ route('admin.services') }}"
           class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-xl transition-all">
            Batal
        </a>
    </div>
</form>
@endsection
