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
                    <a href="{{route('controlpanel.profileaccount')}}" class="icon_character" style="background-image: 
                    url({{(Auth::user()->avatar == '' ? asset('img/noavatar.png') : asset('storage/user/avatar/' . Auth::user()->id .'/'. Auth::user()->avatar))}});">
                        <span class="blind">{{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}}</span>
                    </a>
                </span>
                <a href="{{route('controlpanel.profileaccount')}}" class="btn_more">
                    <span class="blind" id="profileNameSetup">{{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}}</span>
                    <i class="pi pi_dash_more_white"></i>
                </a>
                <a href="{{route('controlpanel.profileaccount')}}" class="nickname" aria-labelledby="profileNameSetup">{{mb_convert_case( Auth::user()->name, MB_CASE_TITLE , 'UTF-8' )}}</a>
                <a href="{{route('controlpanel.profileaccount')}}" class="date" aria-labelledby="profileNameSetup">{{__('messages.controlPanelAccountInfoMemberSince')}} 
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
                            <a href="{{route('controlpanel.accountprofileinfo')}}" class="btn_more">
                                <span class="blind" id="accountMyInfo">{{__('messages.controlPanelProfilePersonal')}}</span>
                                <i class="pi pi_dash_more"></i>
                            </a>
                            <span class="pi pi_dash_account"></span>
                            <h3 class="title">{{__('messages.account')}}</h3>
                        </div>
                        <div class="desh_content account_wrap">
                            <a href="{{route('controlpanel.accountprofileinfo')}}" class="email" aria-labelledby="accountMyInfo">{{Auth::user()->email}}</a>
                            
                            @if (isset($lastpasswordhange->created_at))
                            <p class="date_change">{{__('messages.changedPasswordAt')}}  {{$lastpasswordhange->created_at->format('d/m/y H:i:s')}}</p>
                            @endif
                            <a href="{{route('controlpanel.accountprofilechangepassword')}}" class="btn_normal">
                                {{__('messages.controlPanelProfileChangePasswordTitle')}}</a>
                        </div>
                    </div>
                    @if (isset($ip))
                    <div class="desh_box logged">
                        <div class="desh_title">
                            <a href="{{route('controlpanel.accountlogip')}}" class="btn_more">
                                <span class="blind">{{__('messages.LoginHistory')}}</span>
                                <i class="pi pi_dash_more"></i>
                            </a>
                            <p class="pi pi_dash_logged"></p>
                            <h3 class="title">{{__('messages.LoginRecent')}}</h3>
                        </div>
                        <div class="desh_content logged_wrap">
                            <div class="item active">
                                <span class="dot dot1"></span>
                                <span class="dot dot2"></span>
                                <span class="dot dot3"></span>
                                <span class="bullet"></span>
                                
                                <p class="logged_place">
                                    {{$ip->cityName}} - {{$ip->regionCode}}, {{$ip->countryName}}
                                    
                                </p>
                                <p class="logged_time">
                                    {{__('messages.connected')}}
                                </p>
                                <br>
                                    <p>
                                        <li class="toggle_wrap">
                                            <div class="custom_toggle js-ipToggleWrap">
                                                <input
                                                    class="custom_toggle_input"
                                                    Icon=""
                                                    placeholder=""
                                                    {{(Auth::user()->isIpCheck == 0 ? '' : 'checked')}}
                                                    data-val="true"
                                                    data-val-required="The isIpCheck field is required."
                                                    id="isIpCheck"
                                                    labelName="{{__('messages.ip-sec')}}"
                                                    name="isIpCheck"
                                                    type="checkbox"
                                                    value="{{(Auth::user()->isIpCheck == 0 ? 'false' : 'true')}}"
                                                    wrapClass="js-ipToggleWrap"
                                                />
                                                <label for="isIpCheck" class="custom_toggle_label">{{__('messages.ip-sec')}}</label>
                                                <label for="isIpCheck" class="custom_toggle_button"></label>
                                            </div>
                                            <dl class="balloon_box js-balloon">
                                                <dt class="balloon_square"></dt>
                                                <dt class="balloon_title">{{__('messages.what-ip-sec')}}</dt>
                                                <dd class="balloon_desc dot_hidden">
                                                    {{__('messages.ip-security-message')}}
                                                </dd>
                                            </dl>
                                        </li>
                                    </p>
                            </div>
                            <div class="item">
                                <span class="dot dot1"></span>
                                <span class="dot dot2"></span>
                                <span class="dot dot3"></span>
                                <span class="bullet"></span>
                                @if (isset($ip))
                                <p class="logged_place">
                                    {{$ip->cityName}} - {{$ip->regionCode}}, {{$ip->countryName}}
                                </p>
                                <p class="logged_time">
                                    {{$ip->created_at->format('d/m/y H:i:s')}}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="desh_box secure">
                        <div class="desh_title">
                            <span class="pi pi_dash_secure"></span>
                            <h3 class="title">{{__('messages.security')}}</h3>
                        </div>
                        <div class="desh_content">
                            <ul class="secure_list">
                                {{-- <li class="item">
                                    <a href="/Account/Otp" class="title">Configurações de OTP</a>
                                    <span class="btn_secure disabled"><i class="icn_svg security_check gray"></i></span>
                                </li> --}}
                                <li class="item">
                                    <a href="{{route('controlpanel.accountprofilesecondemail')}}" class="title">{{__('messages.accountprofileMessage4')}}</a>
                                    <span class="btn_secure {{(!isset(Auth::user()->userinformationadd[0]->email) ? 'disabled' : '')}}">
                                    <i class="icn_svg security_check {{(!isset(Auth::user()->userinformationadd[0]->email) ? 'gray' : '')}}"></i></span>
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
<script src="{{asset('assets/js/signin/login.js?v=638016825217184276')}}"></script>
                    
<script>
    $(document).ready(function () {
        _abyss.login.loginInit();
    });
</script>

<script>
    $(document).ready(function () {
        _abyss.dashboard.init();
    });
</script>

<script>
    $('#isIpCheck').change(function() {

        $('#isIpCheck').val(this.checked);  
        
            // if(this.checked) {
            //     var returnVal = confirm("Are you sure?");
            //     $(this).prop("checked", returnVal);
            // }
            // $('#isIpCheck').val(this.checked);  

            // console.log(this.value)

            var url = '{{ route("controlpanel.accountprotectaccountbyip", ":isIpCheck") }}';
            url = url.replace(':isIpCheck', this.value);
        
            $.ajax({
                url: url,
                type: 'get',
                contentType: false,
                processData: false,
                success: function(response){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        // background: '#fff',
                        title: response.resultMsg,
                        showConfirmButton: false,
                        timer: 6500
                    })
                },
                error: function (jqXHR, exception) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: jqXHR.resultMsg,
                        showConfirmButton: false,
                        timer: 6500
                    })
                }
            });
        });

    $('#isIpCheck2').change(function () {

        console.log($('#isIpCheck').val())

        return

        
    });
</script>

@endpush