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
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">Kết hợp Card</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>


{{if $app.cnt == 0 && $app.pGcnt == 0 }}
<div style="text-align:center;color:#ff0000;">Không có Card để kết hợp </div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

<div style="background-color:#005128;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/161.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
Giúp kết hợp những Card không cùng độ hiếm với <span style="color:#ffff00;">xác suất thành công 100%! </span><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=72}}</span><a href="{{"/item/?act=item_confirm&num=1&id=161"|cnvgw}}">Mua ngay</a>
<div style="text-align:right"><a href="{{"/qa/detail.php?id=142"|cnvgw}}">Tìm hiểu Tượng mèo</a></div>
</span></td></tr></table>
</div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
* Giúp kết hợp các Card cùng độ hiếm trong Kho <br />
* Nếu kết hợp thành công thì điểm kĩ năng của của Card đích sẽ tăng lên <br />
* Card nguyên liệu sẽ bị mất đi dù kết hợp có thành công hay không <br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/card/file.php"|cnvgw}}">Về Kho Card</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />

{{else}}	<!-- Có Card kết hợp hoặc có Tượng mèo vàng-->
<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Điểm kỹ năng ｜<a href="{{"/card/compose.php?seq="|cat:$form.seq|cat:"&ssid="|cat:$form.ssid|cnvgw}}">Level đặc năng</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</div>
<table border="0" cellspacing="0" cellpadding="0" align="center">
<tr><td width="80" align="center"><span style="font-size:x-small;">Card đích</span></td><td width="20"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></td><td width="80" align="center"><span style="font-size:x-small;">Card nguyên liệu</span></td></tr>
<tr><td width="80" align="center"><img src="http://{{$app.domain.img}}/card/{{$app.card.bushoid}}_m.jpg" width="40" height="55" /></td><td> </td>
{{if $app.cnt == 1}}	<!-- Chọn Card đích-->
<td width="80" align="center"><img src="http://{{$app.domain.img}}/card/{{$app.list.0.bushoid}}_m.jpg" width="40" height="55" /></td></tr>
<tr><td width="80"><span style="font-size:x-small;">
<span style="color:#ff0000;">Lv </span>{{$app.card.level}} <span style="color:#00ff00;"> Công </span>{{$app.card.offense}}<br />
<span style="color:#00ff00;">Thủ </span>{{$app.card.defense}} <span style="color:#00ff00;"> Binh </span>{{$app.card.follower}}</span></td>
<td width="20"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></td>
<td width="80"><span style="font-size:x-small;"><span style="color:#ff0000;">Lv </span>{{$app.list.0.level}} <span style="color:#00ff00;"> Công </span>{{$app.list.0.offense}}<br />
<span style="color:#00ff00;">Thủ </span>{{$app.list.0.defense}} <span style="color:#00ff00;"> Binh </span>{{$app.list.0.follower}}</span></td></tr>
{{else}}				<!-- Chọn Card nguyên liệu-->
<td width="80" align="center"><img src="http://{{$app.domain.img}}/card/non_m.gif" width="40" height="55" /></td></tr>
<tr><td width="80"><span style="font-size:x-small;"><span style="color:#ff0000;">Lv </span>{{$app.card.level}} <span style="color:#00ff00;"> Công </span>{{$app.card.offense}}<br />
<span style="color:#00ff00;">Thủ </span>{{$app.card.defense}} <span style="color:#00ff00;"> Binh </span>{{$app.card.follower}}</span></td>
<td width="20"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></td>
<td width="80"> </td></tr>
{{/if}}
</table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />


{{if $app.cnt == 1}}
{{if $form.sc == "" }}

<div style="background-color:#005128;">
{{if $app.pGcnt == 0 && $app.pScnt == 0}}
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/162.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
Tượng mèo bạc giúp kết hợp Card với xác suất thành công 100%!</span><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=72}}</span><a href="{{"/item/?unit=2&kbn=4&order=1"|cnvgw}}">Mua ngay</a>
<div style="text-align:right"><a href="{{"/qa/detail.php?id=142"|cnvgw}}">Tìm hiểu Tượng mèo</a></div>
</span></td></tr></table>
{{else}}
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/161.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#000000;">
{{if $app.pGcnt > 0}}Bạn đang có <span style="color:#ff0000;">{{$app.pGcnt}}</span> tượng mèo vàng <br />{{/if}}
Giúp kết hợp những Card không cùng độ hiếm với <span style="color:#ff0000;">xác suất thành công 100%!</span><br />
{{if $app.pGcnt == 0}}<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=72}}</span><a href="{{"/item/?act=item_confirm&num=1&id=161"|cnvgw}}">Mua ngay</a>
{{else}}<span style="color:#0000ff;">{{include file="parts/emoji.tpl" id=68}}</span><a href="{{"/card/pcompose.php?seq="|cat:$form.seq|cat:"&sc=pg&ssid="|cat:$form.ssid|cnvgw}}">Sử dụng</a>{{/if}}
</span></td></tr></table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/162.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#000000;">
{{if $app.pScnt > 0}}Bạn đang có <span style="color:#ff0000;">{{$app.pScnt}}</span> tượng mèo bạc<br />{{/if}}
<span style="color:#ff0000;">Xác suất thành công 100%!</span><br />
{{if $app.pScnt == 0}}<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=72}}</span><a href="{{"/item/?act=item_confirm&num=1&id=162"|cnvgw}}">Mua ngay</a>
{{else}}<span style="color:#0000ff;">{{include file="parts/emoji.tpl" id=68}}</span><a href="{{"/card/pcompose.php?seq="|cat:$form.seq|cat:"&sc=ps&ssid="|cat:$form.ssid|cnvgw}}">Sử dụng</a>{{/if}}
</span></td></tr></table>
{{/if}}
</div>


{{else}}
{{if $app.pGcnt > 0 && $form.sc == "pg"}}
<div style="background-color:#005128;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/161.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
<span style="color:#ffff00;">Đang sử dụng tượng mèo vàng!</span><br />
Giúp kết hợp những Card không cùng độ hiếm với<span style="color:#ffff00;"> Xác suất thành công 100%!</span>
</span></td></tr></table>
</div>
{{elseif $app.pScnt > 0 && $form.sc == "ps"}}
<div style="background-color:#005128;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/162.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
<span style="color:#ffff00;">Đang sử dụng tượng mèo bạc !</span><br />
Giúp kết hợp Card cùng độ hiếm với xác suất thành công <span style="color:#ffff00;">100%!</span>
</span></td></tr></table>
</div>
{{/if}}
{{/if}}

{{if ($app.pGcnt > 0 && $form.sc == "pg") || ($app.pScnt > 0 && $form.sc == "ps")}}
<div style="text-align:center;color:#ffff00;text-decoration:blink;">Xác suất thành công: {{$app.odd}} &raquo; 100%</div>
{{else}}
<div style="text-align:center;color:#ffff00;text-decoration:blink;">Xác suất thành công: {{$app.odd}}%</div>
{{/if}}

<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=55}}</span><span style="color:#ff0000;"> Bạn sẽ mất Card nguyên liệu. Đồng ý kết hợp Card?</span><br />
<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
{{if ($app.pGcnt > 0 && $form.sc == "pg") || ($app.pScnt > 0 && $form.sc == "ps")}}
<a href="{{"/card/pdo.php?sc="|cat:$form.sc|cat:"&seq="|cat:$form.seq|cat:"&op="|cat:$app.list.0.cardseq|cat:"&ssid="|cat:$form.ssid|cnvgw}}" accesskey="5"><img src="http://{{$app.domain.img}}/btn_ptcomp.gif" width="120" height="48" /></a><br />
{{else}}
<a href="{{"/card/pdo.php?seq="|cat:$form.seq|cat:"&op="|cat:$app.list.0.cardseq|cat:"&ssid="|cat:$form.ssid|cnvgw}}" accesskey="5"><img src="http://{{$app.domain.img}}/btn_ptcomp.gif" width="120" height="48" /></a><br />
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<a href="{{"/card/pcomplist.php"|cnvgw}}"> Về Kết hợp Card</a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
</div>

{{elseif $app.cnt == 0 && $app.pGcnt > 0 && $form.sc == ""}}
<div style="background-color:#005128;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/161.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
Bạn đang có <span style="color:#ffff00;">{{$app.pGcnt}}</span> tượng mèo vàng<br />
Giúp kết hợp những Card không cùng độ hiếm với <span style="color:#ffff00;">xác suất thành công 100%!</span><br />
<span style="color:#0000ff;">{{include file="parts/emoji.tpl" id=68}}</span><a href="{{"/card/pcompose.php?seq="|cat:$form.seq|cat:"&sc=pg&ssid="|cat:$form.ssid|cnvgw}}">Sử dụng</a>
</span></td></tr></table></div>

{{else}}	<!-- Chọn Card nguyên liệu  -->
<div style="background-color:#005128;">
{{if $app.pGcnt == 0 && $app.pScnt == 0}}
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/161.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
Tượng mèo vàng giúp kết hợp những Card cùng tên nhưng khác độ hiếm với <span style="color:#ffff00;">xác suất thành công 100%!</span><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=72}}</span><a href="{{"/item/?unit=2&kbn=4&order=1"|cnvgw}}">Mua ngay</a>
<div style="text-align:right"><a href="{{"/qa/detail.php?id=142"|cnvgw}}">Tìm hiểu về tượng mèo </a></div>
</span></td></tr></table>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{elseif $app.pGcnt > 0 && $form.sc == "pg"}}
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/161.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
<span style="color:#ffff00;">Đang sử dụng tượng mèo vàng!</span><br />
Sử dụng kết hợp những Card không cùng độ hiếm với xác suất thành công <span style="color:#ffff00;">100%!</span>
</span></td></tr></table>
</div>
{{elseif $app.pScnt > 0 && $form.sc == "ps"}}
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/162.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
<span style="color:#ffff00;">Đang sử dụng tượng mèo bạc!</span><br />
Xác suất thành công <span style="color:#ffff00;">100%!</span>
</span></td></tr></table>
</div>
{{else}}
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/161.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#000000;">
{{if $app.pGcnt > 0}}Bạn đang có <span style="color:#ff0000;">{{$app.pGcnt}}</span> tượng mèo vàng<br />{{/if}}
Sử dụng kết hợp những Card cùng loại nhưng không cùng độ hiếm với <span style="color:#ff0000;">xác suất thành công 100%!</span><br />
{{if $app.pGcnt == 0}}<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=72}}</span><a href="{{"/item/?act=item_confirm&num=1&id=161"|cnvgw}}">Mua ngay</a>
{{else}}<span style="color:#0000ff;">{{include file="parts/emoji.tpl" id=68}}</span><a href="{{"/card/pcompose.php?seq="|cat:$form.seq|cat:"&sc=pg&ssid="|cat:$form.ssid|cnvgw}}">Sử dụng</a>{{/if}}
</span></td></tr></table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/162.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#000000;">
{{if $app.pScnt > 0}}Bạn đang có <span style="color:#ff0000;">{{$app.pScnt}}</span> tượng mèo bạc<br />{{/if}}
<span style="color:#ff0000;">Giúp kết hợp Card với xác suất thành công 100%!</span><br />
{{if $app.pScnt == 0}}<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=72}}</span><a href="{{"/item/?act=item_confirm&num=1&id=162"|cnvgw}}">Mua ngay</a>
{{else}}<span style="color:#0000ff;">{{include file="parts/emoji.tpl" id=68}}</span><a href="{{"/card/pcompose.php?seq="|cat:$form.seq|cat:"&sc=ps&ssid="|cat:$form.ssid|cnvgw}}">Sử dụng</a>{{/if}}
</span></td></tr></table>
</div>
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
{{if $app.pGcnt > 0 && $form.sc == "pg"}}<span style="color:#ffff00;text-decoration:blink;">Tượng mèo vàng giúp kết hợp được cả những Card cùng tên nhưng khác độ hiếm với xác suất thành công 100%</span><br />{{/if}}
Không có Card nguyên liệu. Vui lòng chọn Card đích khác.<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">{{include file="parts/pager.tpl" url="/card/pcompose.php"  parm="&seq="|cat:$form.seq|cat:"&ssid="|cat:$form.ssid }}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{foreach from=$app.list item=item name=deckf}}
<div style="background-color:{{cycle name="cyc" values="#000000;,#333333;"}}">
<table border="0" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="90" align="center"><img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}_m.jpg" width="40" height="55" /></td>
<td><span style="font-size:x-small;">{{$item.name}}({{$item.rank}})<br /><span style="color:#ff0000;">Lv </span>{{$item.level}} <span style="color:#00ff00;"> Công </span>{{$item.offense}}<br /><span style="color:#00ff00;"> Thủ </span>{{$item.defense}} <span style="color:#00ff00;"> Binh </span>{{$item.follower}}<br /><span style="color:#0000ff;">{{include file="parts/emoji.tpl" id=68}}</span><a href="{{"/card/pcompose.php?sc="|cat:$form.sc|cat:"&seq="|cat:$form.seq|cat:"&op="|cat:$item.cardseq|cat:"&ssid="|cat:$form.ssid|cnvgw}}">Chọn làm Card nguyên liệu</a></span></td></tr></table>
</div>
{{/foreach}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">{{include file="parts/pager.tpl" url="/card/pcompose.php"  parm="&seq="|cat:$form.seq|cat:"&ssid="|cat:$form.ssid }}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/card/pcomplist.php"|cnvgw}}">Về trang Kết hợp Card</a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</div>
{{/if}}


{{/if}}
<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
