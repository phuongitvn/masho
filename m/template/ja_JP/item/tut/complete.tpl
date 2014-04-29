<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Kết quả mua món đồ | Linh Triều Bình Ca</title>
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

<div style="background-color:#CC0099;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#CC6699;color:#000000;">Kết quả mua món đồ</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" align="center"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Mua vũ khí hay đồ phòng thủ thì công lực và thủ lực sẽ tăng lên!Chà, như thế này là có thể chinh phục được thử thách rồi đây♪
</span></td></tr></table>
</div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.isReload != True}}
Đã mua dao！<br /><br />
Vàng：100→<span style="color:#ff0000;">0</span><br />
Số vũ khí đang sở hữu:0→<span style="color:#ffff00;">1</span><br />
Công lực mạnh nhất:0→<span style="color:#ffff00;">{{$app.off}}</span><br />
Thủ lực mạnh nhất:0→<span style="color:#ffff00;">{{$app.def}}</span><br />
{{/if}}

<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />
{{include file="parts/emoji.tpl" id=26}}<a href="{{"/quest/detail.php?id=112&ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">Chinh phục thử thách</a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />
</div>

</div>
</body>
</html>
