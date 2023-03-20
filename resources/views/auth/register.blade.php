@extends('layouts.main')

@section('title', __('messages.register'))

@section('content')
<form action="{{route('gamepanel.register')}}" class="js-submitActive container_wrap" id="frmJoin" method="post">
   @csrf
   <input Class="" Icon="" LabelName="" Placeholder="" id="birthFormat" name="birthFormat" type="hidden" value="dd/MM/yyyy" /><input Class="" Icon="" LabelName="" Placeholder="" id="birthFormatRegex" name="birthFormatRegex" type="hidden" value="(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$" /><input Class="" Icon="" LabelName="" Placeholder="" id="_canPlayNationCode" name="_canPlayNationCode" type="hidden" value="HK|MO|TW|JP|AM|AZ|BY|GE|KZ|KG|MD|RU|TJ|TM|UA|UZ|EE|LV|LT|DZ|AO|BH|BJ|BW|BF|BI|CM|CF|TD|CG|CD|CI|DJ|EG|GQ|ER|ET|GA|GM|GH|GN|GW|IR|IQ|IL|JO|KE|KW|LB|LS|LR|LY|MG|MW|ML|MR|MU|MA|MZ|NA|NE|NG|OM|PS|QA|RW|SA|SN|SL|SO|ZA|SS|SD|SZ|SY|TZ|TG|TN|TR|UG|AE|EH|YE|ZM|ZW|TH|BN|KH|ID|LA|MY|MM|PH|SG|VN|AX|AL|AS|AD|AI|AW|AU|AT|BE|BM|BA|BV|IO|BG|CA|KY|CK|HR|CW|CY|CZ|DK|FK|FO|FJ|FI|FR|GF|PF|TF|DE|GI|GR|GL|GP|GU|GG|VA|HU|IS|IE|IM|IT|JE|KI|LI|LU|MK|MT|MH|MQ|YT|MX|FM|MC|ME|MS|NR|NL|NC|NZ|NU|NF|MP|NO|PW|PG|PN|PL|PT|PR|RE|RO|BL|SH|PM|WS|SM|RS|SK|SI|SB|GS|ES|SJ|SE|CH|TK|TO|TC|TV|GB|US|UM|VU|VG|VI|WF|AF|AQ|AG|AR|BS|BD|BB|BZ|BT|BO|BR|CV|CL|CX|CC|CO|KM|CR|CU|DM|DO|EC|SV|GD|GT|GY|HT|HM|HN|IN|JM|MV|MN|NP|NI|PK|PA|PY|PE|KN|LC|VC|ST|SC|LK|SR|TL|TT|UY|VE" /><input Class="" Icon="" LabelName="" Placeholder="" id="_skinID" name="_skinID" type="hidden" value="" /><input Class="" Icon="" LabelName="" Placeholder="" id="hdEncGameCode" name="_encGameCode" type="hidden" value="" />
    <div id="step02" class="container container_join">
       <article class="content">
          {{-- <h2>Criar Pearl Abyss ID</h2> --}}
          <div class="box_join">
            <div class="input_with_btn js-email">
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
                       <label for="email"><span>{{__('messages.email')}}</span></label><span class="custom_line"></span>
                   </div>
                   <div class="input_validate error"><span class="{{($errors->has('email') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="email" data-valmsg-replace="true">
                     @if ($errors->has('email'))
                         <span class="">{{$errors->first('email')}}</span>
                     @endif
                     </span>
                   </div>
               </div>
               <button type="button" class="btn btn_blue btn_absolute btn_sml js-emailAuth disabled" id="emailAuth" disabled>
                  {{__('messages.authenticate')}}
               </button>
               <div class="opacityNot validMarkWrap js-validMarkWrap">
                   <span class="icn_valid_check btn_absolute js-validMark"></span>
               </div>
               <div class="input_validate error"><span class="field-validation-error visible js-emailCheckResult"></span></div>
           </div>

            <div class="input_with_btn input_auth js-authKey">
               <div class="custom_input label">
                  <div class="custom_inputBox">
                     <input class="" Icon="" placeholder="" autocomplete="off" data-val="true" data-val-required="É necessário confirmar o e-mail." id="authKey" labelName="Código de Confirmação" name="authKey" type="number" value="" />
                     <label for="authKey"><span>{{__('messages.confirmationCode')}}</span></label><span class="custom_line"></span>
                  </div>
                  <div class="input_validate error"><span class="{{($errors->has('authKey') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="authKey" data-valmsg-replace="true">
                     @if ($errors->has('authKey'))
                         <span class="">{{$errors->first('authKey')}}</span>
                     @endif
                     </span>
                   </div>
               </div>
               <button type="button" class="btn btn_blue btn_absolute btn_sml js-authCheck" id="emailAuthCheck">{{__('messages.confirm')}}</button>
               <div class="tooltip_wrap email_tooltip js-questionToolTip" tabindex="0">
                  <span class="tooltip_title">{{__('messages.confirmationCodeMessageOne')}}</span>
                  <ul class="balloon_box">
                     <li class="balloon_desc">{{__('messages.confirmationCodeMessageTwo')}}</li>
                     <li class="balloon_desc">{{__('messages.confirmationCodeMessageTree')}}</li>
                     <li class="balloon_desc">{{__('messages.confirmationCodeMessageFour')}}</li>
                  </ul>
               </div>
         </div>

             <div class="password_wrap input_margin js-password js-capslockWrap">
                <div class="capslock_wrap">
                   <button type="button" class="btn_capslock icn_svg icn_capslock js-btnCapslock hide">
                   <span class="blind">{{__('messages.capsLock')}}</span>
                   </button>
                   <dl class="balloon_box js-capslockMsg">
                      <dd class="balloon_desc dot_hidden">{{__('messages.capsLockMessage')}}</dd>
                   </dl>
                </div>
                <div class="custom_input label ">
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
                <dl class="balloon_box">
                   <dd class="balloon_desc dot_hidden">{{__('messages.passwordMessageOne')}}</dd>
                </dl>
             </div>

             <div class="password_wrap input_margin input_pass_check on js-passwordCheck js-capslockWrap">
                <div class="capslock_wrap">
                   <button type="button" class="btn_capslock icn_svg icn_capslock js-btnCapslock hide">
                   <span class="blind">{{__('messages.capsLock')}}</span>
                   </button>
                   <dl class="balloon_box js-capslockMsg">
                      <dd class="balloon_desc dot_hidden">{{__('messages.capsLockMessage')}}</dd>
                   </dl>
                </div>

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
             </div>

             <div class="input_margin">
                <div class="custom_input label ">
                  <div class="custom_inputBox">
                     <input class="{{($errors->has('name') ? 'input-validation-error' : '')}}" Icon="" id="name" placeholder="" data-val="true"
                     data-val-required="{{__('messages.name-data-val-required')}}" labelName="Nome" name="name"
                     type="text" value="{{old('name')}}" /><label for="name"><span>{{__('messages.name')}}
                     </span></label>
                     <span class="custom_line"></span>
                 </div>
                 <div class="input_validate error"><span class="{{($errors->has('name') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="name" data-valmsg-replace="true">
                     @if ($errors->has('name'))
                        <span class="">{{$errors->first('name')}}</span>
                     @endif
                     </span>
                  </div>
                </div>
             </div>

             <div class="input_margin">
                <div class="custom_input label ">
                   <div class="custom_inputBox">
                        <input Icon="" placeholder="" class="input_mask js-inputMask" data-val="true" data-val-required="{{__('messages.birth-data-val-required')}}"
                        id="birth" labelName="Data de Nascimento" name="birth" type="text" value="{{old('birth')}}" />
                        <label for="birth"><span>{{__('messages.birth')}}</span></label><span class="custom_line"></span>
                   </div>
                   <div class="input_validate error"><span class="{{($errors->has('birth') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="birth" data-valmsg-replace="true">
                        @if ($errors->has('birth'))
                           <span class="">{{$errors->first('birth')}}</span>
                        @endif
                        </span>
                    </div>
                </div>
             </div>

             <div class="input_margin js-country" data-nation="BR">
                <div class="custom_wrap select2-input select2-input ">
                   <div class="custom_select">
                      <select Icon="" Placeholder="" class="js-nationSelect js-select2" data-val="true" data-val-required="Favor selecionar a região." id="nationCode" labelName="Região" name="nationCode">
                         <option value="">Selecione</option>
                         @foreach ($countries as $country)
                              <option value="{{$country->code_1}}" @if (old('nationCode') == $country->code_1) {{ 'selected' }} @endif>{{$country->name}}</option>
                         @endforeach
                      </select>
                   </div>
                   <label for="nationCode" class="input_label js-labelSelect">{{__('messages.nation')}}</label>
                </div>
                <div class="input_validate error"><span class="{{($errors->has('nationCode') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="nationCode" data-valmsg-replace="true">
                     @if ($errors->has('nationCode'))
                        <span class="">{{$errors->first('nationCode')}}</span>
                     @endif
                     </span>
               </div>
             </div>
             <div id="error_no_country" class="input_validate error">
                <span class="field-validation-error">
                <span id="nationCode-VN-error" class="">Servi&#231;o de Tera indispon&#237;vel na regi&#227;o. <br />Favor confirmar a regi&#227;o.</span>
                </span>
             </div>
             @include('auth.includes.registerigree')
          </div>
       </article>
       <div class="btn_wrap">
          <button type="button" class="btn btn_big2 btn_blue js-btnJoin">Cadastrar</button>
       </div>
       <button type="button" class="btn_join_close js-joinClose">
       <span class="close_border"></span><span class="close_border"></span>
       <span class="blind">Fechar</span>
       </button>
    </div>
 </form>
 </div>
@endsection
@push('scripts')
    <script src="{{asset('assets/js/register/join.js?v=638016825217184276')}}"></script>
    <script>
        $(document).ready(function () {
            _abyss.join.joinInit();
        });
    </script>
   <script src="//www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
   <script type="text/javascript">
         var onloadCallback = function () {
            var widgetId =
            grecaptcha.render('html_element', {
               'sitekey': '{{env('RECPTCHA_KEY')}}'
               , 'callback': function () {
                     $('.js-modalDim').trigger('click');
               }
            });
         };
         _abyss.setRecaptchaCheck();
   </script>
    {{-- <script>
         $( document ).ready(function() {
            $.ajax({
                  url: "{{route('countries', App::getLocale())}}",
                  success: function(response){
                     var $dropdown = $("#nationCode");
                     $.each(response.countries, function(i, v) {
                        $dropdown.append($("<option />").val(v.code_1).text(v.name));
                     });
                  },
                  dataType: "json"
            });
         });

    </script> --}}

@endpush
