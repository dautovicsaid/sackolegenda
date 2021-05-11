<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korisnik extends Model
{
    use HasFactory;
    public function tipkorisika(){
        return $this->belongsTo(Tipkorisnika::class);
    }
}
