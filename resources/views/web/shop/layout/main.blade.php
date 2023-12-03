<!DOCTYPE html>
<html lang="en">
   <head>
      <title>@yield('title', mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )) @if($__env->yieldContent('title'))- {{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}} @endif</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
      <meta name="description" content="{{env('KEYWORLDS')}}">
      <meta name="keywords" content="{{env('KEYWORLDS')}}">
      <meta property="og:title" content="@yield('title', mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )) @if($__env->yieldContent('title'))- {{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}} @endif"/>
      <meta property="og:description" content="{{env('KEYWORLDS')}}"/>
      <meta property="og:type" content="website">
      <meta property="og:url" content="{{env('APP_URL')}}">
      <meta property="og:image" content="{{asset('assets/web/images/main/icon.png')}}">
      <meta property="og:image:width" content="1200">
      <meta property="og:image:height" content="600">
      <meta property="og:image" content="{{asset('assets/web/images/main/icon.png')}}">
      <meta property="og:image:width" content="1200">
      <meta property="og:image:height" content="1200">
      <link href="{{asset('assets/web/images/main/icon.png')}}" rel="icon" type="image/png" sizes="196x196">
      <link href="{{asset('assets/web/images/main/icon.png')}}" rel="icon" type="image/png" sizes="32x32">
      <link href="{{asset('assets/shop/css/reset.css?v=20210712')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('assets/shop/css/plugin.min.css?v=20210712')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('assets/shop/css/swiper.min.css?v=20210712')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('assets/shop/css/common.css?v=20230907')}}" rel="stylesheet" type="text/css">
      <script src="{{asset('assets/shop/js/jquery.min.js?v=20210712')}}"></script>
      <!-- Hackle -->
      <script src="{{asset('assets/shop/js/index.browser.umd.min.js')}}"></script>
      <!-- Hackle -->
      <link href="{{asset('assets/shop/css/shop.css?v=20230215')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('assets/shop/css/shop_add.css')}}" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div role="main" id="wrap" class="wrap shop-home-wrap">
         <!-- Body / Header -->
         @include('web.shop.layout.header')
         <!-- Body / Content -->
         <div class="contents shop-home-content" id="contents">
            <div class="shop-home">
               @include('web.shop.layout.categorys')
               @yield('shopContent')
            </div>
            <button class="btn_top">
            <span class="ico_top">Go To TOP</span>
            </button>
         </div>
         <!-- Body / Footer -->
         @include('web.shop.layout.footer')
      </div>
      <section class="layer-popup" id="layerAlert">
         <div class="dimmed"></div>
         <div class="lp-cont">
            <div class="msg">
               <b>An error occurred while <br class="mo">the payment was in progress. <br class="mo">Please check again and try again.</b>
            </div>
            <div class="bt-wrap has-2">
               <a href="#" class="bt bt-ok" data-close="true"><span class="btn-text">OK</span></a>
            </div>
         </div>
      </section>
      <section class="layer-popup" id="layerRestrictionsAlert">
         <div class="dimmed"></div>
         <div class="lp-cont">
            <div class="msg">
               {{-- <b>You are outside of <br class="mo">our Elyon Territory of Service.</b> --}}
            </div>
            <div class="bt-wrap has-2">
               <a href="#" class="bt bt-ok" data-close="true"><span class="btn-text">OK</span></a>
            </div>
         </div>
      </section>
   </body>
   <!-- Body / Content -->
   <script src="{{asset('assets/shop/js/plugin.min.js?v=20210712')}}"></script>
   <script src="{{asset('assets/shop/js/swiper.min.js?v=20210712')}}"></script>
   <script src="{{asset('assets/shop/js/common.js?v=20230220')}}"></script>
   <script src="{{asset('assets/shop/js/scrollbar.js?v=20210917')}}"></script>
   <script src="{{asset('assets/shop/js/jquery.cookie.min.js')}}"></script>
   <script>
      $(function() {
      	window.hackleClient = Hackle.createInstance("wAD7mHDsECePGMqskvutovcwrfWpxq7b");
      });

      const formatedTimestamp = ()=> {
      	const d = new Date()
      	const date = d.toISOString().split('T')[0];
      	const time = d.toTimeString().split(' ')[0];
      	return `${date} ${time}`
      };

   </script>
   <script src="{{asset('assets/shop/js/shop.js')}}"></script>
</html>
