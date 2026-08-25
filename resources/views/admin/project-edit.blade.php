@extends('layouts.admin')

@section('header', 'Edit Proyek')

@section('content')
<form method="POST" action="{{ route('admin.projects.update', $project) }}" class="max-w-2xl">
    @csrf
    @method('PUT')

    <div class="bg-white rounded-lg shadow p-4 md:p-6 space-y-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Proyek *</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                <input type="text" name="year" value="{{ old('year', $project->year) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Ringkasan</label>
            <textarea name="summary" rows="3"
                      class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">{{ old('summary', $project->summary) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tech Stack (koma)</label>
            <input type="text" name="stack" value="{{ old('stack', is_array($project->stack) ? implode(', ', $project->stack) : $project->stack) }}"
                   placeholder="Laravel, MySQL, Tailwind"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">URL</label>
            <input type="url" name="url" value="{{ old('url', $project->url) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
        </div>
    </div>

    <div class="mt-6 flex gap-3">
        <button type="submit"
                class="px-6 py-2.5 bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium rounded-lg transition">
            Simpan Perubahan
        </button>
        <a href="{{ route('admin.projects') }}"
           class="px-6 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-lg transition">
            Batal
        </a>
    </div>
</form>
@endsection
