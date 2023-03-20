@extends('web.layout.main')

@section('title', 'Home')

@section('content')
<section class="section-winter">
    <div class="video_intro-box">
       <video id="videoIntro" class="video_intro" loop="true" muted="" playsinline="" autoplay=""
          preload="none" style="position: absolute;top: 0px;left: 0px;right: 0px;bottom: 0px;">
          <source src="https://img.aa.playkakaogames.com/aalg/live/images/video/winter_video_1280.mp4" type="video/mp4">
       </video>
    </div>
    <div class="wrapper">
       <h3 data-text="main.winter.title"><span>Rewrite Your Legacy with</span><b>The Winter Updates!</b></h3>
       <a href="javascript:void(0);" class="btn secondary" data-text="main.winter.watch" onclick="openVideoPopup(&#39;cTDQlLXAtI0&#39;)">
       WATCH VIDEO
       <i class="ico-play">play</i>
       </a>
       <a href="https://archeage.playkakaogames.com/news/1636" class="btn primary" data-text="main.winter.more">LEARN MORE</a>
    </div>
 </section>
 <script>
    function openVideoPopup(id) {
        document.getElementById("videoIntro").pause();
        $('.video-content').attr('src', 'https://www.youtube.com/embed/' + id);
        $('.video-popup').show();
    }
 </script>
 <section class="section-news">
    <div class="wrapper">
       <h3 data-text="main.news.title">NEWS</h3>
       <a href="/news" class="viewall type_pc" data-text="main.news.view_all">VIEW ALL</a>
       <div class="slider-news">
       </div>
    </div>
 </section>
 <section class="section-sbanner newreturn-event">
    <div class="wrapper">
       <h3>New/Return<br>User Benefits</h3>
       <a href="/new-return" class="btn-text">LEARN MORE</a>
    </div>
 </section>
 <section class="section-big3 mtn">
    <div class="wrapper">
       <h3>Been away for a while?<br>Start a new journey with Kakao Games!</h3>
       <a href="/transfer" class="btn primary" style="color:#fff;">Apply for Account Transfer</a>
    </div>
 </section>
 <section class="section-big4">
    <div class="wrapper">
       <h3 data-text="main.big4.title">ArcheAge is not about following a defined path.<br>It's about creating your own world by choosing what matters the most to you.</h3>
       <a href="/world" class="btn primary light" data-text="main.big4.more">LEARN MORE</a>
    </div>
 </section>
 <section class="section-big5">
    <div class="wrapper">
       <h3 data-text="main.big5.title">Create your own destiny!</h3>
       <p data-text="main.big5.content">Explore 6 unique races with 364 possible class<br>combinations built from 14 skillsets.</p>
       <a href="javascript:void(0);" onclick="click_world_skill()" class="btn primary light" data-text="main.big5.content">LEARN MORE</a>
    </div>
 </section>
 <aside class="wrap_bnr size_other">
 </aside>
@endsection
@push('scripts')

@endpush
