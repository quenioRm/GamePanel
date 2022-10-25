@extends('controlpanel.layout.main')

@section('title', __('messages.controlPanelProfileSecondEmail'))

@section('controlPalnel')
<article class="content password">
    <h2 class="line">{{__('messages.controlPanelProfileChangePasswordTitle')}}</h2>
    <div class="icon_box">
        <i class="icon pi pi_icons_11"></i>
        <h3>{{__('messages.controlPanelProfileChangePasswordTitle2')}}</h3>
        <span class="h3_desc">{{__('messages.controlPanelProfileChangePasswordMessage')}}</span>
    </div>

    <form action="{{route('controlpanel.accountprofilechangepassword')}}" id="frmPasswordChange" method="post" novalidate="novalidate">
        @csrf
        <div class="box_white">
            <div class="change_area">
                <ul>
                    <li class="password_wrap js-capslockWrap">
                        <div class="custom_input label">
                            <div class="custom_inputBox">
                                <input
                                    class="{{($errors->has('oldPassword') ? 'input-validation-error password_view' : 'active valid password_view')}}"
                                    id="oldPassword"
                                    placeholder=""
                                    data-val="true"
                                    data-val-maxlength="{{__('messages.data-val-maxlength-100')}}"
                                    data-val-maxlength-max="100"
                                    data-val-minlength="{{__('messages.data-val-minlength-8')}}"
                                    data-val-minlength-min="8"
                                    data-val-regex="{{__('messages.data-val-minlength')}}"
                                    data-val-regex-pattern="(?!(?=.*&amp;#))(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[!@#$%^&amp;*()_+=~-]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+=~-]))|((?=.*[0-9])(?=.*[!@#$%^&amp;*()_+=~-]))|((?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&amp;*()_+=~-]))|((?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&amp;*()_+=~-]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+=~-]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&amp;*()_+=~-])))(^[a-zA-Z0-9!@#$%^&amp;*()_+=~-]{0,}$)"
                                    data-val-required="Favor digitar a sua senha."
                                    icon="icn_password_view js-passShow"
                                    labelname="Senha Atual"
                                    name="oldPassword"
                                    type="password"
                                    value="{{old('oldPassword')}}"
                                />
                                <label for="oldPassword"><span>{{__('messages.OPassword')}}</span></label><span class="custom_line"></span><i class="pi icn_password_view js-passShow" title="Exibir Senha"></i>
                            </div>
                            <div class="input_validate error">
                                <span class="{{($errors->has('oldPassword') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="oldPassword" data-valmsg-replace="true">
                                    @if ($errors->has('oldPassword'))
                                    <span class="">{{$errors->first('oldPassword')}}</span>
                                    @endif
                                </span>
                            </div> 
                        </div>
                        <div class="capslock_wrap">
                            <button type="button" class="btn_capslock icn_svg icn_capslock js-btnCapslock hide"></button>
                            <dl class="balloon_box js-capslockMsg">
                                <dd class="balloon_desc dot_hidden">{{__('messages.capsLockMessage')}}</dd>
                            </dl>
                        </div>
                    </li>
                    <li class="password_wrap js-capslockWrap js-password">
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
                            <div class="input_validate error">
                                <span class="{{($errors->has('password') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="password" data-valmsg-replace="true">
                                    @if ($errors->has('password'))
                                    <span class="">{{$errors->first('password')}}</span>
                                    @endif
                                </span>
                            </div> 
                        </div>
                        <div class="capslock_wrap">
                            <button type="button" class="btn_capslock icn_svg icn_capslock js-btnCapslock hide"></button>
                            <dl class="balloon_box js-capslockMsg">
                                <dd class="balloon_desc dot_hidden">{{__('messages.capsLockMessage')}}</dd>
                            </dl>
                        </div>
                    </li>
                    <li class="password_wrap js-capslockWrap">
                        <div class="custom_input label">
                            <div class="custom_inputBox">
                                <input
                                   class="{{($errors->has('passwordCheck') ? 'input-validation-error password_view' : 'password_view valid')}}"
                                   placeholder=""
                                   autocomplete="off"
                                   data-val="true"
                                   data-val-equalto="{{__('messages.cPassworddata-val-equalto')}}"
                                   data-val-equalto-other="*._password"
                                   icon="icn_password_view js-passShow js-notSyncValidate"
                                   id="passwordCheck"
                                   labelname="Confirmação de Senha"
                                   name="passwordCheck"
                                   type="password"
                                   value=""
                                   aria-describedby="passwordCheck-error"
                                   aria-invalid="false"
                                />
                                <label for="passwordCheck"><span>{{__('messages.cPassword')}}</span></label><span class="custom_line" style="width: 140.4px; left: 16.8px;"></span><i class="pi icn_password_view js-passShow js-notSyncValidate" title="Exibir Senha"></i>
                             </div>
                            <div class="input_validate error">
                                <span class="{{($errors->has('passwordCheck') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="passwordCheck" data-valmsg-replace="true">
                                    @if ($errors->has('passwordCheck'))
                                    <span class="">{{$errors->first('passwordCheck')}}</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <ul class="bullet_list">
                            <li>{{__('messages.passwordMessageOne')}}</li>
                        </ul>
                        <div class="capslock_wrap">
                            <button type="button" class="btn_capslock icn_svg icn_capslock js-btnCapslock hide"></button>
                            <dl class="balloon_box js-capslockMsg">
                                <dd class="balloon_desc dot_hidden">{{__('messages.capsLockMessage')}}</dd>
                            </dl>
                        </div>
                    </li>
                </ul>
                <div class="btn_wrap">
                    <input type="submit" class="btn btn_big btn_blue active" value="{{__('messages.confirm')}}" />
                </div>
            </div>
        </div>
    </form>
</article>
@endsection
@push('scripts')
<script src="{{asset('assets/js/accountinfo/mypage.js')}}"></script>
<script>
    (function () {
        _abyss.mypage.passwordInit();
    })();
</script>
@endpush