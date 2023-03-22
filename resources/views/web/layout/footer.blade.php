<footer class="doc-footer">
    <!-- 언어 드롭박스 리스트 활성화 : 클래스 on 추가 -->
    <div class="inner_footer">
       <h2 class="screen_out">SERVICE INFORMATION</h2>
       <div class="info_service">
          <ul class="list_policy">
             <li><a href="javascript:;" class="link_policy" onclick="window.open('https://account.playkakaogames.com/about?_gl=1*2718do*_ga*NTQxNDYyNTIzLjE2MzYzNjIyMzc.*_ga_9RPJ5860Z9*MTYzNjkxODQ5OS4xMC4xLjE2MzY5MTg1MzEuMA..')">ABOUT US</a></li>
             <li><a href="javascript:;" class="link_policy" onclick="window.open('https://account.playkakaogames.com/tou?_gl=1*2718do*_ga*NTQxNDYyNTIzLjE2MzYzNjIyMzc.*_ga_9RPJ5860Z9*MTYzNjkxODQ5OS4xMC4xLjE2MzY5MTg1MzEuMA..')">TERM OF USE</a></li>
             <li><a href="javascript:;" class="link_policy" onclick="window.open('https://account.playkakaogames.com/pp?_gl=1*2718do*_ga*NTQxNDYyNTIzLjE2MzYzNjIyMzc.*_ga_9RPJ5860Z9*MTYzNjkxODQ5OS4xMC4xLjE2MzY5MTg1MzEuMA..')">PRIVACY POLICY</a></li>
             <li><a href="https://kg.games/aafankit" class="link_policy" target="_blank">FAN KIT</a></li>
             <li><a href="/cookie_policy" class="link_policy">COOKIE POLICY</a></li>
          </ul>
          <strong class="screen_out">Follow us</strong>
          <ul class="list_follow">
             <li><a href="https://discord.gg/FhbpMDarxZ" class="link_sns" target="_blank"><img src="https://img.aa.playkakaogames.com/aalg/live/images/main/ico_discord.svg" class="ico_sns" alt="discord"></a></li>
             <li><a href="https://twitter.com/playkakaogames" class="link_sns" target="_blank"><img src="https://img.aa.playkakaogames.com/aalg/live/images/main/ico_twitter.svg" class="ico_sns" alt="twitter"></a></li>
          </ul>
          <div class="group_lang">
             <strong class="screen_out" data-text="lng.select">Language Selection Box</strong> <a href="javascript:;" class="link_selected" aria-expanded="false">
             <span class="ico_lang"></span>

             @foreach (Config::get('languages') as $lang => $language)
             @if ($lang == App::getLocale())
             <span class="txt_selected">{{$language}}</span> <span class="ico_arrow"></span> </a>
             @break
             @endif
             @endforeach


             <ul class="list_lang" role="listbox">
                @foreach (Config::get('languages') as $lang => $language)
                {{-- <option value="{{ route('gamepanel.lang.switch', $lang) }}"
                @if ($lang == App::getLocale()) {{ 'selected' }} @endif
                >{{$language}}</option>
                --}}
                <li class="@if ($lang == App::getLocale()) 'on' : '' @endif">
                   <a href="javascript:;" class="link_lang" role="option" data-value="fr" aria-selected="false">{{$language}}</a>
                </li>
                @endforeach
             </ul>
          </div>
       </div>
       <ul class="list_company">
          <li> <a href="javascript:;" style="cursor:Default;" onclick="return false;" class="link_kakaogames"> <img src="https://img.aa.playkakaogames.com/aalg/live/images/main/logo_kakaogames_220426.svg" class="img_logo" width="127" height="23" alt="kakaogames"> </a> </li>
          <li> <a href="javascript:;" style="cursor:Default;" onclick="return false;" class="link_xlgames"> <img src="https://img.aa.playkakaogames.com/aalg/live/images/main/logo_xlgames_220426.svg" class="img_logo" width="112" height="23" alt="XLGAMES"> </a> </li>
       </ul>
       <small class="txt_copyright">Copyright © {{env('WEB_NAME')}} Europe B.V. © XLGAMES<br class="type_tablet"> Inc. ArcheAge has been licensed by XLGAMES Inc. ArcheAge and XLGAMES are trademarks of XLGAMES Inc. </small>
    </div>
 </footer>
