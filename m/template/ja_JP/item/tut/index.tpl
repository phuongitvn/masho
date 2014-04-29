<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Thử thách／Chiến trường Kyuushuu | Linh Triều Bình Ca</title>
<style type="text/css">
{{literal}}
a:link{color:#ffff00;}
a:visited{color:#ffff00;}
{{/literal}}
</style>
</head>
<body style="background-color:#000000;color:#ffffff">
<a name="top" id="top"></a>
<div style="font-size:x-small;">


<div style="text-align:center; background-color:#CC0099;"><span style="color:#ffffff;">Chiến trường Kyuushuu</span></div>
{{if $app.tut_num == 10 }}
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" align="center"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Giống như thử thách này<span style="color:#ffff00;">Vì có trường hợp không có món đồ cần thiết(Vũ khí hoặc đồ phòng thủ)</span>thìkhông thể bắt đầu được!
</span></td></tr></table>
</div>
<div style="background-color:#CC0099;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#CC6699;color:#000000;">Mua món đồ cần thiết</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<table border="0" width="98%" cellspacing="0" cellpadding="0" align="center">
<tr>
<td width="70"><img src="http://{{$app.domain.img}}/item/1.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;text-align:left;">
Vũ khí：Dao<br />
Tính năng：Tấn công 44／phòng thủ 30<br />
Giá：100 vàng<br />
Hiện có：0 cái<br />
Vàng：100→<span style="color:#ff0000;">0</span><br />
</span></td></tr>
</table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<!--<form action="{{"/item/"|cnvgw}}" method="POST">-->
<form action="http://{{$app.domain.www}}/item/tut/index.php" method="POST">
<input type="hidden" name="act" value="item_tut_complete" />
<input type="hidden" name="ssid" value="{{$form.ssid}}" />
<input type="submit" value="Mua" />
</form>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{else}}
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="70" align="center"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Không được quay đầu lại ,tiến lên phía trước đi！
</span></td></tr></table>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="20" /><br />

<div style="text-align:center;">
{{include file="parts/emoji.tpl" id=26}}<a href="{{"/quest/detail.php?id=112&ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">Chinh phục thử thách</a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />
</div>
{{/if}}
</div>
</body>
</html>
