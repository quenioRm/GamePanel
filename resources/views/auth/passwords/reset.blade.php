@extends('layouts.main')

@section('title', __('messages.login'))

@section('content')
<form action="{{ route('gamepanel.reset') }}" id="frmLogin" method="post">
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
                            <li>
                                <button class="btn btn_blue btn_mid" id="btnLogin">{{__('messages.btnReset')}}</button>
                            </li>
                        </ul>

                        <div class="box_join">
                            <a href="{{route('gamepanel.register')}}">{{__('messages.registerAccount')}}</a>
                        </div>
                    </fieldset>
                </div>
            </div>
        </article>
    </div>
</form>
<div id="buttonDiv"></div>
@endsection
@push('scripts')
    <script src="{{asset('assets/js/signin/login.js?v=638016825217184276')}}"></script>

    <script>
        $(document).ready(function () {
            _abyss.login.loginInit();
        });
    </script>
@endpush
