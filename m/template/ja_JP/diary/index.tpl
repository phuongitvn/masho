<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Nhật trình|Linh Triều Bình Ca</title>
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
<div style="text-align:center;background-color:#{{$app.color.main}};color:#{{$app.color.text}};">Nhật trình </div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;color:#ffff00;">Chiến trường {{$app.stage}} ({{$app.title}})</div>

{{if $app.cs > 1}}
<!-- navi -->
<div style="text-align:center;"><table border="0" width="100%" cellspacing="0" cellpadding="0"><tr>
{{if $form.id == ""}}
{{if $app.profile.stage == 1 }}
{{else}}
<td width="80"><span style="font-size:x-small;"><a href="{{"/diary/?id="|cat:$app.pid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">←Nhật trình chiến trường trước</a></span></td><td width="20">|</td><td width="80" style="text-align:center;"> </td>
{{/if}}
{{else}}
{{if $form.id == 1 }}
<td width="80"> </td><td width="20">|</td><td width="80"><span style="font-size:x-small;"><a href="{{"/diary/?id="|cat:$app.nid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Nhật trình chiến trường tiếp theo→</a></span></td>
{{elseif $app.profile.stage == $form.id }}
<td width="80"><span style="font-size:x-small;"><a href="{{"/diary/?id="|cat:$app.pid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">←Nhật trình chiến trường trước</a></span></td><td width="20">|</td>
<td width="80" align="center"> </td>
{{else}}
<td width="80"><span style="font-size:x-small;"><a href="{{"/diary/?id="|cat:$app.pid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">←Nhật trình chiến trường trước</a></span></td><td width="20">|</td>
<td width="80" align="center"><span style="font-size:x-small;"><a href="{{"/diary/?id="|cat:$app.nid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Nhật trình chiến trường tiếp theo→</a></span></td>
{{/if}}
{{/if}}
</tr></table></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
{{/if}}

{{if $app.cyc.0}}
<!-- * -->
{{foreach from=$app_ne.word.0 item=item}}
<div style="text-align:center; background-color:#{{$app.color.main}};color:#{{$app.color.text}};">{{$item.name}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#{{$item.end_bg}};">
<table border="0" width="95%" cellspacing="0" cellpadding="0">
<tr><td><span style="font-size:x-small;">{{$item.end_cmnt}}
</span></td></tr></table></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/foreach}}
<!-- * -->

<div style="text-align:center; background-color:#{{$app.color.sub}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;">
<a href="{{"/quest/?id="|cat:$app.id|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Đến thử thách trong chiến trường này</a>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center; background-color:#{{$app.color.sub}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{else}}
<span style="color:#ff0000;">Nhật trình chiến trường này chưa có</span>
{{/if}}

{{if $app.cyc.1}}
<!-- * -->
{{foreach from=$app_ne.word.1 item=item}}
<div style="text-align:center; background-color:#{{$app.color.main}};color:#{{$app.color.text}};">{{$item.name}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#{{$item.end_bg}};">
<table border="0" width="95%" cellspacing="0" cellpadding="0">
<tr><td><span style="font-size:x-small;">{{$item.end_cmnt}}
</span></td></tr></table></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/foreach}}
<!-- * -->

<div style="text-align:center; background-color:#{{$app.color.sub}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;">
<a href="{{"/quest/?id="|cat:$app.id|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Đến thử thách trong chiến trường này</a>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center; background-color:#{{$app.color.sub}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}

{{if $app.cyc.2}}
<!-- * -->
{{foreach from=$app_ne.word.2 item=item}}
<div style="text-align:center; background-color:#{{$app.color.main}};color:#{{$app.color.text}};">{{$item.name}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#{{$item.end_bg}};">
<table border="0" width="95%" cellspacing="0" cellpadding="0">
<tr><td><span style="font-size:x-small;">{{$item.end_cmnt}}
</span></td></tr></table></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/foreach}}
<!-- * -->

<div style="text-align:center; background-color:#{{$app.color.sub}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;">
<a href="{{"/quest/?id="|cat:$app.id|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Đến thử thách trong chiến trường này</a>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center; background-color:#{{$app.color.sub}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}

<!-- toTop -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align: right;"><a href="#top">Về đầu trang</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
