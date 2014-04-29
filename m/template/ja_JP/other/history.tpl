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


<div style="text-align:center; background-color:#3366FF;color:#ffffff;">Lịch sử với Quân đoàn <br />{{$app.ot_profile.handle}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;"><span style="color:#ffff00;">[Chiến đấu]</span></div>
Số lần chiến đấu : {{$app.allF.total|default:0}} (Thắng {{$app.allF.win|default:0}}/Thua {{$app.allF.lose|default:0}})<br />
- Tấn công: {{$app.toF.off|default:0}} (Thắng {{$app.toF.win|default:0}}/Thua {{$app.toF.lose|default:0}})<br />
- Phòng thủ: {{$app.fromF.def|default:0}} (Thắng {{$app.fromF.lose|default:0}}/Thua {{$app.fromF.win|default:0}})<br />

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /></div>
<div style="text-align:center;"><span style="color:#ffff00;">[Viện trợ]</span></div>
Số lần đã cứu viện: {{$app.to.help|default:0}} (Thắng {{$app.to.help_win|default:0}}/Thua {{$app.to.help_lose|default:0}})<br />
Số lần được cứu viện: {{$app.from.help|default:0}} (Thắng {{$app.from.help_win|default:0}}/Thua {{$app.from.help_lose|default:0}})<br />

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /></div>
<div style="text-align:center;"><span style="color:#ffff00;">[Card]</span></div>
Số Card đã tặng: {{$app.to.card|default:0}}<br />
Số Card được tặng: {{$app.from.card|default:0}}<br />

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /></div>
<div style="text-align:center;"><span style="color:#ffff00;">[Báu vật]</span></div>
Số lượng đã chiếm được: {{$app.toF.treasure|default:0}}<br />
Số lượng bị chiếm mất: {{$app.fromF.treasure|default:0}}<br />
Số lượng đã tặng: {{$app.to.treasure|default:0}}<br />
Số lượng được tặng: {{$app.from.treasure|default:0}}<br />

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /></div>
<div style="text-align:center;"><span style="color:#ffff00;">[Chào hỏi]</span></div>
Số lần đã Chào hỏi: {{$app.to.niko|default:0}}<br />
Số lần được Chào hỏi: {{$app.from.niko|default:0}}<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">{{include file="parts/emoji.tpl" id=9}}<a href="{{"/greeting/?id="|cat:$form.id|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Chào hỏi</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /></div>

<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />
<a href="{{"/other/?id="|cat:$form.id|cnvgw}}">Về Quân đoàn {{$app.ot_profile.handle}}</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
</div>

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
