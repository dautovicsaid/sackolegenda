<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipkorisnika extends Model
{
    use HasFactory;
    public function korisnik(){
        return $this->hasMany(Korisnik::class);
    }
}
