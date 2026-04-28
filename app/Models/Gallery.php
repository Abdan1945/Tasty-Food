<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    // Nama kolom harus persis dengan yang ada di HeidiSQL lu tadi
    protected $fillable = [
        'title',
        'category',
        'image',
        'description',
    ];
}