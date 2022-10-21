<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="pt-BR" xmlns:fb="http://ogp.me/ns/fb#"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="pt-BR" xmlns:fb="http://ogp.me/ns/fb#"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="pt-BR" xmlns:fb="http://ogp.me/ns/fb#"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="pt-BR">
    <head prefix="og: http://ogp.me/ns# object: http://ogp.me/ns/object#">
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
        <meta name="format-detection" content="telephone=no, address=no, email=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

        <title>@yield('title', env('WEB_NAME')) @if($__env->yieldContent('title'))- {{env('WEB_NAME')}} @endif</title>
        <meta name="keywords" content="{{env('KEYWORLDS')}}" />
        <meta name="description" content="Entre com {{env('WEB_NAME')}} ID." />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="@yield('title', env('WEB_NAME')) @if($__env->yieldContent('title'))- {{env('WEB_NAME')}} @endif" />
        <meta property="og:description" content="Entre com {{env('WEB_NAME')}} ID." />
        <meta property="og:url" content="{{Request::url()}}" />
        <meta property="og:image" content="https://s1.pearlcdn.com/account/contents/img/common/og_image.jpg?v=638016825217184276" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="628" />
        <meta name="facebook-domain-verification" content="leiralv78698odg34dwodklndcee52" />

        <link rel="shortcut icon" href="https://s1.pearlcdn.com/account/contents/img/common/favicon16.ico" type="image/x-icon" sizes="16x16" />
        <link rel="shortcut icon" href="https://s1.pearlcdn.com/account/contents/img/common/favicon32.ico" type="image/x-icon" sizes="32x32" />
        <link rel="shortcut icon" href="https://s1.pearlcdn.com/account/contents/img/common/favicon48.ico" type="image/x-icon" sizes="48x48" />
        <link rel="shortcut icon" href="https://s1.pearlcdn.com/account/contents/img/common/favicon64.ico" type="image/x-icon" sizes="64x64" />
        <link rel="shortcut icon" href="https://s1.pearlcdn.com/account/contents/img/common/favicon256.ico" type="image/x-icon" sizes="256x256" />

        <meta http-equiv="content-language" content="pt" />

        <link rel="alternate" hreflang="ko" href="https://account.pearlabyss.com/ko-KR" />
        <link rel="alternate" hreflang="en" href="https://account.pearlabyss.com/en-US" />
        <link rel="alternate" hreflang="de" href="https://account.pearlabyss.com/de-DE" />
        <link rel="alternate" hreflang="fr" href="https://account.pearlabyss.com/fr-FR" />
        <link rel="alternate" hreflang="es" href="https://account.pearlabyss.com/es-ES" />
        <link rel="alternate" hreflang="cn" href="https://account.pearlabyss.com/zh-CN" />

        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/font.css?v=638016825217184276')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/reset.css?v=638016825217184276')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pi.css?v=638016825217184276')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/common.css?v=638016825217184276')}}" />

        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/account.css?v=638016825217184276')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/game_network.css?ver=638016825217184276')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/styleAdd.css')}}" />

        <script>
            var _abyss = (window._abyss = window._abyss || {});

            _abyss.regexCustom = {
                Password: {
                    AllPasswordRegex:
                        "(?!(?=.*&#))(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[0-9])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+=~-])))(^[a-zA-Z0-9!@#$%^&*()_+=~-]{0,}$)",
                    UpperEngPasswordRegex: "(?=.*[A-Z])",
                    LowerEngPasswordRegex: "(?=.*[a-z])",
                    NumberPasswordRegex: "(?=.*[0-9])",
                    SpecialPasswordRegex: "(?=.*[!@#$%^&*()_+=~-])",
                    LengthPasswordRegex: "(^[a-zA-Z0-9!@#$%^&*()_+=~-]{10,16}$)",
                },
            };
        </script>

        <!-- Google Tag manager-->
        
    </head>
    <body class="">
        @include('layouts.headerMenu')
        <div id="page_wrap">
            <div id="page_container">
                <div class="global_network only-pc"></div>
                {{-- Header --}}
                @include('layouts.header')

                {{-- Content --}}
                @yield('content')

                {{-- Footer --}}
                @include('layouts.footer')
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
            </div>
        </div>

        <script>
            var _format = "dd/MM/yyyy";
        </script>
        <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('assets/js/common.js?v=638016825217184276')}}"></script>

        <script src="{{asset('assets/js/jquery.validate-1.19.2.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.validate.unobtrusive-3.2.11.min.js')}}"></script>
        <script src="{{asset('assets/js/login.js?v=638016825217184276')}}"></script>

        <script>
            $(document).ready(function () {
                _abyss.login.loginInit();
            });
        </script>

        @stack('scripts')
    </body>
</html>
