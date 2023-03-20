@extends('web.layout.main')

@section('title', 'News')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/news.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/news.320.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/news.768.css')}}"/>
@endpush

@section('content')
<div class="wrapper">

    <div class="news_top-banner">
        <div class="news_card" id="2039">
            <a href="/news/2039?index=2039">
                <img src="https://akamai-webcdn.kgstatic.net/cms/6/news/de22ad4ad37d3966e43ef2c47853aaed.jpg" class="main-news-image-768">
                <div class="main-news">
                    <div class="main-news-date">Mar 16. 2023</div>
                    <div class="main-news-type news-type-announce news-type-updates">Updates</div>
                    <div class="main-news-title">
                        <span class="over-w768">Marketplace Arrivals - March 16, 2023</span>
                        <span class="under-w768">Marketplace Arrivals - March 16, 2023</span>
                        <span class="under-w320">Marketplace Arrivals - March 16, 2023</span>
                    </div>
                    <div class="main-news-content">
                        <span class="over-w768">ArcheAge There will be a discount for the products under the following category (up until maintenance on Mar. 23, 2023). Credit Shop: Costumes The following items were added to the shop. Name Qty Type Price Sale End Purchase Limit ArchePass Support Bundle: Economy 1 Credits</span>
                        <span class="under-w768">ArcheAge There will be a discount for the products under the following category (up until maintenance on Mar. 23, 2023). Credit Shop: Costumes The following items were added to the shop. Name Qty Type Price Sale End Purchase Limit ArchePass Support Bundle: Economy 1 Credits</span>
                        <span class="under-w320">ArcheAge There will be a discount for the products under the following category (up until maintenance on Mar. 23, 2023). Credit Shop: Costumes The following items were added to the shop. Name Qty Type Price Sale End Purchase Limit ArchePass Support Bundle: Economy 1 Credits</span>
                    </div>
                    <div class="scale-img-on-hover-main">
                        <img src="https://akamai-webcdn.kgstatic.net/cms/6/news/de22ad4ad37d3966e43ef2c47853aaed.jpg" class="main-news-image">
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="news-tab-btn-container">
        <div class="btn tab-btn on" onclick="click_tab_btn('all')" data-type="all" data-tab="all"><a href="{{route('news', 'all')}}">ALL</a></div>
        <div class="btn tab-btn" onclick="click_tab_btn('all')" data-type="all" data-tab="all"><a href="{{route('news', 'announcement')}}">ANNOUNCEMENT</a></div>
        <div class="btn tab-btn" onclick="click_tab_btn('NEWS302')" data-type="NEWS302" data-tab="event"><a href="{{route('news', 'event')}}">EVENT</a></div>
        <div class="btn tab-btn" onclick="click_tab_btn('NEWS303')" data-type="NEWS303" data-tab="maintenance"><a href="{{route('news', 'maintenance')}}">MAINTENANCE</a></div>
        <div class="btn tab-btn" onclick="click_tab_btn('NEWS304')" data-type="NEWS304" data-tab="updates"><a href="{{route('news', 'update')}}">UPDATE</a></div>
    </div>

    @yield('newsContent')


    <div class="load-more-btn-container">
        <div class="btn btn-load-more" data-type="all">LOAD MORE</div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
