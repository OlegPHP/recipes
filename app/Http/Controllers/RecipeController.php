<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class RecipeController extends Controller
{
    public function create(){

        $categories = Category::all();
        return view('recipe.create',['categories'=>$categories]);
    }
}
