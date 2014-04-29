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
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="background-color:#ff9900; text-align:center;">Hoàn thành Mua</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />


Bạn đã mua {{$app.item.name}}!<br /><br />
{{if $app.payid == ""}}
{{if $app.item.money > 0}}
Vàng: {{$form.orgMoney}} &raquo; <span style="color:#ff0000;">{{$form.Money}}</span><br/>
{{else}}
Ngọc: {{$form.orgMoney}} &raquo; <span style="color:#ff0000;">{{$form.Money}}</span><br/>
{{/if}}
{{/if}}

{{if $app.payid == ""}}

Đang có: {{$form.orgNum}} &raquo; <span style="color:#ffff00;">{{$form.Num}}</span><br />
{{if $app.item.kbn == 4 }}
Công lực: {{$form.orgOff}}<br />
Thủ lực: {{$form.orgDef}}<br />
{{else}}
Công lực: {{$form.orgOff}} &raquo; {{if $form.orgOff < $form.Off}}<span style="color:#ffff00;">{{$form.Off}}</span>{{else}}{{$form.Off}}{{/if}}<br />
Thủ lực: {{$form.orgDef}} &raquo; {{if $form.orgDef < $form.Def}}<span style="color:#ffff00;">{{$form.Def}}</span>{{else}}{{$form.Def}}{{/if}}<br />
{{/if}}
{{else}}
{{if $app.item.kbn != 9 }}
Đang có{{$app.orgNum}} &raquo; <span style="color:#ffff00;">{{$app.Num}}</span><br />
{{/if}}
{{if $app.item.kbn == 1}}
Công lực: {{$app.org.kbn_off}} &raquo; {{if $app.org.kbn_off < $app.deck.offense}}<span style="color:#ffff00;">{{$app.deck.offense}}</span>{{else}}{{$app.deck.offense}}{{/if}}<br />
Thủ lực: {{$app.org.kbn_def}} &raquo; {{if $app.org.kbn_def < $app.deck.defense}}<span style="color:#ffff00;">{{$app.deck.defense}}</span>{{else}}{{$app.deck.defense}}{{/if}}<br />
{{elseif $app.item.kbn == 2}}
Công lực: {{$app.org.kbn_off}} &raquo; {{if $app.org.kbn_off < $app.deck.offense}}<span style="color:#ffff00;">{{$app.deck.offense}}</span>{{else}}{{$app.deck.offense}}{{/if}}<br />
Thủ lực: {{$app.org.kbn_def}} &raquo; {{if $app.org.kbn_def < $app.deck.defense}}<span style="color:#ffff00;">{{$app.deck.defense}}</span>{{else}}{{$app.deck.defense}}{{/if}}<br />
{{/if}}

{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
{{if $app.q == ""}}
	{{if $app.payid != ""}}
	<a href="{{"/item/"|cnvgw}}">Tiếp tục mua đồ</a><br />
	{{else}}	<!--{{if $app.item.kbn == 9 }}
			{{if isset($app.qid)}}
	<a href="{{"/event/"|cat:$app.qid.evid|cat:"/start.php?id="|cat:$app.qid.questid|cnvgw}}">Về Sự kiện</a>
			{{else}}
	<a href="{{"/item/?unit=2&order=1&kbn=4"|cnvgw}}">Tiếp tục mua đồ</a>
			{{/if}}
		{{else}}
	<a href="{{"/item/?unit=2&order=1&kbn="|cat:$app.kbn|cnvgw}}">Tiếp tục mua đồ</a><br />-->	<a href="{{"/item/?unit="|cat:$app.unit|cat:"&order="|cat:$app.order|cat:"&kbn="|cat:$app.item.kbn|cnvgw}}">Tiếp tục mua đồ</a><br />
	{{/if}}
{{if $app.item.itemid == 115 || $app.item.itemid == 139 || $app.item.itemid == 140 || $app.item.itemid == 141}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/gacha/?ssid="|cat:$app.ssid|cnvgw}}">Đến Cửa hàng may mắn</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{elseif $app.item.itemid == 116}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/my/rcv/index.php?ssid="|cat:$app.ssid|cnvgw}}">Hồi phục năng lượng</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{elseif $app.item.itemid == 160}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/card/complist.php"|cnvgw}}">Hợp nhất đặc năng bằng Tượng thần</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{elseif $app.item.itemid == 161 || $app.item.itemid == 162}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/card/pcomplist.php"|cnvgw}}">Sử dụng Tượng mèo để kết hợp Card</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}
{{/if}}
{{else}}
{{include file="parts/emoji.tpl" id=26}}
{{if $form.ev == ""}}
<a href="{{"/quest/disp.php?id="|cat:$app.q|cat:"&orgM="|cat:$form.orgMoney|cat:"&ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">Về Thử thách</a><br />
{{else}}
<a href="{{"/event/"|cat:$form.ev|cat:"/detail.php?id="|cat:$app.q|cat:"&ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">Về Sự kiện</a><br />
{{/if}}
{{/if}}
</div>

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff9900;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</div>
</body>
</html>
