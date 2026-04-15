<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeries = Gallery::latest()->get();
        return view('admin.galeri.index', compact('galeries'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $foto = $request->file('foto');
        // Gunakan storeAs di folder 'galeri' di dalam disk 'public'
        $foto->storeAs('galeri', $foto->hashName(), 'public');

        Gallery::create([
            'judul' => $request->judul,
            'foto'  => $foto->hashName(),
        ]);

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil ditambahkan!');
    }

    public function show($id)
    {
        $galeri = Gallery::findOrFail($id);
        return view('admin.galeri.show', compact('galeri'));
    }

    public function edit($id)
    {
        $galeri = Gallery::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Gallery::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'foto'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // PERBAIKAN: Hapus foto lama dengan menentukan disk 'public'
            if (Storage::disk('public')->exists('galeri/' . $galeri->foto)) {
                Storage::disk('public')->delete('galeri/' . $galeri->foto);
            }

            $foto = $request->file('foto');
            $foto->storeAs('galeri', $foto->hashName(), 'public');

            $galeri->update([
                'judul' => $request->judul,
                'foto'  => $foto->hashName(),
            ]);
        } else {
            $galeri->update([
                'judul' => $request->judul,
            ]);
        }

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $galeri = Gallery::findOrFail($id);

        // PERBAIKAN: Hapus file fisik dengan menentukan disk 'public'
        if (Storage::disk('public')->exists('galeri/' . $galeri->foto)) {
            Storage::disk('public')->delete('galeri/' . $galeri->foto);
        }
        
        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil dihapus!');
    }
}