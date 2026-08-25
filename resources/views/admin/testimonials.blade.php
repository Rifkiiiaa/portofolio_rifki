@extends('layouts.admin')

@section('header', 'Kelola Testimoni')

@section('content')
<div class="max-w-4xl">
    <!-- Form Tambah -->
    <form method="POST" action="{{ route('admin.testimonials.store') }}" class="bg-white rounded-lg shadow p-6 mb-6">
        @csrf
        <h3 class="text-sm font-semibold text-gray-700 mb-3">Tambah Testimoni Baru</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs text-gray-500 mb-1">Nama Klien *</label>
                <input type="text" name="name" required placeholder="Nama klien"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Role / Jabatan</label>
                <input type="text" name="role" placeholder="Pemilik Usaha"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs text-gray-500 mb-1">Kutipan *</label>
                <textarea name="quote" rows="3" required placeholder="Apa kata klien..."
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500"></textarea>
            </div>
        </div>
        <button type="submit"
                class="mt-4 px-5 py-2 bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium rounded-lg transition">
            + Tambah Testimoni
        </button>
    </form>

    <!-- Daftar Testimoni -->
    <div class="space-y-4">
        @forelse($testimonials as $testimonial)
            <div class="bg-white rounded-lg shadow p-4 md:p-5">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex-1 min-w-0">
                        <blockquote class="text-gray-700 text-sm italic">&ldquo;{{ $testimonial->quote }}&rdquo;</blockquote>
                        <div class="mt-2 text-sm">
                            <span class="font-semibold text-gray-800">{{ $testimonial->name }}</span>
                            @if($testimonial->role)
                                <span class="text-gray-400"> — {{ $testimonial->role }}</span>
                            @endif
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                          onsubmit="return confirm('Hapus testimoni ini?')" class="flex-shrink-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs text-red-500 hover:text-red-700 font-medium px-2 py-1">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-lg shadow p-8 text-center text-gray-400">Belum ada testimoni.</div>
        @endforelse
    </div>
</div>
@endsection
