@extends('layouts.admin')

@section('header', 'Edit Profil')

@section('content')
<form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="max-w-2xl">
    @csrf
    @method('PUT')

    <div class="bg-white rounded-lg shadow p-4 md:p-6 space-y-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap *</label>
                <input type="text" name="name" value="{{ old('name', $profile->name ?? '') }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Role / Jabatan</label>
                <input type="text" name="role" value="{{ old('role', $profile->role ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tagline</label>
            <input type="text" name="tagline" value="{{ old('tagline', $profile->tagline ?? '') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Bio / Tentang</label>
            <textarea name="bio" rows="4"
                      class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">{{ old('bio', $profile->bio ?? '') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Profil</label>
                @if(!empty($profile->photo))
                    <div class="mb-2">
                        <img id="photo-preview-current" src="{{ route('file.show', $profile->photo) }}" alt="Foto saat ini"
                             class="w-20 h-20 rounded-full object-cover border-2 border-gray-200">
                    </div>
                @endif
                <input type="file" name="photo" accept="image/*" onchange="previewPhoto(this)"
                       class="w-full text-sm text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
                <img id="photo-preview" class="mt-2 w-20 h-20 rounded-full object-cover border-2 border-gray-200 hidden">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Upload CV (PDF)</label>
                @if(!empty($profile->cv_path))
                    <div class="mb-2">
                        <a href="{{ route('file.show', $profile->cv_path) }}" target="_blank" class="text-xs text-amber-600 hover:underline">CV saat ini</a>
                    </div>
                @endif
                <input type="file" name="cv_path" accept=".pdf"
                       class="w-full text-sm text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                <input type="text" name="location" value="{{ old('location', $profile->location ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $profile->email ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', $profile->phone ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Media Sosial</label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <input type="url" name="socials[github]" placeholder="GitHub URL"
                       value="{{ old('socials.github', $profile['socials']['github'] ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                <input type="url" name="socials[linkedin]" placeholder="LinkedIn URL"
                       value="{{ old('socials.linkedin', $profile['socials']['linkedin'] ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                <input type="url" name="socials[whatsapp]" placeholder="WhatsApp URL"
                       value="{{ old('socials.whatsapp', $profile['socials']['whatsapp'] ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
        </div>
    </div>

    <div class="mt-6">
        <button type="submit"
                class="px-6 py-2.5 bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium rounded-lg transition">
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
