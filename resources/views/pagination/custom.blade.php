@if ($paginator->hasPages())
<nav aria-label="Navigation de pagination" role="navigation">
    <div class="flex items-center justify-center space-x-1">
       
        {{-- Bouton Précédent --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Précédent</span>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" 
               rel="prev"
               class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-blue-600 transition-colors duration-200 shadow-sm">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Précédent</span>
            </a>
        @endif

        {{-- Numéros de page --}}
        @foreach ($elements as $element)
           
            {{-- Séparateur "..." --}}
            @if (is_string($element))
                <span class="px-4 py-2 text-gray-500 bg-white border border-gray-300 rounded-lg cursor-default">
                    {{ $element }}
                </span>
            @endif

            {{-- Liens de page --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 text-white bg-blue-600 border border-blue-600 rounded-lg font-semibold shadow-md">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" 
                           class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-blue-50 hover:text-blue-600 hover:border-blue-300 transition-colors duration-200 shadow-sm">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Bouton Suivant --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" 
               rel="next"
               class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-blue-600 transition-colors duration-200 shadow-sm">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Suivant</span>
            </a>
        @else
            <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Suivant</span>
            </span>
        @endif
    </div>
</nav>
@endif 