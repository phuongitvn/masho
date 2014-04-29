<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Dán bùa|Linh Triều Bình Ca</title>
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
<div style="background-color:#0000ff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#66cccc;color:#000000;">Dán bùa</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="80" style="text-align:center;"><img src="http://{{$app.domain.img}}/treasure/{{$app.trId}}.gif" width="70" height="70" border="0" /></td>
<td><span style="font-size:x-small;">
<span style="color:#ffff00;">Báu vật có dán bùa</span><br />
Gói {{$app.sirInfo.name}}<br />
{{$app.detailInfo.name}}
</span></td></tr></table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Số bùa đang có: {{$app.has.trap1num}}<br />
{{if $app.on.trap1num >= 50}}
Số bùa đã dán: {{$app.on.trap1num}}<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<span style="color:#ff0000;">Không thể dán thêm bùa nữa</span><br />
{{else}}
{{if $app.num.1 == 0}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/quest/"|cnvgw}}"><span style="font-size:medium;">Khi làm nhiệm vụ sẽ lấy được bùa</span></a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
Số bùa đã dán: {{$app.on.trap1num}}<br />
{{else}}
Số bùa đã dán: {{$app.on.trap1num}}<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<form action="{{"/treasure/trap/index.php"|cnvgw}}" method="POST">
<input type="hidden" name="act" value="treasure_trap_complete" />
{{include file="parts/maxitem.tpl" max=$app.num.1 }}
<input type="hidden" name="wh" value="1" />
<input type="hidden" name="tid" value="{{$app.trId}}" />
<input type="hidden" name="ssid" value="{{$app.ssid}}" />
<input type="submit" value="Dán" />
</form>
</div>
{{/if}}
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Mỗi là bùa bảo vệ được báu vật trong 1 lần chiến đấu
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<span style="color:#ffff00;">Số lượng bùa siêu hạng</span> đang có: {{$app.has.trap2num}}lá<br />
{{if $app.on.trap2num >= 3}}
Số bùa đã dán: {{$app.on.trap2num}}lá<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<span style="color:#ff0000;">Không thể dán thêm bùa siêu hạng được nữa</span><br />
{{else}}
{{if $app.num.2 == 0}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/item/?kbn=4&unit=2&order=1"|cnvgw}}"><span style="font-size:medium;">Lấy được bùa siêu hạng</span></a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
Số bùa siêu hạng đã dán: {{$app.on.trap2num}}<br />
{{else}}
Số bùa siêu hạng đã dán: {{$app.on.trap2num}}<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<form action="{{"/treasure/trap/index.php"|cnvgw}}" method="POST">
<input type="hidden" name="act" value="treasure_trap_complete" />
{{include file="parts/maxitem.tpl" max=$app.num.2 }}
<input type="hidden" name="wh" value="2" />
<input type="hidden" name="tid" value="{{$app.trId}}" />
<input type="hidden" name="ssid" value="{{$app.ssid}}" />
<input type="submit" value="Dán" />
</form>
</div>
{{/if}}
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Mỗi lá bùa siêu hạng bảo vệ được báu vật trong 2 lần chiến đấu
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#66cccc;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</div>
</body>
</html>
