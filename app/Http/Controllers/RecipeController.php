<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Models\Category;

class RecipeController extends Controller
{
    public function index(){

        $recipes = Recipe::all();
        $categories = Category::all();


        return view('recipe.index', compact('recipes', 'categories'));
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
        ],
            [
                'title.required' => 'Поле "Название" обязательно для заполнения.',
                'title.max' => 'Поле "Название" не должно превышать 255 символов.',
                'description.max' => 'Поле "Описание" не должно превышать 2255 символов.',
                'ingredients.required' => 'Необходимо добавить хотя бы один ингредиент.',
                'ingredients.array' => 'Ошибка формата ингредиентов.',
                'ingredients.*.name.required' => 'Введите название ингредиента.',
                'ingredients.*.name.max' => 'Название ингредиента не должно превышать 255 символов.',
                'ingredients.*.amount.required' => 'Введите количество ингредиента.',
                'ingredients.*.amount.max' => 'Количество ингредиента не должно превышать 255 символов.',
                'image.image' => 'Загрузите корректное изображение.',
                'image.mimes' => 'Формат изображения должен быть: jpeg, png, jpg, gif, svg.',
                'image.max' => 'Размер изображения не должен превышать 2 МБ.',
                'content.required' => 'Поле "Рецепт" обязательно для заполнения.',
                'category.required' => 'Выберите категорию рецепта.',
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

    public function edit($id){

        $recipe = Recipe::findOrFail($id);
        $ingredients = Ingredient::where('recipe_id', $id)->get();
        $categories = Category::all();
        return view('recipe.edit', ['recipe' => $recipe, 'ingredientsOld' => $ingredients, 'categories' => $categories]);


    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required|max:255|string',
            'description' => 'nullable|max:2255|string',
            'ingredients' => 'required|array',
            'ingredients.*.name' => 'required|string|min:1|max:255',
            'ingredients.*.quantity' => 'required|string|min:1|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
            'category' => 'required',
        ],
            [
                'title.required' => 'Поле "Название" обязательно для заполнения.',
                'title.max' => 'Поле "Название" не должно превышать 255 символов.',
                'description.max' => 'Поле "Описание" не должно превышать 2255 символов.',
                'ingredients.required' => 'Необходимо добавить хотя бы один ингредиент.',
                'ingredients.array' => 'Ошибка формата ингредиентов.',
                'ingredients.*.name.required' => 'Введите название ингредиента.',
                'ingredients.*.name.max' => 'Название ингредиента не должно превышать 255 символов.',
                'ingredients.*.quantity.required' => 'Введите количество ингредиента.',
                'ingredients.*.quantity.max' => 'Количество ингредиента не должно превышать 255 символов.',
                'image.image' => 'Загрузите корректное изображение.',
                'image.mimes' => 'Формат изображения должен быть: jpeg, png, jpg, gif, svg.',
                'image.max' => 'Размер изображения не должен превышать 2 МБ.',
                'content.required' => 'Поле "Рецепт" обязательно для заполнения.',
                'category.required' => 'Выберите категорию рецепта.',
            ]);

        $recipe = Recipe::findOrFail($id);

        // Обновляем изображение, если пользователь загрузил новое
        if (isset($validated['image'])) {
            if ($recipe->image && \Storage::disk('public')->exists($recipe->image)) {
                \Storage::disk('public')->delete($recipe->image);
            }
            $recipe->image = $validated['image']->store('images', 'public');
        }

        $recipe->title = $validated['title'];
        $recipe->description = $validated['description'] ?? null;
        $recipe->content = $validated['content'];
        $recipe->category_id = $validated['category'];
        $recipe->user_id = auth()->id();
        $recipe->save();

        Ingredient::where('recipe_id', $recipe->id)->delete();

       foreach ($validated['ingredients'] as $item) {
           $ingredient = new Ingredient();
           $ingredient->name = $item['name'];
           $ingredient->quantity = $item['quantity'];
           $ingredient->recipe_id = $recipe->id; // связка с рецептом
           $ingredient->save();

       }
        return redirect()->route('recipes.index')->with('success', 'Рецепт изменен!');


    }

    public function destroy($id){
        Recipe::findOrFail($id)->delete();

        return redirect()->route('recipes.index')->with('success', 'Рецепт удален!');
    }

    public function search(Request $request){

        $search = $request->get('search');
        $recipes = Recipe::where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', '%'.$search.'%')->paginate(6);
        $categories = Category::all();

        return view('recipe.search', compact('recipes', 'search', 'categories'));
    }
}
