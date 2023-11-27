@extends('web.' . env('SELECTED_WEB') . '.pages.shopPages.layout.main')

@section('title', 'Shop')

@section('shopContent')


<div class="wrapper">
    <div class="shop-item-list on">
       <!-- Loop Corner -->
       <ul>
          <!-- Loop Product -->
          @foreach ($items as $item)
          <li>
            <div class="shop-item aos-init aos-animate" data-aos="fade-up20" data-aos-offset="20" data-aos-delay="200" data-aos-duration="400" data-aos-once="true">
               <div class="img">
                  <img src="{{asset('assets/web/images/shop/') . '/' . $item->image}}" alt="APEX">
               </div>
               <div class="desc">
                  <div class="game">
                     <span class="sp-logo aal">{{$item->name}}</span>
                  </div>
                  <div class="title">{{$item->description}}</div>
                  <div class="price">
                     <span>{{$item->price}}</span>
                  </div>
               </div>
               <a href="https://shop.playkakaogames.com/product/26" class="link" data-game="6" data-name="APEX" data-id="26" data-price="€9.99" data-discount="0.0">BUY NOW</a>
            </div>
         </li>
          @endforeach

          <!--// Product -->
       </ul>
       <!--// Loop Corner -->
    </div>

 </div>

@endsection
@push('scripts')

@endpush
