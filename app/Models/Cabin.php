<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabin extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_id',
        'view',
        'image',
        'feedback',
        'action',
        'notes'
    ];
}
