<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Bắt đầu chiến trường mới|Linh Triều Bình ca</title>
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
<div style="background-color:#{{$app.color.sub}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#{{$app.color.main}};color:#{{$app.color.text}};">Thử thách</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;color:#ffff00;">Chiến trường {{$app.stage}}{{if $app.md == "nosight"}} (Toàn thắng){{else}}(Trận mở màn){{/if}}</div>

{{if $app.md == "nosight"}}
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="70" align="center"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" />
</td>
<td><span style="font-size:x-small;">
 Đợi một chút trước khi tiếp tục thử thách Quân đoàn {{$app.profile.handle}} nhé! Đã bỏ công đánh bại Yêu tướng thì hãy dành thời gian xem qua Card Yêu tướng vừa chiêu mộ được nhé!
</span></td></tr>
</table>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<div style="text-align:center;"><a href="{{"/boss/card.php?ssid="|cat:$app.ssid|cnvgw}}"><span style="font-size:medium;">Xem Card Yêu tướng </span></a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{else}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<div style="text-align:center;"><img src="http://{{$app.domain.img}}/scn/{{$app.scn}}.gif" width="240" height="45" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
{{$app_ne.word.first_cmnt}}<br />
<div style="text-align:center; background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;">
<a href="{{"/quest/detail.php?id="|cat:$app.questid|cat:"&ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">{{include file="parts/emoji.tpl" id=26}}Thực hiện thử thách</a>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center; background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
