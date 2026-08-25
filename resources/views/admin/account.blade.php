@extends('layouts.admin')

@section('header', 'Pengaturan Akun')

@section('content')
<form method="POST" action="{{ route('admin.account.update') }}" class="max-w-xl">
    @csrf
    @method('PUT')

    <div class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7 space-y-6">
        <div class="flex items-center gap-4 pb-5 border-b border-slate-100">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-brand to-purple-500 flex items-center justify-center text-white font-bold text-xl flex-shrink-0">
                {{ mb_substr($user->name ?? 'A', 0, 1) }}
            </div>
            <div>
                <p class="font-display font-bold text-navy">{{ $user->name }}</p>
                <p class="text-sm text-slate-500">{{ $user->email }}</p>
            </div>
        </div>

        {{-- Email --}}
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                </div>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                       class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            @error('email') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
        </div>

        {{-- Divider --}}
        <div class="relative">
            <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-100"></div></div>
            <div class="relative flex justify-center text-xs"><span class="px-3 bg-white text-slate-400">Ubah Password</span></div>
        </div>

        {{-- Password --}}
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Password Baru</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </div>
                <input type="password" id="password" name="password" placeholder="Kosongkan jika tidak diubah"
                       class="w-full pl-11 pr-12 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
                <button type="button" onclick="togglePw('password','eye1','eye2')" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
                    <svg id="eye1" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878l4.242 4.242M21 21l-5.197-5.197"/></svg>
                    <svg id="eye2" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </button>
            </div>
            @error('password') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
        </div>

        {{-- Password Confirmation --}}
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Konfirmasi Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password baru"
                       class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
        </div>
    </div>

    <div class="mt-6">
        <button type="submit"
                class="px-6 py-3 bg-gradient-to-r from-brand to-purple-500 hover:shadow-lg hover:shadow-brand/30 text-white text-sm font-semibold rounded-xl transition-all hover:-translate-y-0.5">
            Simpan Perubahan
        </button>
    </div>
</form>

<script>
function togglePw(inputId, eyeOffId, eyeOnId) {
    var pw = document.getElementById(inputId);
    var off = document.getElementById(eyeOffId);
    var on = document.getElementById(eyeOnId);
    if (pw.type === 'password') {
        pw.type = 'text'; off.classList.add('hidden'); on.classList.remove('hidden');
    } else {
        pw.type = 'password'; off.classList.remove('hidden'); on.classList.add('hidden');
    }
}
</script>
@endsection
