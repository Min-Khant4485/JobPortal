<nav class="mt-6">
    <ul class="flex items-center justify-center">
        @if ($paginator->onFirstPage())            
        @else
            <li class="mr-1">
                <a href="{{ $paginator->previousPageUrl() }}" class="block py-2 px-3 bg-orange-200 text-gray-700 rounded-md hover:bg-orange-400 focus:outline-none focus:shadow-outline-blue active:bg-orange-600">
                    Previous
                </a>
            </li>
        @endif

        @php
            $currentPage = $paginator->currentPage();
            $lastPage = $paginator->lastPage();
            $maxPagesToShow = 10; // Adjust this to show the desired number pages
            $startPage = max(1, $currentPage - floor($maxPagesToShow / 2));
            $endPage = min($lastPage, $startPage + $maxPagesToShow - 1);
        @endphp

        @foreach (range($startPage, $endPage) as $page)
            <li class="mx-1">
                <a href="{{ $paginator->url($page) }}" class="block py-2 px-3 
                    @if ($page == $currentPage)
                        bg-orange-200 text-gray-700 rounded-md
                    @else
                        bg-gray-300 text-black rounded-md hover:bg-orange-400 focus:outline-none focus:shadow-outline-blue active:bg-orange-600
                    @endif
                ">
                    {{ $page }}
                </a>
            </li>
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="ml-1">
                <a href="{{ $paginator->nextPageUrl() }}" class="block py-2 px-3 bg-orange-200 text-gray-700 rounded-md hover:bg-orange-400 focus:outline-none focus:shadow-outline-blue active:bg-orange-600">
                    Next
                </a>
            </li>
        @endif
    </ul>
</nav>