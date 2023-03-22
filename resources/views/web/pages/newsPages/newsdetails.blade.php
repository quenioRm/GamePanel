@extends('web.pages.newsPages.layout.main')

@section('title', 'News')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/web/css/news_view.css')}}"/>
@endpush

@section('newsContent')
{{-- <main id="mainContent"> --}}
    <strong class="screen_out">NEWS VIEW</strong>
    <section class="section_newsview">
       <div class="box_newshead">
          <div class="bg_head">
             <div class="frame_head">
                <img src="https://akamai-webcdn.kgstatic.net/cms/6/news/de22ad4ad37d3966e43ef2c47853aaed.jpg" width="800" height="512" class="type_pc img_head" alt="">
                <!--PC 이미지 사이즈: 800 x 512-->
                <img src="https://akamai-webcdn.kgstatic.net/cms/6/news/de22ad4ad37d3966e43ef2c47853aaed.jpg" width="360" height="210" class="type_m img_head" alt="">
                <!--m 이미지 사이즈: 360 x 206-->
             </div>
          </div>
          <div class="group_info">
             <em class="info_category txt_announce txt_updates">Updates</em>
             <!-- [클래스 부여] ANNOUNCEMENT : txt_announce, EVENTS : txt_event, MAINTENANCE : txt_maintenance , UPDATES : txt_updates -->
             <span class="txt_date">Mar 16. 2023</span>
             <h2 class="tit_news">Marketplace Arrivals - March 16, 2023</h2>
          </div>
       </div>
       <div class="box_post news-content">
          <p style="text-align: center;"><span style="font-size:24pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Philosopher,sans-serif"><span style="color:#434343"><span style="font-weight:700"><span style="font-style:normal"><span style="text-decoration:none">ArcheAge</span></span></span></span></span></span></p>
          <p>&nbsp;</p>
          <ul>
             <li aria-level="1" style="list-style-type:disc">
                <span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">There will be a discount for the products under the following category (up until maintenance on Mar. 23, 2023).</span></span></span></span></span></span>
                <ul>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Credit Shop: Costumes&nbsp;</span></span></span></span></span></span></li>
                </ul>
             </li>
          </ul>
          <p>&nbsp;</p>
          <ul>
             <li aria-level="1" style="list-style-type:disc"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">The following items were added to the shop.</span></span></span></span></span></span></li>
          </ul>
          <div>
             <div class="wrap_tbl">
                <table style="border:none; border-collapse:collapse" width="797">
                   <colgroup>
                      <col width="283">
                      <col width="76">
                      <col width="86">
                      <col width="104">
                      <col width="101">
                      <col width="147">
                   </colgroup>
                   <tbody>
                      <tr>
                         <td style="border-bottom:1px solid #242628; vertical-align:middle; background-color:#4e5c80; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:283px">
                            <p style="line-height:1.2; margin-left:24px; text-indent:-18pt; padding:0pt 0pt 0pt 18pt"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#ffffff"><span style="font-weight:700"><span style="font-style:normal"><span style="text-decoration:none">Name</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:middle; background-color:#4e5c80; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:76px">
                            <p style="line-height:1.2; margin-left:24px; text-indent:-18pt; padding:0pt 0pt 0pt 18pt"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#ffffff"><span style="font-weight:700"><span style="font-style:normal"><span style="text-decoration:none">Qty</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:middle; background-color:#4e5c80; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:86px">
                            <p style="line-height:1.2; margin-left:24px; text-indent:-18pt; padding:0pt 0pt 0pt 18pt"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#ffffff"><span style="font-weight:700"><span style="font-style:normal"><span style="text-decoration:none">Type</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:middle; background-color:#4e5c80; padding:7px 7px 7px 7px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:104px">
                            <p style="line-height:1.2; margin-left:24px; text-indent:-18pt; padding:0pt 0pt 0pt 18pt"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#ffffff"><span style="font-weight:700"><span style="font-style:normal"><span style="text-decoration:none">Price</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:middle; background-color:#4e5c80; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:101px">
                            <p style="line-height:1.2; margin-left:24px; text-indent:-18pt; padding:0pt 0pt 0pt 18pt"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#ffffff"><span style="font-weight:700"><span style="font-style:normal"><span style="text-decoration:none">Sale End</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:middle; background-color:#4e5c80; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:147px">
                            <p style="line-height:1.2; margin-left:24px; text-indent:-18pt; padding:0pt 0pt 0pt 18pt"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#ffffff"><span style="font-weight:700"><span style="font-style:normal"><span style="text-decoration:none">Purchase Limit</span></span></span></span></span></span></span></span></p>
                         </td>
                      </tr>
                      <tr>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:283px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">ArchePass Support Bundle: Economy</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:76px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">1</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:86px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Credits</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:104px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">1,500</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:101px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Mar. 30, 2023</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:147px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Once per account</span></span></span></span></span></span></span></span></p>
                         </td>
                      </tr>
                      <tr>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:283px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">ArchePass Support Bundle: Combo</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:76px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">1</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:86px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Credits</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:104px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">6,900</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:101px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Mar. 30, 2023</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:147px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Once per account</span></span></span></span></span></span></span></span></p>
                         </td>
                      </tr>
                      <tr>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:283px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">ArchePass XP Boost</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:76px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">6</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:86px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Credits</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:104px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">375</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:101px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Mar. 30, 2023</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:147px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">3 times per account</span></span></span></span></span></span></span></span></p>
                         </td>
                      </tr>
                      <tr>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:283px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Bound Labor Recharger</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:76px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">50</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:86px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Credits</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:104px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:line-through"><span style="-webkit-text-decoration-skip:none"><span style="text-decoration-skip-ink:none">2,500</span></span></span></span></span></span></span></span></span></span></p>
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">1,750</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:101px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Mar. 30, 2023</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:147px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Twice per account</span></span></span></span></span></span></span></span></p>
                         </td>
                      </tr>
                      <tr>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:283px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Bound Tax Certificate</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:76px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">1,000</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:86px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Credits</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:104px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:line-through"><span style="-webkit-text-decoration-skip:none"><span style="text-decoration-skip-ink:none">14,000</span></span></span></span></span></span></span></span></span></span></p>
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">9,800</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:101px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Mar. 30, 2023</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:147px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Once per account</span></span></span></span></span></span></span></span></p>
                         </td>
                      </tr>
                      <tr>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:283px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Manastorm Box: Eye-catching Gliders</span></span></span></span></span></span></span></span></p>
                            <p style="list-style-type:disc"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#222222"><span style="background-color:#ffffff"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">(+Bonus) Manastorm Crystal x50</span></span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:76px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">1</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:86px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Credits</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:104px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">4,000</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:101px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:'Open Sans',sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Mar. 30, 2023</span></span></span></span></span></span></span></span></p>
                         </td>
                         <td style="border-bottom:1px solid #242628; vertical-align:bottom; padding:3px 3px 3px 3px; border-top:1px solid #242628; border-right:1px solid #242628; border-left:1px solid #242628; width:147px">
                            <p style="line-height:1.2"><span style="overflow:hidden"><span style="overflow-wrap:break-word"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">3 times per account</span></span></span></span></span></span></span></span></p>
                         </td>
                      </tr>
                   </tbody>
                </table>
             </div>
          </div>
          <p><br>
             &nbsp;
          </p>
          <ul>
             <li aria-level="1" style="list-style-type:disc">
                <span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">You can now purchase some of the costumes that used to be unavailable at the Melisara, Gene servers.</span></span></span></span></span></span>
                <ul>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Image Item: Blooming Spring Cow Chroma</span></span></span></span></span></span></li>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Image Item: Cheerberry Yata Chroma</span></span></span></span></span></span></li>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Image Item: Blackjack Yata Pirate Chroma</span></span></span></span></span></span></li>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Image Item: Bloody Adorable Yata Pirate Chroma</span></span></span></span></span></span></li>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Image Item: Fae Yata Chroma</span></span></span></span></span></span></li>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Image Item: Evergreen Chroma</span></span></span></span></span></span></li>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Image Item: Autumn Greenman Chroma</span></span></span></span></span></span></li>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Image Item: Fae Greenman Chroma</span></span></span></span></span></span></li>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Image Item: Springsong Greenman Chroma</span></span></span></span></span></span></li>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Image Item: Holiday Snow Cow Chroma</span></span></span></span></span></span></li>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Image Item: True Blue Yata Chroma</span></span></span></span></span></span></li>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Image Item: Werefox Robes</span></span></span></span></span></span></li>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Appearance Item: Crest Wooden Doll</span></span></span></span></span></span></li>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Image Item: True Blue Yata Costume</span></span></span></span></span></span></li>
                   <li aria-level="2" style="list-style-type:circle"><span style="font-size:11pt; font-variant:normal; white-space:pre-wrap"><span style="font-family:Arimo,sans-serif"><span style="color:#242628"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Image Item: Evergreen Suit</span></span></span></span></span></span></li>
                </ul>
             </li>
          </ul>
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
       <div class="box_nav">
          <div class="inner_nav">
             <a class="btn_prev" role="button" href="/news/2038?type=all&amp;page=null&amp;index=null">
                <!-- 비활성화 : 클래스 type_disabled -->
                <span class="screen_out">NEWS</span>PREV <span class="ico_svg ico_arr">GO</span>
             </a>
             <a class="btn_list" role="button" href="/news?type=all">
             <span class="ico_svg ico_list">NEWS LIST GO</span>
             </a>
             <a class="btn_next" role="button" href="/news/2048?type=all&amp;page=null&amp;index=null">
                <!-- 비활성화 : 클래스 type_disabled -->
                <span class="screen_out">NEWS</span>NEXT <span class="ico_svg ico_arr">GO</span>
             </a>
          </div>
       </div>
    </section>
 </main>
@endsection
@push('scripts')

@endpush
