@extends('layouts.admin')

@section('header', 'Edit Profil')

@section('content')
<form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="max-w-2xl">
    @csrf
    @method('PUT')

    <div class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Lengkap *</label>
                <input type="text" name="name" value="{{ old('name', $profile->name ?? '') }}" required
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Role / Jabatan</label>
                <input type="text" name="role" value="{{ old('role', $profile->role ?? '') }}"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tagline</label>
            <input type="text" name="tagline" value="{{ old('tagline', $profile->tagline ?? '') }}"
                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Bio / Tentang</label>
            <textarea name="bio" rows="4"
                      class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">{{ old('bio', $profile->bio ?? '') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Foto Profil</label>
                @if(!empty($profile->photo))
                    <div class="mb-3">
                        <img id="photo-preview-current" src="{{ route('file.show', $profile->photo) }}" alt="Foto saat ini"
                             class="w-20 h-20 rounded-2xl object-cover border-2 border-slate-100">
                    </div>
                @endif
                <input type="file" name="photo" accept="image/*" onchange="previewPhoto(this)"
                       class="w-full text-sm text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-brand/10 file:text-brand hover:file:bg-brand/20 file:transition-colors">
                <img id="photo-preview" class="mt-3 w-20 h-20 rounded-2xl object-cover border-2 border-slate-100 hidden">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Upload CV (PDF)</label>
                @if(!empty($profile->cv_path))
                    <div class="mb-3">
                        <a href="{{ route('file.show', $profile->cv_path) }}" target="_blank" class="text-xs font-medium text-brand hover:underline">CV saat ini</a>
                    </div>
                @endif
                <input type="file" name="cv_path" accept=".pdf"
                       class="w-full text-sm text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-brand/10 file:text-brand hover:file:bg-brand/20 file:transition-colors">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Lokasi</label>
                <input type="text" name="location" value="{{ old('location', $profile->location ?? '') }}"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email</label>
                <input type="email" name="email" value="{{ old('email', $profile->email ?? '') }}"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', $profile->phone ?? '') }}"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Media Sosial</label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <input type="url" name="socials[github]" placeholder="GitHub URL"
                       value="{{ old('socials.github', $profile['socials']['github'] ?? '') }}"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
                <input type="url" name="socials[linkedin]" placeholder="LinkedIn URL"
                       value="{{ old('socials.linkedin', $profile['socials']['linkedin'] ?? '') }}"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
                <input type="url" name="socials[whatsapp]" placeholder="WhatsApp URL"
                       value="{{ old('socials.whatsapp', $profile['socials']['whatsapp'] ?? '') }}"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
        </div>
    </div>

    <div class="mt-6">
        <button type="submit"
                class="px-6 py-3 bg-gradient-to-r from-brand to-purple-500 hover:shadow-lg hover:shadow-brand/30 text-white text-sm font-semibold rounded-xl transition-all hover:-translate-y-0.5">
            Simpan Profil
        </button>
    </div>
</form>

<script>
function previewPhoto(input) {
    const preview = document.getElementById('photo-preview');
    const current = document.getElementById('photo-preview-current');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            if (current) current.classList.add('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
