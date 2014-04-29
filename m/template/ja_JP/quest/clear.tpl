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
<div style="text-align:center; background-color:#{{$app.color.sub}};"><span style="color:#ffffff;">Chiến trường {{$app.stage}} ({{$app.title}})</span></div><div style="text-align:center; background-color:#{{$app.color.main}}; border-color:#{{$app.color.main}}; border-style:solid;"><span style="color:#{{$app.color.text}};">{{$app.disp.name}}</span></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{if isset($app.masho) }}
<div style="text-align:center;"><a href="{{"/boss/"|cnvgw}}"><img src="http://{{$app.domain.img}}/masho_app.gif" width="200" height="60" /><br />Yêu tướng xuất hiện</a></div>
{{/if}}<!--result-->
<div style="background-color:#993366;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=32}}</span>Điểm kinh nghiệm: {{$app.disp.exp}} &raquo; <span style="color:#ffff00;">{{$app.profile.exp}}</span>/{{$app.nextExp}}(Cần <span style="color:#ffff00;">{{$app.diffExp}}</span>)<br />
 <img src="http://{{$app.domain.img}}/e/{{$app.eImg}}.gif" width="160" height="16" /><br />
<span style="color:#ffff00;">{{include file="parts/emoji.tpl" id=22}}</span>Vàng: {{$app.disp.money}} &raquo; <span style="color:#ffff00;">{{$app.profile.money}}</span><br />
<span style="color:#ff33cc;">{{include file="parts/emoji.tpl" id=19}}</span>Năng lượng: {{if $form.ex_genki ==""}}{{$app.profile.genki}}{{else}}{{$form.ex_genki}}{{/if}} &raquo; <span style="color:#ff0000;">{{$app.profile.genki}}</span>/{{$app.profile.max_genki}}<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
</div>
<!--result-->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#{{$app.disp.end_bg}};"><table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="top">
<td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/thumb/zabi.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">{{$app_ne.word.end_cmnt}}</span></td></tr></table>
</div>{{if $app.rfP}}
<div style="text-align:center;">
<table border="0" width="200" cellspacing="0" cellpadding="0" align="center"><tr valign="top">
<td width="40"><img src="http://{{$app.domain.img}}/card/{{$app.card.1}}_s.jpg" width="38" /></td>
<td width="40"><img src="http://{{$app.domain.img}}/card/{{$app.card.2}}_s.jpg" width="38" /></td>
<td width="40"><img src="http://{{$app.domain.img}}/card/{{$app.card.3}}_s.jpg" width="38" /></td>
<td width="40"><img src="http://{{$app.domain.img}}/card/{{$app.card.4}}_s.jpg" width="38" /></td>
<td width="40"><img src="http://{{$app.domain.img}}/card/{{$app.card.5}}_s.jpg" width="38" /></td>
</tr><tr>
{{foreach from=$app.rfP item=item name=rfp}}
<td><span style="font-size:x-small;"><span style="color:#00ff00;">{{if $item == "o"}}Công {{elseif $item == "d"}}Thủ {{elseif $item == "f"}}Binh {{/if}}</span>+1</span></td>
{{if $smarty.foreach.rfp.iteration % 5 == 0}}</tr><tr>{{/if}}
{{/foreach}}
</tr></table></div>{{if $app.org.fol > 0}}
Các card trên cỗ bài đã được nhận điểm kĩ năng !<br />
Binh: {{$app.org.fol}} &raquo; {{if $app.org.fol < $app.deck.follower }}<span style="color:#ffff00;">{{$app.deck.follower}}</span>{{else}}{{$app.deck.follower}}{{/if}}<br />
Công: {{$app.org.off}} &raquo; {{if $app.org.off < $app.deck.offense }}<span style="color:#ffff00;">{{$app.deck.offense}}</span>{{else}}{{$app.deck.offense}}{{/if}}<br />
Thủ: {{$app.org.def}} &raquo; {{if $app.org.def < $app.deck.defense }}<span style="color:#ffff00;">{{$app.deck.defense}}</span>{{else}}{{$app.deck.defense}}{{/if}}<br />
{{if $app.org.off == $app.deck.offense || $app.org.def == $app.deck.defense}}
<span style="color:#ff0000;">Mua vũ khí và đồ phòng thủ thì sức mạnh sẽ tăng lên!</span><br />
<div style="text-align:center;"><a href="{{"/item/"|cnvgw}}">Mua trong shop</a></div>
{{/if}}
{{else}}
Binh: {{$app.deck.follower}}<br />
Công: {{$app.deck.offense}}<br />
Thủ: {{$app.deck.defense}}<br />
{{/if}}
{{/if}}<!--Chỉ hiển thị chiến trường tương thích-->
{{if $app.list}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<!-- * -->
{{foreach from=$app.list item=item}}
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#{{$app.color.main}};color:#{{$app.color.text}};">
{{if $item.questid == $app.id }}
<span style="text-decoration:blink;">Hoàn thành Thử thách!</span>
{{else}}
{{$item.name}}
{{/if}}
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="top">
<td width="100" style="text-align:center;"><img src="http://{{$app.domain.img}}/a/{{$item.aImg}}.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<span style="color:#00ffff;">{{include file="parts/emoji.tpl" id=33}}</span>Tỉ lệ thành công: {{$item.archieve}}% <br />
<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=32}}</span>Điểm kinh nghiệm: +{{$item.exp}}<br />
<span style="color:#ffff00;">{{include file="parts/emoji.tpl" id=22}}</span>Vàng: +{{$item.money}}<br />
<span style="color:#ff33cc;">{{include file="parts/emoji.tpl" id=19}}</span>Năng lượng: <span style="color:#ff0000;">{{$item.req_genki}}</span><br />
</span></td></tr></table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
{{if $item.item1 > 0 || $item.item2 > 0 || $item.item3 > 0}}
<span style="color:#00ff00;">{{include file="parts/emoji.tpl" id=8}}</span>Item quan trọng<br />
{{if $item.item1 > 0 }}<img src="http://{{$app.domain.img}}/item/{{$item.item1}}.gif" width="70" height="70" />x{{$item.num1}} {{/if}}
{{if $item.item2 > 0 }}<img src="http://{{$app.domain.img}}/item/{{$item.item2}}.gif" width="70" height="70" />x{{$item.num2}} {{/if}}
{{if $item.item3 > 0 }}<img src="http://{{$app.domain.img}}/item/{{$item.item3}}.gif" width="70" height="70" />x{{$item.num3}}{{/if}}
<br />
{{/if}}
{{if $item.mustBuy1 > 0 || $item.mustBuy2 > 0 || $item.mustBuy3 > 0}}
<div style="text-align:center;">
<span style="color:#ff0000;">Không đủ item!</span>
<div style="text-align:center;"><a href="{{"/item/select.php?id="|cat:$item.questid|cat:"&mb1="|cat:$item.mustBuy1|cat:"&mb2="|cat:$item.mustBuy2|cat:"&mb3="|cat:$item.mustBuy3|cnvgw}}">Mua item quan trọng</a></div>
</div>
{{else}}
{{/if}}
{{/foreach}}
{{/if}}{{if $app.tut_num > 17 }}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;"><a href="{{"/quest/?id="|cat:$app.cstage|cnvgw}}">Đến danh sách Thử thách</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br /><div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align: right;"><a href="#top">Về đầu trang</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<!-- footer -->
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
{{/if}}</div>
</body>
</html>