@extends('layouts.admin')

@section('header', 'Edit Proyek')

@section('content')
<form method="POST" action="{{ route('admin.projects.update', $project) }}" class="max-w-2xl">
    @csrf
    @method('PUT')

    <div class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Judul Proyek *</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" required
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tahun</label>
                <input type="text" name="year" value="{{ old('year', $project->year) }}"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Ringkasan</label>
            <textarea name="summary" rows="3"
                      class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">{{ old('summary', $project->summary) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tech Stack (koma)</label>
            <input type="text" name="stack" value="{{ old('stack', is_array($project->stack) ? implode(', ', $project->stack) : $project->stack) }}"
                   placeholder="Laravel, MySQL, Tailwind"
                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">URL</label>
            <input type="url" name="url" value="{{ old('url', $project->url) }}"
                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
        </div>
    </div>

    <div class="mt-6 flex gap-3">
        <button type="submit"
                class="px-6 py-3 bg-gradient-to-r from-brand to-purple-500 hover:shadow-lg hover:shadow-brand/30 text-white text-sm font-semibold rounded-xl transition-all">
            Simpan Perubahan
        </button>
        <a href="{{ route('admin.projects') }}"
           class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-xl transition-all">
            Batal
        </a>
    </div>
</form>
@endsection
