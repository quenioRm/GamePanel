// 쿠키생성
let setCookie = function(name, value, exp){
    let date = new Date();
    date.setTime(date.getTime() + exp*60*60*1000);
    document.cookie = name + '=' + value + ';expires=' + date.toUTCString() + ';path=/;domain=playkakaogames.com;';
};

// 쿠키로드
let getCookie = function(name){
    let value = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
    return value? value[2] : null;
}

// 쿠키연장
let extendCookie = function(name, exp){
    let cookie_value = getCookie(name);
    if(cookie_value) setCookie(name, cookie_value, exp);
}

// 쿠키삭제
let deleteCookie = function(name){
    document.cookie = name + '=;expires=Thu, 01 Jan 1999 00:00:10 GMT;path=/;domain=playkakaogames.com;';
}