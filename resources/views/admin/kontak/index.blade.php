@extends('layouts.admin') {{-- Sesuaikan dengan nama layout admin kamu --}}

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Pesan Masuk</h1>
        <p class="text-sm text-gray-500">Daftar masukan dan pesan dari pengunjung website TastyFood.</p>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-xs uppercase tracking-widest font-bold text-gray-400 border-b">Nama</th>
                    <th class="px-6 py-4 text-xs uppercase tracking-widest font-bold text-gray-400 border-b">Email</th>
                    <th class="px-6 py-4 text-xs uppercase tracking-widest font-bold text-gray-400 border-b">Subject</th>
                    <th class="px-6 py-4 text-xs uppercase tracking-widest font-bold text-gray-400 border-b">Pesan</th>
                    <th class="px-6 py-4 text-xs uppercase tracking-widest font-bold text-gray-400 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($messages as $msg)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-sm font-semibold text-gray-700">{{ $msg->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $msg->email }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        <span class="bg-blue-50 text-blue-600 px-2 py-1 rounded text-xs font-medium italic">
                            {{ $msg->subject }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <p class="truncate max-w-xs">{{ $msg->message }}</p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-2">
                            {{-- Tombol Hapus --}}
                            <form action="{{ route('admin.kontak.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-400 italic">
                        Belum ada pesan masuk.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $messages->links() }}
    </div>
</div>
@endsection