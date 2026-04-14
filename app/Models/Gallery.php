<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    // Laravel biasanya menganggap tabelnya bernama 'galleries'
    protected $table = 'galleries';

    protected $fillable = ['title', 'image', 'description'];
}