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
<div style="font-size:x-small;">
<div style="background-color:#cccccc;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#000000;"><span sytle="color:#ff0000">Yêu tướng: {{$app.masho.name}}</span></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;"><img src="http://{{$app.domain.img}}/card/{{$app.masho.mashoid}}_pf.jpg" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="" /><br />
<div style="text-align:center;"><img src="http://{{$app.domain.img}}/ud_masho2.gif" width="240" height="15"/></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<span style="color:#ff0000;">{{$app_ne.word.expla_l}}</span>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="" /><br />
<div style="text-align:center;"><img src="http://{{$app.domain.img}}/ud_masho.gif" width="240" height="15"/></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />

<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="70" align="center"><img src="http://{{$app.domain.img}}/card/{{$app.profile.prof}}_s.jpg" width="85%" />
</td>
<td><span style="font-size:x-small;">
{{$app.masho.expla}}
</span></td></tr>
</table>
</div>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;"> Mời chọn đồng minh</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="8" /><br />
<div style="text-align:center;">
<table border="0" width="100%" height="" cellspacing="0" cellpadding="0">
<tr>
<td width="90" align="center"><span style="font-size:x-small;">Quân đoàn {{$app.friend.0.handle}}</span></td>
<td width="50" align="center"> </td>
<td width="90" align="center"><span style="font-size:x-small;">Quân đoàn {{$app.friend.1.handle}}</span></td>
</tr>
<tr>
<td width="90" align="center"><img src="http://{{$app.domain.img}}/card/{{$app.friend.0.prof}}_s.jpg" alt="" width="80" height="109" /></td>
<td width="50" align="center"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></td>
<td width="90" align="center"><img src="http://{{$app.domain.img}}/card/{{$app.friend.1.prof}}_s.jpg" alt="" width="80" height="109" /></td>
</tr>
<tr>
<td width="90" align="center"><a href="{{"/my/friend/list/?md=bs&clid="|cat:$app.friend.0.friendid|cnvgw}}"><span style="font-size:x-small;">{{if $app.friend.0.prof == "non" }}Chọn đồng minh{{else}}Thay đổi{{/if}}</span></a></td>
<td width="50" align="center"> </td>
<td width="90" align="center"><a href="{{"/my/friend/list/?md=bs&clid="|cat:$app.friend.1.friendid|cnvgw}}"><span style="font-size:x-small;">{{if $app.friend.1.prof == "non" }}Chọn đồng minh{{else}}Thay đổi{{/if}}</span></a></td>
</tr>
</table>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="8" /><br />
<div style="text-align:center;"><span style="color:#ffff00;">[Quân lực {{$app.profile.handle}}]</span></div>
Quân năng: {{$app.profile.level}}<br />
Binh: {{$app.legion.fol}} (<span style="color:#ffff00;">+ {{$app.diff.fol}}</span>)<br />
Công: {{$app.legion.off}} (<span style="color:#ffff00;">+ {{$app.diff.off}}</span>)<br />
Thủ: {{$app.legion.def}} (<span style="color:#ffff00;">+ {{$app.diff.def}}</span>)<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Đội hình chiến đấu</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{if $app.form.formno > 0 }}
<div style="text-align:center; text-decoration:blink; color:#ffff00; font-weight:bold; font-size:medium">
{{$app.form.name}}<br/>
<span style="text-decoration:blink;color:#ffff00;font-size:small">Đang triển khai đội hình chiến thuật!!</span></a>
</div>
{{*{{$app.form.form_expla}}<br />
<span style="color:#ffff00;">Hiệu quả:{{$app.form.eff_expla}}</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />*}}
{{else}}
<span style="color:#ff0000;">Không có đội hình hiệu quả</span><br />
{{/if}}
<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/card/{{$app.card.1}}_m.jpg" width="38" /><img src="http://{{$app.domain.img}}/spacer.gif" width="2" height="1" />
<img src="http://{{$app.domain.img}}/card/{{$app.card.2}}_m.jpg" width="38" /><img src="http://{{$app.domain.img}}/spacer.gif" width="2" height="1" />
<img src="http://{{$app.domain.img}}/card/{{$app.card.3}}_m.jpg" width="38" /><img src="http://{{$app.domain.img}}/spacer.gif" width="2" height="1" />
<img src="http://{{$app.domain.img}}/card/{{$app.card.4}}_m.jpg" width="38" /><img src="http://{{$app.domain.img}}/spacer.gif" width="2" height="1" />
<img src="http://{{$app.domain.img}}/card/{{$app.card.5}}_m.jpg" width="38" />
</div>

{{if $app.form.formno > 0 }}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
Binh: {{$app.total.fol}} (<span style="color:#ffff00;">+ {{$app.jin.fol}}</span>)<br />
Công: {{$app.total.off}} (<span style="color:#ffff00;">+ {{$app.jin.off}}</span>)<br />
Thủ: {{$app.total.def}} (<span style="color:#ffff00;">+ {{$app.jin.def}}</span>)<br />
{{/if}}

<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/card/deck.php"|cnvgw}}">Tổ chức cỗ bài</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{include file="parts/emoji.tpl" id=26}}<a href="{{"/boss/fight.php?ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">Chiến đấu</a>
</div>

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
