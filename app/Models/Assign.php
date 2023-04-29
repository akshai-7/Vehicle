<?php

namespace App\Models;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    use HasFactory;

    public function report()
    {
        return $this->hasMany(Report::class, 'assign_id');
    }

    public function inspection()
    {
        return $this->hasMany(Inspection::class, 'assign_id');
    }
}
