@extends('web.pages.newsPages.layout.main')

@section('title', 'News')

@section('newsContent')
<div class="wrapper">

    <div class="news-container">
        @if (isset($notices) != null)
        @foreach ($notices as $notice)
        <div class="news news-updates" id="{{$notice->id}}">
            <a href="{{route('newsdetails', ['id' => $notice->id, 'typeid' => 0])}}" style="outline : none;">
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
        @endif
    </div>

</div>
@endsection
@push('scripts')

@endpush
