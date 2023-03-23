<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf8">
      <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width, height=device-height, viewport-fit=cover">
      <meta name="format-detection" content="telephone=no">
      <meta name="description" content="ArcheAge is a thrilling fantasy sandbox MMORPG set in a world where players forge their own path, telling a story unique to them. Craft your hero and enter the world of Erenor, a vast land of possibilities. Sail dangerous seas, battle powerful creatures, build a home and set up trade routes, and much more. The choices are yours, and they are near endless.">
      <meta name="keyword" content="ArcheAge, XL Games, MMO, MMORPG, Online, RPG, Role playing game, PvP, PvP, role playing, customization, class customization, character customization, Massive PvE, in-game economy, dragons, mage, archer, knight, warrior, sorcerer, witchcraft, nuians, elves, dwarves, firran, harani, warborn, kakao games, ArcheAge unchained, unchained, nuian, Nuia, Nui, Erenor, haranya, orchidna, game publisher, new publisher, fantasy game, fantasy mmo, fantasy mmorpg, high fantasy, epic fantasy game, medieval game">
      <meta property="og:title" content="ArcheAge | Official Website">
      <meta property="og:type" content="website" />
      <meta name="og:description" content="Realizing a virtual society that changes based on players' own free will through an innovative and thrilling MMORPG. Craft your hero and enter a world of magic, wonder, danger and excitement as you tell your story your way. Build a home, participate in massive PvP and PvE battles, create shipping lanes for trade, and so much more.">
      <meta name="google-site-verification" content="huunptPUhnf-YAlyudwDOkAimjoR72xDTuXaXCA9GxQ" />
      <link rel="shortcut icon" href="https://img.aa.playkakaogames.com/aalg/live/images/favicon.png" type="image/x-icon">
      <title>@yield('title', mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )) @if($__env->yieldContent('title'))- {{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}} @endif</title>
      <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
      <!-- 2022-02-04 추가 -->
      <link rel="stylesheet" href="{{asset('assets/web/css/slick.css')}}">
      <link rel="stylesheet" href="{{asset('assets/web/css/common.css')}}">

      <link rel="stylesheet" href="{{asset('assets/web/css/main.css')}}"/>

      @if (Route::is('home'))
      <link rel="stylesheet" href="{{asset('assets/web/css/page_main.css')}}"/>
      @elseif (Route::is('download'))
      <link rel="stylesheet" href="{{asset('assets/web/css/page_download.css')}}"/>
      @endif

      @stack('styles')

      {{-- <link rel="stylesheet" href="https://img.aa.playkakaogames.com/aalg/live/css/page_main.css"> --}}
      <script src="{{asset('assets/web/js/jquery.min.js?v=5')}}"></script>
      <script src="{{asset('assets/web/js/slick.min.js')}}"></script>
      <script src="{{asset('assets/web/js/easing.min.js')}}"></script>
      <script src="{{asset('assets/web/js/common.js')}}"></script>
      <script src="{{asset('assets/web/js/cookie.js')}}"></script>
      <script src="{{asset('assets/web/js/page_main.js')}}"></script>

   </head>
   <div style="display:none;">
   </div>
   <body class="type_aal">
      <div class="direct-link"><a href="#mainContent">Go to Main</a> <a href="#gnbContent">Go to Menu</a></div>
      <div class="container-doc">
         @include('web.layout.header')
         <main id="mainContent" class="doc-main">
            {{-- Content --}}
            @yield('content')
         </main>
         @include('web.layout.footer')
         <!-- dimmed 활성화 클래스 on 추가 -->
         <a href="#" id="linkTop" class="link_top on"> <span class="ico_goto">GO TO TOP</span> </a>
      </div>
      @if (Route::is('home'))
      <div>
         <div class="video-popup">
            <div class="video-popup-dim"></div>
            <div class="video-popup-content">
               <div class="video-popup-video">
                  <iframe class="video-content" width="100%" height="100%" src="" allow="autoplay" frameborder="0" allowfullscreen></iframe>
               </div>
            </div>
            <div class="btn btn-video-popup-close" onClick="closeVideoPopup()">
               <img src="https://img.aa.playkakaogames.com/aalg/live/images/transfer/icon_x.png?v=4" />
            </div>
         </div>
      </div>
      @endif
   </body>
</html>
<script>
   $(document).ready(function ($) {
       loadLatestNews('all', $('.slider-news'));
   });

   function click_world_skill() {
       location.href = '/world#section_races_top';
   }

   function loadLatestNews(type, $list) {
       $.ajax({
           url: '/getNewsCard?type=' + type
       }).done(function (data) {
           if (data && $(data).find('div').length > 0) {
               $list.append($(data).find('div.news_list-body').find('div.card'));

           }
           $('.slider-news').not('.slick-initialized').slick({
               slidesToShow: 3,
               slidesToScroll: 1,
               dots: true,
               centerMode: false,
               variableWidth: false,
               prevArrow: '<button class="btn-prev slick-arrow"><span class="icon-prev"></span></button>',
               nextArrow: '<button class="btn-next slick-arrow"><span class="icon-next"></span></button>',
               responsive: [
                   {
                       breakpoint: 1900,
                       settings: {
                           slidesToShow: 3,
                           slidesToScroll: 3,
                       }
                   },
                   {
                       breakpoint: 1024,
                       settings: {
                           slidesToShow: 1,
                           slidesToScroll: 1
                       }
                   },
                   {
                       breakpoint: 400,
                       settings: {
                           slidesToShow: 1,
                           slidesToScroll: 1,
                           arrows: false,
                       }
                   }
               ]
           });
       }).fail(function (response) {
           console.log(response);
       });
   }

   function closePopupToday() {
       $('.dimmed_layer').removeClass('on');
       $('.noti_layer').removeClass('on');

       let today = new Date();
       today.setDate(today.getDate() + 1); // 현재시간에 하루를 더함
       document.cookie = 'close_popup=Y; path=/; expires=' + today + ';';
   }

   function closePopup() {
       $('.dimmed_layer').removeClass('on');
       $('.noti_layer').removeClass('on');
   }
</script>
