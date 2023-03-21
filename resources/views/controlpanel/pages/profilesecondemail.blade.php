@extends('controlpanel.layout.main')

@section('title', __('messages.controlPanelProfileSecondEmail'))

@section('controlPalnel')
<article class="content addemail">
    <form action="{{route('gamepanel.controlpanel.accountprofilesecondemail')}}" id="frmAddEmail" method="post" novalidate="novalidate">
        @csrf
       <div class="email_confirm">
          <h2 class="line">{{__('messages.controlPanelProfileSecondEmail')}}</h2>
          <div class="icon_box">
             <span class="icon">
             <i class="pi pi_icon_email"></i>
             </span>
             <h3>{{__('messages.controlPanelProfileSecondEmailMessage_1')}}</h3>
          </div>
          <div class="box_white mid_pad">
             <div class="pi_wrap">
                <div class="custom_input label ">
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
                    <div class="input_validate error">
                        <span class="{{($errors->has('email') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="email" data-valmsg-replace="true">
                            @if ($errors->has('email'))
                                <span class="">{{$errors->first('email')}}</span>
                            @endif
                        </span>
                    </div>
                </div>
             </div>
             <div class="btn_wrap">
                <button type="submit" id="addEmail" class="btn btn_big btn_blue">{{__('messages.btncontrolPanelProfileSecondEmail')}}</button>
             </div>
          </div>
       </div>
    </form>
 </article>
@endsection
@push('scripts')

@endpush