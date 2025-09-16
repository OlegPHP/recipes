<x-app-layout>
    <div class="bg-gray-900 text-gray-200 min-h-screen flex justify-center p-6 text-lg">
        <div class="w-full max-w-4xl space-y-6">

            {{-- Заголовок --}}
            <h1 class="text-4xl font-bold">{{ $recipe->title }}</h1>

            {{-- Категория --}}
            @if($recipe->category)
                <p class="text-gray-400">Категория: {{ $recipe->category->title }}</p>
            @endif

            {{-- Изображение --}}
            @if($recipe->image)
                <div class="my-4 w-full flex justify-start sm:justify-start">
                    <img src="{{ asset('storage/' . $recipe->image) }}"
                         alt="{{ $recipe->title }}"
                         class="w-full sm:max-w-prose rounded-lg shadow mx-auto sm:mx-0">
                </div>
            @else
                <div class="my-4 w-full flex justify-center">
                    <img src="{{ asset('images/default.png') }}"
                         alt="Нет изображения"
                         class="w-full sm:max-w-prose rounded-lg shadow mx-auto sm:mx-0">
                </div>
            @endif

            {{-- Описание --}}
            @if($recipe->description)
                <p class="text-gray-300 break-words">{{ $recipe->description }}</p>
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
                <p class="whitespace-pre-line break-words">{{ $recipe->content }}</p>
            </div>

        </div>
    </div>
</x-app-layout>
