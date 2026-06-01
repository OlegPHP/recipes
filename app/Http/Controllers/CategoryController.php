<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category){
        $categories = Category::all();

        $title = $category->title;
        $recipes = $category->recipes()->paginate(6);
        return view('category.show', compact('categories','recipes', 'title'));
    }
}
