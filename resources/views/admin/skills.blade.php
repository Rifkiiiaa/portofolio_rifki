@extends('layouts.admin')

@section('header', 'Kelola Keahlian')

@section('content')
<div class="max-w-4xl">
    <!-- Form Tambah -->
    <form method="POST" action="{{ route('admin.skills.store') }}" class="bg-white rounded-lg shadow p-4 md:p-6 mb-6">
        @csrf
        <h3 class="text-sm font-semibold text-gray-700 mb-3">Tambah Keahlian Baru</h3>
        <div class="flex flex-col sm:flex-row gap-3 items-stretch sm:items-end">
            <div class="flex-1">
                <label class="block text-xs text-gray-500 mb-1">Nama Keahlian</label>
                <input type="text" name="label" required placeholder="contoh: Laravel"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div class="w-full sm:w-48">
                <label class="block text-xs text-gray-500 mb-1">Grup</label>
                <select name="group" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    <option value="Backend">Backend</option>
                    <option value="Frontend">Frontend</option>
                    <option value="Tools">Tools</option>
                </select>
            </div>
            <button type="submit"
                    class="px-5 py-2 bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium rounded-lg transition whitespace-nowrap">
                + Tambah
            </button>
        </div>
    </form>

    <!-- Daftar Keahlian -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        {{-- Desktop table --}}
        <table class="w-full text-sm hidden md:table">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="text-left px-6 py-3 font-medium">Nama</th>
                    <th class="text-left px-6 py-3 font-medium">Grup</th>
                    <th class="text-right px-6 py-3 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($skills as $skill)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3">{{ $skill->label }}</td>
                        <td class="px-6 py-3">
                            <span class="inline-block px-2 py-0.5 rounded text-xs font-medium
                                {{ $skill->group === 'Backend' ? 'bg-blue-100 text-blue-700' :
                                   ($skill->group === 'Frontend' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700') }}">
                                {{ $skill->group }}
                            </span>
                        </td>
                        <td class="px-6 py-3 text-right">
                            <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}" class="inline"
                                  onsubmit="return confirm('Hapus keahlian ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-8 text-center text-gray-400">Belum ada keahlian.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Mobile cards --}}
        <div class="md:hidden divide-y divide-gray-100">
            @forelse($skills as $skill)
                <div class="px-4 py-3 flex items-center justify-between">
                    <div>
                        <div class="font-medium text-sm">{{ $skill->label }}</div>
                        <span class="inline-block px-2 py-0.5 mt-1 rounded text-xs font-medium
                            {{ $skill->group === 'Backend' ? 'bg-blue-100 text-blue-700' :
                               ($skill->group === 'Frontend' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700') }}">
                            {{ $skill->group }}
                        </span>
                    </div>
                    <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}"
                          onsubmit="return confirm('Hapus keahlian ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-medium px-2 py-1">Hapus</button>
                    </form>
                </div>
            @empty
                <div class="px-4 py-8 text-center text-gray-400 text-sm">Belum ada keahlian.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
