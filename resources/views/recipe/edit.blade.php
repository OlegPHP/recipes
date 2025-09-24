@extends(auth()->check() ? 'layouts.app' : 'layouts.user')

@section('title', 'Изменить рецепт' )

@section('content')
    @php
                /** @var \Illuminate\Support\Collection|\App\Models\Ingredient[] $ingredientsOld */
            @endphp
    <div class="max-w-4xl mx-auto p-6 bg-gray-900 text-gray-200 space-y-6">

        <h1 class="text-3xl font-bold mb-4">Редактировать рецепт</h1>

        <form action="{{ route('recipes.update', ['recipe'=>$recipe->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @method('PATCH')
            @csrf

            {{-- Название --}}
            <div>
                <x-input-label for="title" :value="__('Название')" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                              :value="old('title', $recipe->title)" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            {{-- Категория --}}
            <div>
                <x-input-label for="category" :value="__('Категория')" />
                <select id="category" name="category"
                        class="block mt-1 w-full rounded border px-2 py-1 bg-gray-800 text-gray-200">
                    <option value="">Выберите категорию</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category', $recipe->category_id) == $category->id)>{{ $category->title }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>

            {{-- Описание --}}
            <div>
                <x-input-label for="description" :value="__('Описание')" />
                <textarea id="description" name="description"
                          class="mt-1 block w-full rounded border px-2 py-1 bg-gray-800 text-gray-200"
                          rows="3">{{ old('description', $recipe->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>


            {{-- Ингредиенты --}}
            <div>
                <x-input-label :value="__('Ингредиенты')" />
                <div id="ingredients-wrapper" class="space-y-2">
                    @php
                        // Берём старые значения из old() или из базы


$oldIngredients = old('ingredients', $ingredientsOld->toArray());
                    @endphp

                    @foreach($oldIngredients as $index => $ingredient)
                        <div class="flex space-x-2 items-center ingredient">
                            <input type="text"
                                   name="ingredients[{{ $index }}][name]"
                                   value="{{ $ingredient['name'] ?? '' }}"
                                   placeholder="Название"
                                   class="border rounded px-2 py-1 w-1/2 bg-gray-800 text-gray-200">

                            <input type="text"
                                   name="ingredients[{{ $index }}][quantity]"
                                   value="{{ $ingredient['quantity'] ?? '' }}"
                                   placeholder="Количество"
                                   class="border rounded px-2 py-1 w-1/4 bg-gray-800 text-gray-200">

                            <button type="button"
                                    class="bg-red-600 text-white px-2 py-1 rounded remove-ingredient">×</button>
                        </div>

                        @error("ingredients.$index.name")
                        <div class="text-red-500 text-sm ml-1">{{ $message }}</div>
                        @enderror
                        @error("ingredients.$index.quantity")
                        <div class="text-red-500 text-sm ml-1">{{ $message }}</div>
                        @enderror
                    @endforeach
                </div>

                <button type="button" id="add-ingredient"
                        class="mt-2 bg-green-600 text-white px-4 py-1 rounded">Добавить ингредиент
                </button>
            </div>

            {{-- Контент / рецепт --}}
            <div>
                <x-input-label for="content" :value="__('Рецепт')" />
                <textarea id="content" name="content"
                          class="mt-1 block w-full rounded border px-2 py-1 bg-gray-800 text-gray-200"
                          rows="6">{{ old('content', $recipe->content) }}</textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>

            {{-- Картинка --}}
            <div>
                <x-input-label for="image" :value="__('Фото')" />
                <x-text-input id="image" type="file" name="image" class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            {{-- Кнопка --}}
            <div>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Сохранить рецепт</button>
            </div>
        </form>
    </div>


    {{-- Скрипт для динамических ингредиентов --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const wrapper = document.getElementById('ingredients-wrapper');
            const addBtn = document.getElementById('add-ingredient');

            function reindexIngredients() {
                wrapper.querySelectorAll('.ingredient').forEach((row, index) => {
                    row.querySelectorAll('input').forEach(input => {
                        if (input.placeholder === 'Название') input.name = `ingredients[${index}][name]`;
                        if (input.placeholder === 'Количество') input.name = `ingredients[${index}][quantity]`;
                    });
                });
            }

            addBtn.addEventListener('click', () => {
                const newRow = document.createElement('div');
                newRow.className = 'flex space-x-2 items-center ingredient';
                newRow.innerHTML = `
            <input type="text" name="ingredients[][name]" placeholder="Название"
                   class="border rounded px-2 py-1 w-1/2 bg-gray-800 text-gray-200">
            <input type="text" name="ingredients[][quantity]" placeholder="Количество"
                   class="border rounded px-2 py-1 w-1/4 bg-gray-800 text-gray-200">
            <button type="button" class="bg-red-600 text-white px-2 py-1 rounded remove-ingredient">×</button>
        `;
                wrapper.appendChild(newRow);
                reindexIngredients();
            });

            wrapper.addEventListener('click', e => {
                if (e.target.classList.contains('remove-ingredient')) {
                    e.target.closest('.ingredient').remove();
                    reindexIngredients();
                }
            });

            reindexIngredients();
        });
    </script>
@endsection
