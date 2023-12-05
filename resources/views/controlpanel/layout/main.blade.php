@extends('layouts.main')

@section('title', __('messages.login'))

@push('styles')
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/mypage.css?v=638016825217184276')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="container mypage">
    <div id="js-leftNavAcitve" class="aside_wrap left">
        <div class="aside_top">
            <a href="#" class="logo_box" title="{{env('WEB_NAME')}}"></a>
            <span class="blind">{{env('WEB_NAME')}}</span>
            <i class="pi pi_nav_close js-navClose"></i>
        </div>
        <div class="inner aside_body">
            <ul class="aside_menu js-leftTabMenus">
                <li id="side_1" class="pi_wrap menu_display_1
                {{Route::is('gamepanel.controlpanel.panelaccountinfo') ? 'active' : ''}}">
                    <a href="{{route('gamepanel.controlpanel.panelaccountinfo')}}" class="pi_my_hover aside_node_parent" target="_self" onclick=" ">
                        <i class="pi pi_mypage_1"></i>
                        {{__('messages.controlPanelAccountInfo')}}
                    </a>
                </li>
                <li id="side_2" class="pi_wrap menu_display_1
                {{Request::segment(2) == 'profile' ? 'active' : ''}}">
                    <a href="{{route('gamepanel.controlpanel.accountprofileinfo')}}" class="pi_my_hover aside_node_parent" target="_self" onclick=" ">
                        <i class="pi pi_mypage_2"></i>
                        {{__('messages.controlPanelProfilePersonal')}}
                    </a>
                </li>
                <li id="side_2" class="pi_wrap menu_display_1
                {{Route::is('gamepanel.controlpanel.panelgiftcode') ? 'active' : ''}}">
                    <a href="{{route('gamepanel.controlpanel.panelgiftcode')}}" class="pi_my_hover aside_node_parent" target="_self" onclick=" ">
                        <i class="pi pi_mypage_2"></i>
                        Gift Code
                    </a>
                </li>
                @if (Auth::user()->permission == 100)
                <li id="side_2" class="pi_wrap menu_display_1
                {{Request::segment(2) == 'profile' ? 'active' : ''}}">
                    <a href="{{route('gamepanel.controlpanel.news.list')}}" class="pi_my_hover aside_node_parent" target="_self" onclick=" ">
                        <i class="pi pi_mypage_2"></i>
                        Adicionar Noticias
                    </a>
                </li>
                @endif

                {{-- <li id="side_2" class="pi_wrap menu_display_1
                {{Request::segment(2) == 'shop' ? 'active' : ''}}">
                    <a href="{{route('gamepanel.controlpanel.shopitems')}}" class="pi_my_hover aside_node_parent" target="_self" onclick=" ">
                        <i class="pi pi_mypage_2"></i>
                        {{__('messages.controlpanelShop')}}
                    </a>
                </li> --}}
                {{-- <li id="side_3" class="pi_wrap menu_display_1
                {{Request::segment(4) == 'mytickets' ? 'active' : ''}}">
                    <a href="{{route('controlpanel.tickets.mytickets')}}" class="pi_my_hover aside_node_parent" target="_self" onclick=" ">

                        <i class="pi pi_mypage_3"></i>
                        {{__('messages.myTickets')}}
                    </a>
                </li> --}}
                {{-- <li id="side_3" data-navregexp="(?=.*\.pearlabyss\.com)(?=.*\/Account\/SNSLink[\/]?)" class="pi_wrap menu_display_1">
                    <a href="https://account.pearlabyss.com/pt-BR/Account/SNSLink" class="pi_my_hover aside_node_parent" target="_self" onclick=" ">
                        <i class="pi pi_mypage_3"></i>
                        Vincular Conta
                    </a>
                </li>
                <li id="side_10" data-navregexp="(?=.*\.pearlabyss\.com)(?=.*\/Account(\/MyInfo(\/AccountSecurity|/Logging)|(\/Otp|/Password|/LoginConfirm))[\/]?)" class="pi_wrap menu_display_1">
                    <a href="https://account.pearlabyss.com/pt-BR/Account/MyInfo/AccountSecurity" class="pi_my_hover aside_node_parent" target="_self" onclick=" ">
                        <i class="pi pi_mypage_10"></i>
                        Central de Segurança da Conta
                    </a>
                </li>
                <li id="side_9" data-navregexp="(?=.*\.pearlabyss\.com)(?=.*\/Account\/LeaveReq[\/]?)" class="pi_wrap menu_display_1">
                    <a href="https://account.pearlabyss.com/pt-BR/Member/LeaveReq" class="pi_my_hover aside_node_parent" target="_self" onclick=" ">
                        <i class="pi pi_mypage_9"></i>
                        Excluir Conta
                    </a>
                </li>
                <li id="side_4" data-navregexp="(?=.*\.pearlabyss\.com)(?=.*\/Account\/WebItemStorage[\/]?)" class="pi_wrap menu_display_2">
                    <a href="https://account.pearlabyss.com/pt-BR/Account/WebItemStorage" class="pi_my_hover aside_node_parent" target="_self" onclick=" ">
                        <i class="pi pi_mypage_4"></i>
                        Armazém Virtual
                    </a>
                </li>
                <li id="side_5" data-navregexp="(?=.*\.pearlabyss\.com)(?=.*\/Account\/Package[\/]?)" class="pi_wrap menu_display_2">
                    <a href="https://account.pearlabyss.com/pt-BR/Account/Package" class="pi_my_hover aside_node_parent" target="_self" onclick=" ">
                        <i class="pi pi_mypage_5"></i>
                        Pacote
                    </a>
                </li>
                <li id="side_6" data-navregexp="(?=.*\.pearlabyss\.com)(?=.*\/Account\/Payment(?!Setting)\/?)" class="pi_wrap menu_display_2">
                    <a href="https://account.pearlabyss.com/pt-BR/Account/Payment" class="pi_my_hover aside_node_parent" target="_self" onclick=" ">
                        <i class="pi pi_mypage_6"></i>
                        Histórico de Compra · Uso
                    </a>
                </li>
                <li id="side_7" data-navregexp="(?=.*\.pearlabyss\.com)(?=.*\/Account\/Payment[\/]?)" class="pi_wrap menu_display_2">
                    <a href="https://account.pearlabyss.com/pt-BR/Account/PaymentSetting" class="pi_my_hover aside_node_parent" target="_self" onclick=" ">
                        <i class="pi pi_mypage_7"></i>
                        Configuração de Pagamento
                    </a>
                </li>
                <li id="side_8" data-navregexp="(?=.*\.pearlabyss\.com)(?=.*\/Account\/MyInfo(\/Security)[\/]?)" class="pi_wrap menu_display_2">
                    <a href="https://account.pearlabyss.com/pt-BR/Account/MyInfo/Security" class="pi_my_hover aside_node_parent" target="_self" onclick=" ">
                        <i class="pi pi_mypage_8"></i>
                        Central de Segurança
                    </a>
                </li> --}}
            </ul>
            <div class="aside_footer">
                <span>© {{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}} Corp. All Rights Reserved.</span>
            </div>
        </div>
        <form action="{{route('gamepanel.logout')}}" method="POST">
            @csrf
            <button class="btn_logout" type="submit">
                {{mb_strtoupper(__('messages.logout'),'UTF-8')}}
            </button>
        </form>
    </div>
    <article class="content dashboard">
        {{-- Content --}}
        @yield('controlPalnel')
    </article>
</div>
@endsection
@push('scripts')
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

@endpush
