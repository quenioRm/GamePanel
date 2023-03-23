@extends('web.layout.main')

@section('title', 'News')

@if (Route::currentRouteName() == 'news')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/web/css/news.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/web/css/news.320.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/web/css/news.768.css')}}"/>
@endpush
@endif

@section('content')
<div class="wrapper">

    @if (Route::currentRouteName() == 'news' && isset($lastest) != null)
    <div class="news_top-banner">
        <div class="news_card" id="2039">
            <a href="{{route('newsdetails', ['id' => $lastest->id, 'typeid' => 0])}}">
                <img src="{{asset('storage/news/' . $lastest->image_url)}}" class="main-news-image-768">
                <div class="main-news">
                    <div class="main-news-date">{{ \Carbon\Carbon::createFromTimestamp(strtotime($lastest->created_at))->format('M d. Y')}}</div>
                    @switch($lastest->category)
                    @case('announce')
                    <td>
                        <div class="main-news-type news-type-announce news-type-announce">{{__('messages.announce')}}</div>
                    </td>
                        @break
                    @case('event')
                    <td>
                        <div class="main-news-type news-type-announce news-type-event">{{__('messages.event')}}</div>
                    </td>
                        @break
                    @case('maintenance')
                        <td>
                            <div class="main-news-type news-type-announce news-type-maintenance">{{__('messages.maintenance')}}</div>
                        </td>
                        @break
                    @case('update')
                    <td>
                        <div class="main-news-type news-type-announce news-type-updates">{{__('messages.update')}}</div>
                    </td>
                        @break

                    @default

                @endswitch
                    <div class="main-news-title">
                        <span class="over-w768">{{$lastest->name}} - {{ \Carbon\Carbon::createFromTimestamp(strtotime($lastest->created_at))->format('M d, Y')}}</span>
                        <span class="under-w768">{{$lastest->name}} - {{ \Carbon\Carbon::createFromTimestamp(strtotime($lastest->created_at))->format('M d, Y')}}</span>
                        <span class="under-w320">{{$lastest->name}} - {{ \Carbon\Carbon::createFromTimestamp(strtotime($lastest->created_at))->format('M d, Y')}}</span>
                    </div>
                    <div class="main-news-content">
                        <span class="over-w768">{{str_replace('&nbsp', '', strip_tags($lastest->description, ""))}}</span>
                        <span class="under-w768">{{str_replace('&nbsp', '', strip_tags($lastest->description, ""))}}</span>
                        <span class="under-w320">{{str_replace('&nbsp', '', strip_tags($lastest->description, ""))}}</span>
                    </div>
                    <div class="scale-img-on-hover-main">
                        <img src="{{asset('storage/news/' . $lastest->image_url)}}" class="main-news-image">
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="news-tab-btn-container">
        <div class="{{ Request::is('news/all') || Request::is('news') ? 'btn tab-btn on' : 'btn tab-btn' }}"><a href="{{route('news', 'all')}}">{{strtoupper(__('messages.all'))}}</a></div>
        <div class="{{ Request::is('news/announcement') ? 'btn tab-btn on' : 'btn tab-btn' }}"><a href="{{route('news', 'announcement')}}">{{mb_strtoupper(__('messages.announce'), 'UTF-8')}}</a></div>
        <div class="{{ Request::is('news/event') ? 'btn tab-btn on' : 'btn tab-btn' }}"><a href="{{route('news', 'event')}}">{{mb_strtoupper(__('messages.event'), 'UTF-8')}}</a></div>
        <div class="{{ Request::is('news/maintenance') ? 'btn tab-btn on' : 'btn tab-btn' }}"><a href="{{route('news', 'maintenance')}}">{{mb_strtoupper(__('messages.maintenance'), 'UTF-8')}}</a></div>
        <div class="{{ Request::is('news/update') ? 'btn tab-btn on' : 'btn tab-btn' }}"><a href="{{route('news', 'update')}}">{{mb_strtoupper(__('messages.update'), 'UTF-8')}}</a></div>
    </div>
    @elseif (Route::currentRouteName() == 'news' && isset($lastest) == null)
    <br>
    <br>
    <div class="news_top-banner">
        <div class="news_card" id="2039">
        </div>
    </div>
    <div class="news-tab-btn-container">
        <div class="{{ Request::is('news/all') || Request::is('news') ? 'btn tab-btn on' : 'btn tab-btn' }}"><a href="{{route('news', 'all')}}">{{strtoupper(__('messages.all'))}}</a></div>
        <div class="{{ Request::is('news/announcement') ? 'btn tab-btn on' : 'btn tab-btn' }}"><a href="{{route('news', 'announcement')}}">{{mb_strtoupper(__('messages.announce'), 'UTF-8')}}</a></div>
        <div class="{{ Request::is('news/event') ? 'btn tab-btn on' : 'btn tab-btn' }}"><a href="{{route('news', 'event')}}">{{mb_strtoupper(__('messages.event'), 'UTF-8')}}</a></div>
        <div class="{{ Request::is('news/maintenance') ? 'btn tab-btn on' : 'btn tab-btn' }}"><a href="{{route('news', 'maintenance')}}">{{mb_strtoupper(__('messages.maintenance'), 'UTF-8')}}</a></div>
        <div class="{{ Request::is('news/update') ? 'btn tab-btn on' : 'btn tab-btn' }}"><a href="{{route('news', 'update')}}">{{mb_strtoupper(__('messages.update'), 'UTF-8')}}</a></div>
    </div>
    <br>
    <br>
    <br>
    @endif

    @yield('newsContent')

    @if (Route::currentRouteName() == 'news' && isset($lastest) != null)
    <div class="load-more-btn-container">
        <a href="{{route('news', null, 1)}}"><div class="btn btn-load-more" data-type="all">LOAD MORE</div></a>
    </div>
    @endif

</div>
@endsection
@push('scripts')

@endpush
