<header class="gnb-wrap">
    <div class="gnb simple" id="gnb">
       <h1 class="gnb-logo">
          <a href="#">
            <i class="sp-logo kkg-md">{{env('APP_NAME')}}</i>
          </a>
          <a href="#">
            <i class="sp-logo kkg-md-pn"></i>
            @if (Auth::user())
            <span>{{Auth::user()->cash}}</span>
            @else
            <span>0</span>
            @endif
          </a>
          {{-- <a href="{{env('APP_URL')}}" id="linkGameLogoAal" class="game-logo"><i class="sp-logo aal">{{env('APP_NAME')}}</i></a> --}}
       </h1>
       <div class="gnb-nav has-bt">
          <a href="#" class="bt-gnb-nav" role="button"><i class="sp-c gnav">GNB Navigation Toggle button</i></a>
          <!-- 2021-11-28 추가 -->
          <nav>
             <ul>
                <li><a href="{{env('APP_URL')}}">{{env('APP_NAME')}}</a></li>
             </ul>
          </nav>
          <!--// 2021-11-28 추가 -->
       </div>
       <div class="gnb-back">
          <a href="#" class="bt-gnb-back" role="button"><i class="sp-c gback">page back</i></a>
       </div>
       @if (Auth::user())
       <div class="gnb-mem mem-login">
          <a href="#" class="bt-gnb-mem" role="button">
            <i class="sp-c gmem"></i>
            <span id="gnb-dname">
                {{strtoupper(Auth::user()->name)}}
            </span>
          </a>
          @include('web.shop.layout.nav')
       </div>
       @else
       <div class="gnb-mem">
        <a href="#" class="bt-gnb-mem" role="button">
            <i class="sp-c gmem"></i>
        </a>
            <nav>
                <!-- logout-->
                <ul class="s-logout">
                    <li><a href="{{route('gamepanel.login')}}" id="lnLogin">LOGIN</a></li>
                    <li><a href="{{route('gamepanel.register')}}" id="lnCreateAccount">CREATE ACCOUNT</a></li>
                </ul>

            </nav>
        </div>
       @endif
    </div>
 </header>
