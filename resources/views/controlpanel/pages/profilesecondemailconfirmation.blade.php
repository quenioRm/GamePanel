@extends('controlpanel.layout.main')

@section('title', __('messages.controlPanelProfileSecondEmail'))

@section('controlPalnel')
<article class="content addemailcomplete">

<form id="frmAuthMailSend" method="post" action="{{route('controlpanel.accountprofilesecondemailconfirmation')}}">
    @csrf
    <input data-val="true" name="email" type="hidden" value="{{request()->email}}" />
    <h2 class="line">{{__('messages.btncontrolPanelProfileSecondEmail')}}</h2>
    <div class="icon_box">
        <span class="icon">
            <i class="pi pi_icon_email"></i>
        </span>
        <h3>{{__('messages.emailmessage_12')}}</h3>
    </div>
    <div class="box_white mid_pad">
        <span class="text_complete">
            {{__('messages.emailmessage_13')}}
        </span>
        <div class="box_email">
            <span>{{request()->email}}</span>
        </div>
        <div class="pi_wrap">
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
         </div>
        <span class="time_auth">
            {{__('messages.emailmessage_4')}}<br />
            {{__('messages.emailmessage_11')}}<br />
        </span>
        <div class="btn_wrap">
            <button type="submit" id="addEmail" class="btn btn_big btn_blue">{{__('messages.confirm')}}</button>
        </div>
    </div>
</article>
</form>
@endsection
@push('scripts')

@endpush