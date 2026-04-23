@extends('layouts.admin')

@section('page_title', 'Manajemen User')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <div>
            <h3 class="text-xl font-bold text-gray-800">User Terdaftar</h3>
            <p class="text-sm text-gray-500">Daftar orang yang telah melakukan registrasi di website.</p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-6 py-4 text-xs font-bold uppercase text-gray-400">Nama</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase text-gray-400">Email</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase text-gray-400">Tanggal Daftar</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase text-gray-400 text-center">Status</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase text-gray-400 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($users as $user)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center font-bold text-xs">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <span class="font-semibold text-gray-700">{{ $user->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $user->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-3 py-1 {{ $user->is_blocked ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }} text-[10px] font-bold uppercase rounded-full">
                            {{ $user->is_blocked ? 'Blocked' : 'Active' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">
                            {{-- Tombol Blokir/Unblock --}}
                            <form action="{{ route('admin.users.block', $user->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="p-2 {{ $user->is_blocked ? 'text-green-500 hover:bg-green-50' : 'text-amber-500 hover:bg-amber-50' }} rounded-lg transition" title="{{ $user->is_blocked ? 'Buka Blokir' : 'Blokir User' }}">
                                    <i class="bi {{ $user->is_blocked ? 'bi-check-circle' : 'bi-slash-circle' }}"></i>
                                </button>
                            </form>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition" title="Hapus User">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection