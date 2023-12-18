<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mealplan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function meals()
    {
        return $this->belongsToMany(Meal::class);
    }
    public function customers()

    {

        return $this->belongsToMany(Customer::class, 'customer_mealplan');

    }
}
