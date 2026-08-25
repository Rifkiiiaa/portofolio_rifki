@extends('layouts.admin')

@section('header', 'Kelola Testimoni')

@section('content')
<div class="max-w-4xl">
    {{-- Form --}}
    <form method="POST" action="{{ route('admin.testimonials.store') }}" class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7 mb-6">
        @csrf
        <h3 class="text-sm font-display font-bold text-navy mb-4">Tambah Testimoni Baru</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Nama Klien *</label>
                <input type="text" name="name" required placeholder="Nama klien"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Role / Jabatan</label>
                <input type="text" name="role" placeholder="Pemilik Usaha"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Kutipan *</label>
                <textarea name="quote" rows="3" required placeholder="Apa kata klien..."
                          class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all"></textarea>
            </div>
        </div>
        <button type="submit"
                class="mt-5 px-5 py-3 bg-gradient-to-r from-brand to-purple-500 hover:shadow-lg hover:shadow-brand/30 text-white text-sm font-semibold rounded-xl transition-all">
            + Tambah Testimoni
        </button>
    </form>

    {{-- List --}}
    <div class="space-y-4">
        @forelse($testimonials as $testimonial)
            <div class="bg-white rounded-2xl border border-slate-100 p-5">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-1 mb-2">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <blockquote class="text-slate-600 text-sm italic">&ldquo;{{ $testimonial->quote }}&rdquo;</blockquote>
                        <div class="mt-3 flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-brand to-purple-500 flex items-center justify-center text-white font-bold text-xs">
                                {{ mb_substr($testimonial->name, 0, 1) }}
                            </div>
                            <div>
                                <span class="font-semibold text-navy text-sm">{{ $testimonial->name }}</span>
                                @if($testimonial->role)
                                    <span class="text-slate-400 text-sm"> — {{ $testimonial->role }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                          onsubmit="return confirm('Hapus testimoni ini?')" class="flex-shrink-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs font-semibold text-red-400 hover:text-red-600 hover:bg-red-50 px-3 py-1.5 rounded-lg transition-all">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl border border-slate-100 p-12 text-center text-slate-400">Belum ada testimoni.</div>
        @endforelse
    </div>
</div>
@endsection
