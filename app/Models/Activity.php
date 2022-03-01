<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sesion;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'max_participant', 'duration'];

    public function sesions() {
        return $this->hasMany(Sesion::class);
    }
}
