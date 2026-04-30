<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * UNTUK HALAMAN DEPAN (berita.blade.php)
     * Menampilkan semua berita ke pengunjung website.
     */
    public function indexFront()
    {
        $berita = News::latest()->get(); 
        return view('berita', compact('berita'));
    }

    /**
     * UNTUK HALAMAN DASHBOARD ADMIN
     * Menampilkan tabel daftar berita untuk dikelola admin.
     */
    public function index()
    {
        $news = News::latest()->get(); 
        return view('admin.berita.index', compact('news'));
    }

    /**
     * FORM TAMBAH BERITA
     */
    public function create() 
    { 
        return view('admin.berita.create'); 
    }

    /**
     * PROSES SIMPAN BERITA BARU
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            // Batas upload ditingkatkan menjadi 5MB sesuai request lu sebelumnya
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        // Simpan gambar ke storage/app/public/berita
        $imagePath = $request->file('image')->store('berita', 'public');

        News::create([
            'title'   => $request->title,
            'content' => $request->content,
            'image'   => $imagePath,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    /**
     * MENAMPILKAN DETAIL BERITA (Fix Error show())
     * Ini fungsi yang lu butuhkan supaya error "undefined method show" hilang.
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('admin.berita.show', compact('news'));
    }

    /**
     * FORM EDIT BERITA
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.berita.edit', compact('news'));
    }

    /**
     * PROSES UPDATE DATA BERITA
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        // Jika ada upload gambar baru, hapus gambar lama dan simpan yang baru
        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $news->image = $request->file('image')->store('berita', 'public');
        }

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $news->image, // Tetap gunakan path gambar (lama atau baru)
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diupdate!');
    }

    public function destroy($id)
    {
        $berita = News::findOrFail($id);
        
        // Hapus file gambar dari folder storage agar tidak menumpuk
        if ($berita->image) {
            Storage::disk('public')->delete($berita->image);
        }
        
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
    
    public function showFront($id)
    {
        $item = News::findOrFail($id);
        return view('berita-detail', compact('item'));
    }
}