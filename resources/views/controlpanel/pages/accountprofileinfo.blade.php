@extends('controlpanel.layout.main')

@section('title', __('messages.controlPanelProfilePersonal'))

@section('controlPalnel')
<article class="content myinfo">
        <input class="" icon="" labelname="" placeholder="" data-val="true" data-val-required="Favor selecionar a região." id="hdNationCode" name="_nationCode" type="hidden" value="BR" />
        <span class="field-validation-valid" data-valmsg-for="_nationCode" data-valmsg-replace="true"></span>
        <input class="" icon="" labelname="" placeholder="" id="hdUnInterestedGameStr" name="_unInterestedGameStr" type="hidden" value="" />
        <h2 class="line">Informações Pessoais</h2>
        <div class="box_my_account my_account_info">
            <table class="tbl_row_type">
                <caption>
                    Minhas informações
                    <p>e-mail, senha, nome, data de nascimento</p>
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
                                E-mail Padrão
                            </span>
                        </td>
                    </tr>
                    <tr class="add_email_area">
                        <th rowspan="2" class="no_line" scope="row">E-mail Secundário</th>
                        <td colspan="2" class="title no_line">
                            <p>Favor adicionar um e-mail secundário.</p>
                            <p class="email_text text_gray">* É possível acessar a conta usando o e-mail secundário.</p>
                        </td>
                    </tr>
                    <tr class="add_email_area2">
                        <td class=""></td>
                        <td class="align_right">
                            <div class="btn_wrap">
                                <a href="{{route('controlpanel.accountprofilesecondemail')}}" class="btn btn_gray btn_sml" id="js-linkAddEmail"><span>Adicionar E-mail</span></a>
                            </div>
                        </td>
                    </tr>
                    <tr class="password_text">
                        <th scope="row">Senha</th>
                        <td class="title"><span class="text_gray">Última Alteração : 09/04/2021 (UTC)</span></td>
                        <td class="align_right">
                            <div class="btn_wrap">
                                <a href="{{route('controlpanel.accountprofilechangepassword')}}" class="btn btn_gray btn_sml"><span>Alterar Senha</span></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Nome</th>
                        <td class="title">
                            <input class="" icon="" id="" labelname="" placeholder="" name="_name" type="hidden" value="Quenio" />
                            Quenio
                        </td>
                        <td class="align_right">
                            <span class="icon_essentail">
                                <i class="icn_svg circle_bang"></i>
                                Indisponível
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Região</th>
                        <td class="title">
                            <input class="" icon="" id="" labelname="" placeholder="" name="_nationCode" type="hidden" value="BR" /><span class="field-validation-valid" data-valmsg-for="_nationCode" data-valmsg-replace="true"></span>
                            Brasil
                        </td>
                        <td class="align_right">
                            <span class="icon_essentail">
                                <i class="icn_svg circle_bang"></i>
                                Indisponível
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Data de Nascimento</th>
                        <td class="title">30/12/1991</td>
                        <td class="align_right">
                            <span class="icon_essentail">
                                <i class="icn_svg circle_bang"></i>
                                Indisponível
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