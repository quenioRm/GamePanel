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
        <div class="btn tab-btn" onclick="click_tab_btn('NEWS304')" data-type="NEWS304" data-tab="updates">UPDATE</div>
    </div> --}}

    <div class="news-container">
        <div class="news news-updates" id="2038">
            <a href="javascript:;" onclick="goNews(event, 2038)" style="outline : none;">
                <div class="scale-img-on-hover"><img src="https://akamai-webcdn.kgstatic.net/cms/6/news/69281b5b86c97900152d69e26b016cc6.jpg" class="news-image"></div>
                <div class="news-date">Mar 16. 2023</div>
                <div class="news-type news-type-updates">Updates</div>
                <div class="news-title">Patch Notes - March 16, 2023</div>
                <div class="news-content">Patch Notes Content Updates The Hero Respawn Spots in Karkasse Ridgelands will no longer be available. Adjustments were made so that the Hero Respawn Spots in Karkasse Ridgelands can no longer be activated. This was implemented to improve the issue where Hero Respawn Spots digressed from their main purpose of assisting weak factions and were used to complete certain raids such as the Black Dragon raid too easily. We will continue reviewing and improving the use of Her</div>
                <div class="news-underline"></div>
            </a>
        </div><div class="news news-maintenance" id="2036">
            <a href="javascript:;" onclick="goNews(event, 2036)" style="outline : none;">
                <div class="scale-img-on-hover"><img src="https://akamai-webcdn.kgstatic.net/cms/6/news/56f88d66254b8cdbf5c833538003ed5b.jpg" class="news-image"></div>
                <div class="news-date">Mar 15. 2023</div>
                <div class="news-type news-type-maintenance">Maintenance</div>
                <div class="news-title">Maintenance Notice - March 16</div>
                <div class="news-content">Greetings Inheritors, On March 16, 2023 we will be conducting our regular server maintenance for an estimated duration of 5 hours, at the following time: Timezone Start End UTC 09:00 14:00 CET 10:00 15:00 EDT 05:00 10:00 PDT</div>
                <div class="news-underline"></div>
            </a>
        </div><div class="news news-maintenance" id="2033">
            <a href="javascript:;" onclick="goNews(event, 2033)" style="outline : none;">
                <div class="scale-img-on-hover"><img src="https://akamai-webcdn.kgstatic.net/cms/6/news/a2cd683d6bfc74446b8532702ba247b6.jpg" class="news-image"></div>
                <div class="news-date">Mar 14. 2023</div>
                <div class="news-type news-type-maintenance">Maintenance</div>
                <div class="news-title">Partial Maintenance Notice - March 14</div>
                <div class="news-content">Greetings Inheritors, On March 14, 2023 we will be conducting an unscheduled server maintenance for an estimated duration of 1 hour, for the following servers at the following time: Europe North America Melisara Gene Timezone Start End UTC 14:00 15:00</div>
                <div class="news-underline"></div>
            </a>
        </div><div class="news news-announce" id="2008">
            <a href="javascript:;" onclick="goNews(event, 2008)" style="outline : none;">
                <div class="scale-img-on-hover"><img src="https://akamai-webcdn.kgstatic.net/cms/6/news/7eab88d3d8a53ca552d3600b73d2e561.jpg" class="news-image"></div>
                <div class="news-date">Mar 9. 2023</div>
                <div class="news-type news-type-announce">Announcements</div>
                <div class="news-title">Dev Note - March 2023</div>
                <div class="news-content">Greetings Inheritors, This is the ArcheAge Development Team, and we hope everyone is having a fantastic 2023 so far! Today marks our first content update announcement for 2023, and we re going to share some exciting news about what you can expect to be updated in March, while also going through other content that is currently in development. Please note that the information outlined below is subject to change upon actual release. Rise Up the Ranks We ll be adding two differe</div>
                <div class="news-underline"></div>
            </a>
        </div><div class="news news-event" id="2007">
            <a href="javascript:;" onclick="goNews(event, 2007)" style="outline : none;">
                <div class="scale-img-on-hover"><img src="https://akamai-webcdn.kgstatic.net/cms/6/news/48e129568e3efa5b7db2683e1dda9d4d.jpg" class="news-image"></div>
                <div class="news-date">Mar 9. 2023</div>
                <div class="news-type news-type-event">Events</div>
                <div class="news-title">Pawesome Festival</div>
                <div class="news-content">[Event Period] March 9 (after maintenance) - March 30 (before maintenance) Event NPCs will disappear before maintenance [Event Details] ● During the event period, Windscour Savannah will be turned into a Peace Zone for the Pawesome Festival festivities. A Kindly Caretaker (Daily Quest) ● How to Participate ○ Accept the quest from Nairamdal within the festival region. ● Reward ○ Festival Coin x 1 Frail Young Animals (Daily Quest</div>
                <div class="news-underline"></div>
            </a>
        </div><div class="news news-updates" id="2006">
            <a href="javascript:;" onclick="goNews(event, 2006)" style="outline : none;">
                <div class="scale-img-on-hover"><img src="https://akamai-webcdn.kgstatic.net/cms/6/news/e042c86486eda4e751b471e9e56a56a1.jpg" class="news-image"></div>
                <div class="news-date">Mar 9. 2023</div>
                <div class="news-type news-type-updates">Updates</div>
                <div class="news-title">Patch Notes - March 9, 2023</div>
                <div class="news-content">The weekly quests for the Illusion Cave area at Western Hiram Mountains were combined like the below to reduce the fatigue you may have previously experienced through the weekly quests. Mutated Animals and The Abyssal Legion quests will be discontinued, while the new Guard Hiram Mountains quest will be added. The rewards for defeating 100 Mutated Animal or Abyssal Legion at Hiram Mountains was doubled compared to before.</div>
                <div class="news-underline"></div>
            </a>
        </div><div class="news news-updates" id="2005">
            <a href="javascript:;" onclick="goNews(event, 2005)" style="outline : none;">
                <div class="scale-img-on-hover"><img src="https://akamai-webcdn.kgstatic.net/cms/6/news/3c091ff0e6e806b6f0d7904ebccf607d.jpg" class="news-image"></div>
                <div class="news-date">Mar 9. 2023</div>
                <div class="news-type news-type-updates">Updates</div>
                <div class="news-title">Marketplace Arrivals - March 9, 2023</div>
                <div class="news-content">ArcheAge Name Qty Type Price Sale End Purchase Limit Vitalizing Treat 30 Credits 1,500 1,100 March 23 1 per Account Bound Serendipity Stone 5 Credits 5,000 3,500 March 23</div>
                <div class="news-underline"></div>
            </a>
        </div><div class="news news-maintenance" id="2004">
            <a href="javascript:;" onclick="goNews(event, 2004)" style="outline : none;">
                <div class="scale-img-on-hover"><img src="https://akamai-webcdn.kgstatic.net/cms/6/news/c9aceb33a6b7b3bd966e7b0011375940.jpg" class="news-image"></div>
                <div class="news-date">Mar 8. 2023</div>
                <div class="news-type news-type-maintenance">Maintenance</div>
                <div class="news-title">Maintenance Notice - March 9, 2023</div>
                <div class="news-content">Greetings Inheritors, On March 9, 2023 we will be conducting our regular server maintenance for an estimated duration of 5 hours, at the following time: Timezone Start End UTC 09:00 14:00 CET 10:00 15:00 EST 04:00 09:00 PST</div>
                <div class="news-underline"></div>
            </a>
        </div><div class="news news-event" id="1994">
            <a href="javascript:;" onclick="goNews(event, 1994)" style="outline : none;">
                <div class="scale-img-on-hover"><img src="https://akamai-webcdn.kgstatic.net/cms/6/news/0308847bc07976e03e38f597d55e7f28.jpg" class="news-image"></div>
                <div class="news-date">Mar 2. 2023</div>
                <div class="news-type news-type-event">Events</div>
                <div class="news-title">Sweet Love-filled Gift</div>
                <div class="news-content">Sweet Love-filled Gift The weather is getting warmer so we d like to introduce an event that will warm your hearts even further. It s the Sweet Love-filled Gift Event, where you can express your feelings to those who feel special to you. Event Period Mar. 2 (Thurs), 2023 after maintenance Mar. 16 (Thurs) before maintenance (2 weeks) Event Details A special daily quest will be available through the Rabbit-Disguised Firran who will appear at Marianople, Auste</div>
                <div class="news-underline"></div>
            </a>
        </div><div class="news news-updates" id="1992">
            <a href="javascript:;" onclick="goNews(event, 1992)" style="outline : none;">
                <div class="scale-img-on-hover"><img src="https://akamai-webcdn.kgstatic.net/cms/6/news/c1b039e2d3eafdae44a9ff59f302afc8.jpg" class="news-image"></div>
                <div class="news-date">Mar 2. 2023</div>
                <div class="news-type news-type-updates">Updates</div>
                <div class="news-title">Marketplace Arrivals - March 2, 2023</div>
                <div class="news-content">ArcheAge There will be a discount for the products under the following category. (Up until maintenance on Mar. 9, 2023). Credits Shop: Consumables (Up to 50% off) The following items were added to the shop. Name Qty Type Price Sale End Purchase Limit Bound Labor Recharger 50 Credi</div>
                <div class="news-underline"></div>
            </a>
        </div>
    </div>

    {{-- <div class="load-more-btn-container">
        <div class="btn btn-load-more" data-type="all">LOAD MORE</div>
    </div> --}}
</div>
@endsection
@push('scripts')

@endpush
