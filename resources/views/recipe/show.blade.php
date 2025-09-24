@extends(auth()->check() ? 'layouts.app' : 'layouts.user')

@section('title', $recipe->title)

@section('content')
    <div class="bg-gray-900 text-gray-200 min-h-screen flex justify-center p-6 text-lg">
        <div class="w-full max-w-4xl space-y-6">

            {{-- Заголовок --}}
            <h1 class="text-4xl font-bold">{{ $recipe->title }}</h1>

            {{-- Категория --}}
            @if($recipe->category)
                <p class="text-gray-400">Категория: {{ $recipe->category->title }}</p>
            @endif

            {{-- Изображение --}}
            <div class="my-4 w-full flex justify-center">
                @php
                    $imagePath = $recipe->image ? 'storage/' . $recipe->image : 'storage/images/default.png';
                    $imageAlt = $recipe->image ? $recipe->title : 'Нет изображения';
                @endphp
                <img src="{{ asset($imagePath) }}"
                     alt="{{ $imageAlt }}"
                     class="max-w-full h-auto rounded-lg shadow mx-auto">
            </div>

            {{-- Описание --}}
            @if($recipe->description)
                <p class="text-gray-300 break-words leading-relaxed">{{ $recipe->description }}</p>
            @endif

            {{-- Ингредиенты --}}
            @if($ingredients->count())
                <div>
                    <h2 class="text-2xl font-semibold mb-2">Ингредиенты:</h2>
                    <ul class="list-disc pl-6">
                        @foreach($ingredients as $ingredient)
                            <li>{{ $ingredient->name }} — {{ $ingredient->quantity }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Приготовление --}}
            <div>
                <h2 class="text-2xl font-semibold mb-2">Приготовление:</h2>
                @foreach(preg_split('/\r\n|\r|\n/', $recipe->content, -1, PREG_SPLIT_NO_EMPTY) as $line)
                    <p class="break-words leading-relaxed mb-4">{{ $line }}</p>
                    <hr class="border-gray-700 mb-4">
                @endforeach
            </div>

            {{-- Кнопки редактирования и удаления (для авторизованных) --}}
            @auth
                <div class="mt-6 flex space-x-2">
                    <a href="{{ route('recipes.edit', $recipe->id) }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Редактировать</a>

                    <form method="POST" action="{{ route('recipes.destroy', $recipe->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                                onclick="return confirm('Вы уверены, что хотите удалить этот рецепт?')">Удалить</button>
                    </form>
                </div>
            @endauth

        </div>
    </div>
@endsection
