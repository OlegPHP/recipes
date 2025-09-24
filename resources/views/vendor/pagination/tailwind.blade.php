@if ($paginator->hasPages())
    <div class="flex items-center justify-between px-4 sm:px-0">
        <!-- Показано с ... по ... -->
        <div class="text-sm text-gray-500 dark:text-gray-400">
            Показано с {{ $paginator->firstItem() }} по {{ $paginator->lastItem() }} из {{ $paginator->total() }}
        </div>

        <!-- Нумерация страниц -->
        <div>
            <span class="relative z-0 inline-flex rounded-md shadow-sm">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center px-2 py-1 text-sm font-medium text-gray-400 bg-gray-700 rounded-l-md cursor-not-allowed">&laquo;</span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-1 text-sm font-medium text-gray-200 bg-gray-800 rounded-l-md hover:bg-indigo-600 hover:text-white transition-colors">&laquo;</a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-400 bg-gray-700">{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page" class="relative inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-indigo-600 border border-indigo-600 rounded-md">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-200 bg-gray-800 border border-gray-700 rounded-md hover:bg-indigo-600 hover:text-white transition-colors">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-1 text-sm font-medium text-gray-200 bg-gray-800 rounded-r-md hover:bg-indigo-600 hover:text-white transition-colors">&raquo;</a>
                @else
                    <span class="relative inline-flex items-center px-2 py-1 text-sm font-medium text-gray-400 bg-gray-700 rounded-r-md cursor-not-allowed">&raquo;</span>
                @endif
            </span>
        </div>
    </div>
@endif
