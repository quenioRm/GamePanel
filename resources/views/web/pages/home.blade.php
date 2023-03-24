@extends('web.layout.main')

@section('title', 'Home')

@section('content')
{{-- <main id="mainContent" class="doc-main"> --}}
    <section class="section-winter">
       <div class="video_intro-box">
          <video id="videoIntro" class="video_intro" loop="true" muted="" playsinline="" autoplay="" preload="none" style="position: absolute;top: 0px;left: 0px;right: 0px;bottom: 0px;">
             <source src="{{asset('assets/web/video/videoplayback.mp4')}}" type="video/mp4">
          </video>
       </div>
       <div class="wrapper">
          <h3><span>Blossom into Greatness</span><b>Spring Update</b></h3>
          <a href="https://archeage.playkakaogames.com/news/2008" class="btn primary">LEARN MORE</a>
       </div>
    </section>

    {{-- News --}}
    <section class="section-news">
        <div class="wrapper">
            <h3 data-text="main.news.title">NEWS</h3>
            <a href="/news" class="viewall type_pc" data-text="main.news.view_all">VIEW ALL</a>
            <div class="slider-news">
            </div>
        </div>
    </section>
    {{-- End News --}}

    <section class="section-sbanner newreturn-event">
       <div class="wrapper">
          <h3>New/Return<br>User Benefits</h3>
          <a href="/new-return" class="btn-text">LEARN MORE</a>
       </div>
    </section>

    <section class="section-big3 mtn">
       <div class="wrapper">
          <h3>Dispute territórios junto ao seu clã.</h3>
          <a href="/transfer" class="btn primary" style="color:#fff;">Veja o ranking</a>
       </div>
    </section>

    <section class="section-big4">
       <div class="wrapper">
          <h3 data-text="main.big4.title">ArcheAge is not about following a defined path.<br>It's about creating your own world by choosing what matters the most to you.</h3>
          <a href="/world" class="btn primary light" data-text="main.big4.more">LEARN MORE</a>
       </div>
    </section>

    @include('web.pages.includes.homeraces')

    <aside class="wrap_bnr size_other">
       <strong class="screen_out">ArcheAge Banner</strong>
       <a href="/twitchdrops" class="link_bnr type_pc">
       <img src="https://img.aa.playkakaogames.com/aalg/live/images/main/img_bnr3_221122.jpg" width="128" height="160" class="img_bnr" alt="">
       <span class="txt_bnr"><span class="ico_twitch"></span>WATCH TWITCH<br>GET ITEMS</span>
       </a>
    </aside>
 {{-- </main> --}}
@endsection
@push('scripts')
@endpush
