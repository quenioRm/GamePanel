<header class="header_nav_wrap only-m">
    <div class="top_wrap_inner">
        <button type="button" class="btn btn_header_nav js_header_nav">
            <i class="blind">{{__('messages.all')}}</i>
            <span class="nav_line top"></span>
            <span class="nav_line center"></span>
            <span class="nav_line bottom"></span>
        </button>
        <h1 class="logo_wrap">
            <span class="blind">{{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}}</span>
            <a href="#" class="logo_box" title="PearlAbyss">{{env('WEB_NAME')}}
            </a>
        </h1>
        <button type="button" class="header_profile js-btnRightProfile">
            <span class="blind">{{__('messages.myPage')}}</span>
                @if (isset(Auth::user()->id))
                <span class="icon_character" style="background-image:url({{asset('storage/user/avatar/' . Auth::user()->id .'/'. Auth::user()->avatar)}}">
                @else
                <span class="icon_character" style="background-image:url({{asset('img/noavatar.png')}}">
                @endif
            </span>
        </button>
    </div>
    <div class="dimm_sub_menu"></div>

    <div id="js-leftProfileAcitve" class="aside_wrap right">
        <div class="aside_top">
            <a href="#" class="logo_box" style="font-size: 15px" title="PearlAbyss">{{env('WEB_NAME')}}</a>
            <span class="blind">{{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}}</span>
            <i class="pi pi_nav_close js-navClose"></i>
        </div>
        <div class="aside_body">
            <div class="aside_body_top">
                @if (isset(Auth::user()->id))
                <a href="{{route('controlpanel.accountprofileinfo')}}" class="aside_body_profile">
                    <i class="icon_character_area">
                        <span class="icon_character" style="background-image:
                        url({{(Auth::user()->avatar == '' ? asset('img/noavatar.png') :
                asset('storage/user/avatar/' . Auth::user()->id .'/'. Auth::user()->avatar))}});">
                        </span>
                    </i>
                    <span class="char_name">
                        <em> {{mb_convert_case( Auth::user()->name, MB_CASE_TITLE , 'UTF-8' )}} </em>
                    </span>
                </a>
                <a href="{{route('controlpanel.accountprofileinfo')}}" class="btn_nav_info">
                    <i class="pi pi_nav_user"></i>
                    <span>Conta</span>
                </a>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="btn_nav_info" type="submit">
                        <span>{{__('messages.logout')}}</span>
                    </button>
                </form>
                @else
                <a href="{{route('register')}}" class="btn_nav_info">
                    <i class="pi pi_nav_register"></i>
                    <span>{{__('messages.make')}} {{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}} ID</span>
                </a>
                <a href="{{route('login')}}" class="btn_nav_info">
                    <i class="pi pi_nav_login"></i>
                    <span>{{__('messages.btnEnter')}}</span>
                </a>
                @endif
            </div>
            {{-- <ul class="aside_menu">
                <li class="node1">
                    <button type="button" class="js-btnFolder aside_node_parent">Jogo</button>
                    <div class="sub_menu">
                        <ul>
                            <li class="aside_node_child">
                                <a href="https://www.console.playblackdesert.com" target="_blank">
                                    <em>Black Desert</em>
                                    <span>new</span>
                                </a>
                            </li>
                            <li class="aside_node_child">
                                <a href="https://www.world.blackdesertm.com" target="_blank">
                                    <em>Black Desert Mobile</em>
                                    <span>new</span>
                                </a>
                            </li>

                            <li class="aside_node_child new">
                                <a href="https://crimsondesert.pearlabyss.com/pt-BR" target="_blank">
                                    <em>Crimson Desert</em>
                                    <span>new</span>
                                </a>
                            </li>
                            <li class="aside_node_child new">
                                <a href="https://dokev.pearlabyss.com/en/Main/Index" target="_blank">
                                    <em>DokeV</em>
                                    <span>new</span>
                                </a>
                            </li>
                            <li class="aside_node_child new">
                                <a href="https://plan8.pearlabyss.com/en/Main/Index" target="_blank">
                                    <em>Plan 8</em>
                                    <span>new</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="https://www.pearlabyss.com/en-US/Board/Report" target="_blank" class="aside_node_parent">Not&#237;cias</a>
                </li>
                <li>
                    <a href="https://pearlabyss.gururang.com/en" target="_blank" class="aside_node_parent">Store</a>
                </li>
            </ul> --}}
        </div>
        <div class="aside_footer">
            <span>&copy; {{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}} Corp. All Rights Reserved.</span>
        </div>
    </div>
</header>
