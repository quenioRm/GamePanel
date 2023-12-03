@extends('web.shop.pages.index')

@section('itemList')
<!-- Loop Corner -->
<ul>
    <!-- Loop Product -->
      @foreach ($items['data'] as $item)
      <li>
          <div class="shop-item" data-aos="fade-up20" data-aos-offset="20" data-aos-delay="200"  data-aos-duration="400" data-aos-once="true">

            {{-- @if (session()->get('selectedCategory')->isPacket == 0)
            <div class="img">
                <img src="{{asset('assets/shop/images/coinIcon.jpg')}}" alt="CREDITS">
             </div>
            @else
            <div style="width: 44px;display: block;margin-right: auto;margin-left: auto;margin-top:80px" class="img">
                <img src="{{asset('assets/shop/images/item/' . $item['itemId'] . '.png')}}" alt="CREDITS">
             </div>
            @endif --}}

            <div class="img">
                <img src="{{asset('assets/shop/images/coinIcon.jpg')}}" alt="CREDITS">
             </div>

             <div class="desc">
                <div class="title">{{$item['name']}}</div>
                <div class="price">
                   From
                   @if (session()->get('selectedCategory')->isPacket == 0)
                   <span>{{'COINS ' . $item['price']}}</span>
                   @else
                   <span>{{'R$ ' . $item['price']}}</span>
                   @endif
                </div>
             </div>
             <a href="{{route('shop.itemdetails', $item['id'])}}" class="link"
             data-game="6" data-name="CREDITS" data-id="24" data-price="€10.00" data-discount="0.0">BUY NOW</a>
          </div>
       </li>
      @endforeach
    <!--// Product -->
 </ul>
 <!--// Loop Corner -->

@endsection
