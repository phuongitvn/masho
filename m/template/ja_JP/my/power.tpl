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
<a name="top" id="top"></a>
<div style="font-size:x-small;">
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000; color:#ffffff;">Quân năng Quân đoàn {{include file="parts/emoji.tpl" id=10}}{{$app.profile.handle}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="90" align="center"><img src="http://{{$app.domain.www}}/img/card/{{$app.profile.prof}}.jpg" width="80" height="109" /></td>
<td><span style="font-size:x-small;">
Quân đoàn trưởng: <a href="{{"/card/deck.php"|cnvgw}}">{{$app.card.name}} ({{$app.card.rank}})</a><br />
Quân năng: {{$app.profile.level}}<br />
Quân binh: {{$app.deck.follower}}<br />
Công lực: {{$app.deck.offense}}<br />
Thủ lực: {{$app.deck.defense}}<br />
Năng lượng: {{$app.profile.lv_genki}}</span><br />
Tỷ lệ thắng: {{$app.profile.rate}}% (Thắng {{$app.profile.win}}/Bại {{$app.profile.lose}})<br />
Vũ khí/Đồ phòng thủ: <a href="{{"/item/?md=1"|cnvgw}}">{{$app.sum1}}/{{$app.sum2}}</a></span></td></tr>
</table>
<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br /><div style="text-align:center"><a href="{{"/my/profile.php"|cnvgw}}">Hồ sơ cá nhân</a></div>
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
