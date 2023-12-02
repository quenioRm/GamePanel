<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title', mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )) @if($__env->yieldContent('title'))- {{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}} @endif</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta name="description" content="{{env('KEYWORLDS')}}">
        <meta name="keywords" content="{{env('KEYWORLDS')}}">
        <meta property="og:title" content="@yield('title', mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )) @if($__env->yieldContent('title'))- {{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}} @endif"/>
        <meta property="og:description" content="{{env('KEYWORLDS')}}"/>
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{env('APP_URL')}}">
        <meta property="og:image" content="{{asset('assets/web/images/main/icon.png')}}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="600">
        <meta property="og:image" content="{{asset('assets/web/images/main/icon.png')}}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="1200">

        <link href="{{asset('assets/web/images/main/icon.png')}}" rel="icon" type="image/png" sizes="196x196">
        <link href="{{asset('assets/web/images/main/icon.png')}}" rel="icon" type="image/png" sizes="32x32">
        <link href="{{asset('assets/shop/css/reset.css?v=20210712')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/shop/css/plugin.min.css?v=20210712')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/shop/css/swiper.min.css?v=20210712')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/shop/css/common.css?v=20230907')}}" rel="stylesheet" type="text/css">

        <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="2734606c-71bb-4e4d-aa88-49fbca1a4718" async type="text/javascript"></script>
        <script src="https://image.playkakaogames.com/shop-web/live/js/jquery.min.js?v=20210712"></script>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-P5DK7N6T');</script>
        <!-- End Google Tag Manager -->

        <!-- Hackle -->
        <script src="https://cdn.jsdelivr.net/npm/@hackler/javascript-sdk@11.10.2/lib/index.browser.umd.min.js"></script>
        <!-- Hackle -->

        <!-- MS Clarity -->
        <script type="text/javascript">
            (function(c,l,a,r,i,t,y){
                c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
                t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
                y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
            })(window, document, "clarity", "script", "i1mtm4wxzl");
        </script>
        <!-- MS Clarity -->

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-HM8GPEPCD3"></script>
        <script>
            window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-HM8GPEPCD3');
            gtag('config', 'G-HM8GPEPCD3', { 'anonymize_ip': true });
        </script>

    <link href="https://image.playkakaogames.com/shop-web/live/css/shop.css?v=20230215" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div role="main" id="wrap" class="wrap shop-home-wrap">
            <!-- Body / Header -->
            <header class="gnb-wrap">
        <div class="gnb simple" id="gnb">
            <h1 class="gnb-logo">
                <a href="#">
                    <i class="sp-logo kkg-md">kakogames</i>
                </a>
                <a href="https://archeage.playkakaogames.com" id="linkGameLogoAal" class="game-logo"><i class="sp-logo aal">Archeage</i></a>
            </h1>

            <div class="gnb-nav has-bt">
                <a href="#" class="bt-gnb-nav" role="button"><i class="sp-c gnav">GNB Navigation Toggle button</i></a>
                <!-- 2021-11-28 추가 -->
                <nav>
                    <ul>
                        <li><a href="https://archeage.playkakaogames.com">ArcheAge</a></li>
                    </ul>
                </nav>
                <!--// 2021-11-28 추가 -->
            </div>

            <div class="gnb-back">
                <a href="#" class="bt-gnb-back" role="button"><i class="sp-c gback">page back</i></a>
            </div>


            <div class="gnb-mem mem-login">
                <a href="#" class="bt-gnb-mem" role="button">
                    <i class="sp-c gmem"></i><span id="gnb-dname">5Y1LF4Z9W3</span>
                </a>
                <nav>
                    <!-- logout-->


                    <!-- login-->
                    <ul class="s-login">
                        <li class="pc"><a href="https://account.playkakaogames.com/account/overview" target="_blank">My Account</a></li>
                        <li class="mo"><a href="https://account.playkakaogames.com/account/overview" target="_blank">My Account Overview</a></li>
                        <li class="mo"><a href="https://account.playkakaogames.com/account/myinfo" target="_blank">My Information</a></li>

                            <li class="mo"><a href="https://account.playkakaogames.com/account/security" target="_blank">Security</a></li>


                            <li class="mo"><a href="https://account.playkakaogames.com/account/connection" target="_blank">Connection</a></li>


                        <li class="both"><a href="javascript:goLogout()" class="bt-logout">LOGOUT</a></li>
                    </ul>

                </nav>
            </div>

        </div>
    </header>

            <!-- Body / Content -->


		<div class="contents shop-home-content" id="contents">
			<div class="shop-home">



				<section class="shop-item-tab-wrap"  data-aos="fade-up20" data-aos-offset="20" data-aos-duration="400" data-aos-once="true">
					<div class="shop-item-tab">
						<div class="inner-content">
							<!-- Loop Game -->

								<a href="#game6" class="on" data-game="6">ArcheAge</a>



							<!--// Loop Game -->
						</div>
					</div>
				</section>

				<section class="shop-item-list-wrap">
					<!-- Loop Game -->

						<div class="shop-item-list on" id="game6">
							<!-- Loop Corner -->

								<ul>
								<!-- Loop Product -->

									<li>
										<div class="shop-item" data-aos="fade-up20" data-aos-offset="20" data-aos-delay="200"  data-aos-duration="400" data-aos-once="true">
											<div class="img">
												<img src="https://image.playkakaogames.com/cms/live/shop/6/89060ba6084dc3ee973d34b27be9d4eb.jpg" alt="CREDITS">
											</div>
											<div class="desc">
												<div class="game">
													<span class="sp-logo aal">ArcheAge</span>

												</div>
												<div class="title">CREDITS</div>
												<div class="price">

													From
													<span>€10.00</span>
												</div>
											</div>
											<a href="https://shop.playkakaogames.com/product/24" class="link" data-game="6" data-name="CREDITS" data-id="24" data-price="€10.00" data-discount="0.0">BUY NOW</a>
										</div>
									</li>

									<li>
										<div class="shop-item" data-aos="fade-up20" data-aos-offset="20" data-aos-delay="200"  data-aos-duration="400" data-aos-once="true">
											<div class="img">
												<img src="https://image.playkakaogames.com/cms/live/shop/6/e7be291fb6d098036feed1536ddd2672.jpg" alt="1-TIME OFFER CREDIT PACK">
											</div>
											<div class="desc">
												<div class="game">
													<span class="sp-logo aal">ArcheAge</span>

												</div>
												<div class="title">1-TIME OFFER CREDIT PACK</div>
												<div class="price">

													From
													<span>€10.00</span>
												</div>
											</div>
											<a href="https://shop.playkakaogames.com/product/108" class="link" data-game="6" data-name="1-TIME OFFER CREDIT PACK" data-id="108" data-price="€10.00" data-discount="0.0">BUY NOW</a>
										</div>
									</li>

									<li>
										<div class="shop-item" data-aos="fade-up20" data-aos-offset="20" data-aos-delay="200"  data-aos-duration="400" data-aos-once="true">
											<div class="img">
												<img src="https://akamai-webcdn.kgstatic.net/cms/6/shop/1351b7d06536e6875027ee3d057db572.jpg" alt="APEX">
											</div>
											<div class="desc">
												<div class="game">
													<span class="sp-logo aal">ArcheAge</span>

												</div>
												<div class="title">APEX</div>
												<div class="price">

													From
													<span>€9.99</span>
												</div>
											</div>
											<a href="https://shop.playkakaogames.com/product/26" class="link" data-game="6" data-name="APEX" data-id="26" data-price="€9.99" data-discount="0.0">BUY NOW</a>
										</div>
									</li>

									<li>
										<div class="shop-item" data-aos="fade-up20" data-aos-offset="20" data-aos-delay="200"  data-aos-duration="400" data-aos-once="true">
											<div class="img">
												<img src="https://image.playkakaogames.com/cms/live/shop/6/da7696033137fb0aba8f618b5a40390b.png" alt="Patron Package">
											</div>
											<div class="desc">
												<div class="game">
													<span class="sp-logo aal">ArcheAge</span>

												</div>
												<div class="title">Patron Package</div>
												<div class="price">
													<i class="per">33%</i>
													From
													<span>€39.00</span>
												</div>
											</div>
											<a href="https://shop.playkakaogames.com/product/138" class="link" data-game="6" data-name="Patron Package" data-id="138" data-price="€39.00" data-discount="32.76">BUY NOW</a>
										</div>
									</li>

								<!--// Product -->
							</ul>

							<!--// Loop Corner -->
						</div>

						<div class="shop-item-list" id="game7">
							<!-- Loop Corner -->

								<ul>
								<!-- Loop Product -->

								<!--// Product -->
							</ul>

							<!--// Loop Corner -->
						</div>

					<!--// Loop Game -->
				</section>
			</div>
			<button class="btn_top">
				<span class="ico_top">Go To TOP</span>
			</button>

		</div>


            <!-- Body / Footer -->
            <footer class="footer-wrap footer_v2-wrap type-1">
        <div class="footer footer_v2">
            <div class="logo"><i class="sp-logo kkg-s">kakaogames</i></div>
            <nav class="footer-nav">
                <ul>
                    <li><a href="https://account.playkakaogames.com/about" target="_blank" id="lnAboutUs">About Us</a></li>
                    <li><a href="https://account.playkakaogames.com/tou" target="_blank" id="lnTou">Term of Use</a></li>
                    <li><a href="https://account.playkakaogames.com/pp" target="_blank" id="lnPp">Privacy Policy</a></li>
                    <li><a href="https://account.playkakaogames.com/tou#withdrawal" target="_blank" id="lnRefundPolicy">Refund Policy</a></li>
                    <li><a href="https://kakaogames.helpshift.com/hc/en/" target="_blank" id="lnSupport">Support</a></li>
                    <li><a href="/cookie_policy" id="lnCookiePolicy">Cookie Policy</a></li>
                </ul>
                <div class="lang">
                    <a href="#" role="button" class="bt-change-lang" id="lnLanguage"><span>EN</span></a>
                    <!-- 현재 언어에 on class -->
                    <ul>
                        <li class="on"><a href="?lang=en" id="lnEn">EN</a></li>
                        <li><a href="?lang=de" id="lnDe">DE</a></li>
                        <li><a href="?lang=fr" id="lnFr">FR</a></li>
                    </ul>
                </div>
            </nav>
            <div class="copy"><i>ⓒ</i> Kakao Games Europe B.V. All rights reserved.</div>
        </div>
    </footer>
        </div>

        <section class="layer-popup" id="layerAlert">
            <div class="dimmed"></div>
            <div class="lp-cont">
                <div class="msg">
                    <b>An error occurred while <br class="mo">the payment was in progress. <br class="mo">Please check again and try again.</b>
                </div>
                <div class="bt-wrap has-2">
                    <a href="#" class="bt bt-ok" data-close="true"><span class="btn-text">OK</span></a>
                </div>
            </div>
        </section>

        <section class="layer-popup" id="layerRestrictionsAlert">
            <div class="dimmed"></div>
            <div class="lp-cont">
                <div class="msg">
                    <b>You are outside of <br class="mo">our Elyon Territory of Service.</b>
                </div>
                <div class="bt-wrap has-2">
                    <a href="#" class="bt bt-ok" data-close="true"><span class="btn-text">OK</span></a>
                </div>
            </div>
        </section>

    </body>

    <!-- Body / Content -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P5DK7N6T" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <script>

        function goLogout() {
            window.location.href = "/goLogout";
        }

    </script>

    <script src="https://image.playkakaogames.com/shop-web/live/js/plugin.min.js?v=20210712"></script>
    <script src="https://image.playkakaogames.com/shop-web/live/js/swiper.min.js?v=20210712"></script>
    <script src="https://image.playkakaogames.com/shop-web/live/js/common.js?v=20230220"></script>

	<script src="https://image.playkakaogames.com/shop-web/live/js/scrollbar.js?v=20210917"></script>
	<script src="https://image.playkakaogames.com/shop-web/live/js/jquery.cookie.min.js"></script>

	<script>
		$(function() {
			window.hackleClient = Hackle.createInstance("wAD7mHDsECePGMqskvutovcwrfWpxq7b");

			if (true) {
				hackleClient.resetUser();

				hackleClient.setUser({
					identifiers: {
						userId: "10028294"
					}
				});
			}

			//-- [Hackle] Main page view
			hackleClient.track({
				key: "viewed_shopHome",
				properties: {
					event_id: 100,
					page_name: "Shop Home",
					timestamp: formatedTimestamp(),
					action: "view",
					game_type: window.location.hash? (window.location.hash == "#game_6"?"AAL":"AAU") : "DIRECT",
					login_yn: true,
					lang_type: $.cookie("lang")? $.cookie("lang").toString().toUpperCase() : "EN",
					source_page: document.referrer,
				}
			});

			//-- [Hackle] Header AAL logo click
			$("#linkGameLogoAal").on("click", function() {
				hackleClient.track({
					key: "clicked_header_aalLogo",
					properties: {
						event_id: 101,
						page_name: "Shop Home",
						timestamp: formatedTimestamp(),
						action: "click",
						login_yn: true
					}
				});
			});

			//-- [Hackle] Header AAU logo click
			$("#linkGameLogoAau").on("click", function() {
				hackleClient.track({
					key: "clicked_header_aauLogo",
					properties: {
						event_id: 102,
						page_name: "Shop Home",
						timestamp: formatedTimestamp(),
						action: "click",
						login_yn: true
					}
				});
			});

			//-- [Hackle] Header Lgoin click
			$("#lnLogin").on("click", function() {
				hackleClient.track({
					key: "clicked_header_login",
					properties: {
						event_id: 103,
						page_name: "Shop Home",
						timestamp: formatedTimestamp(),
						action: "click"
					}
				});
			});

			//-- [Hackle] Header Create account click
			$("#lnCreateAccount").on("click", function() {
				hackleClient.track({
					key: "clicked_header_createAccount",
					properties: {
						event_id: 104,
						page_name: "Shop Home",
						timestamp: formatedTimestamp(),
						action: "click"
					}
				});
			});

			//-- [Hackle] Header Account click
			$('.bt-gnb-mem').on("click", function() {
				hackleClient.track({
					key: "clicked_header_myaccount",
					properties: {
						event_id: 105,
						page_name: "Shop Home",
						timestamp: formatedTimestamp(),
						action: "click",
						menu_name: "HOME"
					}
				});
			});

			//-- [Hackle] Account option click
			$('.s-login li a').on("click", function() {
				hackleClient.track({
					key: "clicked_header_myaccount",
					properties: {
						event_id: 105,
						page_name: "Shop Home",
						timestamp: formatedTimestamp(),
						action: "click",
						menu_name: $(this).text()
					}
				});
			});

			//-- [Hackle] Main banner click
			$('.slide-item a').on("click", function() {
				const gameId = $(this).data("id");

				hackleClient.track({
					key: "clicked_main_topBanner",
					properties: {
						event_id: 106,
						page_name: "Shop Home",
						timestamp: formatedTimestamp(),
						action: "click",
						banner_id: $(this).data("serial"),
						banner_title: $(this).data("title"),
						game_type: gameId == "6" ? "AAL" : (gameId == "7" ? "AAU" : "DIRECT"),
						banner_type: $(this).data("type")
					}
				});
			});

			//-- [Hackle] Main list game click
			$('.shop-item-tab a').on("click", function() {
				const gameId = $(this).data("game");

				hackleClient.track({
					key: gameId == "6" ? "clicked_list_aalTab" : "clicked_list_aauTab",
					properties: {
						event_id: gameId== "6" ? "107" : "108",
						page_name: "Shop Home",
						timestamp: formatedTimestamp(),
						action: "click"
					}
				});
			});

			//-- [Hackle] Main product detail click
			$('.shop-item-list .link').on("click", function() {
				const gameId = $(this).data("game");

				hackleClient.track({
					key: "clicked_list_productDetail",
					properties: {
						event_id: "109",
						page_name: "Shop Home",
						timestamp: formatedTimestamp(),
						action: "click",
						product_id: $(this).data("id"),
						product_name: $(this).data("name"),
						game_type: gameId == "6" ? "AAL" : (gameId == "7" ? "AAU" : "DIRECT"),
						product_price: $(this).data("price"),
						discount_rate: $(this).data("discount")
					}
				});
			});

			//-- [Hackle] Footer link click
			$('.footer-nav > ul > li a').on("click", function() {
				const eleId = $(this).attr("id");
				let key = "";
				let eventId = "";

				switch(eleId) {
					case "lnAboutUs":
						key = "clicked_footer_aboutUs";
						eventId = "110";
						break;
					case "lnTou":
						key = "clicked_footer_termofUse";
						eventId = "111";
						break;
					case "lnPp":
						key = "clicked_footer_privacyPolicy";
						eventId = "112";
						break;
					case "lnRefundPolicy":
						key = "clicked_footer_refundPolicy";
						eventId = "113";
						break;
					case "lnSupport":
						key = "clicked_footer_support";
						eventId = "114";
						break;
					case "lnCookiePolicy":
						key = "clicked_footer_cookiePolicy";
						eventId = "115";
						break;
				}

				hackleClient.track({
					key: key,
					properties: {
						event_id: eventId,
						page_name: "Shop Home",
						timestamp: formatedTimestamp(),
						action: "click"
					}
				});
			});

			//-- [Hackle] Footer Language click
			$('.lang a').on("click", function() {
				hackleClient.track({
					key: "clicked_footer_language",
					properties: {
						event_id: 116,
						page_name: "Shop Home",
						timestamp: formatedTimestamp(),
						action: "click",
						lang_type: $(this).attr("id") == "lnLanguage"? "HOME" : $(this).text(),
					}
				});
			});

		});

		const formatedTimestamp = ()=> {
			const d = new Date()
			const date = d.toISOString().split('T')[0];
			const time = d.toTimeString().split(' ')[0];
			return `${date} ${time}`
		};

	</script>

	<script src="https://image.playkakaogames.com/shop-web/live/js/shop.js?v=20230516"></script>


</html>
