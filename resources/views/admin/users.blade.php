@extends('layouts.admin')

@section('page_title', 'Manajemen User')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <h3 class="text-xl font-bold text-gray-800">User Terdaftar</h3>
        <p class="text-sm text-gray-500">Daftar orang yang telah melakukan registrasi di website.</p>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-6 py-4 text-xs font-bold uppercase text-gray-400">Nama</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase text-gray-400">Email</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase text-gray-400">Tanggal Daftar</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase text-gray-400 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($users as $user)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center font-bold text-xs">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <span class="font-semibold text-gray-700">{{ $user->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $user->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-3 py-1 bg-green-100 text-green-600 text-[10px] font-bold uppercase rounded-full">Active</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection