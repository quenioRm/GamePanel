@extends('controlpanel.layout.main')

@section('title', __('messages.controlPanelProfileGiftCode'))

@section('controlPalnel')
<article class="content password">
    <h2 class="line">{{__('messages.controlPanelProfileGiftCode')}}</h2>

    <form action="{{route('gamepanel.controlpanel.panelgiftcode')}}" id="frmPasswordChange" method="post" novalidate="novalidate">
        @csrf
        <div class="box_white">
            <div class="change_area">
                <ul>
                    <li class="password_wrap js-capslockWrap js-password">
                        <div class="custom_input label">
                            <div class="custom_inputBox">
                                <input
                                    class="{{($errors->has('giftcodeid') ? 'input-validation-error password_view' : 'active valid password_view')}}"
                                    id="password"
                                    placeholder=""
                                    type="text"
                                    autocomplete="off"
                                    data-val="true"
                                    data-val-maxlength="{{__('messages.v')}}"
                                    data-val-maxlength-max="100"
                                    data-val-minlength="{{__('messages.data-val-minlength')}}"
                                    data-val-minlength-min="8"
                                    data-val-required="{{__('messages.data-val-required')}}"
                                    icon="icn_password_view js-passShow"
                                    labelName=""
                                    name="giftcodeid"
                                    type="text"
                                    value=""
                                />
                                <label for="giftcodeid"><span>{{__('messages.giftcodeid')}}</span></label><span class="custom_line"></span><i class="pi icn_password_view js-passShow"></i>
                            </div>
                            <div class="input_validate error">
                                <span class="{{($errors->has('giftcodeid') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="giftcodeid" data-valmsg-replace="true">
                                    @if ($errors->has('giftcodeid'))
                                    <span class="">{{$errors->first('giftcodeid')}}</span>
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
