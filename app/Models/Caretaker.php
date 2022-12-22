<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caretaker extends Model
{
    use HasFactory;

    public function pets()
    {
        return $this->belongstoMany(Pet::class)->withTimestamps();
    }
}
