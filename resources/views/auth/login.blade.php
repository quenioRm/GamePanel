@extends('layouts.main')

@section('title', 'Login')

@section('content')
<form action="{{ route('login') }}" id="frmLogin" method="post">
    @csrf
    <div class="container container_login">
        <article class="content system sha_login_content">
            <div class="login_content_wrap">
                <div class="tab_nav_area">
                    <h2 class="mob_half login_title js-tabMenu">
                        <div class="logo_wrap"><a href="{{Request::url()}}" aria-label="{{env('WEB_NAME')}}" class="gamepanel" rel="noopener">{{env('WEB_NAME')}} ID</a></div>
                    </h2>
                </div>
                <input type="hidden" name="_joinType" value="1" />
                <div class="login_box_wrap js-tabContents active">
                    <fieldset class="box_login">
                        <legend>Entrar</legend>
                        <ul>
                            <li class="js-checkInput">
                                <div class="custom_input label">
                                    <div class="custom_inputBox">
                                        <input
                                            class="{{($errors->has('email') ? 'input-validation-error' : 'active valid')}}"
                                            icon=""
                                            id="email"
                                            placeholder=""
                                            autocomplete="off"
                                            data-val="true"
                                            data-val-regex="{{__('messages.data-val-regex-email')}}"
                                            data-val-regex-pattern="^([\w-.^]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$"
                                            data-val-required="{{__('messages.data-val-required-email')}}"
                                            labelname="E-mail"
                                            name="email"
                                            type="text"
                                            value="{{old('email')}}"
                                            aria-describedby="email-error"
                                            aria-invalid="false"
                                        />
                                        <label for="email"><span>{{__('messages.email')}}</span></label><span class="custom_line" style="width: 52.4px; left: 16.8px;"></span>
                                    </div>
                                    <div class="input_validate error"><span class="{{($errors->has('email') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="email" data-valmsg-replace="true">
                                        @if ($errors->has('email'))
                                            <span class="">{{$errors->first('email')}}</span>
                                        @endif
                                    </span></div>
                                </div>
                            </li>                            
                            <li class="password_wrap js-capslockWrap js-checkInput">
                                <div class="custom_input label">
                                    <div class="custom_inputBox">
                                        <input
                                            class="{{($errors->has('password') ? 'input-validation-error password_view' : 'active valid password_view')}}"
                                            id="password"
                                            placeholder=""
                                            type="password"
                                            autocomplete="off"
                                            data-val="true"
                                            data-val-maxlength="{{__('messages.v')}}"
                                            data-val-maxlength-max="100"
                                            data-val-minlength="{{__('messages.data-val-minlength')}}"
                                            data-val-minlength-min="8"
                                            data-val-required="{{__('messages.data-val-required')}}"
                                            icon="icn_password_view js-passShow"
                                            labelName="Senha"
                                            name="password"
                                            type="text"
                                            value=""
                                        />
                                        <label for="password"><span>{{__('messages.password')}}</span></label><span class="custom_line"></span><i class="pi icn_password_view js-passShow"></i>
                                    </div>
                                    {{-- <div class="input_validate error"><span class="field-validation-valid" data-valmsg-for="password" data-valmsg-replace="true"></span></div> --}}
                                    <div class="input_validate error"><span class="{{($errors->has('password') ? '' : 'field-validation-valid')}}" data-valmsg-for="password" data-valmsg-replace="true">
                                        @if ($errors->has('password'))
                                            <span class="">{{$errors->first('password')}}</span>
                                        @endif
                                    </span></div>
                                </div>
                                <div class="capslock_wrap">
                                    <button type="button" class="btn_capslock icn_svg icn_capslock js-btnCapslock hide">
                                        <span class="blind">Caps Lock</span>
                                    </button>
                                    <dl class="balloon_box js-capslockMsg">
                                        <dd class="balloon_desc dot_hidden">O Caps Lock est&#225; ativado.</dd>
                                    </dl>
                                </div>
                            </li>
                            <li class="toggle_wrap">
                                <div class="custom_toggle js-ipToggleWrap">
                                    <input
                                        class="custom_toggle_input"
                                        Icon=""
                                        placeholder=""
                                        checked="checked"
                                        data-val="true"
                                        data-val-required="The _isIpCheck field is required."
                                        id="isIpCheck"
                                        labelName="{{__('messages.ip-sec')}}"
                                        name="_isIpCheck"
                                        type="checkbox"
                                        value="true"
                                        wrapClass="js-ipToggleWrap"
                                    />
                                    <input name="_isIpCheck" type="hidden" value="false" /><label for="isIpCheck" class="custom_toggle_label">{{__('messages.ip-sec')}}</label>
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
                            <li>
                                <button class="btn btn_blue btn_mid" id="btnLogin">{{__('messages.btnEnter')}}</button>
                            </li>
                        </ul>

                        <div class="box_join">
                            <a href="#">
                                {{__('messages.recoverAccount')}}</a>
                            <a href="#">{{__('messages.registerAccount')}}</a>
                        </div>
                    </fieldset>
                    <div class="sns_login_title"><span class="text">ou</span></div>
                    
                    <div class="sns_login_wrap">
                        <ul>
                            <li class="facebook">
                                <button type="button" class="sns js-sns" data-type="facebook">
                                    <i class="pi pi_log_facebook"></i>
                                    <span class="blind">Entrar com Facebook</span>
                                </button>
                            </li>
                            <li class="google">
                                <button type="button" onclick="googleLogin()" class="sns js-sns">
                                    <i class="pi pi_log_google"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </article>
    </div>
</form>
<div id="buttonDiv"></div>
@endsection
@push('scripts')

    <script>
        function googleLogin(){
            window.location.href = "{{route('google.login')}}"
        }
    </script>
@endpush