<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
{{ if $form.unit <> "" }}
<title>Xác nhận mua | Linh Triều Bình Ca</title>
{{else}}
<title>Linh Triều Bình Ca</title>
{{/if}}
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
<div style="text-align:center; background-color:#ff9900;">{{ if $form.unit <> "" }}Xác nhận mua{{else}}Thông tin về Item{{/if}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<div style="text-align:center;">
{{$app.item.name}} [{{$app.item.kbnname}}]<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<img src="http://{{$app.domain.img}}/item/{{$app.item.itemid}}.gif" alt="{{$app.item.itemname}}" width="70" height="70" /><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</div>

<!-- Giai thich Item -->
<div style="background-color:#333333;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{$app.item.expla}}<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</div>
<!-- giải thích item -->


<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
[Thông tin về Item]<br />
{{ if $app.qid <> "" }}
{{ if $app.dontGo == 1 }}
Quest: <!--{{$app.qname}}--><br />
* item không thể mua được trong shop. Có thể có được tại quest tiếp theo<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{else}}
Quest<a href="{{"/quest/detail.php?id="|cat:$app.qid|cat:"&ssid="|cat:$app.newss|cnvgw}}">{{$app.qname}}</a><br />
Item không thể mua được trong shop. Có thể có được tại quest bên trên<br />
{{/if}}
<div style="text-align:center;">{{include file="parts/emoji.tpl" id=26}}<a href="{{"/quest/disp.php?id="|cat:$form.q|cat:"&ssid="|cat:$app.ssid|cnvgw}}"  accesskey="5">đến quest hiện tại</a></div>
{{else}}
{{if $app.item.money > 0}}
{{include file="parts/emoji.tpl" id=22}}Giá: {{$app.item.money|number_format}}<img src="http://{{$app.domain.img}}/vang.gif" width="10" height="8" /><br />
{{else}}
{{include file="parts/emoji.tpl" id=22}}Giá: {{$app.item.coin|number_format}}<img src="http://{{$app.domain.img}}/ngoc.gif" width="10" height="8" /><br />
{{/if}}
{{/if}}
{{if $app.item.kbn == 1 || $app.item.kbn == 2 }}
{{include file="parts/emoji.tpl" id=54}}Công lực: {{$app.item.offense}}<br />
{{include file="parts/emoji.tpl" id=53}}Thủ lực: {{$app.item.defense}}<br />
{{include file="parts/emoji.tpl" id=47}}{{if $app.item.rest == 30}}Độ bền: thường<br />{{elseif $app.item.rest == 60}}Độ bền: bền<br />
{{/if}}
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{if $app.item.kbn == 1 || $app.item.kbn == 2||$app.item.kbn == 4}}
<div style="background-color:#993366;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
[Trạng thái đoàn quân]<br />
{{ if $form.unit <> "" }}
Số lượng mua: <span style="color:#ffff00;">{{$form.num}}</span><br />
{{/if}}
{{ if $app.qid == "" }}
{{if $app.item.money > 0}}
Vàng: {{$app.user.money}} &raquo; <span style="color:#ff0000;">{{if $app.user.money >= $app.item.money }}{{$app.after.money}}{{else}}không đủ{{/if}}</span><br />
{{else}}
Ngọc: {{$app.user.coin}} &raquo; <span style="color:#ff0000;">{{if $app.user.coin >= ($app.item.coin * $app.item_num)}}{{$app.after.coin}}{{else}}không đủ{{/if}}</span><br />
{{/if}}
Đang có: {{$app.own.num}} &raquo; <span style="color:#ffff00;">{{$app.after.own}}</span><br />
{{*
{{if $app.item.kbn == 1}}
sở hữu{{$app.item.kbnname}}số lượng{{$app.user.buki_num}} &raquo; <span style="color:#ffff00;">{{$app.after.num}}</span><br />
{{elseif $app.item.kbn == 2}}
sở hữu{{$app.item.kbnname}}số lượng{{$app.user.bougu_num}} &raquo; <span style="color:#ffff00;">{{$app.after.num}}</span><br />
{{/if}}
*}}
{{/if}}
{{if $app.item.kbn == 4}}
Công lực: {{$app.nowOffPower}}<br />
Thủ lực: {{$app.nowDefPower}}<br />
{{else}}
Công lực: {{$app.nowOffPower}} &raquo; {{if $app.nowOffPower < $app.afterOffPower}}<span style="color:#ffff00;">{{$app.afterOffPower}}</span>{{else}}{{$app.afterOffPower}}{{/if}}<br />
Thủ lực: {{$app.nowDefPower}} &raquo; {{if $app.nowDefPower < $app.afterDefPower}}<span style="color:#ffff00;">{{$app.afterDefPower}}</span>{{else}}{{$app.afterDefPower}}{{/if}}<br />
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" />
</div>
{{elseif $app.item.kbn == "s"}}
{{include file="parts/emoji.tpl" id=22}}Thời hạn có hiệu lực 1 tháng<br />
{{/if}}

<!--item riêng/ từng item-->
{{if $form.md == 1}}
{{if $app.item.itemid == 115 || $app.item.itemid == 139 || $app.item.itemid == 140}}
<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/gacha/?ssid="|cat:$app.newss|cnvgw}}">đến cửa hàng vé số Gacha</a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</div>
{{elseif $app.item.itemid == 116}}
<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/my/rcv/index.php?ssid="|cat:$app.newss|cnvgw}}">Hồi phục năng lượng</a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</div>
{{elseif $app.item.itemid == 137 || $app.item.itemid == 138}}
<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/my/treasure.php"|cnvgw}}">Chọn những báu vật có dán lá bùa</a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</div>
{{/if}}
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
{{if $app.qid == "" }}
{{if $app.user.money >= $app.item.money && $app.item.money > 0}}
<form action="{{"/item/"|cnvgw}}" method="POST">
<input type="hidden" name="act" value="item_complete" />
<input type="hidden" name="q" value="{{$app.q}}" />
<input type="hidden" name="ev" value="{{$form.ev}}" />
<input type="hidden" name="id" value="{{$form.id}}" />
<input type="hidden" name="orgMoney" value="{{$app.user.money}}" />
<input type="hidden" name="Money" value="{{$app.after.money}}" />
<input type="hidden" name="amount" value="{{$form.num}}" />
<input type="hidden" name="orgOff" value="{{$app.nowOffPower}}" />
<input type="hidden" name="Off" value="{{$app.afterOffPower}}" />
<input type="hidden" name="orgDef" value="{{$app.nowDefPower}}" />
<input type="hidden" name="Def" value="{{$app.afterDefPower}}" />
<input type="hidden" name="kbnO" value="{{$app.kbnO}}" />
<input type="hidden" name="kbnD" value="{{$app.kbnD}}" />
{{* {{if $app.item.kbn == 1}}<input type="hidden" name="orgNum" value="{{$app.user.buki_num}}" />{{elseif $app.item.kbn == 2}}<input type="hidden" name="orgNum" value="{{$app.user.bougu_num}}" />{{/if}}*}}
<input type="hidden" name="orgNum" value="{{$app.own.num}}" />
<input type="hidden" name="Num" value="{{$app.after.own}}" />
<input type="hidden" name="ssid" value="{{$app.ssid}}" />
<input type="submit" value="Mua" />
</form>
{{elseif $app.item.money == 0 && $app.item.coin > 0 && $app.user.coin >= ($app.item.coin * $app.item_num)}}
<form action="{{"/item/"|cnvgw}}" method="POST">
<input type="hidden" name="act" value="item_complete" />
<input type="hidden" name="q" value="{{$app.q}}" />
<input type="hidden" name="ev" value="{{$form.ev}}" />
<input type="hidden" name="id" value="{{$form.id}}" />
<input type="hidden" name="orgMoney" value="{{$app.user.coin}}" /><input type="hidden" name="order" value="{{$app.$order}}" />

<input type="hidden" name="unit" value="{{$app.$unit}}" />

<input type="hidden" name="Money" value="{{$app.after.coin}}" />
<input type="hidden" name="amount" value="{{$form.num}}" />
<input type="hidden" name="orgOff" value="{{$app.nowOffPower}}" />
<input type="hidden" name="Off" value="{{$app.afterOffPower}}" />
<input type="hidden" name="orgDef" value="{{$app.nowDefPower}}" />
<input type="hidden" name="Def" value="{{$app.afterDefPower}}" />
<input type="hidden" name="kbnO" value="{{$app.kbnO}}" />
<input type="hidden" name="kbnD" value="{{$app.kbnD}}" />
{{* {{if $app.item.kbn == 1}}<input type="hidden" name="orgNum" value="{{$app.user.buki_num}}" />{{elseif $app.item.kbn == 2}}<input type="hidden" name="orgNum" value="{{$app.user.bougu_num}}" />{{/if}}*}}
<input type="hidden" name="orgNum" value="{{$app.own.num}}" />
<input type="hidden" name="Num" value="{{$app.after.own}}" />
<input type="hidden" name="ssid" value="{{$app.ssid}}" />
<input type="submit" value="Mua" />
</form>
{{/if}}
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{if $form.md == 1}}
{{if $app.item.money > 0 }}
<a href="{{"/item/?unit=1&order=1&kbn="|cat:$app.item.kbn|cnvgw}}">Đến shop</a>
{{else}}
<a href="{{"/item/?unit=2&order=1&kbn="|cat:$app.item.kbn|cnvgw}}">Đến shop</a>
{{/if}}
<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/item/?md=1"|cnvgw}}">Quay lại đồ đang có</a>
{{else}}
{{if $form.q == ""}}
{{if $app.item.money > 0 }}
<a href="{{"/item/?unit=1&order="|cat:$app.order|cat:"&kbn="|cat:$app.item.kbn|cnvgw}}">Quay lại shop</a><br/>
<a href="{{"/coin/convert.php"|cnvgw}}">Tới trang đổi Ngọc</a><br/>
<a href="{{"/quest/"|cnvgw}}">Tới trang Thử thách</a>
{{else}}
<a href="{{"/item/?unit=2&order="|cat:$app.order|cat:"&kbn="|cat:$app.item.kbn|cnvgw}}">Quay lại shop</a><br/>
<a href="{{"/coin/index.php"|cnvgw}}">Tới trang mua Ngọc</a>
{{/if}}
{{else}}
{{include file="parts/emoji.tpl" id=26}}
{{if $form.ev == ""}}
<a href="{{"/quest/disp.php?id="|cat:$form.q|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Về Thử thách</a>
{{else}}
<a href="{{"/event/"|cat:$form.ev|cat:"/detail.php?id="|cat:$form.q|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Quay trở lại event</a>
{{/if}}
{{/if}}
{{/if}}

<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
</div>

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff9900;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</div>
</body>
</html>
