<header id="docGGB" class="doc-header type_aal">
    <div class="group_site">
       <strong class="screen_out">ArcheAge Site</strong>
       <a href="javascript:;" class="link_selected link_aal">
       <span class="ico_svg">ArcheAge</span>
       </a>
       <ul class="list_site" role="listbox">
          <!-- 활성화 : aria-selected="true", 비활성화 : aria-selected="false" -->
          <li class="on"><a href="javascript:;" class="link_site link_attr_data link_aal" role="option" aria-selected="true"
             attr-data="https://archeage.playkakaogames.com">
             <span class="ico_svg">ArcheAge</span>
             </a>
          </li>
          {{-- <li><a href="javascript:;" class="link_site link_attr_data link_aau" role="option" aria-selected="false"
             attr-data="https://archeageuc.playkakaogames.com">
             <span class="ico_svg">ArcheAge UNCHAINED</span>
             </a>
          </li> --}}
       </ul>
       <a href="javascript:;" class="btn_menu" aria-label="open side menu" aria-pressed="false" role="button"> <span class="ico_menu"></span></a><!-- 활성회: 클래스 on, aria-pressed="true" -->
       <strong class="screen_out">Follow us</strong>
       <ul class="list_follow">
          <li><a href="https://discord.gg/FhbpMDarxZ" class="link_sns" target="_blank"><span class="ico_svg ico_discord">DISCORD</span></a></li>
          <li><a href="https://twitter.com/playkakaogames" class="link_sns" target="_blank"><span class="ico_svg ico_twitter">TWITTER</span></a></li>
       </ul>
    </div>

    @if (Auth::user())
    <div class="group_account">
        <button type="button" class="btn_account_open"> <span class="ico_svg">account open</span> </button>
        <ul class="list_account type_login">
            <li class="item_login">
                <a href="#" class="link_account"> {{Auth::user()->name}}<span class="ico_svg"></span> </a>
                <ul class="list_subaccount">
                    <li>
                        <a href="{{route('gamepanel.controlpanel.profileaccount')}}" onclick="click_my_account()" class="link_subaccount link_my">MY ACCOUNT</a>
                        <a href="{{route('logout')}}" onclick="click_logout()" class="link_subaccount link_logout">LOGOUT</a>
                    </li>
                </ul>
            </li>
        </ul>
        <button type="button" class="btn_account_close"> <span class="ico_svg">account close</span> </button>
    </div>
    @else
    <div class="group_account">
        <button type="button" class="btn_account_open"><span class="ico_svg">account open</span></button>
        <ul class="list_account">
           <li> <a href="{{route('gamepanel.login')}}" class="link_account"><span data-text="tab.login">LOGIN</span> </a> </li>
           <li> <a href="{{route('gamepanel.register')}}" class="link_account"> <span data-text="tab.signin">CREATE ACCOUNT</span> </a> </li>
        </ul>
        <button type="button" class="btn_account_close"> <span class="ico_svg">account close</span> </button>
     </div>
    @endif

    <div class="group_nav" aria-hidden="true">
       <!-- 활성회: 클래스 on, aria-hidden="false" -->
       <h1 class="logo_site">
          <a href="javascript:;" attr-data="https://archeage.playkakaogames.com" class="link_site link_attr_data link_aal"> <span class="ico_svg">ArcheAge</span> <span class="ico_svg ico_share">share</span> </a>
          <a href="javascript:;" attr-data="https://archeageuc.playkakaogames.com" class="link_site link_attr_data link_aau"> <span class="ico_svg">ArcheAge UNCHAINED</span> <span class="ico_svg ico_share">share</span> </a>
       </h1>
       <nav id="gnbContent" class="doc_gnb">
          <h2 class="screen_out">MENU</h2>
          <ul class="list_gnb">
             <li class="item_gnb item_game">
                <a href="javascript:;" class="link_gnb"> <span data-text="tab.game">GAME</span> <span class="ico_svg ico_more">more</span> </a>
                <ul class="list_submenu">
                   <li> <a href="javascript:;" onclick="click_world()" class="link_submenu"> <span data-text="tab.game.world_of_archeage">WORLD OF ArcheAge</span> </a> </li>
                   <li> <a href="javascript:;" onclick="click_game_play()" class="link_submenu"> <span data-text="tab.game.game_play">GAME PLAY</span> </a> </li>
                </ul>
             </li>
             <li> <a href="{{route('news')}}" class="link_gnb">NEWS</a> </li>
             <li><a href="https://shop.playkakaogames.com/main#game_6" target="_blank" class="link_gnb"><span>SHOP</span></a></li>
             <li> <a href="javascript:;" onclick="click_media()" class="link_gnb">MEDIA</a> </li>
             <li class="type_pc"> <a href="{{route('download')}}" class="link_gnb">DOWNLOAD</a> </li>
             <li> <a href="{{route('news')}}" class="link_gnb">SUPPORT</a> </li>
             <li> <a href="javascript:;" onclick="click_transfer()" class="link_gnb">DATA TRANSFER</a> </li>
             <li> <a href="javascript:;" onclick="click_twitchdrops()" class="link_gnb">Twitch Drops</a> </li>
             <li class="item_gnb more">
                <a href="#" class="link_gnb">MORE<span class="ico_more"></span></a>
                <ul class="list_submenu"></ul>
             </li>
             <li class="type_m"><a href="#" class="btn primary">PLAY FREE</a></li>
          </ul>
       </nav>
       <a href="javascript:;" onclick="click_download()" class="link_play">
       <span class="txt_play">PLAY FREE</span>
       </a>
    </div>
    <script>
       function click_world(){
           location.href='/world';
       }
       function click_game_play(){
           location.href='/game_play';
       }
       function click_news(){
           deleteCookie('aalNewsPage');
           deleteCookie('aalNewsScrollTop');
           location.href='/news';
       }
       function click_media(){
           location.href='/media';
       }
       function click_transfer(){
           location.href='/transfer';
       }
       function click_twitchdrops(){
           location.href='/twitchdrops';
       }
       function goRegister() {
           document.cookie = "login=login";
           location.href='/register';
       }
       function goLogin() {
           document.cookie = 'lastpage' + '=' + window.location.pathname + '; path=/; expires=-1;';
           document.cookie = "login=login";
           window.location.href = '/login';
       }
       function click_download(){
           let on_ = true;
           if(window.innerWidth < 1024){
               let item_game_  = document.getElementsByClassName('item_game on')[0]
               let item_community_  = document.getElementsByClassName('item_community on')[0]

               if (item_game_ != undefined || item_community_ != undefined) {
                   on_ = false
               }
           }
           if(on_){
               location.href='/download';
           }
       }
       function click_logout(){
           document.cookie = "logout=logout";
           location.href='/goLogout';
       }
       function click_my_account(){
           location.href='https://account.playkakaogames.com';
       }
    </script>
 </header>
