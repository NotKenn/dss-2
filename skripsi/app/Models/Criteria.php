<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    public $table = 'criteria';
    protected $fillable = [
        'code',
        'criteria',
        'weight',
        'type',
        'status'
    ];
    public $timestamps = false;
}
