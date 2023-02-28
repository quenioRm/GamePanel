@extends('controlpanel.layout.main') @section('title', __('messages.controlPanelAccountInfo')) @push('styles')
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/shop.css') }}" />
@endpush @section('controlPalnel') <h2 class="line no_margin account_main_page_title">
    {{ __('messages.controlPanelAccountInfo') }}</h2>
<div class="account_main">
    <div class="deshboard">
        <ul>
            @foreach ($categories as $category)
                <li class="item js-playingBdo" id="visible">
                    <dd class="subitem" style="width: 200px; padding:2px">
                        <a href="{{ route('controlpanel.accountprofileinfo') }}" class="arrow btn_normal">
                            <span>{{ $category['name'] }}</span>
                        </a>
                    </dd>
                    @foreach ($category['shop_sub_category'] as $subategory)
                        <ul class="bdo_slider owl-carousel js-bdoSliderWrap no_slide" id="hidden">
                            <li class="item js-playingBdo">
                                <dd class="subitem" style="width: 200px; position:relative; left:20px; padding:2px">
                                    <a href="{{ route('controlpanel.accountprofileinfo') }}" class="arrow btn_normal">
                                        <span>{{ $subategory['name'] }}</span>
                                    </a>
                                </dd>
                            </li>
                        </ul>
                    @endforeach
                </li>
            @endforeach
        </ul>
        <div id="divLoggingListArea">
            <div class="mylog_history_result search_result"> @yield('shopitem') </div>
            <div class="paging" style="position: relative; top:10px">
                <div class="js-pagination inline">
                    <div class="common_paging js-paging">
                        @foreach ($items['links'] as $link)
                            @if ($link['label'] == '&laquo; Anterior')
                                @if ($items['current_page'] > 1)
                                    <a href="{{ $items['prev_page_url'] }}" class="link_item box pi_wrap">
                                        <i class="pi pi_arrowPrev left"></i>
                                        <span class="blind">Prev</span>
                                    </a>
                                @endif
                            @elseif($link['label'] == 'Próximo &raquo;')
                                <a href="{{ $items['next_page_url'] }}" class="link_item box pi_wrap">
                                    <i class="pi pi_arrowNext right"></i>
                                    <span class="blind">Next</span>
                                </a>
                            @else
                                {{-- <button type="button"  data-page="{{$link['label']}}">{{$link['label']}}</button> --}} <a
                                    class="link_item {{ $items['current_page'] == $link['label'] ? 'active' : '' }}"
                                    href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
