<x-guest-layout>
    <form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">

    @csrf

<div>
    <x-input-label for="title" :value="__('Название')" />
    <x-text-input id="title" type="text" name="title" class="block mt-1 w-full" required />
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="description" :value="__('Описание')" />
    <textarea id="description" name="description" class="block mt-1 w-full"></textarea>
</div>

        <div class="mt-4">
            <x-input-label for="image" :value="__('Фото рецепта')" />
            <x-text-input id="image" type="file" name="image" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

<div class="mt-4">
    <x-input-label for="content" :value="__('Рецепт')" />
    <textarea id="content" name="content" class="block mt-1 w-full"></textarea>
</div>

<div id="ingredients-wrapper" class="mt-4">
    <x-input-label :value="__('Ингредиенты')" />

    <div class="ingredient flex gap-2 mt-2">
        <input type="text" name="ingredients[0][name]" placeholder="Название" class="border rounded p-2 w-1/2">
        <input type="text" name="ingredients[0][amount]" placeholder="Количество" class="border rounded p-2 w-1/2">
    </div>
</div>

<button type="button" id="add-ingredient" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">
    Добавить ингредиент
</button>
<br>
        <br>
        <br>
<script>
    document.getElementById('add-ingredient').addEventListener('click', function () {
        let wrapper = document.getElementById('ingredients-wrapper');
        let index = wrapper.querySelectorAll('.ingredient').length;

        let div = document.createElement('div');
        div.classList.add('ingredient', 'flex', 'gap-2', 'mt-2');

        div.innerHTML = `
        <input type="text" name="ingredients[${index}][name]" placeholder="Название" class="border rounded p-2 w-1/2">
        <input type="text" name="ingredients[${index}][amount]" placeholder="Количество" class="border rounded p-2 w-1/2">
    `;

        wrapper.appendChild(div);
    });
</script>
        <x-primary-button class="ms-4">
            {{ __('Добавить рецепт') }}
        </x-primary-button>
    </form>
</x-guest-layout>
