<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visual extends Model
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
    public function inspection()
    {
        return $this->belongsTo(Inspection::class, 'id');
    }
}
