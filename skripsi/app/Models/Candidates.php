<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
    use HasFactory;

    public $table = 'candidates';
    protected $fillable = [
        'namaKandidat',
        'c1raw',
        'c2raw',
        'c3raw',
        'c4raw',
        'c5raw',
        'c6raw'
    ];
    public $timestamps = false;

    protected static function autoDelete()
    {
        static::deleting(function ($candidate) {
            // Hapus data dari tabel 'results' yang terkait
            Results::where('jurusan', $candidate->namaKandidat)->delete();
        });
    }
}
