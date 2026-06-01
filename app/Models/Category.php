<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class Category extends Model
{
    protected $fillable = [
                'title',
                'slug',

    ];

    public function recipes(){
        return $this->hasMany(Recipe::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
