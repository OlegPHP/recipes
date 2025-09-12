<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'recipe_id',

    ];

    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }



}
