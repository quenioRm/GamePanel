// if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
//     $("#footerSpan1").attr("style", "color: gray;")
//     $("#pSpan1").attr("style", "")
// }

new ResizeSensor(jQuery('#page_wrap'), function(){ 
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        $("#footerSpan1").attr("style", "color: gray;")
        $("#pSpan1").attr("style", "")
    }else{
        $("#footerSpan1").attr("style", "color: gray;left:-50px; position: relative;")
        $("#pSpan1").attr("style", "left:-60px; position: relative;") 
    }
});