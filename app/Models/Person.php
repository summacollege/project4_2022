<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public function pizzaPoint()
    {
        return $this->hasMany(PizzaPoint::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
