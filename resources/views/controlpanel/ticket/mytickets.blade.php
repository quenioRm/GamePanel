@extends('controlpanel.layout.main')

@section('title', __('messages.myTickets'))

@section('controlPalnel')
<article class="content logging">
    <h2 class="line">Histórico de Login</h2>
    <div class="search_date_wrap">
            <div class="search_title">
                <ul class="bullet_list fs15"></ul>
            </div>
            <div id="divLoggingListArea">
                <div class="mylog_history_result search_result">
                    @yield('acountIpPaginate')
                </div>
                <div class="paging">
                    <div class="js-pagination inline">
                        <div class="common_paging js-paging">
                            {{-- @foreach ($items['links'] as $link)
                                @if ($link['label'] == "&laquo; Anterior")
                                    @if ($items['current_page'] > 1)
                                        <a href="{{$items['prev_page_url']}}" class="link_item box pi_wrap">
                                            <i class="pi pi_arrowPrev left"></i>
                                            <span class="blind">Prev</span>
                                        </a>
                                    @endif
                                @elseif($link['label'] == "Próximo &raquo;")
                                    <a href="{{$items['next_page_url']}}" class="link_item box pi_wrap">
                                        <i class="pi pi_arrowNext right"></i>
                                        <span class="blind">Next</span>
                                    </a>
                                @else --}}
                                    {{-- <button type="button"  data-page="{{$link['label']}}">{{$link['label']}}</button>     --}}
                                    {{-- <a class="link_item {{($items['current_page'] == $link['label'] ? 'active' : '')}}"
                                    href="{{$link['url']}}">{{$link['label']}}</a> --}}
                                {{-- @endif
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
    </div>
</article>
@endsection
@push('scripts')

@endpush
