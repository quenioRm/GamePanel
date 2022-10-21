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
                <a href="" target="_blank" class="btn_pearlabyss" aria-label="{{env('WEB_NAME')}}">{{env('WEB_NAME')}}</a>{{env('WEB_NAME')}}
                <p>&copy; {{env('WEB_NAME')}} Corp. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>