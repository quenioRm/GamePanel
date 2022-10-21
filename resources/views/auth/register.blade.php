@extends('layouts.main')

@section('title', 'REGISTER')

@section('content')
<form action="/pt-BR/Member/Join/JoinProcess" class="js-submitActive container_wrap" id="frmJoin" method="post">
    <input Class="" Icon="" LabelName="" Placeholder="" id="birthFormat" name="_birthFormat" type="hidden" value="dd/MM/yyyy" /><input Class="" Icon="" LabelName="" Placeholder="" id="birthFormatRegex" name="_birthFormatRegex" type="hidden" value="(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$" /><input Class="" Icon="" LabelName="" Placeholder="" id="_canPlayNationCode" name="_canPlayNationCode" type="hidden" value="HK|MO|TW|JP|AM|AZ|BY|GE|KZ|KG|MD|RU|TJ|TM|UA|UZ|EE|LV|LT|DZ|AO|BH|BJ|BW|BF|BI|CM|CF|TD|CG|CD|CI|DJ|EG|GQ|ER|ET|GA|GM|GH|GN|GW|IR|IQ|IL|JO|KE|KW|LB|LS|LR|LY|MG|MW|ML|MR|MU|MA|MZ|NA|NE|NG|OM|PS|QA|RW|SA|SN|SL|SO|ZA|SS|SD|SZ|SY|TZ|TG|TN|TR|UG|AE|EH|YE|ZM|ZW|TH|BN|KH|ID|LA|MY|MM|PH|SG|VN|AX|AL|AS|AD|AI|AW|AU|AT|BE|BM|BA|BV|IO|BG|CA|KY|CK|HR|CW|CY|CZ|DK|FK|FO|FJ|FI|FR|GF|PF|TF|DE|GI|GR|GL|GP|GU|GG|VA|HU|IS|IE|IM|IT|JE|KI|LI|LU|MK|MT|MH|MQ|YT|MX|FM|MC|ME|MS|NR|NL|NC|NZ|NU|NF|MP|NO|PW|PG|PN|PL|PT|PR|RE|RO|BL|SH|PM|WS|SM|RS|SK|SI|SB|GS|ES|SJ|SE|CH|TK|TO|TC|TV|GB|US|UM|VU|VG|VI|WF|AF|AQ|AG|AR|BS|BD|BB|BZ|BT|BO|BR|CV|CL|CX|CC|CO|KM|CR|CU|DM|DO|EC|SV|GD|GT|GY|HT|HM|HN|IN|JM|MV|MN|NP|NI|PK|PA|PY|PE|KN|LC|VC|ST|SC|LK|SR|TL|TT|UY|VE" /><input Class="" Icon="" LabelName="" Placeholder="" id="_skinID" name="_skinID" type="hidden" value="" /><input Class="" Icon="" LabelName="" Placeholder="" id="hdEncGameCode" name="_encGameCode" type="hidden" value="" />        
    <div id="step02" class="container container_join">
       <article class="content">
          <h2>Criar Pearl Abyss ID</h2>
          <div class="box_join">
             <div class="input_with_btn js-email">
                <div class="custom_input label ">
                   <div class="custom_inputBox"><input Icon="" Placeholder="" autocomplete="off" class="opacityNot js-notSyncValidate" data-val="true" data-val-regex="Ocorreu um erro no formato do e-mail." data-val-regex-pattern="^([\w-.^]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" data-val-required="Favor digitar o endereço de e-mail." id="email" labelName="E-mail" name="email" type="text" value="" /><label for="email"><span>E-mail</span></label><span class='custom_line'></span></div>
                   <div class="input_validate error"><span class="field-validation-valid" data-valmsg-for="email" data-valmsg-replace="true"></span></div>
                </div>
                <button type="button" class="btn btn_blue btn_absolute btn_sml js-emailAuth disabled" id="emailAuth" disabled>
                Autenticar
                </button>
                <div class="opacityNot validMarkWrap js-validMarkWrap">
                   <span class="icn_valid_check btn_absolute js-validMark"></span>
                </div>
                <div class="input_validate error"><span class="field-validation-error visible js-emailCheckResult"></span></div>
             </div>
             <div class="input_with_btn input_auth js-authKey">
                <div class="custom_input label ">
                   <div class="custom_inputBox"><input Class="" Icon="" Placeholder="" autocomplete="off" data-val="true" data-val-required="É necessário confirmar o e-mail." id="authKey" labelName="Código de Confirmação" name="_authKey" type="number" value="" /><label for="authKey"><span>Código de Confirmação</span></label><span class='custom_line'></span></div>
                   <div class="input_validate error"><span class="field-validation-valid" data-valmsg-for="_authKey" data-valmsg-replace="true"></span></div>
                </div>
                <button type="button" class="btn btn_blue btn_absolute btn_sml js-authCheck" id="emailAuthCheck">Confirmar</button>
                <div class="tooltip_wrap email_tooltip js-questionToolTip" tabindex="0">
                   <span class="tooltip_title">N&#227;o recebeu o e-mail de confirma&#231;&#227;o?</span>
                   <ul class="balloon_box">
                      <li class="balloon_desc">Favor verificar o endere&#231;o de e-mail.</li>
                      <li class="balloon_desc">Favor verificar a pasta de Spam ou de Promo&#231;&#245;es.</li>
                      <li class="balloon_desc">Caso n&#227;o tenha recebido o e-mail de confirma&#231;&#227;o, entre em contato com o Atendimento ao Cliente.</li>
                   </ul>
                </div>
             </div>
             <div class="password_wrap input_margin js-password js-capslockWrap">
                <div class="capslock_wrap">
                   <button type="button" class="btn_capslock icn_svg icn_capslock js-btnCapslock hide">
                   <span class="blind">Caps Lock</span>
                   </button>
                   <dl class="balloon_box js-capslockMsg">
                      <dd class="balloon_desc dot_hidden">O Caps Lock est&#225; ativado.</dd>
                   </dl>
                </div>
                <div class="custom_input label ">
                   <div class="custom_inputBox"><input Class="password_view" Placeholder="" autocomplete="off" data-val="true" data-val-maxlength="A senha não pode exceder 100 caracteres." data-val-maxlength-max="100" data-val-minlength="Ocorreu um erro no formato da senha." data-val-minlength-min="8" data-val-regex="Ocorreu um erro no formato da senha." data-val-regex-pattern="(?!(?=.*&amp;#))(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[!@#$%^&amp;*()_+=~-]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+=~-]))|((?=.*[0-9])(?=.*[!@#$%^&amp;*()_+=~-]))|((?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&amp;*()_+=~-]))|((?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&amp;*()_+=~-]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+=~-]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&amp;*()_+=~-])))(^[a-zA-Z0-9!@#$%^&amp;*()_+=~-]{0,}$)" data-val-required="Favor digitar a sua senha." icon="icn_password_view js-passShow js-notSyncValidate" id="password" labelName="Senha" name="_password" type="password" value="" /><label for="password"><span>Senha</span></label><span class='custom_line'></span><i class="pi icn_password_view js-passShow js-notSyncValidate"></i></div>
                   <div class="input_validate error"><span class="field-validation-valid" data-valmsg-for="_password" data-valmsg-replace="true"></span></div>
                </div>
                <dl class="balloon_box">
                   <dd class="balloon_desc dot_hidden">A senha deve conter 8 ou mais caracteres e incluir ao menos 2 dentre letra mai&#250;scula, numeral e caracteres especiais.</dd>
                </dl>
             </div>
             <div class="password_wrap input_margin input_pass_check on js-passwordCheck js-capslockWrap">
                <div class="capslock_wrap">
                   <button type="button" class="btn_capslock icn_svg icn_capslock js-btnCapslock hide">
                   <span class="blind">Caps Lock</span>
                   </button>
                   <dl class="balloon_box js-capslockMsg">
                      <dd class="balloon_desc dot_hidden">O Caps Lock est&#225; ativado.</dd>
                   </dl>
                </div>
                <div class="custom_input label ">
                   <div class="custom_inputBox"><input Class="password_view" Placeholder="" autocomplete="off" data-val="true" data-val-equalto="Favor confirmar a sua senha." data-val-equalto-other="*._password" icon="icn_password_view js-passShow js-notSyncValidate" id="passwordCheck" labelName="Confirmação de Senha" name="_passwordCheck" type="password" value="" /><label for="passwordCheck"><span>Confirmação de Senha</span></label><span class='custom_line'></span><i class="pi icn_password_view js-passShow js-notSyncValidate"></i></div>
                   <div class="input_validate error"><span class="field-validation-valid" data-valmsg-for="_passwordCheck" data-valmsg-replace="true"></span></div>
                </div>
             </div>
             <div class="input_margin">
                <div class="custom_input label ">
                   <div class="custom_inputBox"><input Class="" Icon="" Id="_name" Placeholder="" data-val="true" data-val-required="Favor preencher o nome." labelName="Nome" name="_name" type="text" value="" /><label for="_name"><span>Nome</span></label><span class='custom_line'></span></div>
                   <div class="input_validate error"><span class="field-validation-valid" data-valmsg-for="_name" data-valmsg-replace="true"></span></div>
                </div>
             </div>
             <div class="input_margin">
                <div class="custom_input label ">
                   <div class="custom_inputBox"><input Icon="" Placeholder="" class="input_mask js-inputMask" data-val="true" data-val-required="Favor preencher data de nascimento correta." id="birth" labelName="Data de Nascimento" name="_birth" type="text" value="" /><label for="birth"><span>Data de Nascimento</span></label><span class='custom_line'></span></div>
                   <div class="input_validate error"><span class="field-validation-valid" data-valmsg-for="_birth" data-valmsg-replace="true"></span></div>
                </div>
             </div>
             <div class="input_margin js-country" data-nation="BR">
                <div class="custom_wrap select2-input select2-input ">
                   <div class="custom_select">
                      <select Icon="" Placeholder="" class="js-nationSelect js-select2" data-val="true" data-val-required="Favor selecionar a região." id="nationCode" labelName="Região" name="_nationCode">
                         <option value="AF">Afeganist&#227;o</option>
                         <option value="ZA">&#193;frica do Sul</option>
                         <option value="AL">Alb&#226;nia</option>
                         <option value="DE">Alemanha</option>
                         <option value="AD">Andorra</option>
                         <option value="AO">Angola</option>
                         <option value="AI">Anguila</option>
                         <option value="AQ">Ant&#225;rtida</option>
                         <option value="AG">Ant&#237;gua e Barbuda</option>
                         <option value="SA">Ar&#225;bia Saudita</option>
                         <option value="DZ">Arg&#233;lia</option>
                         <option value="AR">Argentina</option>
                         <option value="AM">Arm&#234;nia</option>
                         <option value="AW">Aruba</option>
                         <option value="AU">Austr&#225;lia</option>
                         <option value="AT">&#193;ustria</option>
                         <option value="AZ">Azerbaij&#227;o</option>
                         <option value="BS">Bahamas</option>
                         <option value="BH">Bahrein</option>
                         <option value="BD">Bangladesh</option>
                         <option value="BB">Barbados</option>
                         <option value="BY">Belarus</option>
                         <option value="BE">B&#233;lgica</option>
                         <option value="BZ">Belize</option>
                         <option value="BJ">Benim</option>
                         <option value="BM">Bermudas</option>
                         <option value="BO">Bol&#237;via</option>
                         <option value="BA">B&#243;snia e Herzegovina</option>
                         <option value="BW">Botsuana</option>
                         <option selected="selected" value="BR">Brasil</option>
                         <option value="BN">Brunei</option>
                         <option value="BG">Bulg&#225;ria</option>
                         <option value="BF">Burkina Fasso</option>
                         <option value="BI">Burundi</option>
                         <option value="BT">But&#227;o</option>
                         <option value="CV">Cabo Verde</option>
                         <option value="CM">Camar&#245;es</option>
                         <option value="KH">Camboja</option>
                         <option value="CA">Canada</option>
                         <option value="KZ">Cazaquist&#227;o</option>
                         <option value="TD">Chad</option>
                         <option value="CL">Chile</option>
                         <option value="CN">China</option>
                         <option value="CY">Chipre</option>
                         <option value="CO">Col&#244;mbia</option>
                         <option value="KM">Comores</option>
                         <option value="CG">Congo</option>
                         <option value="KR">Coreia</option>
                         <option value="CI">Costa do Marfim</option>
                         <option value="CR">Costa Rica</option>
                         <option value="HR">Cro&#225;cia</option>
                         <option value="CU">Cuba</option>
                         <option value="CW">Cura&#231;au</option>
                         <option value="DK">Dinamarca</option>
                         <option value="DJ">Djibuti</option>
                         <option value="DM">Dominica</option>
                         <option value="EG">Egito</option>
                         <option value="SV">El Salvador</option>
                         <option value="AE">Emirados &#193;rabes Unidos</option>
                         <option value="EC">Equador</option>
                         <option value="ER">Eritreia</option>
                         <option value="SK">Eslov&#225;quia</option>
                         <option value="SI">Eslov&#234;nia</option>
                         <option value="ES">Espanha</option>
                         <option value="SZ">Essuat&#237;ni</option>
                         <option value="EE">Est&#244;nia</option>
                         <option value="ET">Etiopia</option>
                         <option value="US">EUA</option>
                         <option value="">Favor selecionar a regi&#227;o.</option>
                         <option value="FJ">Fiji</option>
                         <option value="PH">Filipinas</option>
                         <option value="FI">Finl&#226;ndia</option>
                         <option value="FR">Fran&#231;a</option>
                         <option value="GA">Gab&#227;o</option>
                         <option value="GM">G&#226;mbia</option>
                         <option value="GH">Gana</option>
                         <option value="GE">Ge&#243;rgia</option>
                         <option value="GI">Gibraltar</option>
                         <option value="GD">Granada</option>
                         <option value="GR">Gr&#233;cia</option>
                         <option value="GL">Groenl&#226;ndia</option>
                         <option value="GP">Guadalupe</option>
                         <option value="GU">Guam</option>
                         <option value="GT">Guatemala</option>
                         <option value="GG">Guernsey</option>
                         <option value="GY">Guiana</option>
                         <option value="GF">Guiana Francesa</option>
                         <option value="GN">Guin&#233;</option>
                         <option value="GQ">Guin&#233; Equatorial</option>
                         <option value="GW">Guin&#233;-Bissau</option>
                         <option value="HT">Haiti</option>
                         <option value="NL">Holanda</option>
                         <option value="HN">Honduras</option>
                         <option value="HK">Hong Kong</option>
                         <option value="HU">Hungria</option>
                         <option value="YE">I&#234;men</option>
                         <option value="BV">Ilha Bouvet</option>
                         <option value="IM">Ilha de Man</option>
                         <option value="HM">Ilha Heard e Ilhas McDonald</option>
                         <option value="NF">Ilha Norfolk</option>
                         <option value="AX">Ilhas Alanda</option>
                         <option value="KY">Ilhas Caim&#227;</option>
                         <option value="CX">Ilhas Christmas</option>
                         <option value="CC">Ilhas Cocos</option>
                         <option value="CK">Ilhas Cook</option>
                         <option value="FK">Ilhas Falkland (Malvinas)</option>
                         <option value="FO">Ilhas Faro&#233;</option>
                         <option value="GS">Ilhas Ge&#243;rgia do Sul e Sandu&#237;che do Sul</option>
                         <option value="MP">Ilhas Marianas do Norte</option>
                         <option value="MH">Ilhas Marshall</option>
                         <option value="UM">Ilhas Menores Distantes dos Estados Unidos</option>
                         <option value="SB">Ilhas Salom&#227;o</option>
                         <option value="TC">Ilhas Turcas e Caicos</option>
                         <option value="VG">Ilhas Virgens Brit&#226;nicas</option>
                         <option value="VI">Ilhas Virgens dos Estados Unidos</option>
                         <option value="IN">&#205;ndia</option>
                         <option value="ID">Indon&#233;sia</option>
                         <option value="IR">Ir&#227;</option>
                         <option value="IQ">Iraque</option>
                         <option value="IE">Irlanda</option>
                         <option value="IS">Isl&#226;ndia</option>
                         <option value="IL">Israel</option>
                         <option value="IT">It&#225;lia</option>
                         <option value="JM">Jamaica</option>
                         <option value="JP">Jap&#227;o</option>
                         <option value="JE">Jersey</option>
                         <option value="JO">Jord&#226;nia</option>
                         <option value="KW">Kwait</option>
                         <option value="LA">Laos</option>
                         <option value="LS">Lesoto</option>
                         <option value="LV">Let&#244;nia</option>
                         <option value="PN">lhas Pitcairn</option>
                         <option value="LB">L&#237;bano</option>
                         <option value="LR">Lib&#233;ria</option>
                         <option value="LY">L&#237;bia</option>
                         <option value="LI">Liechtenstein</option>
                         <option value="LT">Litu&#226;nia</option>
                         <option value="LU">Luxemburgo</option>
                         <option value="MO">Macau</option>
                         <option value="MK">Maced&#244;nia do Norte</option>
                         <option value="MG">Madagascar</option>
                         <option value="YT">Maiote</option>
                         <option value="MY">Mal&#225;sia</option>
                         <option value="MW">Malawi</option>
                         <option value="MV">Maldivas</option>
                         <option value="ML">Mali</option>
                         <option value="MT">Malta</option>
                         <option value="MA">Marrocos</option>
                         <option value="MQ">Martinica</option>
                         <option value="MU">Maur&#237;cio</option>
                         <option value="MR">Maurit&#226;nia</option>
                         <option value="MX">M&#233;xico</option>
                         <option value="MM">Mianmar</option>
                         <option value="FM">Micron&#233;sia</option>
                         <option value="MZ">Mo&#231;ambique</option>
                         <option value="MD">Mold&#225;via</option>
                         <option value="MC">M&#244;naco</option>
                         <option value="MN">Mong&#243;lia</option>
                         <option value="MS">Monserrate</option>
                         <option value="ME">Motenegro</option>
                         <option value="NA">Namibia</option>
                         <option value="NR">Nauru</option>
                         <option value="NP">Nepal</option>
                         <option value="NI">Nicar&#225;gua</option>
                         <option value="NE">Niger</option>
                         <option value="NG">Nig&#233;ria</option>
                         <option value="NU">Niu&#234;</option>
                         <option value="NO">Noruega</option>
                         <option value="NC">Nova Caled&#244;nia</option>
                         <option value="NZ">Nova Zel&#226;ndia</option>
                         <option value="OM">Om&#227;</option>
                         <option value="PW">Palau</option>
                         <option value="PS">Palestina</option>
                         <option value="PA">Panam&#225;</option>
                         <option value="PG">Papua Nova Guin&#233;</option>
                         <option value="PK">Paquist&#227;o</option>
                         <option value="PY">Paraguai</option>
                         <option value="PE">Peru</option>
                         <option value="PF">Polin&#233;sia Francesa</option>
                         <option value="PL">Pol&#244;nia</option>
                         <option value="PR">Porto Rico</option>
                         <option value="PT">Portugal</option>
                         <option value="QA">Qatar</option>
                         <option value="KE">Qu&#234;nia</option>
                         <option value="KG">Quirguizist&#227;o</option>
                         <option value="KI">Quiribati</option>
                         <option value="GB">Reino Unido</option>
                         <option value="CF">Rep&#250;blica Centro-Africana</option>
                         <option value="CD">Rep&#250;blica Democr&#225;tica do Congo</option>
                         <option value="DO">Rep&#250;blica Dominicana</option>
                         <option value="CZ">Rep&#250;blica Tcheca</option>
                         <option value="RE">Reuni&#227;o</option>
                         <option value="RO">Rom&#226;nia</option>
                         <option value="RW">Ruanda</option>
                         <option value="RU">R&#250;ssia</option>
                         <option value="EH">Saara Ocidental</option>
                         <option value="PM">Saint-Pierre e Miquelon</option>
                         <option value="WS">Samoa</option>
                         <option value="AS">Samoa Americana</option>
                         <option value="SM">San Marino</option>
                         <option value="SH">Santa Helena</option>
                         <option value="LC">Santa L&#250;cia</option>
                         <option value="BL">S&#227;o Bartolomeu</option>
                         <option value="KN">S&#227;o Crist&#243;v&#227;o e Neves</option>
                         <option value="ST">S&#227;o Tom&#233; e Pr&#237;ncipe</option>
                         <option value="VC">S&#227;o Vicente e Granadinas</option>
                         <option value="SC">Seicheles</option>
                         <option value="SN">Senegal</option>
                         <option value="SL">Serra Leoa</option>
                         <option value="RS">S&#233;rvia</option>
                         <option value="SG">Singapura</option>
                         <option value="SY">S&#237;ria</option>
                         <option value="SO">Som&#225;lia</option>
                         <option value="LK">Sri Lanka</option>
                         <option value="SD">Sud&#227;o</option>
                         <option value="SS">Sud&#227;o do Sul</option>
                         <option value="SE">Su&#233;cia</option>
                         <option value="CH">Su&#237;&#231;a</option>
                         <option value="SR">Suriname</option>
                         <option value="SJ">Svalbard e Jan Mayen</option>
                         <option value="TH">Tail&#226;ndia</option>
                         <option value="TW">Taiwan</option>
                         <option value="TJ">Tajiquist&#227;o</option>
                         <option value="TZ">Tanz&#226;nia</option>
                         <option value="TF">Terras Austrais e Ant&#225;rticas Francesas</option>
                         <option value="IO">Territ&#243;rio Brit&#226;nico do Oceano &#205;ndico</option>
                         <option value="TL">Timor Leste</option>
                         <option value="TG">Togo</option>
                         <option value="TO">Tonga</option>
                         <option value="TK">Toquelau</option>
                         <option value="TT">Trinidad e Tobago</option>
                         <option value="TN">Tun&#237;sia</option>
                         <option value="TM">Turcomenist&#227;o</option>
                         <option value="TR">Turquia</option>
                         <option value="TV">Tuvalu</option>
                         <option value="UA">Ucr&#226;nia</option>
                         <option value="UG">Uganda</option>
                         <option value="UY">Uruguai</option>
                         <option value="UZ">Uzbequist&#227;o</option>
                         <option value="VU">Vanuatu</option>
                         <option value="VA">Vaticano</option>
                         <option value="VE">Venezuela</option>
                         <option value="VN">Vietn&#227;</option>
                         <option value="WF">Wallis e Futuna</option>
                         <option value="ZM">Z&#226;mbia</option>
                         <option value="ZW">Zimb&#225;bue</option>
                      </select>
                   </div>
                   <label for="nationCode" class="input_label js-labelSelect">Região</label>
                </div>
                <div class="input_validate error"><span class="field-validation-valid" data-valmsg-for="_nationCode" data-valmsg-replace="true"></span></div>
                <div id="error_no_country" class="input_validate error">
                   <span class="field-validation-error">
                   <span id="nationCode-error" class="">Não há serviço de Black Desert para o local de residência selecionado.<br>É necessário alterar a Região de Residência para acessar os serviços de Black Desert.</span>
                   </span>
                </div>
             </div>
             <div class="service_list_wrap js-serviceWrap">
                <p class="service_desc">O servi&#231;o de Black Desert das regi&#245;es abaixo est&#225; dispon&#237;vel para o local de resid&#234;ncia selecionado.</p>
                <ul class="service_list" id="js-gameList">
                </ul>
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
    <script>
        function close(){
            $('#igree').hide();
        }
    </script>
 
@endpush