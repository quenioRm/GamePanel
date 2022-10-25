<footer class="footer_wrap">
    <div class="inner_footer">
        <div id="languageBox">
            <span class="custom_select js-notErrorcustom">
                <select id="ddlbCultureCode" name="lang">
                    @foreach (Config::get('languages') as $lang => $language)
                        {{-- @if ($lang != App::getLocale()) --}}
                            <option value="{{ route('lang.switch', $lang) }}" 
                            @if ($lang == App::getLocale()) {{ 'selected' }} @endif
                            >{{$language}}</option>
                        {{-- @endif --}}
                    @endforeach
                </select>
                <label for="ddlbCultureCode" class="icn_globe"><span class="blind">Idioma</span></label>
            </span>
        </div>
        <div class="term_list">
            <a href="#" class="term_item" target="_blank">
                <strong>
                    Pol&#237;tica de Privacidade
                </strong>
            </a>

            <a href="#" class="term_item" target="_blank">Atendimento ao Cliente</a>
            <a href="#" class="term_item" target="_blank">Controle Parental</a>
        </div>
        <div class="copyright">
            <div class="footer_item">
                <a href="" target="_blank" class="btn_pearlabyss" aria-label="{{env('WEB_NAME')}}">{{env('WEB_NAME')}}</a>
                <span id="footerSpan1" style="color: gray;left:-50px; position: relative;">{{env('WEB_NAME')}}</span>
                <p id="pSpan1" style="left:-60px; position: relative;">&copy; </span> Corp. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
<div id="agree_popup_wrap" aria-modal="true">
    <div class="agree_popup_inner">
        <div class="agree_popup_box">
            <div class="title_wrap">
                <h2 class="popup_title js-title">-</h2>
                <button class="btn btn_close js-AgreePopClose">
                    <span></span>
                    <span></span>
                    <i class="blind">Fechar</i>
                </button>
            </div>
            <div class="agree_popup_content js-content"></div>
        </div>
    </div>
</div>