
//JS设置Cookie会根据URL将缓存区分开，不同的URL下同名缓存内容不同，可以通过在setCookie最后一行加入 +"; path=/"来保证跨域名获取同样的缓存

//通过JS设置Cookie setCooke(缓存名称,缓存值)
function setCookie(name, value)
{
    //设置缓存天数
    var Days = 30;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
    document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString()+"; path=/";
}

//通过JS 获取Cookie
function getCookie(name)
{
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
    if (arr = document.cookie.match(reg))
        return unescape(arr[2]);
    else
        return null;
}

//通过JS 删除Cookie
function delCookie(name) {
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval = getCookie(name);
    if (cval != null)
        document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString()+"; path=/";
}