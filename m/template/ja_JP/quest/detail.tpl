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
<div style="text-align:center; background-color:#{{$app.color.sub}};"><span style="color:#ffffff;">Chiến trường {{$app.stage}} ({{$app.title}})</span></div>

{{if $app.tut_num <= 3 || $app.tut_num == 5 || $app.tut_num == 10 }}
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" align="center"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
{{if $app.tut_num == 1 }}
Trạng thái đó!<span style="color:#ff0000;">Tỉ lệ đạt được</span> là 10%. năng lượng đã tiêu hao sẽ khôi phục mỗi lần 1/3 <span style="color:#ffff00;"></span>
{{elseif $app.tut_num == 2 }}
Hãy hướng tới mục tiêu là 100% trong trạng thái đó. A chỉ 1 lần nữa thôi quân năng sẽ tăng! <span style="color:#ffff00;"></span>Ôi...hồi hộp quá!
{{elseif $app.tut_num == 3 }}
Xin chúc mừng <span style="color:#ff0000;">Quân đoàn</span><span style="color:#ff0000;"> Level mỗi card đã tăng lên</span><span style="color:#ff0000;"></span>Lên trình thì <span style="color:#ff0000;">Năng lượng</span>cũng tăng lên, ngoài ra còn hồi phục hoàn toàn nữa Đang từng bước tiến lên
{{elseif $app.tut_num == 5 }}
Đã tìm thấy báu vật rồi! Xem đó là báu vật gì nào Nếu có được 5 báu vật cùng 1 <span style="color:#ffff00;">gói thì sẽ được 1 gói báu vật đấy</span>!
{{/if}}
</span></td></tr>
</table>
</div>
{{/if}}

<div style="text-align:center; background-color:#{{$app.color.main}};border-color:#{{$app.color.main}};border-style:solid;"><span style="color:#000000;">{{$app.disp.name}}</span></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{if isset($app.getTr) }}
<div style="text-align:center;">
<div>
<embed src="/img/swf/itemget.swf" quality="high" bgcolor="#000000" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</div>
<div>
<img src="http://{{$app.domain.img}}/tr_get{{$app.getTr.tr_seriesid}}.gif" width="90" height="30" /><img src="http://{{$app.domain.img}}/treasure/{{$app.getTr.treasureid}}.gif" width="50" height="50" />
</div>
<div>
{{if isset($app.comp.itemid) }}
Có được báu vật <a href="{{"/treasure/?tid="|cat:$app.getTr.tr_seriesid|cat:"&q="|cat:$app.q|cnvgw}}">{{$app.getTr.name}}</a>Hoàn thành Gói {{$app.getTr.seriesname}}
{{else}}
Gói {{$app.getTr.seriesname}}<br />
&nbsp;<a href="{{"/treasure/?tid="|cat:$app.getTr.tr_seriesid|cat:"&q="|cat:$app.q|cnvgw}}">{{$app.getTr.name}}</a>
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</div>
</div>
{{if isset($app.comp.itemid) }}
<div style="text-align:center; background-color:#ff9900;border-color:#ff9900;border-style:solid;"><span style="color:#000000;">Có được món đồ</span></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<table border="0" cellspacing="0" cellpadding="0" align="center"><tr>
<td width="90" align="center" colspan="2"><img src="http://{{$app.domain.img}}/tr_comp.gif" width="90" height="30" /></td></tr>
<tr>
<td width="55" align="center"><img src="http://{{$app.domain.img}}/item/{{$app.comp.itemid}}.gif" width="50" height="50" /></td>
<td valign="top"><a href="{{"/item/?act=item_confirm&num=1&id="|cat:$app.comp.itemid|cat:"&q="|cat:$app.q|cnvgw}}"><span style="font-size:x-small;">{{$app.comp.name}}</span></a><br />
<span style="font-size:x-small;">{{$app.comp.expla}}<br />
{{if $app.comp.kbn == 1 || $app.comp.kbn == 2}}
Công {{$app.comp.offense}}<br />
Thủ {{$app.comp.defense}}{{/if}}</span></td></tr></table>
{{/if}}
<div style="background-color:#66cccc;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
{{/if}}

{{if isset($app.getItem) }}
<div style="text-align:center">
<div>
<embed src="/img/swf/itemget.swf" quality="high" bgcolor="#000000" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</div>
<div>
<img src="http://{{$app.domain.img}}/item/{{$app.getItem.itemid}}.gif" width="50" height="50" />
<span style="font-size:x-small;">
<a href="{{"/item/confirm.php?num=1&id="|cat:$app.getItem.itemid|cat:"&q="|cat:$app.q|cnvgw}}">{{$app.getItem.name}}</a>
</span>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
</div>
{{/if}}


{{if $app.broken}}
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#ff9900;">Món đồ đã hỏng</div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

{{foreach from=$app.broken item=item}}
<table border="0" width="98%" cellspacing="0" cellpadding="0" align="center"><tr valign="top">
<td width="80" align="center"><img src="http://{{$app.domain.img}}/item/{{$item.itemid}}.gif" alt="{{$item.name}}" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
{{if $item.kbn == 1 }}Vũ khí{{elseif $item.kbn == 2}}Đồ phòng thủ{{/if}}: {{$item.name}}<br />
{{if $item.kbn == 1 || $item.kbn == 2}}Tính năng: Công +{{$item.offense}} Thủ +{{$item.defense}}<br />{{/if}}
{{if $item.money == 0 && $item.coin == 0 }}
<span style="color:#ff0000;">Đồ không bán</span><br />
{{if $item.questname > 0}}
Thử thách [<a href="{{"/quest/detail.php?id="|cat:$item.questid|cat:"&ssid="|cat:$app.ssid|cnvgw}}"><span style="color:#ffff00;">{{$item.questname}}</span></a>]
{{/if}}
{{elseif $item.coin == 0}}
{{if $item.num > 0}}
Giá: {{$item.money}}<img src="http://{{$app.domain.img}}/vang.gif" width="10" height="8" /><br />
Đang có: {{$item.has}}<br />
Vàng: {{$item.own}} &raquo;
{{if isset($item.after)}}
<span style="color:#ff0000;">{{$item.after}}</span><br />
<form action="{{"/item/index.php"|cnvgw}}" method="POST">
{{include file="parts/needitem.tpl" max=$item.max }}
<input type="hidden" name="act" value="item_confirm">
<input type="hidden" name="q" value="{{$app.q}}">
<input type="hidden" name="id" value="{{$item.itemid}}" />
<input type="submit" value="Mua" />
</form>
{{else}}
<span style="color:#ff0000;">Không đủ Vàng!</span><br />
{{/if}}
{{/if}}
{{/if}}
</span></td></tr></table>
{{/foreach}}

<div style="background-color:#ff9900;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
{{/if}}



{{if isset($app.masho) }}
<div style="text-align:center;"><a href="{{"/boss/"|cnvgw}}"><img src="http://{{$app.domain.img}}/masho_app.gif" width="200" height="60" /><br />Yêu tướng xuất hiện </a></div>
{{/if}}

{{if !isset($app.getItem) && !isset($app.getTr) }}
<div>
<embed src="/img/swf/loading{{$app.st_ran}}.swf" quality="high" bgcolor="#000000" allowScriptAccess="sameDomain" width="100%" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</div>
{{/if}}

<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="100" align="center"><img src="http://{{$app.domain.img}}/a/{{if $app.done == 1}}8{{else}}{{$app.aImg}}{{/if}}.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
{{if $app.mode != "disp"}}
<span style="text-decoration:blink;">Thử thách thành công</span>
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<span style="color:#00ffff;">{{include file="parts/emoji.tpl" id=33}}</span>Tỉ lệ thành công: {{if $app.done == 1}}100{{else}}{{$app.disp.aRate}}{{/if}}%<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.ar == 10 }}
<span style="text-decoration:blink;">Hoàn thành thử thách!</span>
{{else}}
{{if $app.tut_num == 5 }}
{{else}}
{{include file="parts/emoji.tpl" id=26}}
<a href="{{"/quest/detail.php?id="|cat:$app.id|cat:"&ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">{{if $app.mode == "disp"}}Chinh phục Thử thách{{else}}Chinh phục Thử thách{{/if}}</a>{{/if}}{{/if}}
</span></td></tr></table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{if $app.ar == 1 }}
<div style="background-color:#000066;">
<table border="0" width="98%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">{{$app_ne.word.expla_l}}</span></td></tr></table>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{else}}
<!--2nd-->
{{if $app.mode != "disp"}}
<div style="background-color:#000066;">
<table border="0" width="98%" cellspacing="0" cellpadding="0">
<tr valign="top"><td><span style="font-size:x-small;">{{$app.disp.expla_s}}</span></td></tr></table>
</div>
{{/if}}
<!--2nd-->
{{if isset($app.scn) }}
<div style="text-align:center;background-color:#000066;">
<img src="http://{{$app.domain.img}}/scn/{{$app.scn}}.gif" width="240" height="45" />
</div>
{{/if}}
{{/if}}

<div style="background-color:#{{$app.color.sub}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#{{$app.color.main}};color:#{{$app.color.text}};">Quân đoàn {{$app.profile.handle}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="background-color:#993366;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=32}}</span>Điểm kinh nghiệm: {{$app.profile.exp}} &raquo; <span style="color:#ffff00;">{{$app.disp.exp}}</span>/{{$app.nextExp}} (Cần <span style="color:#ffff00;">{{$app.diffExp}}</span>)<br />
&nbsp;<img src="http://{{$app.domain.img}}/e/{{$app.eImg}}.gif" width="160" height="16" /><br />
<span style="color:#ffff00;">{{include file="parts/emoji.tpl" id=22}}</span>Vàng: {{if $form.orgM ==""}}{{$app.profile.money}}{{else}}{{$form.orgM}}{{/if}} &raquo; <span style="color:#ffff00;">{{$app.disp.money}}</span><br />
<span style="color:#ff33cc;">{{include file="parts/emoji.tpl" id=19}}</span>Năng lượng: {{if $app.profile.genki != $app.disp.genki}}{{if $form.ex_genki ==""}}{{$app.profile.genki}}{{else}}{{$form.ex_genki}}{{/if}} &raquo; {{/if}}
<span style="color:#ff0000;">{{$app.disp.genki}}</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
</div>

{{if $app.tut_num > 17 }}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
{{if $app.profile.stage > 1}}
<a href="{{"/quest/?id="|cat:$app.cstage|cnvgw}}">Về Thử thách</a>
{{else}}
<a href="{{"/quest/"|cnvgw}}"> Về Thử thách</a>
{{/if}}
</div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
{{/if}}

</div>
</body>
</html>
