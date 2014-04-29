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
<div style="text-align:center; background-color:#006600;">Hợp nhất đặc năng</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

{{if $app.cnt == 0 && $app.scnt == 0}}	<!-- Không có đối tác, không có Tượng thần-->
<div style="text-align:center;color:#ff0000;">Không có Card có thể kết hợp</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#005128;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/160.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
<span style="color:#ffff00;">Sử dụng thay Card nguyên liệu, giúp tăng thêm 1 cấp độ đặc năng đối với những Card có cấp độ đặc năng từ 1-9 </span>với xác suất thành công 100%<span style="color:#ffff00;"></span><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=72}}</span><a href="{{"/item/?act=item_confirm&num=1&id=160"|cnvgw}}">Mua ngay!</a>
</span></td></tr></table>
</div>
<div style="text-align:right"><a href="{{"/qa/detail.php?id=141"|cnvgw}}">Tượng thần là</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
※Có thể kết hợp bằng những võ tướng giống nhau cùng độ hiếm ở trong file. <br />
※Nếu kết hợp thành công thì level đặc năng của card đích sẽ tăng lên <br />
※Card nguyên liệu để kết hợp sẽ bị mất đi dù kết hợp thành công hay không <br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/card/file.php"|cnvgw}}">Về Kho Card</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />

{{else}}	<!-- Có đối tác hoặc có Tượng thần-->
<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/card/pcompose.php?seq="|cat:$form.seq|cat:"&ssid="|cat:$form.ssid|cnvgw}}">Điểm kỹ năng </a>|Level đặc năng <br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</div>
<table border="0" cellspacing="0" cellpadding="0" align="center">
<tr><td width="80" align="center"><span style="font-size:x-small;">Card đích</span></td><td width="20"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></td><td width="80" align="center"><span style="font-size:x-small;">Card nguyên liệu</span></td></tr>
<tr><td width="80" align="center"><img src="http://{{$app.domain.img}}/card/{{$app.card.bushoid}}_m.jpg" width="40" height="55" /></td><td>　</td>

{{if $form.op == "sj" }}	<!-- Sử dụng Tượng thần-->
<td width="80" align="center"><img src="http://{{$app.domain.img}}/item/senju_m.gif" width="40" height="55" /></td></tr>
<tr><td width="80"><span style="font-size:x-small;">
<span style="color:#ff0000;">Lv </span>{{$app.card.level}} <span style="color:#00ff00;">Công</span> {{$app.card.offense}}<br />
<span style="color:#00ff00;">Thủ </span>{{$app.card.defense}} <span style="color:#00ff00;">Binh</span> {{$app.card.follower}}</span></td>
<td width="20"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></td>
<td width="80">　</td></tr>
{{else}}
{{if $app.cnt == 1}}	<!-- Chọn đối tác-->
<td width="80" align="center"><img src="http://{{$app.domain.img}}/card/{{$app.list.0.bushoid}}_m.jpg" width="40" height="55" /></td></tr>
<tr><td width="80"><span style="font-size:x-small;">
<span style="color:#ff0000;">Lv</span> {{$app.card.level}} <span style="color:#00ff00;">Công</span> {{$app.card.offense}}<br />
<span style="color:#00ff00;">Thủ</span> {{$app.card.defense}} <span style="color:#00ff00;">Binh</span> {{$app.card.follower}}</span></td>
<td width="20"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></td>
<td width="80"><span style="font-size:x-small;"><span style="color:#ff0000;">Lv</span> {{$app.list.0.level}} <span style="color:#00ff00;">Công</span> {{$app.list.0.offense}}<br />
<span style="color:#00ff00;">Thủ</span> {{$app.list.0.defense}} <span style="color:#00ff00;">Binh</span> {{$app.list.0.follower}}</span></td></tr>
{{else}}				<!-- Chọn nguyên liệu-->
<td width="80" align="center"><img src="http://{{$app.domain.img}}/card/non_m.gif" width="40" height="55" /></td></tr>
<tr><td width="80"><span style="font-size:x-small;"><span style="color:#ff0000;">Lv</span> {{$app.card.level}} <span style="color:#00ff00;">Công</span> {{$app.card.offense}}<br />
<span style="color:#00ff00;">Thủ</span> {{$app.card.defense}} <span style="color:#00ff00;">Binh</span> {{$app.card.follower}}</span></td>
<td width="20"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></td>
<td width="80">　</td></tr>
{{/if}}
{{/if}}
</table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

{{if $app.scnt > 0 }}
{{if $form.op != "sj"}}
<div style="background-color:#005128;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/160.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">Bạn đang có <span style="color:#ffff00;">{{$app.scnt}}</span> Tượng thần<br />
<span style="color:#ffff00;">Tượng thần giúp hợp nhất đặc năng những Card có cấp độ đặc năng từ 1-9</span> với xác xuất thành công 100% mà không cần sử dụng Card nguyên liệu<span style="color:#ffff00;"></span><br />
<span style="color:#0000ff;">{{include file="parts/emoji.tpl" id=68}}</span><a href="{{"/card/compose.php?seq="|cat:$form.seq|cat:"&op=sj&ssid="|cat:$form.ssid|cnvgw}}">Sử dụng</a>
</span></td></tr></table>
</div>
{{/if}}
{{else}}
<div style="background-color:#005128;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/160.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
<span style="color:#ffff00;">Tượng thần giúp hợp nhất đặc năng những Card có cấp độ đặc năng từ 1-9</span> <span style="color:#ffff00;">xác suất thành công 100%</span> với mà không cần sử dụng Card nguyên liệu <br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=72}}</span><a href="{{"/item/confirm.php?num=1&id=160"|cnvgw}}">Mua ngay!</a>
</span></td></tr></table>
</div>
{{/if}}

{{if $app.cnt == 0}}
{{elseif $app.cnt == 1}}
{{if $form.op == "sj" && $app.scnt > 0 }}
<div style="text-align:center;color:#ffff00;text-decoration:blink;">Tỉ lệ thành công:{{$app.odd}} &raquo; 100%</div>
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=55}}</span><span style="color:#ff0000;">Bạn đang sử dụng 1 Tượng thần</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#005128;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/160.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;"><span style="color:#ffff00;">Đang sử dụng Tượng thần</span><br />
Giúp tăng 1 cấp độ đặc năng mà không cần sử dụng Card nguyên liệu với<span style="color:#ffff00;"> xác suất thành công 100%!</span><br />
</span></td></tr></table>
</div>
{{else}}
<div style="text-align:center;color:#ffff00;text-decoration:blink;">Tỉ lệ thành công:{{$app.odd}}%</div>
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=55}}</span><span style="color:#ff0000;">Bạn sẽ mất Card nguyên liệu. Đồng ý hợp nhất đặc năng?</span><br />
{{/if}}

{{if $app.card.level == 20}}
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=55}}</span><span style="color:#ff0000;">Dù thành công thì level đặc năng cũng không tăng quá 20 </span><br />
{{/if}}

<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
{{if $form.op =="sj" && $app.scnt > 0 }}
<a href="{{"/card/do.php?seq="|cat:$form.seq|cat:"&op=sj&ssid="|cat:$form.ssid|cnvgw}}" accesskey="5"><img src="http://{{$app.domain.img}}/btn_lvcomp.gif" width="120" height="48" /></a><br />
{{else}}
<a href="{{"/card/do.php?seq="|cat:$form.seq|cat:"&op="|cat:$app.list.0.cardseq|cat:"&ssid="|cat:$form.ssid|cnvgw}}" accesskey="5"><img src="http://{{$app.domain.img}}/btn_lvcomp.gif" width="120" height="48" /></a><br />
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<a href="{{"/card/complist.php"|cnvgw}}">Về Hợp nhất đặc năng</a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
</div>

{{else}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
Hãy chọn card nguyên liệu<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">{{include file="parts/pager.tpl" url="/card/compose.php"  parm="&seq="|cat:$form.seq|cat:"&ssid="|cat:$form.ssid }}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{foreach from=$app.list item=item name=deckf}}
<div style="background-color:{{cycle name="cyc" values="#000000;,#333333;"}}">
<table border="0" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="90" align="center"><img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}_m.jpg" width="40" height="55" /></td>
<td><span style="font-size:x-small;">{{$item.name}}({{$item.rank}})<br /><span style="color:#ff0000;">Lv</span>{{$item.level}} <span style="color:#00ff00;">Công</span> {{$item.offense}}<br /><span style="color:#00ff00;">Thủ</span> {{$item.defense}} <span style="color:#00ff00;">Binh</span> {{$item.follower}}<br /><span style="color:#0000ff;">{{include file="parts/emoji.tpl" id=68}}</span><a href="{{"/card/compose.php?seq="|cat:$form.seq|cat:"&op="|cat:$item.cardseq|cat:"&ssid="|cat:$form.ssid|cnvgw}}">Chọn làm card nguyên liệu</a></span></td></tr></table>
</div>
{{/foreach}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">{{include file="parts/pager.tpl" url="/card/compose.php"  parm="&seq="|cat:$form.seq|cat:"&ssid="|cat:$form.ssid }}</div>

<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/card/complist.php"|cnvgw}}">Về Kết hợp Card</a>
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
