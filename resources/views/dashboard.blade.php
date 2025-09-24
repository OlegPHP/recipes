@extends(auth()->check() ? 'layouts.app' : 'layouts.user')

@section('title', 'Admin Page' )

@section('content')

        <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
            {{ __('👑 Admin Page') }}
        </h2>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 shadow-sm sm:rounded-lg p-8">
                <h3 class="text-lg font-semibold text-gray-200 mb-6">
                    Время работать с рецептами 🔥
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <!-- Главная -->
                    <a href="{{ route('recipes.index') }}"
                       class="flex flex-col items-center justify-center p-6 rounded-xl
                              bg-gray-800 text-gray-200 shadow-md
                              hover:bg-indigo-600 hover:text-white hover:scale-105
                              transition-transform duration-300 ease-in-out">
                        <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m-4 4h12a2 2 0 002-2v-8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        <span class="font-medium">Главная</span>
                    </a>

                    <!-- Добавить рецепт -->
                    <a href="{{ route('recipes.create') }}"
                       class="flex flex-col items-center justify-center p-6 rounded-xl
                              bg-gray-800 text-gray-200 shadow-md
                              hover:bg-green-600 hover:text-white hover:scale-105
                              transition-transform duration-300 ease-in-out">
                        <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4v16m8-8H4"/>
                        </svg>
                        <span class="font-medium">Добавить рецепт</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
