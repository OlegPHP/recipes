<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id){
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $recipes = $category->recipes;
        return view('category.show', ['recipes' => $recipes, 'categories' => $categories]);
    }
}
