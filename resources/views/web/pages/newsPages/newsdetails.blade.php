@extends('web.pages.newsPages.layout.main')

@section('title', 'News')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/web/css/news_view.css')}}"/>
@endpush

@section('newsContent')
{{-- <main id="mainContent"> --}}

    <strong class="screen_out">NEWS VIEW</strong>
    <section class="section_newsview">
       @if (isset($notice) != null)
       <div class="box_newshead">
          <div class="bg_head">
             <div class="frame_head">
                <img src="{{asset('storage/news/' . $notice->image_url)}}" width="800" height="512" class="type_pc img_head" alt="">
                <!--PC 이미지 사이즈: 800 x 512-->
                <img src="{{asset('storage/news/' . $notice->image_url)}}" width="360" height="210" class="type_m img_head" alt="">
                <!--m 이미지 사이즈: 360 x 206-->
             </div>
          </div>
          <div class="group_info">
             @switch($notice->category)
                @case('announce')
                    <em class="info_category txt_announce txt_announce">{{__('messages.announce')}}</em>
                    @break
                @case('event')
                    <em class="info_category txt_announce txt_event">{{__('messages.event')}}</em>
                    @break
                @case('maintenance')
                    <em class="info_category txt_announce txt_maintenance">{{__('messages.maintenance')}}</em>
                    @break
                @case('update')
                    <em class="info_category txt_announce txt_updates">{{__('messages.update')}}</em>
                    @break

                @default

            @endswitch
             <!-- [클래스 부여] ANNOUNCEMENT : txt_announce, EVENTS : txt_event, MAINTENANCE : txt_maintenance , UPDATES : txt_updates -->
             <span class="txt_date">{{ \Carbon\Carbon::createFromTimestamp(strtotime($notice->created_at))->format('M d. Y')}}</span>
             <h2 class="tit_news">{{$notice->name}} - {{ \Carbon\Carbon::createFromTimestamp(strtotime($notice->created_at))->format('M d, Y')}}</h2>
          </div>
       </div>
       <div class="box_post news-content">
        {{-- Content --}}
        {!! $notice->description !!}
       </div>

       <div class="box_share">
          <strong class="tit_share">Share</strong>
          <a href="javascript:;" class="link_share link_facebook" onclick="shareSNS('facebook', 'Marketplace Arrivals - March 16, 2023')">
          <span class="ico_svg ico_facebook">facebook</span>
          </a>
          <a href="javascript:;" class="link_share link_twitter" onclick="shareSNS('twitter', 'Marketplace Arrivals - March 16, 2023')">
          <span class="ico_svg ico_twitter">twitter</span>
          </a>
          <a href="javascript:;" class="link_share link_copy">
          <span class="ico_svg ico_copy">copy</span>
          </a>
          <div id="copied-tooltip2" class="info_copy2" style="opacity: 0;user-select: none;">
             <span class="screen_out">URL</span> COPIED
          </div>
          <div style="height:0px; opacity: 0;">
             <textarea name="copy_paste_area" id="message-textarea" value="" style="width:1px;height:1px"></textarea>
          </div>
       </div>
       @endif
       <div class="box_nav">
          <div class="inner_nav">
             <a class="btn_prev" role="button" href="{{route('newsdetails', ['id' => $notice->id, 'typeid' => 2])}}">
                <!-- 비활성화 : 클래스 type_disabled -->
                <span class="screen_out">NEWS</span>PREV <span class="ico_svg ico_arr">GO</span>
             </a>
             <a class="btn_list" role="button" href="{{route('news')}}">
             <span class="ico_svg ico_list">NEWS LIST GO</span>
             </a>
             <a class="btn_next" role="button" href="{{route('newsdetails', ['id' => $notice->id, 'typeid' => 1])}}">
                <!-- 비활성화 : 클래스 type_disabled -->
                <span class="screen_out">NEWS</span>NEXT <span class="ico_svg ico_arr">GO</span>
             </a>
          </div>
       </div>
    </section>

 {{-- </main> --}}
@endsection
@push('scripts')

@endpush
