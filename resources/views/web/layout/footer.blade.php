<footer class="doc-footer">
    <!-- 언어 드롭박스 리스트 활성화 : 클래스 on 추가 -->
    <div class="inner_footer">
       <h2 class="screen_out">SERVICE INFORMATION</h2>
       <div class="info_service">
          <ul class="list_policy">
             <li><a href="#" class="link_policy">{{strtoupper(__('messages.aboutus'))}}</a></li>
             <li><a href="#" class="link_policy">{{mb_strtoupper(__('messages.termsofuse'),'UTF-8')}}</a></li>
             <li><a href="#" class="link_policy">{{mb_strtoupper(__('messages.messageTwo'),'UTF-8')}}</a></li>
             {{-- <li><a href="#" class="link_policy">FAN KIT</a></li>
             <li><a href="#" class="link_policy">COOKIE POLICY</a></li> --}}
          </ul>
          <strong class="screen_out">Follow us</strong>
          <ul class="list_follow">
             <li><a href="{{env('DISCORD')}}" class="link_sns" target="_blank"><img src="{{asset('assets/web/images/main/ico_discord.svg')}}" class="ico_sns" alt="discord"></a></li>
             <li><a href="{{env('TWITER')}}" class="link_sns" target="_blank"><img src="{{asset('assets/web/images/main/ico_twitter.svg')}}" class="ico_sns" alt="twitter"></a></li>
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
                <li class="">
                   <a href="javascript:;" class="link_lang" role="option" data-lang="{{$lang}}" data-value="{{$lang}}"
                   aria-selected="{{($lang == App::getLocale()) ? 'true' : 'false'}}">{{$language}}</a>
                </li>
                @endforeach
             </ul>
          </div>
       </div>
       <ul class="list_company">
          <li> <a href="javascript:;" style="cursor:Default;" onclick="return false;" class="link_kakaogames"> <img src="https://img.aa.playkakaogames.com/aalg/live/images/main/logo_kakaogames_220426.svg" class="img_logo" width="127" height="23" alt="kakaogames"> </a> </li>
          <li> <a href="javascript:;" style="cursor:Default;" onclick="return false;" class="link_xlgames"> <img src="https://img.aa.playkakaogames.com/aalg/live/images/main/logo_xlgames_220426.svg" class="img_logo" width="112" height="23" alt="XLGAMES"> </a> </li>
       </ul>
       <small class="txt_copyright">Copyright © {{env('WEB_NAME')}} <br class="type_tablet">  </small>
    </div>
 </footer>
@push('scripts')
@endpush
