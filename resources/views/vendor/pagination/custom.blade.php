@if ($paginator->hasPages())
        <nav>
            <ul class="pagination pagination-style-one justify-content-center pt-30">


                    @if ($paginator->onFirstPage())
                    <li class="page-item page-arrow disabled"><a class="page-link" href="javascript:void(0)"><i class="las la-angle-double-left"></i></a></li>
                @else
                    <li class="page-item page-arrow"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="las la-angle-double-left"></i></a></li>
                @endif


                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active disabled"><a class="page-link" href="javascript:void(0)">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach


                        @if ($paginator->hasMorePages())
                        <li class="page-item page-arrow"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="las la-angle-double-right"></i></a></li>
                        @else
                            <li class="page-item page-arrow disabled"><a class="page-link" href="javascript:void(0)"><i class="las la-angle-double-right"></i></a></li>
                        @endif
                    </ul>
                </nav>
@endif
