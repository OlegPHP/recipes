@extends(auth()->check() ? 'layouts.app' : 'layouts.user')

@section('content')
    {{-- Навигация категорий --}}
    <nav class="max-w-4xl mx-auto p-6 bg-gray-900 text-gray-200">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            @foreach($categories as $category)
                <a href="{{ route('categories.show', ['category'=>$category->id]) }}"
                   class="flex items-center justify-center text-center px-4 py-2 rounded-xl
                          transition-colors duration-300 shadow-sm text-sm font-medium
                          @if(request()->routeIs('categories.show') && request()->category == $category->id)
                              bg-indigo-600 text-white
                          @else
                              bg-gray-800 text-gray-200 hover:bg-indigo-600 hover:text-white
                          @endif">
                    <span class="whitespace-normal break-words">{{ $category->title }}</span>
                </a>
            @endforeach
        </div>
    </nav>

    {{-- Сетка рецептов --}}
    <div class="max-w-6xl mx-auto p-6 space-y-6">
        @if($recipes->isEmpty())
            <p class="text-gray-400 text-center mt-10">Рецептов в этой категории пока нет.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($recipes as $recipe)
                    <a href="{{ route('recipes.show', ['recipe'=>$recipe->id]) }}"
                       class="block bg-gray-800 rounded-xl overflow-hidden shadow-lg
          hover:shadow-2xl hover:scale-105 transition-transform transition-shadow duration-300">

                        @if($recipe->image)
                            <img src="{{ asset('storage/' . $recipe->image) }}"
                                 alt="{{ $recipe->title }}"
                                 class="w-full h-40 object-cover">
                        @else
                            <div class="w-full h-40 bg-gray-700 flex items-center justify-center text-gray-400">
                                <img src="{{ asset('storage/images/def.png') }}"
                                     alt="'Нет изображения'"
                                     class="w-full h-40 object-cover">
                            </div>
                        @endif

                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-100 mb-2">{{ $recipe->title }}</h2>
                            <p class="text-gray-400 text-sm line-clamp-3">{{ $recipe->description }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
    {{ $recipes->links() }}

@endsection
