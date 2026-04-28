<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    // Halaman Galeri untuk Pengunjung
    public function publicIndex()
    {
        $galleries = Gallery::latest()->get();
        return view('galeri', compact('galleries'));
    }

    // List Galeri di Dashboard Admin
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string', 
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'description' => 'nullable|string',
        ]);

        $nama_gambar = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Format: timestamp_judul-slug.ext
            $nama_gambar = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/gallery'), $nama_gambar);
        }

        Gallery::create([
            'title'       => $request->title,
            'category'    => $request->category,
            'image'       => $nama_gambar,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil diunggah!');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        
        $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'category', 'description']);

        if ($request->hasFile('image')) {
            // Hapus file lama jika user ganti gambar
            if ($gallery->image && File::exists(public_path('images/gallery/' . $gallery->image))) {
                File::delete(public_path('images/gallery/' . $gallery->image));
            }
            
            $file = $request->file('image');
            $nama_gambar = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/gallery'), $nama_gambar);
            $data['image'] = $nama_gambar;
        }

        $gallery->update($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Galeri diperbarui!');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        
        if ($gallery->image && File::exists(public_path('images/gallery/' . $gallery->image))) {
            File::delete(public_path('images/gallery/' . $gallery->image));
        }
        
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Foto dihapus!');
    }

    // --- LOGIN GOOGLE ---
    public function redirectToGoogle() { return Socialite::driver('google')->redirect(); }

    public function handleGoogleCallback() 
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('email', $user->email)->first();
            
            if($findUser){
                Auth::login($findUser);
                return redirect()->route('dashboard');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt(Str::random(16))
                ]);
                Auth::login($newUser);
                return redirect()->route('dashboard');
            }
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Gagal login Google');
        }
    }

    // --- AUTO FILL DATABASE ---
    public function initStatic()
    {
        $staticImages = [
            ['title' => 'Kuliner 1', 'image' => 'img-1.png'],
            ['title' => 'Kuliner 2', 'image' => 'gambar20.jpg'],
            ['title' => 'Kuliner 3', 'image' => 'gambar21.jpg'],
            ['title' => 'Kuliner 4', 'image' => 'gambar22.jpg'],
            ['title' => 'Kuliner 5', 'image' => 'gambar12.jpg'],
            ['title' => 'Kuliner 6', 'image' => 'gambar14.jpg'],
            ['title' => 'Kuliner 7', 'image' => 'gambar7.jpg'],
            ['title' => 'Kuliner 8', 'image' => 'gambar10.jpg'],
        ];

        foreach ($staticImages as $data) {
            Gallery::firstOrCreate(
                ['image' => $data['image']], 
                [
                    'title' => $data['title'], 
                    'category' => 'Kuliner', 
                    'description' => 'Menu andalan Tasty Food.'
                ]
            );
        }

        return redirect()->back()->with('success', 'Data galeri berhasil diinisialisasi!');
    }
}