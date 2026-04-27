<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // UNTUK HALAMAN DEPAN (GALERI.BLADE.PHP)
    public function indexFront()
    {
        $galeries = Gallery::latest()->get();
        return view('galeri', compact('galeries'));
    }

    // --- SISANYA UNTUK ADMIN ---
    public function index()
    {
        $galeries = Gallery::latest()->get();
        return view('admin.galeri.index', compact('galeries'));
    }

    public function create() { return view('admin.galeri.create'); }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $foto = $request->file('foto');
        $namaFoto = $foto->hashName();
        $foto->storeAs('galeri', $namaFoto, 'public');

        Gallery::create([
            'judul' => $request->judul,
            'foto'  => $namaFoto,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil ditambahkan!');
    }

    // ... (Fungsi edit, update, destroy tetap seperti kode lama lu)
}