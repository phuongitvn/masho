<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Linh Triều Bình ca</title>
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
<div style="text-align:center;background-color:#{{$app.color.main}};color:#{{$app.color.text}};">Thử thách </div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

{{if isset($app.scn) }}
<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/scn/{{$app.scn}}.gif" width="240" height="45" />
</div>
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;color:#ffff00;">Chiến trường {{$app.stage}} ({{$app.title}})</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />

{{if $app.cs > 1}}
<!-- navi -->
<div style="text-align:center;"><table border="0" width="100%" cellspacing="0" cellpadding="0"><tr>
{{if $form.id == ""}}
{{if $app.profile.stage == 1 }}
{{else}}
<td width="80"><span style="font-size:x-small;"><a href="{{"/quest/?id="|cat:$app.pid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">&laquo; Chiến trường trước</a></span></td><td width="20">|</td>
<td width="80"> </td>
{{/if}}
{{else}}
{{if $form.id == 1 }}
<td width="80"> </td><td width="20">|</td>
<td width="80"><span style="font-size:x-small;"><a href="{{"/quest/?id="|cat:$app.nid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Chiến trường tiếp theo &raquo; </a></span></td>
{{elseif $app.profile.stage == $form.id }}
<td width="80"><span style="font-size:x-small;"><a href="{{"/quest/?id="|cat:$app.pid|cat:"&ssid="|cat:$app.ssid|cnvgw}}"> &laquo; Chiến trường trước</a></span></td><td width="20">|</td>
<td width="80"> </td>
{{else}}
<td width="80"><span style="font-size:x-small;"><a href="{{"/quest/?id="|cat:$app.pid|cat:"&ssid="|cat:$app.ssid|cnvgw}}"> &laquo; Chiến trường trước</a></span></td><td width="20">|</td>
<td width="80"><span style="font-size:x-small;"><a href="{{"/quest/?id="|cat:$app.nid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Chiến trường tiếp theo &raquo; </a></span></td>
{{/if}}
{{/if}}
</tr></table></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
{{/if}}

{{if isset($app.masho) }}
<div style="background-color:#000049;text-align:center;"><a href="{{"/boss/"|cnvgw}}"><img src="http://{{$app.domain.img}}/masho_app.gif" width="200" height="60" /><br />
<span style="text-decoration:blink;font-size:medium;">Yêu tướng xuất hiện!</span></a></div>
{{/if}}

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=32}}</span>Điểm kinh nghiệm: {{$app.profile.exp}} (Cần <span style="color:#ffff00;">{{$app.diffExp}}</span>)<br />
<span style="color:#ffff00;">{{include file="parts/emoji.tpl" id=22}}</span>Vàng: {{$app.profile.money}}<img src="http://{{$app.domain.img}}/vang.gif" width="10" height="8" /><br />
<span style="color:#ff33cc;">{{include file="parts/emoji.tpl" id=19}}</span>Năng lượng: <span style="color:#ff0000;">{{$app.profile.genki}}</span>/{{$app.profile.max_genki}}<br />
{{if $app.profile.rsv_time_sec != NULL}} - <span style="color:#ff0000;">Cần {{if $app.profile.rsv_time_min == 0}}{{$app.profile.rsv_time_sec}} giây {{else}}{{$app.profile.rsv_time_min}} phút {{/if}}để khôi phục</span><br />{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<div style="text-align:right;">
<a href="{{"/diary/?id="|cat:$app.id|cnvgw}}">Nhật trình chiến trường</a>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>


{{if $app.list}}
<!-- * -->
{{foreach from=$app.list item=item}}
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#{{$app.color.main}};color:#{{$app.color.text}};">{{$item.name}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="middle">
<td width="75" align="center"><img src="http://{{$app.domain.img}}/a/{{$item.aImg}}.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<span style="color:#00ffff;">{{include file="parts/emoji.tpl" id=33}}</span> Tỉ lệ thành công: {{$item.archieve}}%<br />
<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=32}}</span>Điểm kinh nghiệm: + {{$item.exp}}<br />
<span style="color:#ffff00;">{{include file="parts/emoji.tpl" id=22}}</span>Vàng: +{{$item.money}}<img src="http://{{$app.domain.img}}/vang.gif" width="10" height="8" /><br />
<span style="color:#ff33cc;">{{include file="parts/emoji.tpl" id=19}}</span>Năng lượng: <span style="color:#ff0000;">{{$item.req_genki}}</span>
</span></td></tr></table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
{{if $item.item1 > 0 }}
<span style="color:#00ff00;">{{include file="parts/emoji.tpl" id=8}}</span> Món đồ cần dùng<br />
<img src="http://{{$app.domain.img}}/item/{{$item.item1}}.gif" width="50" height="50" />×{{$item.num1}} {{/if}}
{{if $item.item2 > 0 }}<img src="http://{{$app.domain.img}}/item/{{$item.item2}}.gif" width="50" height="50" /> x {{$item.num2}} {{/if}}
{{if $item.item3 > 0 }}<img src="http://{{$app.domain.img}}/item/{{$item.item3}}.gif" width="50" height="50" /> x {{$item.num3}}{{/if}}
<br />
<div style="text-align:center;"><a href="{{"/quest/detail.php?id="|cat:$item.questid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Bắt đầu thử thách</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/foreach}}
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align: right;"><a href="#top">Lên đầu trang</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>