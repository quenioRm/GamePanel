@extends('web.shop.layout.main')

@section('title', 'Shop')

@section('shopContent')

<section class="shop-item-list-wrap">
    <!-- Loop Game -->
    <div class="shop-item-list on" id="game6">
       @yield('itemList')
    </div>
    <div class="shop-item-list" id="game7">
       <!-- Loop Corner -->
       <ul>
          <!-- Loop Product -->
          <!--// Product -->
       </ul>
       <!--// Loop Corner -->
    </div>
    <!--// Loop Game -->

 </section>

 <br>
 <br>

 <div class="paging">
    <div class="js-pagination inline">
        <div class="common_paging js-paging">
            @foreach ($items['links'] as $link)
                @if ($link['label'] == "&laquo; Anterior")
                    @if ($items['current_page'] > 1)
                        <a href="{{$items['prev_page_url']}}" class="link_item box pi_wrap">
                            <i class="pi pi_arrowPrev left"></i>
                            <i class="arrow left"></i>
                        </a>
                    @endif
                @elseif($link['label'] == "Próximo &raquo;")
                    <a href="{{$items['next_page_url']}}" class="link_item box pi_wrap">
                        <i class="arrow right"></i>
                    </a>
                @else
                    {{-- <button type="button"  data-page="{{$link['label']}}">{{$link['label']}}</button>     --}}
                    <a class="link_item {{($items['current_page'] == $link['label'] ? 'active' : '')}}"
                    href="{{$link['url']}}">{{$link['label']}}</a>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
