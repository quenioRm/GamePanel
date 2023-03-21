@extends('controlpanel.layout.main')

@section('title', __('messages.controlPanelProfilePersonal'))

@section('controlPalnel')
<article class="content myinfo">
        <input class="" icon="" labelname="" placeholder="" data-val="true" data-val-required="Favor selecionar a região." id="hdNationCode" name="_nationCode" type="hidden" value="BR" />
        <span class="field-validation-valid" data-valmsg-for="_nationCode" data-valmsg-replace="true"></span>
        <input class="" icon="" labelname="" placeholder="" id="hdUnInterestedGameStr" name="_unInterestedGameStr" type="hidden" value="" />
        <h2 class="line">{{__('messages.accountprofileTitle')}}</h2>
        <div class="box_my_account my_account_info">
            <table class="tbl_row_type">
                <caption>
                    {{__('messages.accountprofileMessage')}}
                    <p>{{__('messages.accountprofileMessage2')}}</p>
                </caption>
                <colgroup>
                    <col style="width: 20%;" class="mob_col1" />
                    <col style="width: auto;" />
                    <col style="width: 30%;" class="mob_col32" />
                </colgroup>
                <tbody>
                    <tr>
                        <th scope="row">E-mail</th>
                        <td class="title">{{Auth::user()->email}}</td>
                        <td class="align_right">
                            <span class="icon_essentail">
                                <i class="icn_svg circle_bang"></i>
                                {{__('messages.accountprofileMessage3')}}
                            </span>
                        </td>
                    </tr>
                    <tr class="add_email_area">
                        @if (isset(Auth::user()->userinformationadd[0]->email))
                            <th scope="row">{{__('messages.accountprofileMessage4')}}</th>
                            <td class="title">{{Auth::user()->userinformationadd[0]->email}}</td>
                            <td class="align_right">
                                <span class="icon_essentail">
                                    <i class="icn_svg circle_bang"></i>
                                    {{__('messages.accountprofileMessage4')}}
                                </span>
                            </td>
                        @else
                            <th rowspan="2" class="no_line" scope="row">{{__('messages.accountprofileMessage4')}}</th>
                            <td colspan="2" class="title no_line">
                                <p>{{__('messages.accountprofileMessage5')}}</p>
                                <p class="email_text text_gray">{{__('messages.accountprofileMessage6')}}</p>
                            </td>
                        @endif
                    </tr>
                    @if (!isset(Auth::user()->userinformationadd[0]->email))
                    <tr class="add_email_area2">
                        <td class=""></td>
                        <td class="align_right">
                            <div class="btn_wrap">
                                <a href="{{route('gamepanel.controlpanel.accountprofilesecondemail')}}" class="btn btn_gray btn_sml" id="js-linkAddEmail"><span>{{__('messages.accountprofileMessage7')}}</span></a>
                            </div>
                        </td>
                    </tr>
                    @endif
                    <tr class="password_text">
                        <th scope="row">Senha</th> 
                            @if (isset($lastpasswordhange->created_at) != null)
                            <td class="title"><span class="text_gray">{{__('messages.accountprofileMessage8')}} 
                                {{$lastpasswordhange->created_at->format('d/m/y H:i:s')}}</span></td> 
                                @else
                                <td>-</td>
                            @endif
                        <td class="align_right">
                            <div class="btn_wrap">
                                <a href="{{route('gamepanel.controlpanel.accountprofilechangepassword')}}" class="btn btn_gray btn_sml"><span>{{__('messages.controlPanelProfileChangePasswordTitle')}}</span></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Nome</th>
                        <td class="title">
                            <input class="" icon="" id="" labelname="" placeholder="" name="_name" type="hidden" value="Quenio" />
                            {{mb_convert_case( Auth::user()->name, MB_CASE_TITLE , 'UTF-8' )}}
                        </td>
                        <td class="align_right">
                            <span class="icon_essentail">
                                <i class="icn_svg circle_bang"></i>
                                {{__('messages.unavailable')}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">{{__('messages.nation')}}</th>
                        <td class="title">
                            <input class="" icon="" id="" labelname="" placeholder="" name="_nationCode" type="hidden" value="BR" /><span class="field-validation-valid" data-valmsg-for="_nationCode" data-valmsg-replace="true"></span>
                            {{$accountregion->name}}
                        </td>
                        <td class="align_right">
                            <span class="icon_essentail">
                                <i class="icn_svg circle_bang"></i>
                                {{__('messages.unavailable')}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">{{__('messages.birth')}}</th>
                        <td class="title">{{date('d/m/Y', strtotime(Auth::user()->birth))}}</td>
                        <td class="align_right">
                            <span class="icon_essentail">
                                <i class="icn_svg circle_bang"></i>
                                {{__('messages.unavailable')}}
                            </span>
                        </td>
                    </tr>

                    {{-- <tr>
                        <th scope="row">Celular</th>
                        <td class="title">
                            <p>Favor registrar o número de celular.</p>

                            <p class="text_gray">* Notificação de Segurança da Conta e Autenticação em Duas Etapas disponíveis para uso.</p>
                        </td>
                        <td class="align_right">
                            <div class="btn_wrap">
                                <a href="https://account.pearlabyss.com/pt-BR/Account/MyInfo/MobileAuth" class="btn btn_gray btn_sml">
                                    Digitar
                                </a>
                            </div>
                        </td>
                    </tr> --}}

                </tbody>
            </table>
        </div>
</article>
@endsection
@push('scripts')

@endpush