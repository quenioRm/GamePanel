$(function() {
    //clone element for mobile version
    $('.section-banner-mobile').append($('.section-banner .info_banner').clone());
})

function closeVideoPopup() {
    document.getElementById("videoIntro").play();
    $('.video-content').attr('src','');
    $('.video-popup').hide();
}
