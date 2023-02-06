<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaOrder extends Model
{    
    
    protected $table = 'pizza_orders';
    protected $fillable = [
        'first_name', 'last_name', 'adress', 'postal_code', 'city', 'pizza', 'status', 'delivery_date'
    ];
}
