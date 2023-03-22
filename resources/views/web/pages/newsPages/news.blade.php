@extends('web.pages.newsPages.layout.main')

@section('title', 'News')

@section('newsContent')
<div class="wrapper">

    {{-- <div class="news_top-banner">
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
    </div> --}}

    {{-- <div class="news-tab-btn-container">
        <div class="btn tab-btn on" onclick="click_tab_btn('all')" data-type="all" data-tab="all">ALL</div>
        <div class="btn tab-btn" onclick="click_tab_btn('NEWS301')" data-type="NEWS301" data-tab="announce">ANNOUNCEMENT</div>
        <div class="btn tab-btn" onclick="click_tab_btn('NEWS302')" data-type="NEWS302" data-tab="event">EVENT</div>
        <div class="btn tab-btn" onclick="click_tab_btn('NEWS303')" data-type="NEWS303" data-tab="maintenance">MAINTENANCE</div>
        <div class="btn tab-btn" onclick="click_tab_btn('NEWS304')" data-type="NEWS304" data-tab="update">UPDATE</div>
    </div> --}}

    <div class="news-container">
        @foreach ($notices as $notice)
        <div class="news news-updates" id="{{$notice->id}}">
            <a href="{{route('newsdetails', $notice->name)}}" style="outline : none;">
                <div class="scale-img-on-hover"><img src="{{asset('storage/news/' . $notice->image_url)}}" class="news-image"></div>
                <div class="news-date">{{ \Carbon\Carbon::createFromTimestamp(strtotime($notice->created_at))->format('M d. Y')}}</div>
                @switch($notice->category)
                    @case('announce')
                    <td>
                        <div class="news-type news-type-announce">{{__('messages.announce')}}</div>
                    </td>
                        @break
                    @case('event')
                    <td>
                        <div class="news-type news-type-event">{{__('messages.event')}}</div>
                    </td>
                        @break
                    @case('maintenance')
                        <td>
                            <div class="news-type news-type-maintenance">{{__('messages.maintenance')}}</div>
                        </td>
                        @break
                    @case('update')
                    <td>
                        <div class="news-type news-type-updates">{{__('messages.update')}}</div>
                    </td>
                        @break

                    @default

                @endswitch
                <div class="news-title">{{$notice->name}} - {{ \Carbon\Carbon::createFromTimestamp(strtotime($notice->created_at))->format('M d, Y')}}</div>
                <div class="news-content">{{str_replace('&nbsp', '', strip_tags($notice->description, ""))}}</div>
                <div class="news-underline"></div>
            </a>
        </div>
        @endforeach
    </div>

    {{-- <div class="load-more-btn-container">
        <div class="btn btn-load-more" data-type="all">LOAD MORE</div>
    </div> --}}
</div>
@endsection
@push('scripts')

@endpush
