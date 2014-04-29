<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<style type="text/css">
{{literal}}
a:link{color:#ffff00;}
a:visited{color:#ffff00;}
{{/literal}}
</style>
<title>Linh triều Bình Ca</title>
</head>
<body style="background-color:#000000;color:#ffffff">
<div style="font-size:x-small;">
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Màn hình chiến đấu</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<!-- * -->
<table border="0" width="100%" height="" cellspacing="0" cellpadding="0">
<tr>
<td width="90" align="center"><span style="font-size:x-small;">Tấn công</span></td>
<td width="50" align="center"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></td>
<td width="90" align="center"><span style="font-size:x-small;">Phòng bị</span></td>
</tr>
<tr>
<td width="90" align="center"><img src="http://{{$app.domain.www}}/img/card/{{$app.my_profile.prof}}_s.jpg" alt="" width="80" height="109" /></td>
<td width="50" align="center"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></td>
<td width="90" align="center"><img src="http://{{$app.domain.www}}/img/card/{{$app.other_profile.prof}}_s.jpg" alt="" width="80" height="109" /></td>
</tr>
<tr>
<td width="90" align="center"><span style="font-size:x-small;">Quân đoàn {{$app.my_profile.handle}}</span></td>
<td width="50" align="center"><span style="font-size:x-small;">VS</span></td>
<td width="90" align="center"><span style="font-size:x-small;">Quân đoàn {{$app.other_profile.handle}}</span></td>
</tr>
</table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Quân năng: {{$app.my_profile.level}} vs {{$app.other_profile.level}}<br />
Tỉ lệ thắng: {{$app.my_profile.rate}}% vs {{$app.other_profile.rate}}%<br />
Quân binh: {{$app.my_deck.follower}}{{if $app.diff.follower > 0}} (<span style="color:#ffff00;">+{{$app.diff.follower}}</span>){{/if}}  vs {{$app.ot_deck.follower}}<br />
Công: {{$app.my_deck.offense}}{{if $app.diff.offense > 0}} (<span style="color:#ffff00;">+{{$app.diff.offense}}</span>){{/if}} vs {{$app.ot_deck.offense}}<br />
Thủ: {{$app.my_deck.defense}}{{if $app.diff.defense > 0}} (<span style="color:#ffff00;">+{{$app.diff.defense}}</span>){{/if}} vs 
{{$app.ot_deck.defense}}
<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.tr.treasureid > 0}}
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Báu vật tìm kiếm</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="top">
<td width="80" style="text-align:center;"><img src="http://{{$app.domain.img}}/treasure/{{$app.tr.treasureid}}.gif" width="70" height="70" />
</td><td><span style="font-size:x-small;">
Báu vật: {{$app.tr.name}}<br />
Gói: {{$app.sr.name}}<br />
</span></td></tr></table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Cỗ bài chiến đấu</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />{{if $app.form.formno > 0 }}
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
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<form action="{{"/card/deck.php"|cnvgw}}" method="POST">
<input type="hidden" name="oid" value="{{$form.id}}" />
<input type="hidden" name="fid" value="{{$form.fid}}" />
<input type="hidden" name="ts" value="{{$form.ts}}" />
<input type="hidden" name="trid" value="{{$form.trid}}" />
<input type="submit" value="Tổ chức cỗ bài" /><br />
</form>
</div><div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{include file="parts/emoji.tpl" id=26}}
{{if isset($app.trid)}}
<a href="{{"/fight/do.php?ssid="|cat:$app.ssid|cat:"&id="|cat:$form.id|cat:"&fid="|cat:$form.fid|cat:"&ts="|cat:$form.ts|cat:"&trid="|cat:$app.trid|cnvgw}}" accesskey="5">Chiến đấu!</a><br />
{{else}}
<a href="{{"/fight/do.php?ssid="|cat:$app.ssid|cat:"&id="|cat:$form.id|cat:"&fid="|cat:$form.fid|cat:"&ts="|cat:$form.ts|cat:"&trid="|cat:$form.trid|cnvgw}}" accesskey="5">Chiến đấu!</a><br />
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
</div>

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
