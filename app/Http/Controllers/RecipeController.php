<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Models\Category;

class RecipeController extends Controller
{
    public function index(){
        return view('recipe.index');
    }
    public function create()
    {

        $categories = Category::all();
        return view('recipe.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:255|string',
            'description' => 'nullable|max:2255|string',
            'ingredients' => 'required|array',
            'ingredients.*.name' => 'required|string|min:1|max:255',
            'ingredients.*.amount' => 'required|string|min:1|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
            'category' => 'required',
        ]);

        $path = null;

        if (isset($validated['image'])) {
            $path = $validated['image']->store('images', 'public');
        }
        $recipe = new Recipe();
        $recipe->title = $validated['title'];
        $recipe->description = $validated['description'] ?? null;
        $recipe->image = $path;
        $recipe->content = $validated['content'];
        $recipe->user_id = auth()->id();
        $recipe->category_id = $validated['category'];

        $recipe->save();



        foreach ($validated['ingredients'] as $item) {
            $ingredient = new Ingredient();
            $ingredient->name = $item['name'];
            $ingredient->quantity = $item['amount'];
            $ingredient->recipe_id = $recipe->id; // связка с рецептом
            $ingredient->save();
        }
        return redirect()->route('recipes.index')->with('success', 'Рецепт добавлен!');

    }

    public function show($id){
        $recipe = Recipe::findOrFail($id);
        $ingredients = Ingredient::where('recipe_id', $id)->get();
        return view('recipe.show', ['recipe' => $recipe, 'ingredients' => $ingredients]);
    }
}
