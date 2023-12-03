<footer class="footer-wrap footer_v2-wrap type-1">
    <div class="footer footer_v2">
       <div class="logo"><i class="sp-logo kkg-s">{{env('APP_NAME')}}</i></div>
       <nav class="footer-nav">
          <ul>
             <li><a href="#" target="_blank" id="lnAboutUs">About Us</a></li>
             <li><a href="#" target="_blank" id="lnTou">Term of Use</a></li>
             <li><a href="#" target="_blank" id="lnPp">Privacy Policy</a></li>
             <li><a href="#" target="_blank" id="lnRefundPolicy">Refund Policy</a></li>
             <li><a href="#" target="_blank" id="lnSupport">Support</a></li>
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
       <div class="copy"><i>ⓒ</i> Copyright © {{env('WEB_NAME')}}. All rights reserved.</div>
    </div>
 </footer>
