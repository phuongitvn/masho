<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Báu vật|Linh triều Bình ca</title>
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
{{if $form.id == ""}}
{{if $form.oid != "" && $app.mode == "pre"}}
<div style="text-align:center; background-color:#330066;color:#ffffff;">Báu vật Quân đoàn {{$app.toPreprofile.handle}}</div>
{{/if}}
<div style="background-color:#0000ff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#66cccc;color:#000000;">{{if $app.mode == "pre"}}Chọn từ những Báu vật Quân đoàn đang có{{elseif $app.mode == "choice"}} Báu vật đang tìm{{else}}Gói {{$app.sirInfo.name}}{{/if}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{else}}
<div style="text-align:center; background-color:#3366FF;color:#ffffff;">Quân đoàn {{$app.ot_profile.handle}}<br />Tình trạng báu vật</div>
{{/if}}

{{if $app.tut_num > 17 }}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.mode == "pre" }}
<div style="text-align:center; font-size:small;"><span style="color:#ffff00;">Gói {{$app.sirInfo.name}}</span></div>
{{elseif $app.mode == "choice"}}
<div style="text-align:center; font-size:small;"><span style="color:#ffff00;">Gói {{$app.sirInfo.name}}</span></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70"><img src="http://{{$app.domain.img}}/treasure/cara/{{$app.trId}}_s.gif" width="70" height="70"/></td>
<td><span style="font-size:x-small;">{{$app.sirInfo.expla}}</span></td></tr></table>
{{else}}
<!-- Người yêu cầu tìm vật báu -->
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70"><img src="http://{{$app.domain.img}}/treasure/cara/{{$app.trId}}_s.gif" width="70" height="70"/></td>
<td><span style="font-size:x-small;">{{$app.sirInfo.expla}}</span></td></tr></table>
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#66cccc;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<table border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tr><td width="90" align="center">
{{if $app.ownChk.0.ownFlg == "0"}}
{{if $app.mode == "choice"}}<a href="{{"/treasure/detail.php?mode=choice&tid="|cat:$app.sirindInfo.0.treasureid|cnvgw}}"><img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" /></a>{{elseif $app.mode == "pre" || $form.id <> ""}}<img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" />{{else}}<a href="{{"/treasure/detail.php?tid="|cat:$app.sirindInfo.0.treasureid|cnvgw}}"><img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" /></a>{{/if}}
{{else}}
{{if $app.mode == "pre" || $app.mode == "choice"}}
<a href="{{"/treasure/detail.php?tid="|cat:$app.sirindInfo.0.treasureid|cat:"&mode="|cat:$app.mode|cat:"&oid="|cat:$form.oid|cnvgw}}">
{{else}}
{{if $form.id == ""}}<a href="{{"/treasure/detail.php?tid="|cat:$app.sirindInfo.0.treasureid|cnvgw}}">{{/if}}
{{/if}}
<img src="http://{{$app.domain.img}}/treasure/{{$app.sirindInfo.0.treasureid}}.gif" width="70" height="70" />{{if $form.id == "" }}</a>{{/if}}{{/if}}</td>
<td><img src="http://{{$app.domain.img}}/spacer.gif" width="40" height="1" /></td>
<td width="90" align="center">
{{if $app.ownChk.1.ownFlg == "0"}}
{{if $app.mode == "choice"}}<a href="{{"/treasure/detail.php?mode=choice&tid="|cat:$app.sirindInfo.1.treasureid|cnvgw}}"><img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" /></a>{{elseif $app.mode == "pre" || $form.id <> ""}}<img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" />{{else}}<a href="{{"/treasure/detail.php?tid="|cat:$app.sirindInfo.1.treasureid|cnvgw}}"><img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" /></a>{{/if}}
{{else}}
{{if $app.mode == "pre" || $app.mode == "choice"}}
<a href="{{"/treasure/detail.php?tid="|cat:$app.sirindInfo.1.treasureid|cat:"&mode="|cat:$app.mode|cat:"&oid="|cat:$form.oid|cnvgw}}">
{{else}}
{{if $form.id == ""}}<a href="{{"/treasure/detail.php?tid="|cat:$app.sirindInfo.1.treasureid|cnvgw}}">{{/if}}
{{/if}}
<img src="http://{{$app.domain.img}}/treasure/{{$app.sirindInfo.1.treasureid}}.gif" width="70" height="70" />{{if $form.id == "" }}</a>{{/if}}{{/if}}</td>
</tr>
<tr>
<td width="90" align="center"><span style="font-size:x-small;">{{$app.sirindInfo.0.name}}</span></td>
<td><img src="http://{{$app.domain.img}}/spacer.gif" width="40" height="1" /></td>
<td width="90" align="center"><span style="font-size:x-small;">{{$app.sirindInfo.1.name}}</span></td>
</tr>
<tr>
<td colspan="3" align="center">{{if $app.ownChk.2.ownFlg == "0"}}
{{if $app.mode == "choice"}}<a href="{{"/treasure/detail.php?mode=choice&tid="|cat:$app.sirindInfo.2.treasureid|cnvgw}}"><img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" /></a>{{elseif $app.mode == "pre" || $form.id <> ""}}<img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" />{{else}}<a href="{{"/treasure/detail.php?tid="|cat:$app.sirindInfo.2.treasureid|cnvgw}}"><img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" /></a>{{/if}}
{{else}}
{{if $app.mode == "pre"|| $app.mode == "choice"}}
<a href="{{"/treasure/detail.php?tid="|cat:$app.sirindInfo.2.treasureid|cat:"&mode="|cat:$app.mode|cat:"&oid="|cat:$form.oid|cnvgw}}">
{{else}}
{{if $form.id == ""}}<a href="{{"/treasure/detail.php?tid="|cat:$app.sirindInfo.2.treasureid|cnvgw}}">{{/if}}
{{/if}}
<img src="http://{{$app.domain.img}}/treasure/{{$app.sirindInfo.2.treasureid}}.gif" width="70" height="70" />{{if $form.id == "" }}</a>{{/if}}{{/if}}</td></tr>
<tr>
<td colspan="3" align="center"><span style="font-size:x-small;">{{$app.sirindInfo.2.name}}</span></td>
</tr>
<tr>
<td width="90" align="center">{{if $app.ownChk.3.ownFlg == "0"}}
{{if $app.mode == "choice"}}<a href="{{"/treasure/detail.php?mode=choice&tid="|cat:$app.sirindInfo.3.treasureid|cnvgw}}"><img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" /></a>{{elseif $app.mode == "pre" || $form.id <> ""}}<img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" />{{else}}<a href="{{"/treasure/detail.php?tid="|cat:$app.sirindInfo.3.treasureid|cnvgw}}"><img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" /></a>{{/if}}
{{else}}
{{if $app.mode == "pre" || $app.mode == "choice"}}
<a href="{{"/treasure/detail.php?tid="|cat:$app.sirindInfo.3.treasureid|cat:"&mode="|cat:$app.mode|cat:"&oid="|cat:$form.oid|cnvgw}}">
{{else}}
{{if $form.id == ""}}<a href="{{"/treasure/detail.php?tid="|cat:$app.sirindInfo.3.treasureid|cnvgw}}">{{/if}}
{{/if}}
<img src="http://{{$app.domain.img}}/treasure/{{$app.sirindInfo.3.treasureid}}.gif" width="70" height="70" />{{if $form.id == "" }}</a>{{/if}}{{/if}}</td>
<td><img src="http://{{$app.domain.img}}/spacer.gif" width="40" height="1" /></td>
<td width="90" align="center">{{if $app.ownChk.4.ownFlg == "0"}}
{{if $app.mode == "choice"}}<a href="{{"/treasure/detail.php?mode=choice&tid="|cat:$app.sirindInfo.4.treasureid|cnvgw}}"><img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" /></a>{{elseif $app.mode == "pre" || $form.id <> ""}}<img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" />{{else}}<a href="{{"/treasure/detail.php?tid="|cat:$app.sirindInfo.4.treasureid|cnvgw}}"><img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" /></a>{{/if}}
{{else}}
{{if $app.mode == "pre" || $app.mode == "choice"}}
<a href="{{"/treasure/detail.php?tid="|cat:$app.sirindInfo.4.treasureid|cat:"&mode="|cat:$app.mode|cat:"&oid="|cat:$form.oid|cnvgw}}">
{{else}}
{{if $form.id == ""}}<a href="{{"/treasure/detail.php?tid="|cat:$app.sirindInfo.4.treasureid|cnvgw}}">{{/if}}
{{/if}}
<img src="http://{{$app.domain.img}}/treasure/{{$app.sirindInfo.4.treasureid}}.gif" width="70" height="70" />{{if $form.id == "" }}</a>{{/if}}{{/if}}</td>
</tr>
<tr>
<td width="90" align="center"><span style="font-size:x-small;">{{$app.sirindInfo.3.name}}</span></td>
<td><img src="http://{{$app.domain.img}}/spacer.gif" width="40" height="1" /></td>
<td width="90" align="center"><span style="font-size:x-small;">{{$app.sirindInfo.4.name}}</span></td>
</tr>
</table>
</div>


{{else}}<!--tut_num 6-->

<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="top">
<td width="70"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Bên cạnh việc thực hiện Thử thách,<span style="color:#ff0000;"> Quân đoàn</span> có thể có được báu vật <span style="color:#ff0000;">nhờ tham gia chiến đấu</span> với các đối thủ khác!
</span></td></tr></table>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" />

<div style="text-align:center;">
<table border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tr><td width="90" align="center"><img src="http://{{$app.domain.img}}/treasure/{{$app.sirindInfo.0.treasureid}}.gif" width="70" height="70" />
</td><td><img src="http://{{$app.domain.img}}/spacer.gif" width="40" height="1" /></td>
<td width="90" align="center"><img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" /></td>
</tr>
<tr>
<td width="90" align="center"><span style="font-size:x-small;">{{$app.sirindInfo.0.name}}</span></td>
<td><img src="http://{{$app.domain.img}}/spacer.gif" width="40" height="1" /></td>
<td width="90" align="center"><span style="font-size:x-small;">{{$app.sirindInfo.1.name}}</span></td>
</tr>
<tr><td colspan="3" align="center"><img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" /></td></tr>
<tr><td colspan="3" align="center"><span style="font-size:x-small;">{{$app.sirindInfo.2.name}}</span></td></tr>
<tr><td width="90" align="center"><img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" /></td>
<td><img src="http://{{$app.domain.img}}/spacer.gif" width="40" height="1" /></td>
<td width="90" align="center"><img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" /></td></tr>
<tr><td width="90" align="center"><span style="font-size:x-small;">{{$app.sirindInfo.3.name}}</span></td>
<td><img src="http://{{$app.domain.img}}/spacer.gif" width="40" height="1" /></td>
<td width="90" align="center"><span style="font-size:x-small;">{{$app.sirindInfo.4.name}}</span></td>
</tr>
</table>
</div>
{{/if}}


<!-- Báu vật Quân đoàn có -->
{{if $form.id == ""}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.sirCompFlg == "1"}}
<div style="background-color:#0000ff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#66cccc;color:#000000;">Đủ gói báu vật ({{$app.RegDate|date_format:'%d/%m/%Y'}})</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{else}}
<div style="background-color:#66cccc;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
{{$app.sirindInfo.0.name}}: {{if $app.ownChk.0.Num > "1"}}<span style="color:#ffff00;">{{/if}}{{$app.ownChk.0.Num}}{{if $app.ownChk.0.Num > "1"}}</span>{{/if}}<br />
{{$app.sirindInfo.1.name}}: {{if $app.ownChk.1.Num > "1"}}<span style="color:#ffff00;">{{/if}}{{$app.ownChk.1.Num}}{{if $app.ownChk.1.Num > "1"}}</span>{{/if}}<br />
{{$app.sirindInfo.2.name}}: {{if $app.ownChk.2.Num > "1"}}<span style="color:#ffff00;">{{/if}}{{$app.ownChk.2.Num}}{{if $app.ownChk.2.Num > "1"}}</span>{{/if}}<br />
{{$app.sirindInfo.3.name}}: {{if $app.ownChk.3.Num > "1"}}<span style="color:#ffff00;">{{/if}}{{$app.ownChk.3.Num}}{{if $app.ownChk.3.Num > "1"}}</span>{{/if}}<br />
{{$app.sirindInfo.4.name}}: {{if $app.ownChk.4.Num > "1"}}<span style="color:#ffff00;">{{/if}}{{$app.ownChk.4.Num}}{{if $app.ownChk.4.Num > "1"}}</span>{{/if}}<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />

{{if $app.sirCompFlg == "1"}}
<div style="background-color:#66cccc;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="color:#ffff00;">Món đồ nhận được</span>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="80"><img src="http://{{$app.domain.img}}/item/{{$app.item.itemid}}.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
{{$app.item.name}}<br />
{{$app.item.expla}}<br />
{{if $app.item.kbn == 1 || $app.item.kbn == 2}}
Công {{$app.item.offense}}<br />
Thủ {{$app.item.defense}}{{/if}}</span></td></tr></table>
{{/if}}
<!-- Chỉ hiển thị Báu vật Quân đoàn khác -->
{{elseif $form.id != "" && $form.mode == ""}}
<div style="background-color:#66cccc;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
{{$app.sirindInfo.0.name}}: {{if $app.ownOtChk.0.Num > "1"}}<span style="color:#ffff00;">{{/if}}{{$app.ownOtChk.0.Num}}{{if $app.ownOtChk.0.Num > "1"}}</span>{{/if}}<br />
{{$app.sirindInfo.1.name}}: {{if $app.ownOtChk.1.Num > "1"}}<span style="color:#ffff00;">{{/if}}{{$app.ownOtChk.1.Num}}{{if $app.ownOtChk.1.Num > "1"}}</span>{{/if}}<br />
{{$app.sirindInfo.2.name}}: {{if $app.ownOtChk.2.Num > "1"}}<span style="color:#ffff00;">{{/if}}{{$app.ownOtChk.2.Num}}{{if $app.ownOtChk.2.Num > "1"}}</span>{{/if}}<br />
{{$app.sirindInfo.3.name}}: {{if $app.ownOtChk.3.Num > "1"}}<span style="color:#ffff00;">{{/if}}{{$app.ownOtChk.3.Num}}{{if $app.ownOtChk.3.Num > "1"}}</span>{{/if}}<br />
{{$app.sirindInfo.4.name}}: {{if $app.ownOtChk.4.Num > "1"}}<span style="color:#ffff00;">{{/if}}{{$app.ownOtChk.4.Num}}{{if $app.ownOtChk.4.Num > "1"}}</span>{{/if}}<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
{{/if}}



{{if $app.tut_num > 17 }}
{{if $form.q <> "" }}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;">
{{include file="parts/emoji.tpl" id=26}}
{{if $form.ev == "" }}
<a href="{{"/quest/disp.php?id="|cat:$form.q|cat:"&ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">Tiếp tục Thử thách</a>
{{else}}
<a href="{{"/event/"|cat:$form.ev|cat:"/detail.php?id="|cat:$form.q|cat:"&ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">Về Event</a>
{{/if}}
</div>
{{/if}}
<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#66cccc;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
{{elseif $app.tut_num >= 6 && $app.tut_num <= 9}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/quest/detail.php?id=111&ssid="|cat:$app.ssid|cnvgw}}" accesskey="5"><span style="font-size:medium;">{{include file="parts/emoji.tpl" id=26}}Tiếp tục Thử thách</span></a></div>
{{elseif $app.tut_num == 10 }}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/quest/clear.php?id=111&ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">{{include file="parts/emoji.tpl" id=26}}Tiếp tục Thử thách</a></div>
{{elseif $app.tut_num == 11 }}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/item/tut/?ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">{{include file="parts/emoji.tpl" id=26}}Tiếp tục Thử thách</a></div>
{{elseif $app.tut_num >= 12 && $app.tut_num <= 17 }}
<div style="text-align:center;"><a href="{{"/my/"|cnvgw}}">Trang riêng</a></div>
{{/if}}

</div>
</body>
</html>
