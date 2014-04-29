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
<div style="text-align:center; background-color:#820000; color:#ffffff;">{{include file="parts/emoji.tpl" id=10}}Cứu viện</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
{{if $app.help.entry_flg == 0}}
<a href="{{"/fight/?id="|cat:$app.help.otherid|cat:"&fid="|cat:$app.help.memberid|cat:"&ts="|cat:$app.help.ddn|cat:"&trid="|cat:$app.help.trid|cnvgw}}">Cứu viện</a>
{{else}}
<span style="color:#ffff00;">Tình hình cứu viện</span>
{{/if}}
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

- Vấn đề cứu viện<br />
{{$app.help.reg_time|date_format:"%d/%m/%Y"}}<a href="{{"/other/?id="|cat:$app.help.memberid|cnvgw}}"> Quân đoàn đồng minh {{$app.profile.handle}}</a>
<a href="{{"/other/?id="|cat:$app.help.otherid|cnvgw}}"> vừa bại trận trước Quân đoàn {{$app.ot_profile.handle}}</a><br />

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{if $app.help.trid > 0}}
- Được vật báu<br />
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="80" style="text-align:center;"><img src="http://{{$app.domain.img}}/treasure/{{$app.help.trid}}.gif" width="70" height="70" />
</td>
<td><span style="font-size:x-small;">
Vật báu: {{$app.tr.name}}<br />
Gói: {{$app.sr.name}}<br />
</span></td></tr></table>
{{/if}}

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
- Cứu viện<br />
{{if $app.help.entry_flg == 0}}
Bạn chưa tham gia cứu viện lần nào<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/fight/?id="|cat:$app.help.otherid|cat:"&fid="|cat:$app.help.memberid|cat:"&ts="|cat:$app.help.ddn|cat:"&trid="|cat:$app.help.trid|cnvgw}}">Cứu viện</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />
{{else}}
{{if $app.help.entry_flg == 1}}
{{$app.help.upd_time|date_format:"%d/%m/%Y"}}, <a href="{{"/other/?id="|cat:$app.help.friendid|cnvgw}}">Quân đoàn {{$app.fr_profile.handle}}</a> cứu viện giành thắng lợi!
Vật báu <a href="{{"/treasure/detail?id="|cat:$help.trid|cnvgw}}">{{$app.tr.name}}</a>được tặng bởi
<a href="{{"/other/?id="|cat:$app.help.memberid|cnvgw}}">Quân đoàn {{$app.profile.handle}}</a> <br />
{{elseif $app.help.entry_flg == 2}}
{{$app.help.upd_time|date_format:"%d/%m/%Y"}}, <a href="{{"/other/?id="|cat:$app.help.friendid|cnvgw}}">Quân đoàn {{$app.fr_profile.handle}}</a> đã cứu viện và giành thắng lợi<br />
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
