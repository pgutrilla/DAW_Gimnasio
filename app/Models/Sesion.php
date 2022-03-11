<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;

    protected $fillable = ['date_start', 'date_end', 'activity_id'];

    public function users() { 
        return $this->belongsToMany(User::class);
    }

    public function activity() { 
        return $this->belongsTo(Activity::class);
    }

    public function hasUser( User $user ) {   
        return $this->users->contains( $user );
    }
}
