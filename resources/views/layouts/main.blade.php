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

        <title>@yield('title', mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )) @if($__env->yieldContent('title'))- {{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}} @endif</title>
        <meta name="keywords" content="{{env('KEYWORLDS')}}" />
        <meta name="description" content="Entre com {{env('WEB_NAME')}} ID." />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="@yield('title', mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )) @if($__env->yieldContent('title'))- {{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}} @endif" />
        <meta property="og:description" content="Entre com {{env('WEB_NAME')}} ID." />
        <meta property="og:url" content="{{Request::url()}}" />
        <meta property="og:image" content="{{asset('assets/web/images/main/logo.png')}}" />
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
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/account.css?v=638016825217184276')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/game_network.css?ver=638016825217184276')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/styleAdd.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/sweetalert2.min.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/datepicker.css?v=638016825217184276')}}" />

        @stack('styles')

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

                <div class="modal_recapcha js-modalRecapcha">
                    <div class="recaptcha_wrap">
                       <div id="html_element" class="googleRobot recapcha center"></div>
                    </div>
                 </div>
                <div class="modal_dim js-modalDim"></div>

                @include('layouts.footer')
            </div>
        </div>

        <script>
            var _format = "dd/MM/yyyy";
        </script>
        <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
        @if (App::getLocale() == "pt-BR")
            <script src="{{asset('assets/language/languagepack.pt-br.js?v=638016825217184276')}}"></script>
        @elseif(App::getLocale() == "es")
            <script src="{{asset('assets/language/languagepack.es-mx.js?v=638016825217184276')}}"></script>
        @elseif(App::getLocale() == "en")
            <script src="{{asset('assets/language/languagepack.en-us.js?v=638016825217184276')}}"></script>
        @endif
        <script src="{{asset('assets/js/common.js?v=638016825217184276')}}"></script>

        <script src="{{asset('assets/js/jquery.validate-1.19.2.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.validate.unobtrusive-3.2.11.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.inputmask.bundle.js')}}"></script>
        <script src="{{asset('assets/js/select2.min.js')}}"></script>
        <script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>

        <script src="{{asset('assets/js/datepicker.js?v=638016825217184276')}}"></script>
        <script src="{{asset('assets/js/ResizeSensor.js')}}"></script>

        <script src="{{asset('assets/js/global.js')}}"></script>

        @stack('scripts')

        @if(Session::has('message'))
            @if(session('message')['type'] == 'success')
                <script>
                    Swal.fire({
						position: 'center',
						icon: 'success',
						// background: '#fff',
						title: '{{ session('message')['text'] }}',
						showConfirmButton: false,
						timer: 6500
					})
                </script>
            @elseif(session('message')['type'] == 'error')
                <script>
                    Swal.fire({
						position: 'center',
						icon: 'error',
						// background: '#fff',
						title: '{{ session('message')['text'] }}',
						showConfirmButton: false,
						timer: 6500
					})
                </script>
            @endif
        @endif
    </body>
</html>
