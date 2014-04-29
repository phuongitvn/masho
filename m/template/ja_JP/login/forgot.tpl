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

    <div style="text-align:center"> <a href="?url=http%3A%2F%2Fm.moba.vn%3A2200%2Findex.php"><img src="http://m.moba.vn:2200/img/top_my4.gif" width="240" /></a></div>

    <div style="height:22px; background:#F5F5F5;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1"></div>

    <div style="background-color:#000049; padding:10px;">Để nhận mật khẩu mới, mời bạn nhập tên đăng nhập vào trường sau </div>

    <div style="height:22px; background:#F5F5F5;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1"></div>

    <div style="padding-left:5px;"><form action="{{"/login/forgot.php"|cnvgw}}" method="post">

    	<div style="padding:10px 0px 0px 0px;color:#FFFF00;">Tên đăng nhập</div>

        <div><input name="username" type="text" style="width:90%; background:#D1F3F8; border:1px #7CC6DE solid; font-weight:bold;padding:3px 2px;margin:5px 0 3px 0;" value=""/></div>
	{{if is_error('username')}}

		<div style="color:red">{{message name="username"}}</div>

	{{/if}}
        <div style="text-align:center; padding:10px 0px;"><input name="btn" type="submit" value="Gửi yêu cầu" style="cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-weight:bold; color:#51111E;" /></div>

    </form>

    </div>
  <div style="background-color:#000049; padding:10px;">
    <div><span style="color:#FFFF00">Lưu ý:</span> Đối với user của Moba chưa đăng ký tài khoản Linh Triều Bình Ca, vui lòng click <a href="http://sns.moba.vn/user/login/forgot" style="color:#00FF00">vào đây</a> </div>
  </div>
    <div style="text-align:center;"><a href="{{"/login/signup.php"|cnvgw}}">Đăng ký</a> | <a href="{{"/login/index.php"|cnvgw}}">Đăng nhập</a></div>

    <div style="text-align:center;">
{{include file="parts/emoji_vn.tpl" id=2}}<a href="{{"/"|cnvgw}}" accesskey="1">Trang chủ</a></div>

</div>

</body>
</html>
