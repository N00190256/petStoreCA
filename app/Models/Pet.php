<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Defining what is authorised to be mass assignable and what should be hidden
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class Pet extends Model
{
    use HasFactory;
    protected $fillable = ['id','species', 'breed', 'description', 'name', 'age', 'customer_id'];
    // protected $guarded = [];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function caretakers()
    {
        return $this->belongstoMany(Caretaker::class)->withTimestamps();
    }
}
