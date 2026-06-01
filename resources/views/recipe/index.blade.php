@extends(auth()->check() ? 'layouts.app' : 'layouts.user')

@section('title', 'Все рецепты — Сайт рецептов')

@section('content')
    <nav class="max-w-4xl mx-auto p-6 bg-gray-900 text-gray-200">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            @foreach($categories as $category)
                <a href="{{ route('categories.show', $category) }}"
                   class="flex items-center justify-center text-center px-4 py-2 rounded-xl
                          transition-colors duration-300 shadow-sm text-sm font-medium
                          @if(request()->route('category')?->is($category))
                              bg-indigo-600 text-white
                          @else
                              bg-gray-800 text-gray-200 hover:bg-indigo-600 hover:text-white
                          @endif">
                    <span class="whitespace-normal break-words">{{ $category->title }}</span>
                </a>
            @endforeach
        </div>
    </nav>

    <div class="max-w-4xl mx-auto p-6 text-center">
        <h1 class="text-2xl font-bold text-gray-100 mb-2">
            Добро пожаловать на наш сайт рецептов!
        </h1>
        <p class="text-gray-300">
            Исследуй, находи и делись вкусными рецептами!
        </p>
    </div>

    <form action="{{ route('recipes.search') }}" method="GET" class="flex justify-center mb-6">
        <input type="text" name="search"
               placeholder="Искать рецепт..."
               class="w-full sm:w-2/3 px-4 py-2 rounded-l-lg border border-gray-700 bg-gray-100 text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-r-lg hover:bg-indigo-700">
            🔍
        </button>
    </form>

    <div class="max-w-4xl mx-auto p-6">
        @if(session('success'))
            <div
                x-data="{ show: true }"
                x-show="show"
                x-transition
                class="flex items-center justify-between p-4 mb-6 text-sm text-green-200 bg-green-800 rounded-lg shadow-md"
            >
                <div class="flex items-center space-x-2">
                    <!-- Галочка -->
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
                <!-- Кнопка закрытия -->
                <button @click="show = false" class="ml-2 text-green-300 hover:text-green-100">
                    ✕
                </button>
            </div>
        @endif
    </div>
@endsection
