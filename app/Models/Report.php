<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'assign_id',
        'date',
        'location',
        'witnessed_by',
        'mobile',
        'statement',
        'image'
    ];
}
