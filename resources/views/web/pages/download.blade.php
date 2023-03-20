@extends('web.layout.main')

@section('title', 'Download')

@section('content')
<section class="section-download">
    <div class="wrapper">
        <h3>DOWNLOAD</h3>
        <a href="https://akamai-aa-gamecdn.playkakaogames.com/live/Launcher/Archeage/ArcheAgeSetup.exe" download="filename.exe" class="btn primary download">
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
        <h3>System Requirements and Recommendations</h3>
        <table>
            <thead>
            <tr>
                <th>Category</th>
                <th>Minimum Requirements</th>
                <th>Recommended Specifications</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Processor</td>
                <td>Intel® Core™2 Duo</td>
                <td>Intel® Core™ i7</td>
            </tr>
            <tr>
                <td>Storage</td>
                <td>70GB HDD (NTFS format Disk)</td>
                <td>70GB HDD / SSD (NTFS format Disk)</td>
            </tr>
            <tr>
                <td>Memory</td>
                <td>2GB RAM</td>
                <td>4GB RAM / 8GB RAM (64-bit)</td>
            </tr>
            <tr>
                <td>Video</td>
                <td>NVIDIA GeForce 8000 series 512MB / AMD Radeon HD 4000 series 512MB</td>
                <td>NVIDIA GeForce GTX 660, AMD Radeon HD 7850</td>
            </tr>
            <tr>
                <td>Operating System</td>
                <td>Windows 8.1</td>
                <td>Windows 10</td>
            </tr>
            </tbody>
        </table>
        <ul class="descr">
            <li>Windows 8 and lower OS is not recommended.</li>
            <li>NVIDIA GeForce 660 or higer GPU is recommended when using DirectX 11 and TXAA graphics options.</li>
            <li>TXAA is only supported by Kepler-based NVIDIA GeForce 660 or higer GPU.</li>
            <li>ArcheAge is optimized for DirectX 9.0c or DirectX 11.</li>
        </ul>
        <h3>Graphics card driver and latest DirectX download</h3>
        <div class="list-drivers">
            <div class="item">
                <img src="https://img.aa.playkakaogames.com/aalg/live/images/main/logo_amd.png">
                <a style="color:#fff;" href="javascript:void(0);" onclick="window.open('https://www.amd.com/en/support')">AMD DRIVER DOWNLOAD</a>
            </div>
            <div class="item">
                <img src="https://img.aa.playkakaogames.com/aalg/live/images/main/logo_nvidia.png">
                <a style="color:#fff;" href="javascript:void(0);" onclick="window.open('https://www.nvidia.com/Download/index.aspx')">NVIDIA DRIVER DOWNLOAD</a>
            </div>
            <div class="item">
                <img src="https://img.aa.playkakaogames.com/aalg/live/images/main/logo_directx.png">
                <a style="color:#fff;" href="javascript:void(0);" onclick="window.open('https://www.microsoft.com/en-us/download/details.aspx?id=35')">DirectX DOWNLOAD</a>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')

@endpush
