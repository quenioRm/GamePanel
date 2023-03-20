$(function () {
    $('.section_account .btn_togglemenu').on('click', function () {
        var $this = $(this);
        if (!$this.closest('header').hasClass('account_on')) {
            $this.closest('header').addClass('account_on');
            $('html, body').addClass('overflow_on');
        } else {
            $this.closest('header').removeClass('account_on');
            $('html, body').removeClass('overflow_on');
        }
    });
    //click outside target
    window.addEventListener('mouseup', function (e) {
        if ($(window).width() > 1023) {
            $('.list_gnb').find('.item_gnb').removeClass('on');
            $('header').find('.logo').removeClass('on');
        }
    });
    //submenu open
    $('.list_gnb .item_gnb a').on('click', function (elem) {
        $(this).closest('.item_gnb').toggleClass('on');
//         if(window.innerWidth >= 1024){
        $(this).closest('.item_gnb.more').toggleClass('on')
//        }
        elem.preventDefault();
    })
    //sublogo menu open
    $('header .logo a').on('click', function (elem) {
        $(this).closest('.logo').toggleClass('on');
        elem.preventDefault();
    })
    //submenu hover and open menu
    $('.list_gnb .item_gnb a').hover(
        function () {
            if (window.innerWidth >= 1024) {
                $(this).closest('.item_gnb').addClass('on')
            }
        },
        function () {
            if (window.innerWidth >= 1024) {
                $(this).closest('.item_gnb').filter(":not(.more)").removeClass('on')
            }

        }
    )
    $('.item_gnb.more').hover(
        function () {
            if (window.innerWidth >= 1024) {
                $(this).closest('.item_gnb.more').addClass('on')
            }
        },

        function () {
            if (window.innerWidth >= 1024) {
                $(this).closest('.item_gnb.more').removeClass('on')
            }
        }
    )

    $('.item_gnb.more list_submenu').hover(
        function () {
//               if(window.innerWidth >= 1024){
            $(this).closest('.item_gnb.more list_submenu').addClass('on')
//              }
        },

        function () {
            if (window.innerWidth >= 1024) {
                $(this).closest('.item_gnb.more').removeClass('on')
            }
        }
    )

    $('.item_gnb.more').on('click', function (elem) {
        if (window.innerWidth >= 1024) {
            $('.item_gnb.more').addClass('on')
        }
        elem.preventDefault();
    })

    //submenu hover and open menu
    $('header .logo a').hover(
        function () {
            if ($(window).width() > 1023) {
                $(this).closest('.logo').addClass('on')
            }
        },
        function () {
            if($(window).width() > 1023) {
                $(this).closest('.logo').removeClass('on')
            }
        }
    )
    //toogle mobile main menu
    /* 2022-01-19 수정 시작 */
    $('.doc_gnb .btn_togglemenu').on('click', function () {
        var $this = $(this);
        if ($('body').css('overflow') != 'hidden') {
            $('body').css('overflow', 'hidden');
        } else {
            $('body').css('overflow', 'auto');
        }
        if (window.innerWidth < 1024) {
            $('.download_btn').css('display', 'none');
            $('.play_btn').css('display', 'none');
        }
        if (!$this.closest('header').hasClass('menu_on')) {
            $this.closest('header').addClass('menu_on');
            $('html, body').addClass('overflow_on');
        } else {
            $this.closest('header').removeClass('menu_on');
            $('html, body').removeClass('overflow_on');
        }
    });
    /* // 2022-01-19 수정 끝 */
    menuTopRebuild();
    $(window).on('resize', function () {
        menuTopRebuild();
    });
    /* 2022-04-29 삭제 시작 */
    // $(window).scroll(function () {
    //     if ($(this).scrollTop() > 100) {
    //         $('.back-to-top').fadeIn('slow');
    //     } else {
    //         $('.back-to-top').fadeOut('slow');
    //     }
    // });
    // $('.back-to-top').click(function () {
    //     $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
    //     return false;
    // });
    /* // 2022-04-29 삭제 끝 */
    setOptBox();
    $('.link_attr_data').on('click', function () {
        location.href = $(this).attr("attr-data");
    });
});

/* 2022-01-19 수정, 추가, 삭제 시작 */
//main menu rebuild for adaptive
function menuTopRebuild() {
    var lastCntItem = 0
    //view all
    var itemCount = $(".doc_gnb .list_gnb>li").length;
    $('.doc_gnb .list_gnb>li').each(function (index, value) {
        if (index < itemCount - 2) {
            $(this).show();
        }
    });

    // 2022-11-18 미디어쿼리값 수정 시작
    // 2022-11-07 미디어쿼리값 수정 시작
    // 50 : 유지여백
    // 426 :logo+account+여백+playnow
    if($('html').attr('lang') == 'en'){
        if ($(this).width() < 1000) return;
        //hide the necessary items

        if ($(this).width() < 1143 + 146 + 50) lastCntItem++; // 1142
        if ($(this).width() < 1090 + 146 + 50) lastCntItem++;
        if ($(this).width() < 1025 + 146 + 50) lastCntItem++;
    }else if($('html').attr('lang') == 'de'){
        if ($(this).width() < 1007) return;

        if ($(this).width() < 993 + 426 + 50) lastCntItem++;
        if ($(this).width() < 965 + 426 + 50) lastCntItem++;
        if ($(this).width() < 808 + 426 + 50) lastCntItem++;
        if ($(this).width() < 658 + 426 + 50) lastCntItem++;
    }else if($('html').attr('lang') == 'fr'){
        if ($(this).width() < 1007) return;

        if ($(this).width() < 1046 + 426 + 50) lastCntItem++;
        if ($(this).width() < 1011 + 426 + 50) lastCntItem++;
        if ($(this).width() < 794 + 426 + 50) lastCntItem++;
        if ($(this).width() < 674 + 426 + 50) lastCntItem++;
    }
    // 2022-11-07 미디어쿼리값 수정 끝
    // 2022-11-18 미디어쿼리값 수정 끝

    var fi = itemCount - lastCntItem - 2;
    var ti = itemCount - 3;
    //clear list more
    $('.doc_gnb .item_gnb.more .list_submenu').empty();
    $('.doc_gnb .list_gnb>li').each(function (index, elem) {
        if (index >= fi && index <= ti) {
            $('.doc_gnb .item_gnb.more .list_submenu:first').append($(elem).clone());
            $(this).hide();
        }
    });
}
/* // 2022-01-19 수정, 추가, 삭제 끝 */

/**
 * @function
 * @summary 언어 선택 드롭다운 리스트
 */
/* 2022-04-26 수정, 추가 시작 */
function OptBox(selector, options) {
    this.selector,
        this.openBtn,
        this.openBtnHtml,
        this.openClassName,
        this.selectBtn,
        this.selectBtnCallback;
    this.init(selector, options);
    this.initEvent();
}

OptBox.prototype = {
    init: function (selector, options) {
        this.selector = $(selector);
        this.openBtn = this.selector.find(options.openBtn);
        this.openBtnHtml = this.openBtn.children(
            options.openBtnIcon
        )[0].outerHTML;
        this.openClassName = options.openClassName;
        this.selectBtn = this.selector.find(options.selectBtn);
        this.selectBtnCallback = options.selectBtnCallback;
    },
    initEvent: function () {
        var self = this;

        this.openBtn.on("click", function (e) {
            e.preventDefault();
            self.optOpenAt(this);
            self.isActive();
        });

        this.selectBtn.on("click", function (e) {
            e.preventDefault();
            if (typeof self.selectBtnCallback === "function") {
                self.selectBtnCallback(this);
            } else {
                self.selectBtnAt(this);
            }
            self.isActive();
        });
    },
    optOpenAt: function (evtThis) {
        var $evtThis = $(evtThis);

        if (this.selector.hasClass(this.openClassName)) {
            this.selector.removeClass(this.openClassName);
            $evtThis.attr("aria-expanded", "false");
        } else {
            this.selector.addClass(this.openClassName);
            $evtThis.attr("aria-expanded", "true");
        }
    },
    selectBtnAt: function (evtThis) {
        var $evtThis = $(evtThis);
        var thisText = $evtThis.text();

        this.openBtn
            .html(thisText + this.openBtnHtml)
            .attr("aria-expanded", "false");
        this.selector.removeClass(this.openClassName);
        this.selectBtn.attr("aria-selected", "false");
        $evtThis.attr("aria-selected", "true");
    },
    isActive: function() {
        var $document = $(document);
        var $docFooter = $('.doc-footer');

        if( $document.width() <= 767 ){
            if ( this.selector.hasClass(this.openClassName) ) {
                $docFooter.addClass('on');
            } else {
                $docFooter.removeClass('on');
            }
        }
    }
};
/* // 2022-04-26 수정, 추가 끝 */

$.fn.extend({
    optBox: function (setting) {
        return this.each(function () {
            var options = $.extend({}, $.fn.optBoxDefaults, setting || {});
            var optBox = new OptBox(this, options);
        });
    },
    optBoxDefaults: {
        openBtn: ".link_opt",
        openBtnIcon: ".ico_arrow",
        openClassName: "opt_open",
        selectBtn: ".link_option"
    }
});

var langTrigger = false;

function setOptBox() {
    $('.group_lang').optBox({
        openBtn: ".link_selected",
        openClassName: "on",
        selectBtn: ".link_lang",
        selectBtnCallback: function (evtThis) {
            /*  2022-04-26 수정, 추가, 삭제 끝 */
            var $document = $(document);
            var $evtThis = $(evtThis);
            var langTxt = $evtThis.data('lang');
            let lang = $evtThis.data('value');

            this.openBtn.attr("aria-expanded", "false");
            this.selector.removeClass(this.openClassName);
            this.selectBtn.attr("aria-selected", "false");
            $evtThis.attr("aria-selected", "true");

            if( $document.width() <= 1023 ){
                this.openBtn.children(".type_short.txt_selected").text(lang);
            }

            if( $document.width() >= 1024 || $document.width() <= 767 ){
                this.openBtn.children(".type_full.txt_selected").text(langTxt);
            }
            /* // 2022-04-26 수정, 추가, 삭제 끝 */

            location.href = window.location.pathname + '?lang=' + lang;
            /*if (langTrigger) {
                location.href = window.location.pathname + '?lang=' + lang;
            } else {
                langTrigger = true;
            }*/

        }
    });
}

function setLanguage(language) {
    // console.log(language) /* 2022-01-19 삭제 */
    $('.link_lang[data-value=' + language + ']').click()
}

/* 2022-01-19 추가 시작 */
(function (global, $) {
    'use strict';

    /**
     * 문서 객체 참조 변수
     */
    /* 2022-04-29 추가 시작 */
    var $root = null;
    var $window = $(window);
    /* // 2022-04-29 추가 끝 */
    var $body = null;
    var $document = $(document);
    var $docHeader = null;
    var $groupNav = null;
    var $gnbNavBtn = null;
    var $groupAccount = null;
    var $itemLogin = null;
    var $listAccount = null;
    var $btnAccountOpen = null;
    var $btnAccountClose = null;
    var $groupSite = null;
    var $linkSite = null;
    var $linkSelected = null;
    /* 2022-04-29 추가 시작 */
    var $docFoot = null;
    var $gotoTopBtn = null;
    /* // 2022-04-29 추가 끝 */
    var $boxNav = null;/* 2022-06-02 추가 */

    // pc,m check variable
    var delay = 500;
    var timer = null;
    var chkMobile = null;
    /* 2022-04-29 추가 시작 */
    var pageEndPos = 0;/* 2022-06-02 수정 */
    var winHeight = 0;
    var winScrollTop = 0;
    var docHeight = 0;
    var docFooterHeight = 0;
    /* // 2022-04-29 추가 끝 */
    /* 2022-06-02 추가 시작 */
    var btnBottomPos = 0;
    var boxNavheight = 0;
    /* // 2022-06-02 추가 끝 */

    /**
     * @function
     * @summary jQuery 객체화
     */
    function setReferenceDomEls() {
        $root = $('html, body');/* 2022-04-29 추가 */
        $body = $('body');
        $docHeader = $('.doc-header');
        $groupNav = $docHeader.find('.group_nav');
        $gnbNavBtn = $docHeader.find('.btn_menu');
        $groupAccount = $('.group_account');
        $itemLogin = $('.item_login');
        $listAccount = $('.list_account');
        $btnAccountOpen = $('.btn_account_open');
        $btnAccountClose = $('.btn_account_close');
        $groupSite = $('.group_site');
        $linkSite = $('.list_site .link_site');
        $linkSelected = $('.group_site .link_selected');
        /* 2022-04-29 추가 시작 */
        $docFoot = $('.doc-footer');
        $gotoTopBtn = $('#linkTop');
        /* // 2022-04-29 추가 끝 */
        $boxNav = $('.box_nav');/* 2022-06-02 추가 */
    }

    /**
     * @function
     * @summary 초기화
     */
    function init() {
        setReferenceDomEls();
        bindEvents();
        chkSize();
        setScrollGotoTop();/* 2022-04-29 추가 */
    }

    /**
     * @function
     * @summary Bind Events
     */
    function bindEvents() {
        $gnbNavBtn.on('click', onClickBtnGnbToggle);
        $groupAccount.on({
            mouseenter: function(){
                if(chkMobile == 'pc'){
                    if(!$itemLogin.hasClass('on')){
                        $itemLogin.addClass('on');
                    }
                }
                if(chkMobile == 'tablet'){
                    if(!$listAccount.hasClass('on')){
                        $listAccount.addClass('on');
                    }
                }
            },
            mouseleave: function(){
                if(chkMobile == 'pc'){
                    if($itemLogin.hasClass('on')){
                        $itemLogin.removeClass('on');
                    }
                }
                if(chkMobile == 'tablet'){
                    if($listAccount.hasClass('on')){
                        $listAccount.removeClass('on');
                    }
                }
            }
        });
        $btnAccountOpen.on({
            click: function(){
                if(chkMobile == 'mobile'){
                    if(!$listAccount.hasClass('on')){
                        $groupSite.removeClass('on');/* 2022-02-14 추가 */
                        $body.addClass('fixed_body');
                        $listAccount.addClass('on');
                    }else{
                        $body.removeClass('fixed_body');
                        $listAccount.removeClass('on');
                    }
                }
            }
        });
        $btnAccountClose.on({
            click: function(){
                if(chkMobile == 'mobile'){
                    if($listAccount.hasClass('on')){
                        $body.removeClass('fixed_body');
                        $listAccount.removeClass('on');
                    }else{
                        $body.addClass('fixed_body');
                        $listAccount.addClass('on');
                    }
                }
            }
        });

        $linkSelected.on({
            click: function(){
                if(chkMobile == 'mobile'){
                    if(!$groupSite.hasClass('on')){
                        $groupSite.addClass('on');
                    }else{
                        $groupSite.removeClass('on');
                    }
                }
            }
        });

        $linkSite.on('click', function(){
            var $this = $(this);
            var siteTxt = $this.text();
            var siteClass = $this.attr('class');

            $linkSite.closest('li').removeClass('on');
            $linkSite.attr('aria-selected', 'false');

            $this.closest('li').addClass('on');
            $this.attr('aria-selected', 'true');

            $linkSelected.attr('class', 'link_selected ' + siteClass);
            $linkSelected.find('.ico_svg').text(siteTxt);
            $groupSite.removeClass('on');
        });
        /* 2022-04-29 추가 시작 */
        $window.on('scroll', setScrollGotoTop);
        $window.on('resize', setScrollGotoTop);
        $gotoTopBtn.on('click', onClickScrollGotoTop);
        /* // 2022-04-29 추가 끝 */
    }

    /**
     * @function
     * @summary GNB
     */
    function onClickBtnGnbToggle() {
        $gnbNavBtn.toggleClass('on');
        $groupSite.removeClass('on');/* 2022-02-08 수정 */
        var $this = $(this);

        if( $gnbNavBtn.hasClass('on') ) {
            $body.addClass('fixed_body');
            $this.attr('aria-label', 'close side meun');
            $this.attr('aria-pressed', 'true');
            $groupNav.addClass('on');
            $groupNav.attr('aria-hidden', 'false');
        } else {
            $body.removeClass('fixed_body');
            $this.attr('aria-label', 'open side menu');
            $this.attr('aria-pressed', 'false');
            $groupNav.removeClass('on');
            $groupNav.attr('aria-hidden', 'true');
        }
    }

    /* 2022-11-17 수정 시작 */
    // pc,m check function
    function chkSize(){
        if($('html').attr('lang') == 'de'){
            if(window.outerWidth <= 1023){  // 모바일 분기
                chkMobile = 'mobile';
            }else if(window.outerWidth <= 1728){  // 테블릿 분기 = css 미디어쿼리 분기
                chkMobile = 'tablet';
            }else{
                chkMobile = 'pc';
            }
        }else if($('html').attr('lang') == 'fr'){
            if(window.outerWidth <= 1023){  // 모바일 분기
                chkMobile = 'mobile';
            }else if(window.outerWidth <= 1797){  // 테블릿 분기 = css 미디어쿼리 분기
                chkMobile = 'tablet';
            }else{
                chkMobile = 'pc';
            }
        }else{
            if(window.outerWidth <= 1023){  // 모바일 분기
                chkMobile = 'mobile';
            }else if(window.outerWidth <= 1511){  // 테블릿 분기 = css 미디어쿼리 분기
                chkMobile = 'tablet';
            }else{
                chkMobile = 'pc';
            }
        }
    }
    /* //2022-11-17 수정 끝 */

    // window resize
    $(window).on('resize', function(){
        clearTimeout(timer);
        timer = setTimeout(function(){
            chkSize();
        }, delay);
    });

    // account login

    /* 2022-06-02-v1 수정 시작 */
    /* 2022-06-02 수정, 추가 시작 */
    /* 2022-04-29 추가 시작 */
    /**
     * @function
     * @summary goto top
     */
    function setScrollGotoTop() {
        winScrollTop = $window.scrollTop();
        winHeight = $window.height();
        docHeight = $document.height();
        docFooterHeight = $docFoot.height();
        boxNavheight = $boxNav.height();

        pageEndPos = docHeight - winHeight - docFooterHeight;

        if ( winScrollTop >= pageEndPos ){
            btnBottomPos = docFooterHeight + ( (!boxNavheight) ? 24 : boxNavheight + 25); // !boxNavheight가 false이면 뉴스뷰 nav
            $gotoTopBtn.css({
                'position': 'absolute',
                'bottom': btnBottomPos + 'px'
            });
        } else {
            $gotoTopBtn.css({
                'position': 'fixed',
                'bottom': '24px'
            });
        }

        ( winScrollTop >= Math.floor(winHeight / 6) )
            ? $gotoTopBtn.addClass('on')
            : $gotoTopBtn.removeClass('on');
    }
    /* // 2022-06-02 수정, 추가 끝 */
    /* // 2022-06-02-v1 수정 끝 */

    function onClickScrollGotoTop(e) {
        e.preventDefault();
        $root.stop().animate({ scrollTop:0 } , 500);
    }
    /* // 2022-04-29 추가 끝 */

    $document.ready(init);
})(window, window.jQuery);
/* // 2022-01-19 추가 끝 */