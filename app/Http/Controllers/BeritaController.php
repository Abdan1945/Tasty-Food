<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Menampilkan daftar berita (index.blade.php)
     */
    public function index()
    {
        // Mengambil berita terbaru agar yang baru di-upload muncul paling atas
        $news = News::latest()->get(); 
        return view('admin.berita.index', compact('news'));
    }

    /**
     * Menampilkan form tambah (create.blade.php)
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Menyimpan data dari form ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        // Simpan file gambar ke folder 'storage/app/public/berita'
        $imagePath = $request->file('image')->store('berita', 'public');

        News::create([
            'title'   => $request->title,
            'content' => $request->content,
            'image'   => $imagePath,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita kuliner berhasil diterbitkan!');
    }

    /**
     * Menampilkan detail satu berita (show.blade.php)
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('admin.berita.show', compact('news'));
    }

    /**
     * Menampilkan form edit (edit.blade.php)
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.berita.edit', compact('news'));
    }

    /**
     * Update data di database
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        
        $request->validate([
            'title'   => 'required|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Ambil semua data input kecuali gambar dulu
        $data = $request->only(['title', 'content']);

        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage jika user upload gambar baru
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            
            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('berita', 'public');
        }

        $news->update($data);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Menghapus berita dan gambarnya
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        // Hapus file gambar dari folder storage agar tidak nyampah
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('berita.index')->with('success', 'Berita telah berhasil dihapus!');
    }
}