<div id="igree" class="agree_wrap">
    <input type="hidden" name="_policyAgreementList[0]._revision" value="1" />
    <input type="hidden" name="_policyAgreementList[0]._policyNo" value="7" />
    <input type="hidden" name="_policyAgreementList[0]._etc" />
    <section class="box_agree link_mode">
        <div class="sec_header join_policy_box">
            <div class="custom_check">
                <input
                    class="active"
                    icon=""
                    placeholder=""
                    id="_policyAgreementList[0]._isChecked"
                    labelname="[Obrigatório] Li e concordo com <a role='button' class='js-popDetails' data-idx='0' />{{__('messages.messageTree')}} {{env('WEB_NAME')}}</a>."
                    name="_policyAgreementList[0]._isChecked"
                    required="required"
                    type="checkbox"
                    value="true"
                />
                <input name="_policyAgreementList[0]._isChecked" type="hidden" value="false" />
                <label for="_policyAgreementList[0]._isChecked">
                    <span>{{__('messages.messageOne')}} <a role="button" class="js-popDetails" data-idx="0">{{__('messages.messageTree')}} {{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}}</a>.</span>
                </label>
                <i class="pi pi_check"></i>
            </div>
        </div>
        <div class="box_policy_wrap hide">
            <div class="box_policy">
                Em elaboração
            </div>
        </div>
    </section>
    <input type="hidden" name="_policyAgreementList[1]._revision" value="1" />
    <input type="hidden" name="_policyAgreementList[1]._policyNo" value="8" />
    <input type="hidden" name="_policyAgreementList[1]._etc" />
    <section class="box_agree link_mode">
        <div class="sec_header join_policy_box">
            <div class="custom_check">
                <input
                    class="active"
                    icon=""
                    placeholder=""
                    id="_policyAgreementList[1]._isChecked"
                    labelname="[Obrigatório] Li e concordo com <a role='button' class='js-popDetails' data-idx='1' />Política de Privacidade</a>."
                    name="_policyAgreementList[1]._isChecked"
                    required="required"
                    type="checkbox"
                    value="true"
                />
                <input name="_policyAgreementList[1]._isChecked" type="hidden" value="false" />
                <label for="_policyAgreementList[1]._isChecked">
                    <span>{{__('messages.messageOne')}} <a role="button" class="js-popDetails" data-idx="1">{{__('messages.messageTwo')}}</a>.</span>
                </label>
                <i class="pi pi_check"></i>
            </div>
        </div>
        <div class="box_policy_wrap hide">
            <div class="box_policy">
                Em elaboração
            </div>
        </div>
    </section>
    <input type="hidden" name="_policyAgreementList[2]._revision" value="2" />
    <input type="hidden" name="_policyAgreementList[2]._policyNo" value="9" />
    <input type="hidden" name="_policyAgreementList[2]._etc" value="WEB_MSG_MEMBER_JOIN_INDEX_NEWSLETTER_AGREE|WEB_MSG_MEMBER_JOIN_INDEX_NEWSLETTER_NOT_AGREE|ADVERTISEMENT|WHETHER_EMAIL_RECEIVE_AGREEMENT" />
</div>
<div id="agree_popup_wrap" aria-modal="true">
    <div class="agree_popup_inner">
       <div class="agree_popup_box">
          <div class="title_wrap">
             <h2 class="popup_title js-title">-</h2>
             <button type="button" onclick="close()" class="btn btn_close js-AgreePopClose">
             <span></span>
             <span></span>
             <i class="blind">Fechar</i>
             </button>
          </div>
          <div class="agree_popup_content js-content">
          </div>
       </div>
    </div>
 </div>

