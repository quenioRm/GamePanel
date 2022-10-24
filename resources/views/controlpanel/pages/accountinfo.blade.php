@extends('controlpanel.layout.main')

@section('title', __('messages.controlPanelAccountInfo'))

@section('controlPalnel')
<input
            class=""
            icon=""
            labelname=""
            placeholder=""
            data-val="true"
            data-val-number="The field _loginType must be a number."
            data-val-required="The _loginType field is required."
            id="hdLoginType"
            name="_loginType"
            type="hidden"
            value="1"
        />
        <input class="" icon="" labelname="" placeholder="" data-val="true" data-val-required="The _isSns field is required." id="hdIsSns" name="_isSns" type="hidden" value="False" />

        <h2 class="line no_margin account_main_page_title">{{__('messages.controlPanelAccountInfo')}}</h2>
        <div class="account_main">
            <div class="user_wrap">
                <span class="character icon_character_area">
                    <a href="{{route('controlpanel.profileaccount')}}" class="icon_character" style="background-image: url({{($account->avatar == '' ? asset('img/noavatar.png') : $account->avatar)}});">
                        <span class="blind">Perfil Pearl Abyss</span>
                    </a>
                </span>
                <a href="/Account/MyInfo/ProfileAccount" class="btn_more">
                    <span class="blind" id="profileNameSetup">Perfil Pearl Abyss</span>
                    <i class="pi pi_dash_more_white"></i>
                </a>
                <a href="/Account/MyInfo/ProfileAccount" class="nickname" aria-labelledby="profileNameSetup">{{mb_convert_case( Auth::user()->name, MB_CASE_TITLE , 'UTF-8' )}}</a>
                <a href="/Account/MyInfo/ProfileAccount" class="date" aria-labelledby="profileNameSetup">{{__('messages.controlPanelAccountInfoMemberSince')}} 
                    {{date('d/m/Y', strtotime(Auth::user()->created_at))}}</a>
            </div>
            <div class="deshboard">
                <div class="desh_left">
                    <div class="desh_box playing_box js-playingBox">
                        <div class="desh_title">
                            <span class="pi pi_dash_game"></span>
                            <h3 class="title">Jogos Acessados</h3>
                        </div>
                        <div class="desh_content">
                            <div class="shortcut_list">
                                <ul class="bdo_slider owl-carousel js-bdoSliderWrap no_slide">
                                    <li class="item js-playingBdo">
                                        <a href="https://www.sa.playblackdesert.com/Login/Pearlabyss?_returnUrl=https://www.sa.playblackdesert.com" class="title">
                                            <i class="bedge_small pi pi_dash_bdo_small"></i>
                                            Black Desert (América do Sul)
                                        </a>
                                        <dl class="subitems">
                                            <dd class="subitem">
                                                <a href="https://www.sa.playblackdesert.com/Login/Pearlabyss?_returnUrl=https://www.sa.playblackdesert.com/Community/Profile" class="arrow btn_normal"><span>Minha Atividade</span></a>
                                            </dd>
                                            <dd class="subitem">
                                                <a href="https://www.sa.playblackdesert.com/Login/Pearlabyss?_returnUrl=https://www.sa.playblackdesert.com/Adventure/Profile" class="arrow btn_normal">
                                                    <span>Minhas Informações de Jogo</span>
                                                </a>
                                            </dd>
                                            <dd class="subitem">
                                                <a href="https://www.sa.playblackdesert.com/Login/Pearlabyss?_returnUrl=https://payment.sa.playblackdesert.com/pt-BR/Shop/Coupon/" class="arrow btn_normal">
                                                    <span>Cupom</span>
                                                </a>
                                            </dd>
                                            <dd class="subitem">
                                                <a href="https://www.sa.playblackdesert.com/Login/Pearlabyss?_returnUrl=https://www.sa.playblackdesert.com/MyPage/WebItemStorage" class="arrow btn_normal"><span>Armazém Virtual</span></a>
                                            </dd>
                                        </dl>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="desh_right">
                    <div class="desh_box account">
                        <div class="desh_title">
                            <a href="/Account/MyInfo" class="btn_more">
                                <span class="blind" id="accountMyInfo">Informações Pessoais</span>
                                <i class="pi pi_dash_more"></i>
                            </a>
                            <span class="pi pi_dash_account"></span>
                            <h3 class="title">Conta</h3>
                        </div>
                        <div class="desh_content account_wrap">
                            <a href="/Account/MyInfo" class="email" aria-labelledby="accountMyInfo">alefe_pimp@hotmail.com</a>
                            <p class="date_change">Senha alterada em 09/04/2021 (UTC)</p>
                            <a href="/Account/Password?_returnUrl=https://account.pearlabyss.com/pt-BR/Account/MyInfo" class="btn_normal">Alterar Senha</a>
                        </div>
                    </div>
                    <div class="desh_box logged">
                        <div class="desh_title">
                            <a href="/Account/MyInfo/Logging/" class="btn_more">
                                <span class="blind">Histórico de Login</span>
                                <i class="pi pi_dash_more"></i>
                            </a>
                            <p class="pi pi_dash_logged"></p>
                            <h3 class="title">Login Recente</h3>
                        </div>
                        <div class="desh_content logged_wrap">
                            <div class="item active">
                                <span class="dot dot1"></span>
                                <span class="dot dot2"></span>
                                <span class="dot dot3"></span>
                                <span class="bullet"></span>
                                <p class="logged_place">
                                    Marau, Brazil
                                </p>
                                <p class="logged_time">
                                    Conectado
                                </p>
                            </div>
                            <div class="item">
                                <span class="dot dot1"></span>
                                <span class="dot dot2"></span>
                                <span class="dot dot3"></span>
                                <span class="bullet"></span>
                                <p class="logged_place">
                                    Marau, Brazil
                                </p>
                                <p class="logged_time">
                                    23/10/2022 (UTC)
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="desh_box secure">
                        <div class="desh_title">
                            <span class="pi pi_dash_secure"></span>
                            <h3 class="title">Segurança</h3>
                        </div>
                        <div class="desh_content">
                            <ul class="secure_list">
                                <li class="item">
                                    <a href="/Account/Otp" class="title">Configurações de OTP</a>
                                    <span class="btn_secure disabled"><i class="icn_svg security_check gray"></i></span>
                                </li>
                                <li class="item">
                                    <a href="/Account/MyInfo" class="title">E-mail Secundário</a>
                                    <span class="btn_secure disabled"><i class="icn_svg security_check gray"></i></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('scripts')
<script src="{{asset('assets/js/accountinfo/mypage.js?v=638016825217184276')}}"></script>
<script src="{{asset('assets/js/accountinfo/dashboard.js?v=638016825217184276')}}"></script>

<script>
    $(document).ready(function () {
        _abyss.dashboard.init();
    });
</script>

@endpush