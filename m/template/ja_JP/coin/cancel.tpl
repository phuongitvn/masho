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
<body style="background-color:#000000;color:#ffffff">
<div style="font-size:x-small; color:#FFFFFF;">
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">Đổi Ngọc</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br/>
Đổi Ngọc không thành công! Số Ngọc bạn đang có hiện không đủ bạn hãy chọn gói đổi ngọc khác hay mua thêm <a href="{{"/coin/index.php"|cnvgw}}" style="color:#00CC00">Ngọc</a> nhé!<br/>
 Ngọc: {{$app.profile.coin}} &raquo; <span style="color:#ff0000;">không đủ</span><br/>
 Vàng: {{$app.profile.money}} &raquo; <span style="color:#ff0000;">{{$app.profile.money}}</span><br/>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br/>
<div style="text-align:center;"><a href="{{"/coin/convert.php"|cnvgw}}">Về Đổi Ngọc</a></div>
{{include file="parts/footer.tpl"}}
</body>
</html>