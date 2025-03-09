@if ($paginator->hasPages())
<nav>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span class="page-link" aria-hidden="true">&lsaquo;</span>
        </li>
        @else
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                aria-label="@lang('pagination.previous')">&lsaquo;</a>
        </li>
        @endif

        {{-- ページ番号を5つまで表示 --}}
        @foreach ($elements as $element)
        @if (is_array($element))
        @php
        $totalPages = count($element);
        $currentPage = $paginator->currentPage();
        $startPage = max(1, $currentPage - 2); // 現在のページを中心に5ページ表示
        $endPage = min($paginator->lastPage(), $startPage + 4);
        @endphp

        @foreach ($element as $page => $url)
        @if ($page >= $startPage && $page <= $endPage) @if ($page==$paginator->currentPage())
            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endif
            @endforeach
            @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">›</a>
            </li>
            @else
            <li class="page-item disabled"><span class="page-link">›</span></li>
            @endif
    </ul>
</nav>
@endif