@extends('web.layout.main')

@section('title', 'Download')

@section('content')
<section class="section-download">
    <div class="wrapper">
        <h3>DOWNLOAD</h3>
        <a href="#" download="#" class="btn primary download">
            <div class="bk_logos">
                <div class="logo"></div>
                <div class="logo_bar"></div>
                <div class="logo_uc"></div>
            </div>
            <span class="txt_g" style="color:#fff;">DOWNLOAD</span>
            <span class="ico"></span>
        </a>
    </div>
</section>
<section class="section-specification">
    <div class="wrapper">
        <h3>{{__('messages.systemreq')}}</h3>
        <table>
            <thead>
            <tr>
                <th>{{__('messages.category')}}</th>
                <th>{{__('messages.minreq')}}</th>
                <th>{{__('messages.espreq')}}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{__('messages.processor')}}</td>
                <td>Intel® Core™2 Duo</td>
                <td>Intel® Core™ i7</td>
            </tr>
            <tr>
                <td>{{__('messages.storage')}}</td>
                <td>20GB HDD (NTFS format Disk)</td>
                <td>20GB HDD / SSD (NTFS format Disk)</td>
            </tr>
            <tr>
                <td>{{__('messages.memory')}}</td>
                <td>2GB RAM</td>
                <td>4GB RAM / 8GB RAM (64-bit)</td>
            </tr>
            <tr>
                <td>Video</td>
                <td>NVIDIA GeForce 8000 series 512MB / AMD Radeon HD 4000 series 512MB</td>
                <td>NVIDIA GeForce GTX 660, AMD Radeon HD 7850</td>
            </tr>
            <tr>
                <td>{{__('messages.opsytem')}}</td>
                <td>Windows 8.1</td>
                <td>Windows 10</td>
            </tr>
            </tbody>
        </table>
        <ul class="descr">
            <li>{{__('messages.downloadmessage1')}}</li>
            <li>{{__('messages.downloadmessage2')}}</li>
            <li>{{__('messages.downloadmessage3')}}</li>
            <li>{{ env('WEB_NAME') . ' ' . __('messages.downloadmessage4')}}</li>
        </ul>
        <h3>{{__('messages.downloadmessage5')}}</h3>
        <div class="list-drivers">
            <div class="item">
                <img src="{{asset('assets/web/images/main/logo_amd.png')}}">
                <a style="color:#fff;" href="javascript:void(0);" onclick="window.open('https://www.amd.com/en/support')">AMD DRIVER DOWNLOAD</a>
            </div>
            <div class="item">
                <img src="{{asset('assets/web/images/main/logo_nvidia.png')}}">
                <a style="color:#fff;" href="javascript:void(0);" onclick="window.open('https://www.nvidia.com/Download/index.aspx')">NVIDIA DRIVER DOWNLOAD</a>
            </div>
            <div class="item">
                <img src="{{asset('assets/web/images/main/logo_directx.png')}}">
                <a style="color:#fff;" href="javascript:void(0);" onclick="window.open('https://www.microsoft.com/en-us/download/details.aspx?id=35')">DirectX DOWNLOAD</a>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')

@endpush
