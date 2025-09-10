<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Recipe extends Model
{
    protected $fillable = [
        'user_id',
        'сategory_id',
        'title',
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
}
