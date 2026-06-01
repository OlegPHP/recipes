<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Ingredient;
use Illuminate\Support\Str;

class Recipe extends Model
{
    protected $fillable = [
        'user_id',
        'сategory_id',
        'title',
        'slug',
        'description',
        'content',
        'image',
            ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function ingredients(){
        return $this->hasMany(Ingredient::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted()
    {
        static::creating(function ($recipe) {
            $slug = Str::slug($recipe->title);

            $count = static::where('slug', 'like', "{$slug}%")->count();

            $recipe->slug = $count ? "{$slug}-{$count}" : $slug;

        });

    }

}
