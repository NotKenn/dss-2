<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;

    public $table = 'result';
    protected $fillable = [
        'jurusan',
        'c1normal',
        'c2normal',
        'c3normal',
        'c4normal',
        'c5normal',
        'c6normal',
        'total',
        'ranking'
    ];
    public $timestamps = false;
}
