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
<body style="font-family:Tahoma;color:#000000;word-wrap: break-word; background:#000000; color:#FFFFFF;  font-size:x-small">
	<form method="post">
	<input type="hidden" name="ssid" value="{{$app.ssid|escape}}" />
	<div><input name="tel" type="text" style="width:90%; background:#D1F3F8; border:1px #7CC6DE solid; font-weight:bold;padding:3px 2px;margin:5px 0 3px 0;" value="{{$app.tel|escape}}"/></div>
	{{if $app.err}}
	<div style="color:red">{{$app.err|escape}}</div>
	{{/if}}
	{{if $app.message}}
	<div style="font-weight:bold">{{$app.message|escape}}</div>
	{{/if}}

	<div style="text-align:center; padding:10px 0px;"><input name="btn" type="submit" value="Mời bạn" style="cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-weight:bold; color:#51111E;" /></div>
	</form>
</div>

<div>
<div style="padding:10px 0px 0px 0px;color:#FFFF00; text-align:center">**Chú ý**</div>
<ul style="margin:0">
<li>Bạn đã mời được bạn mình 1 lần, thì trong 1 tuần bạn sẽ không mời thêm được nữa</li>
<li>Bạn sẽ không mời được những số điện thoại đã là thành viên từ trước đó</li>
<li>Bạn gửi lời mời nhưng bạn của bạn không đăng kí thì bạn sẽ không nhận được Vàng</li>
<li>Bạn được gửi lời mời đến 5 người trong 1 ngày</li>
</ul>
</div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>