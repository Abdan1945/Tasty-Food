<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // Nama tabel di database (Laravel biasanya otomatis menganggap 'news')
    protected $table = 'news';

    // Kolom apa saja yang boleh diisi (sesuaikan dengan migration kamu nanti)
    protected $fillable = ['title', 'content', 'image'];
}