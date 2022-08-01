<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    public function restaurantCategory(){
        return $this->belongsTo(RestaurantCategory::class);
    }
}
