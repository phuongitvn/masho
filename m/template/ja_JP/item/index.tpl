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
<div style="text-align:center; background-color:#{{if $app.md == 1}}993366{{else}}ff9900{{/if}};">{{if $app.md == 1}}Kho quân khí {{$app.user.handle}}{{else}}Shop{{/if}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{if $app.md != 1}}
<div style="text-align:center;"><img src="http://{{$app.domain.img}}/hdr/item.gif" width="240" height="60" /></div>
{{/if}}

<div style="background-color:#333333;">
{{if $app.kbn == "" || $app.kbn == 1 }}
<div style="text-align:center">Vũ Khí / <a href="{{"/item/?kbn=2&unit="|cat:$app.unit|cat:"&order="|cat:$app.order|cat:"&md="|cat:$app.md|cnvgw}}">Đồ phòng thủ</a> / <a href="{{"/item/?kbn=4&unit="|cat:$app.unit|cat:"&order="|cat:$app.order|cat:"&md="|cat:$app.md|cnvgw}}">Khác</a></div>
{{elseif $app.kbn == 2 }}
<div style="text-align:center"><a href="{{"/item/?kbn=1&unit="|cat:$app.unit|cat:"&order="|cat:$app.order|cat:"&md="|cat:$app.md|cnvgw}}">Vũ Khí</a> / Đồ phòng thủ / <a href="{{"/item/?kbn=4&unit="|cat:$app.unit|cat:"&order="|cat:$app.order|cat:"&md="|cat:$app.md|cnvgw}}">Khác</a></div>
{{elseif $app.kbn == 4 }}
<div style="text-align:center"><a href="{{"/item/?kbn=1&unit="|cat:$app.unit|cat:"&order="|cat:$app.order|cat:"&md="|cat:$app.md|cnvgw}}">Vũ Khí</a> / <a href="{{"/item/?kbn=2&unit="|cat:$app.unit|cat:"&order="|cat:$app.order|cat:"&md="|cat:$app.md|cnvgw}}">Đồ phòng thủ</a> / Khác</div>
{{/if}}

{{if $app.md == 1}}
{{if $app.unit == 3 }}
<div style="text-align:center">Đồ mua / <a href="{{"/item/?unit=4&kbn="|cat:$app.kbn|cat:"&md="|cat:$app.md|cnvgw}}">Chiến lợi phẩm</a></div>
{{elseif $app.unit == 4 }}
<div style="text-align:center"><a href="{{"/item/?unit=3&kbn="|cat:$app.kbn|cat:"&md="|cat:$app.md|cnvgw}}">Đồ mua</a> / Chiến lợi phẩm</div>
{{/if}}
{{else}}
{{if $app.unit == "" || $app.unit == 1 }}
<div style="text-align:center">Vàng / <a href="{{"/item/?unit=2&kbn="|cat:$app.kbn|cat:"&order="|cat:$app.order|cnvgw}}">Ngọc</a></div>
{{elseif $app.unit == 2 }}
<div style="text-align:center"><a href="{{"/item/?unit=1&kbn="|cat:$app.kbn|cat:"&order="|cat:$app.order|cnvgw}}">Vàng</a> / Ngọc</div>
{{/if}}
{{if $app.order == "" || $app.order == 1 }}
<div style="text-align:center"><a href="{{"/item/?order=2&kbn="|cat:$app.kbn|cat:"&unit="|cat:$app.unit|cnvgw}}">Đắt</a> / Rẻ</div>
{{elseif $app.order == 2 }}
<div style="text-align:center">Đắt / <a href="{{"/item/?order=1&kbn="|cat:$app.kbn|cat:"&unit="|cat:$app.unit|cnvgw}}">Rẻ</a></div>
{{/if}}
{{/if}}
</div>

{{if $app.unit == "" || $app.unit == 1 }}
Số Vàng sở hữu: {{$app.user.money}} <img src="http://{{$app.domain.img}}/vang.gif" width="10" height="8" />
{{elseif $app.unit == 2 }}
Số Ngọc sở hữu: {{$app.user.coin}} <img src="http://{{$app.domain.img}}/ngoc.gif" width="10" height="8" />
{{/if}}

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

{{if $app.item}}
<div>Đang có {{$app.navi.lines.total}} / Hiển thị {{$app.navi.lines.from}}-{{$app.navi.lines.to}} </div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<!-- * -->
{{foreach from=$app.item item=item}}
<div style="background-color:{{cycle values="#000000;,#000000;"}}">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="80"><img src="http://{{$app.domain.img}}/item/{{$item.itemid}}.gif" alt="{{$item.name}}" width="70" height="70" /></td>
<td width="120"><span style="font-size:x-small;">
{{if $app.md <> 1}}
{{if $app.unit == "" || $app.unit == 1 }}
<a href="{{"/item/confirm.php?unit=1&num=1&id="|cat:$item.itemid|cnvgw}}">
{{else $app.unit == 2}}
<a href="{{"/item/confirm.php?unit=2&num=1&id="|cat:$item.itemid|cnvgw}}">
{{/if}}
{{/if}}
{{$item.name}}</a><br />

{{if $app.md <> 1}}
{{if $app.unit == "" || $app.unit == 1 }}
{{include file="parts/emoji.tpl" id=22}}Giá: {{$item.money|number_format}} <img src="http://{{$app.domain.img}}/vang.gif" width="10" height="8" /><br />
{{elseif $app.unit == 2 }}
{{include file="parts/emoji.tpl" id=22}}Giá: {{$item.coin|number_format}} <img src="http://{{$app.domain.img}}/ngoc.gif" width="10" height="8" /><br />
{{/if}}
{{/if}}
{{if $app.kbn ==  1 || $app.kbn ==  2}}
{{include file="parts/emoji.tpl" id=31}}Công {{$item.offense}} / Thủ {{$item.defense}}<br />
{{/if}}
{{include file="parts/emoji.tpl" id=16}}Đang có: {{$item.num|default:"0"}}<br />

{{if $app.md <> 1}}
{{if $app.unit == "" || $app.unit == 1 }}

{{if $item.max==0}}
<span style="color:#ff0000;">Bạn không đủ <a href="{{"/coin/convert.php"|cnvgw}}">Vàng</a></span>
{{else}}
<form action="{{"/item/index.php"|cnvgw}}" method="POST">
{{include file="parts/maxitem.tpl" max=$item.max }}
<input type="hidden" name="act" value="item_confirm" />
<input type="hidden" name="unit" value="1" />
<input type="hidden" name="order" value="{{$app.order}}" />
<input type="hidden" name="id" value="{{$item.itemid}}" />
<input type="submit" value="Mua" />
</form>
{{/if}}

{{elseif $app.unit == 2 }}
{{if $item.max==0}}
<span style="color:#ff0000;">Bạn không đủ <a href="{{"/coin/index.php"|cnvgw}}">Ngọc</a></span>
{{else}}
<form action="{{"/item/index.php"|cnvgw}}" method="POST">
{{include file="parts/maxitem.tpl" max=$item.max }}
<input type="hidden" name="act" value="item_confirm" />
<input type="hidden" name="unit" value="2" />
<input type="hidden" name="order" value="{{$app.order}}" />
<input type="hidden" name="id" value="{{$item.itemid}}" />
<input type="submit" value="Mua" />
</form>
{{/if}}
{{/if}}
{{/if}}
</span>
</td></tr>
</table>

</div>

{{/foreach}}
<!-- * -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">
{{include file="parts/pager.tpl" url="/item/" parm="&kbn="|cat:$app.kbn|cat:"&unit="|cat:$app.unit|cat:"&order="|cat:$app.order|cat:"&md="|cat:$app.md}}
</div>

{{else}}
<div style="text-align:center">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
{{if $app.md == 1}}
<span style="color:#ff0000;">Bạn chưa có món đồ nào</span><br />
{{else}}
<span style="color:#ff0000;">Với LV hiện tại, bạn không thể mua món đồ nào</span><br />
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
</div>
{{/if}}

{{if $app.md == 1}}
<div style="background-color:#993366;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
{{/if}}

<div style="text-align:center">
{{if $form.md == 1 && $form.unit != 4}}
{{if $form.kbn == "" }}
<a href="{{"/item/?unit=1&order=1&kbn=1"|cnvgw}}">Shop</a>
{{else}}
<a href="{{"/item/?unit=1&order=1&kbn="|cat:$form.kbn|cnvgw}}">Shop</a>
{{/if}}
{{/if}}
<br />
</div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#{{if $app.md == 1}}993366{{else}}ff9900{{/if}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
