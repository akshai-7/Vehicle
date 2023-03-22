<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function assign()
    {
        return $this->belongsTo(Assign::class, 'assign_id');
    }

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
