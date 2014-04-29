<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Linh Triều Bình Ca</title>
<style type="text/css">
{{literal}}
a:link{color:#ffff00;}
a:visited{color:#ffff00;}
{{/literal}}
</style>

</head>

<body style="font-family:Tahoma;color:#000000;word-wrap: break-word; background:#000000; color:#FFFFFF;">

<a name="top" id="top"></a>

<div style="margin:0;">

    <div style="background-color:#ff0000;height:22px;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1"></div>

    <div style="height:22px;text-align:center; background-color:#820000;">Quên mật khẩu</div>

    <div style="background-color:#ff0000;height:22px;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1"></div>

    <div style="text-align:center"> <a href="?url=http%3A%2F%2Fm.moba.vn%3A2200%2Findex.php"><img src="http://{{$app.domain.img}}/top_my4.gif" width="240" /></a></div>

    <div style="height:22px; background:#F5F5F5;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1"></div>
{{if $app.error != 1}}
<div padding:10px;">
    <div>Xin chào <span style="color:#00FF00">{{$app.username}}</span>!</div>
    <div>Mật khẩu mới của bạn là <span style="color:yellow">{{$app.passnew}}</span>. Xin vui lòng đăng nhập!</div>
  </div>
{{else}}
<div padding:10px;">
    <div>Link này đã được sử dụng rồi. Mời bạn vào <a href="{{"/login/Forgot.php"|cnvgw}}">Quên mật khẩu</a></div>
  </div>
{{/if}}
<div style="height:22px; background:#F5F5F5;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5"></div>
    <div style="text-align:center;"><a href="{{"/login/signup.php"|cnvgw}}">Đăng ký</a> | <a href="{{"/login/index.php"|cnvgw}}">Đăng nhập</a></div>

    <div style="text-align:center;">
{{include file="parts/emoji_vn.tpl" id=2}}<a href="{{"/"|cnvgw}}" accesskey="1">Trang chủ</a></div>

</div>

</body>
</html>
