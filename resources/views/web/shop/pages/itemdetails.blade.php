@extends('web.shop.layout.main')

@section('title', 'Shop')

@section('shopContent')
<section class="shop-page" data-country="BR">
    <div class="breadcrumb-box">
       <ul>
          <li>
             <a href="#" class="bb-home"><i class="bbic-home"></i>
             {{env('WEB_NAME')}}
             </a>
          </li>
          <li class="curr">
             <a href="javascript:" class="has-sub">{{session()->get('selectedCategory')->name}}</a>
             <ul class="bb-sub">
                <li>
                   <a href="{{route('shop.shopcategory', session()->get('selectedCategory')->id)}}">{{session()->get('selectedCategory')->name}}</a>
                </li>
             </ul>
          </li>
       </ul>
    </div>

    <div class="shop-head">
       <div class="desc-box-fake">

          <div class="desc-box fixed">
             <div class="tit">
                <h3>
                   <span class="">
                    @if ($item->image == null)
                    <img width="100px" src="{{asset('assets/shop/images/item/' . $item->itemId . '.png')}}" alt="">
                    @else
                    <img width="100px" src="{{asset('assets/shop/images/' . $item->image)}}" alt="">
                    @endif

                   </span>
                   <b>{{$item->name}}</b>
                </h3>
             </div>
             <div class="price">€10.00</div>
             <div class="item-list" data-scrollbar="true" tabindex="-1" style="overflow: hidden; outline: none;">

                @if (session()->get('selectedCategory')->isPacket == 0)
                <div class="scroll-content">
                    @for ($i = 1; $i <6; $i++)
                    <div class="item   selected" data-seq="22" data-product-name="{{$i . ' unidade'}}"
                        data-amount="{{'COIN ' . $item->price * $i . '.00'}}" data-int-amount="1000"
                        data-purchase="0 KCoin" data-discount="0.0" data-original="€10.00" data-buy-type="RefundPolicy">
                        <a href="javascript:">
                        <span>{{$i . 'Item'}}</span>
                        <b>{{$item->price * $i}}</b>
                        </a>
                     </div>
                    @endfor
                </div>
                @else
                <div class="scroll-content">
                    @for ($i = 1; $i <6; $i++)
                    <div class="item   selected" data-seq="22" data-product-name="{{$i . ' unidade'}}"
                        data-amount="{{'R$ ' . $item->price * $i . '.00'}}" data-int-amount="1000"
                        data-purchase="0 KCoin" data-discount="0.0" data-original="€10.00" data-buy-type="RefundPolicy">
                        <a onclick="GetTempValueOnClick({{$i}})"  href="javascript:" >
                        <span>{{$i . 'Item'}}</span>
                        <b>{{$item->price * $i}}</b>
                        </a>
                     </div>
                    @endfor
                </div>
                @endif
                <div class="scrollbar-track scrollbar-track-x show" style="display: none;">
                   <div class="scrollbar-thumb scrollbar-thumb-x" style="width: 247px; transform: translate3d(0px, 0px, 0px);"></div>
                </div>
                <div class="scrollbar-track scrollbar-track-y show" style="display: block;">
                   <div class="scrollbar-thumb scrollbar-thumb-y" style="height: 99.1223px; transform: translate3d(0px, 0px, 0px);"></div>
                </div>
             </div>

             @if (session()->get('selectedCategory')->isPacket == 1)
             <div class="bt-wrap" data-block-country="false" data-block-mobile="false">
                <button onclick="CheckoutPagSeguro({{$item->id}})" class="bt bt-ok"><span>COMPRAR AGORA</span></button>
                <span id="buy-err">You have already purchased this product.</span>
             </div>
             @else
             <div class="bt-wrap" data-block-country="false" data-block-mobile="false">
                <button onclick="CheckoutShop({{$item->id}})" class="bt bt-ok"><span>COMPRAR AGORA</span></button>
                <span id="buy-err">You have already purchased this product.</span>
             </div>
             @endif


          </div>
       </div>
       <br>
       <div class="shop-cont">
        <div class="cms-block cms-block-3">
           <div class="cms-block-head">
              <h3>
                {{$item->name}}
              </h3>
              <p>{{$item->description}}</p>
              <p>&nbsp;</p>
           </div>
        </div>
        <div class="cms-block cms-block-5">
           <div class="cms-block-head">
              <h3>Detalhes</h3>
           </div>
           <div class="cms-block-body">
              <div class="cms-block-5-item-row">
                 <div class="cms-block-5-item-box">
                    <h4>Aplicável para</h4>
                    @foreach ($details as $detail)
                    <div class="cms-block-5-item">
                        <p>{{$detail->applicableFor}}</p>
                     </div>
                    @endforeach
                 </div>
                 <div class="cms-block-5-item-box">
                    <h4>Efeitos</h4>
                    @foreach ($details as $detail)
                    <div class="cms-block-5-item">
                        <p>{{$detail->effects}}</p>
                     </div>
                    @endforeach
                 </div>
              </div>
           </div>
        </div>
     </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
let itemAmount;
let isPacket = "{{session()->get('selectedCategory')->isPacket}}"

function GetTempValueOnClick(amount){
    itemAmount = amount
}


function CheckoutPagSeguro(itemId){

    if(itemAmount === undefined)
        itemAmount = 1

    $.ajax({
        url: '{{route('shop.makeNewCodePagseguro')}}',
        type: 'POST',
        data: {
            id: itemId,
            amount: itemAmount,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
        // Handle the successful response here
            openPagseguro(response, itemId)
        },
        error: function(xhr, status, error) {
        // Handle errors here
            console.error('Error:', status, error);
        }
    });

}

function openPagseguro(code, id){
      var isOpenLightbox = PagSeguroLightbox({
          code: code
      }, {
          success : function(transactionCode) {
            makePayment(transactionCode, id);
          },
          abort : function() {
          }
      });
      // Redirecionando o cliente caso o navegador não tenha suporte ao Lightbox
      if (!isOpenLightbox){
        @if('sandbox' == env('PAGSEGURO_AMBIENTE'))
            location.href="https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=" + code;
        @else
            location.href="https://pagseguro.uol.com.br/v2/checkout/payment.html?code=" + code;
        @endif
      }
}

function makePayment(code, id){
    $.ajax({
        url: '{{route('shop.makenewpayment')}}',
        type: 'POST',
        data: {
            id : id,
            code: code,
            amount: itemAmount,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
        // Handle the successful response here
            location.reload();
        },
        error: function(xhr, status, error) {
        // Handle errors here
            console.error('Error:', status, error);
        }
    });
}


function CheckoutShop(itemId){

    if(itemAmount === undefined)
        itemAmount = 1

    $.ajax({
        url: '{{route('shop.buycashshopitem')}}',
        type: 'POST',
        data: {
            id : itemId,
            amount: itemAmount,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
        // Handle the successful response here
            Swal.fire({
                position: 'center',
                icon: 'success',
                // background: '#fff',
                title: response.resultMsg,
                showConfirmButton: false,
                timer: 6500
            })
        },
        error: function(xhr, status, error) {
        // Handle errors here
            // alert('Error:', status, error)
            Swal.fire({
                position: 'center',
                icon: 'error',
                // background: '#fff',
                title: error,
                showConfirmButton: false,
                timer: 6500
            })
        }
    });
}

</script>
@endpush
