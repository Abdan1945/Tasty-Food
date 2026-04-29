<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    // Pakai 'kontak' karena di migration kamu Schema::create('kontak')
    protected $table = 'kontak'; 

    // Sesuaikan dengan kolom di migration (pakai 'name', bukan 'nama')
    protected $fillable = ['name', 'email', 'subject', 'message', 'is_read'];
}