@if ($paginator->hasPages())

    <a class="flex-box pagination-item" href="{{ $paginator->previousPageUrl() }}">
        <div class="flex-box">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 16L10 12L14 8" stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"/>
            </svg>
        </div>
    </a>

    @foreach ($elements as $element)

        @if (is_array($element))
            @foreach ($element as $page => $url)
                <a class="flex-box pagination-item @if($page == $paginator->currentPage()) active @endif"
                   href="{{ $url }}">
                    <div class="flex-box">
                        {{ fa_number($page) }}
                    </div>
                </a>

            @endforeach
        @endif
    @endforeach

    <a class="last-child flex-box pagination-item" href="{{ $paginator->nextPageUrl() }}">
        <div class="flex-box">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 16L10 12L14 8" stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"/>
            </svg>
        </div>
    </a>

@endif
