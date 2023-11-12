@extends('web.' . env('SELECTED_WEB') . '.layout.main')

@section('title', 'Home')

@section('content')
{{-- <main id="mainContent" class="doc-main"> --}}

    <section class="section-winter">
        <div class="video_intro-box">
           <video id="videoIntro" class="video_intro" loop="true" muted="" playsinline="" autoplay="" preload="none" style="position: absolute;top: 0px;left: 0px;right: 0px;bottom: 0px;">
              <source src="{{asset('assets/web/video/skinjoin_world_loop.webm')}}" type="video/mp4">
           </video>
        </div>
        @if (isset($topnotice) != null)
        <div class="wrapper">
           <h3><span></span><b>{{$topnotice->name}}</b></h3>
           <a href="{{route('newsdetails', ['id' => $topnotice->id, 'typeid' => 0])}}" class="btn primary">{{strtoupper(__('messages.learnmore'))}}</a>
        </div>
        @endif
     </section>


    {{-- News --}}
    <section class="section-news">
        <div class="wrapper">
            <h3 data-text="main.news.title">{{strtoupper(__('messages.news'))}}</h3>
            <a href="/news" class="viewall type_pc" data-text="main.news.view_all">{{strtoupper(__('messages.viewall'))}}</a>
            <div class="slider-news">
            </div>
        </div>
    </section>
    {{-- End News --}}

    {{-- <section class="section-sbanner newreturn-event">
       <div class="wrapper">
          <h3>{{__('messages.new_return')}}<br>{{__('messages.benefits')}}</h3>
          <a href="#" class="btn-text">{{mb_strtoupper(__('messages.learnmore'),'UTF-8')}}</a>
       </div>
    </section> --}}

    {{-- <section class="section-big3 mtn">
       <div class="wrapper">
          <h3>{{__('messages.home1')}}</h3>
          <a href="#" class="btn primary" style="color:#fff;">{{__('messages.seeranking')}}</a>
       </div>
    </section> --}}

    <section class="section-big3 mtn">
        <div class="video_intro-box">
           <video id="videoIntro" class="video_intro" loop="true" muted="" playsinline="" autoplay="" preload="none" style="position: absolute;top: 0px;left: 0px;right: 0px;bottom: 0px;">
              <source src="{{asset('assets/web/video/nodewar.mp4')}}" type="video/mp4">
           </video>
        </div>
        <div class="wrapper">
            <a href="#" class="btn primary" style="color:#fff;">{{__('messages.seeranking')}}</a>
         </div>
     </section>

    <section class="section-big4">
       <div class="wrapper">
          <h3 data-text="main.big4.title">{{__('messages.home2')}}</h3>
          <a href="#" class="btn primary" style="color:#fff;">{{__('messages.learnmore')}}</a>
       </div>
    </section>

    {{-- @include('web.' . env('SELECTED_WEB') . '.pages.includes.homeraces') --}}

    <aside class="wrap_bnr size_other">
       <strong class="screen_out">{{env('APP_NAME')}}</strong>
       <a href="/twitchdrops" class="link_bnr type_pc">
       <img src="https://img.aa.playkakaogames.com/aalg/live/images/main/img_bnr3_221122.jpg" width="128" height="160" class="img_bnr" alt="">
       <span class="txt_bnr"><span class="ico_twitch"></span>{{__('messages.watchtwitch')}}<br>{{__('messages.getitems')}}</span>
       </a>
    </aside>

 {{-- </main> --}}
@endsection
@push('scripts')
@endpush
