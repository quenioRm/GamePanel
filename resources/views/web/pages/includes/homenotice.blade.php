
<div>
    <div class="news_list-body">
        @foreach ($notices as $notice)
        <div class="card news-event" onclick="location.href=&#39;/news/{{$notice->id}};">
            <div class="card-header"><a href="{{route('newsdetails', ['id' => $notice->id, 'typeid' => 0])}}"><img src="{{asset('storage/news/' . $notice->image_url)}}"></a></div>
            <div class="card-body">
                <div class="card-content">
                    <div class="card-date">{{ \Carbon\Carbon::createFromTimestamp(strtotime($notice->created_at))->format('M d. Y')}}</div>
                    @switch($notice->category)
                        @case('announce')
                            <div class="card-title announce">{{__('messages.announce')}}</div>
                            @break
                        @case('event')
                            <div class="card-title event">{{__('messages.event')}}</div>
                            @break
                        @case('maintenance')
                            <div class="card-title maintance">{{__('messages.maintenance')}}</div>
                            @break
                        @case('update')
                            <div class="card-title updates">{{__('messages.update')}}</div>
                            @break

                        @default

                    @endswitch
                </div>
                <p>{{$notice->name}}</p>
                {{-- <p class="descr">ArcheLand It s already cozy outside and ArcheLand is now open. Meet Yata, Greenman, and Cow, and discover many entertainments as well as a new vehicle. Event Period Mar. 23 (Thurs), 2023 after maintenance Apr. 13 (Thurs) before maintenance (3 weeks) Event Details Look for ArcheLand s treasure chests!(Daily Quest, Lv55+, Patron Exclusive) We will be running a treasure hunter event at Mirage Isle to celebrate the opening of ArcheLand. Go to ArcheDaru,</p> --}}
            </div>
        </div>
        @endforeach
    </div>
</div>
