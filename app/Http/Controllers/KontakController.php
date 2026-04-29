<?php

namespace App\Http\Controllers;

use App\Models\Kontak; // Pastikan pakai model Kontak
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Tampilkan halaman form kontak (Ini yang tadi hilang bro)
     */
    public function index()
    {
        return view('kontak'); // Pastikan kamu punya file resources/views/kontak.blade.php
    }

    /**
     * Store a newly created contact message in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan data ke tabel 'kontak'
        Kontak::create($request->all());

        return back()->with('success', 'Pesan anda telah terkirim terima kasih sudah kasih masukan ke website kami!');
    }

    /**
     * Display a listing of messages for admin.
     */
    public function adminIndex()
    {
        $messages = Kontak::latest()->paginate(10);
        return view('admin.kontak.index', compact('messages'));
    }

    /**
     * Remove the specified contact message from storage.
     */
    public function destroy($id)
    {
        $contact = Kontak::findOrFail($id);
        $contact->delete();
        
        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}