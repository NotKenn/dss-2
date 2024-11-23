<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriaDetail extends Model
{
    use HasFactory;
    public $table = 'criteriadetail';
    protected $fillable = [
        'code',
        'criteria',
        'category',
        'value',
        'status'
    ];
    public $timestamps = false;
}
