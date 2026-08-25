@extends('layouts.admin')

@section('header', 'Kelola Keahlian')

@section('content')
<div>
    {{-- Form --}}
    <form method="POST" action="{{ route('admin.skills.store') }}" class="bg-white rounded-2xl border border-slate-100 p-5 md:p-7 mb-6">
        @csrf
        <h3 class="text-sm font-display font-bold text-navy mb-4">Tambah Keahlian Baru</h3>
        <div class="flex flex-col sm:flex-row gap-3 items-stretch sm:items-end">
            <div class="flex-1">
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Nama Keahlian</label>
                <input type="text" name="label" required placeholder="contoh: Laravel"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
            </div>
            <div class="w-full sm:w-48">
                <label class="block text-xs font-medium text-slate-500 mb-1.5">Grup</label>
                <select name="group" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
                    <option value="Backend">Backend</option>
                    <option value="Frontend">Frontend</option>
                    <option value="Tools">Tools</option>
                </select>
            </div>
            <button type="submit"
                    class="px-5 py-3 bg-gradient-to-r from-brand to-purple-500 hover:shadow-lg hover:shadow-brand/30 text-white text-sm font-semibold rounded-xl transition-all whitespace-nowrap">
                + Tambah
            </button>
        </div>
    </form>

    {{-- List --}}
    <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden">
        {{-- Desktop --}}
        <table class="w-full text-sm hidden md:table">
            <thead class="bg-slate-50/80">
                <tr>
                    <th class="text-left px-6 py-3 font-semibold text-slate-600 text-xs uppercase tracking-wide">Nama</th>
                    <th class="text-left px-6 py-3 font-semibold text-slate-600 text-xs uppercase tracking-wide">Grup</th>
                    <th class="text-right px-6 py-3 font-semibold text-slate-600 text-xs uppercase tracking-wide">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($skills as $skill)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-3.5 font-medium text-slate-700">{{ $skill->label }}</td>
                        <td class="px-6 py-3.5">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold
                                {{ $skill->group === 'Backend' ? 'bg-brand/10 text-brand' :
                                   ($skill->group === 'Frontend' ? 'bg-purple-500/10 text-purple-600' : 'bg-amber-500/10 text-amber-600') }}">
                                {{ $skill->group }}
                            </span>
                        </td>
                        <td class="px-6 py-3.5 text-right">
                            <form id="del-skill-{{ $skill->id }}" method="POST" action="{{ route('admin.skills.destroy', $skill) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="openModal('Hapus Keahlian', 'Keahlian {{ addslashes($skill->label) }} akan dihapus permanen.', function(){ document.getElementById('del-skill-{{ $skill->id }}').submit(); })" class="text-red-400 hover:text-red-600 text-xs font-semibold px-2 py-1 hover:bg-red-50 rounded-lg transition-all">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center text-slate-400">Belum ada keahlian.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Mobile --}}
        <div class="md:hidden divide-y divide-slate-100">
            @forelse($skills as $skill)
                <div class="px-4 py-3.5 flex items-center justify-between">
                    <div>
                        <div class="font-medium text-sm text-slate-700">{{ $skill->label }}</div>
                        <span class="inline-flex items-center px-2 py-0.5 mt-1 rounded-lg text-xs font-semibold
                            {{ $skill->group === 'Backend' ? 'bg-brand/10 text-brand' :
                               ($skill->group === 'Frontend' ? 'bg-purple-500/10 text-purple-600' : 'bg-amber-500/10 text-amber-600') }}">
                            {{ $skill->group }}
                        </span>
                    </div>
                    <form id="del-skill-m-{{ $skill->id }}" method="POST" action="{{ route('admin.skills.destroy', $skill) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="openModal('Hapus Keahlian', 'Keahlian {{ addslashes($skill->label) }} akan dihapus permanen.', function(){ document.getElementById('del-skill-m-{{ $skill->id }}').submit(); })" class="text-red-400 hover:text-red-600 text-xs font-semibold px-2 py-1 hover:bg-red-50 rounded-lg transition-all">Hapus</button>
                    </form>
                </div>
            @empty
                <div class="px-4 py-12 text-center text-slate-400 text-sm">Belum ada keahlian.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
