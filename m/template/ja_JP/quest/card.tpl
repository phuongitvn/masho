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
{{if $form.id == "fg" || $app.fg == "fg"}}
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Chiến đấu</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{else}}
<div style="text-align:center;background-color:#{{$app.color.sub}};color:#ffffff;">Chiến trường {{$app.stage}} ({{$app.title}})</div>
{{if isset($app.masho)}}
{{else}}
<div style="text-align:center;border-color:#{{$app.color.main}};border-style:solid;background-color:#{{$app.color.main}};color:#{{$app.color.text}};">{{$app.disp.name}}</div>
{{/if}}
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{if isset($app.masho) || $form.id == "ms" || $app.dotGo == 1}}
{{elseif $form.id == "fg"}}
<div style="text-align:center;background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{else}}
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="middle">
<td width="90" style="text-align:center;"><img src="http://{{$app.domain.img}}/a/{{if $app.done == 1}}8{{else}}{{$app.aImg}}{{/if}}.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
{{if $app.disp.aRate > 0}}
<div style="font-size:x-small;"><span style="text-decoration:blink;">Hoàn thành thử thách </span></div>
<span style="color:#00ffff;">{{include file="parts/emoji.tpl" id=33}}</span>Tỉ lệ hoàn thành: {{if $app.done == 1}}100{{else}}{{$app.disp.aRate}}{{/if}}%
<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{elseif $app.done == 1}}
<div style="font-size:x-small;"><span style="text-decoration:blink;">Hoàn thành thử thách </span></div>
<span style="color:#00ffff;">{{include file="parts/emoji.tpl" id=33}}</span>Tỉ lệ hoàn thành: 100%<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}
</span></td></tr></table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{/if}}

{{if isset($app.masho) || $form.id == "ms" || $app.dotGo == 1}}
{{else}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;">
<table border="0" width="200" cellspacing="0" cellpadding="0" align="center"><tr valign="top">
<td width="40"><img src="http://{{$app.domain.img}}/card/{{$app.card.1}}_s.jpg" width="38" /></td>
<td width="40"><img src="http://{{$app.domain.img}}/card/{{$app.card.2}}_s.jpg" width="38" /></td>
<td width="40"><img src="http://{{$app.domain.img}}/card/{{$app.card.3}}_s.jpg" width="38" /></td>
<td width="40"><img src="http://{{$app.domain.img}}/card/{{$app.card.4}}_s.jpg" width="38" /></td>
<td width="40"><img src="http://{{$app.domain.img}}/card/{{$app.card.5}}_s.jpg" width="38" /></td>
</tr><tr>
{{if $app.rfP}}
{{foreach from=$app.rfP item=item name=rfp}}
<td><span style="font-size:x-small;"><span style="color:#00ff00;">{{if $item == "o"}}Công{{elseif $item == "d"}}Thủ{{elseif $item == "f"}}Binh{{/if}}</span> +1</span></td>
{{if $smarty.foreach.rfp.iteration % 5 == 0}}</tr><tr>{{/if}}
{{/foreach}}
{{/if}}
</tr></table></div>
{{if $app.org.fol > 0}}
Quân năng quân đoàn tăng đến cấp độ <span style="color:#ffff00;">{{$app.profile.level}}</span> <br />
Các Card trên cỗ bài đã được nhận điểm kĩ năng !<br />
Binh: {{$app.org.fol}} &raquo; {{if $app.org.fol < $app.deck.follower }}<span style="color:#ffff00;">{{$app.deck.follower}}</span>{{else}}{{$app.deck.follower}}{{/if}}<br />
Công lực: {{$app.org.off}} &raquo; {{if $app.org.off < $app.deck.offense }}<span style="color:#ffff00;">{{$app.deck.offense}}</span>{{else}}{{$app.deck.offense}}{{/if}}<br />
Thủ lực: {{$app.org.def}} &raquo; {{if $app.org.def < $app.deck.defense }}<span style="color:#ffff00;">{{$app.deck.defense}}</span>{{else}}{{$app.deck.defense}}{{/if}}<br />
{{if $app.org.off == $app.deck.offense || $app.org.def == $app.deck.defense}}
<span style="color:#ff0000;">Mua vũ khí và Đồ phòng thủ thì sức mạnh sẽ tăng!</span><br />
{{if $form.cl != 1}}
<div style="text-align:center;"><a href="{{"/item/"|cnvgw}}">Mua</a></div>
{{/if}}
{{/if}}
{{else}}
Quân binh: {{$app.deck.follower}}<br />
Công: {{$app.deck.offense}}<br />
Thủ: {{$app.deck.defense}}<br />
{{/if}}
{{/if}}
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">Card</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>


{{if $app.busho}}
{{foreach from=$app.busho item=item name=wish}}
<div style="text-align:center;">
{{if $item.seq > 22}}<span style="color:#ffff00;">Đánh được yêu tướng, giành được Card!</span>{{else}}Lên cấp và giành được Card{{/if}}<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />

{{if $form.cl == 1}}
<img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}.jpg" width="160" height="218" />
{{else}}
<a href="{{"/card/?mode=2&id="|cat:$item.bushoid|cat:"&seq="|cat:$item.cardseq|cnvgw}}"><img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}.jpg" width="160" height="218" /></a>
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
</div>
<span style="font-size:x-small;text-align:center;">
<span style="color:#ffff00;">{{$item.name}} ({{$item.rank}}) Lv{{$item.level}}</span><br />
Đặc năng: {{$item.sec_name}}<br />
{{$item.sec_expla}}
</span>

{{if $form.cl == 1}}
{{if $app.tbdCnt > 0}}<span style="color:#ff0000;">Kho Card của bạn đã đầy (36). Hãy kết hợp Card, bán hoặc tặng cho đồng minh để có thể lấy thêm Card mới.</span><br />{{/if}}
{{else}}
{{if $app.tbdCnt > 0}}
<div style="text-align:center;">
{{if $app.cntF >= 36}}
<span style="color:#ff0000;">Kho Card của bạn đã đầy (36). Hãy kết hợp Card, bán hoặc tặng cho đồng minh để có thể lấy thêm Card mới.</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/card/file.php"|cnvgw}}">Về Kho Card</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{else}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/card/set.php?seq="|cat:$item.cardseq|cat:"&q="|cat:$app.q|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Chuyển Card đến Kho</a><br />
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/card/del/?seq="|cat:$item.cardseq|cat:"&q="|cat:$app.q|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Bán Card</a>
</div>
{{else}}
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{/if}}
{{/foreach}}
{{/if}}


{{if $form.cl != 1}}
{{if $app.tbdCnt > 0}}
{{else}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
{{if isset($app.masho)}}
{{if $app.stgEnd == 1}}
<a href="{{"/quest/"|cnvgw}}">Về Thử thách</a>
{{else}}
<img src="http://{{$app.domain.img}}/scn/{{$app.scn}}.gif" width="240" height="45" /><br />
<a href="{{"/quest/"|cnvgw}}">Chiến trường tiếp theo {{$app.stageN}}|</a>
{{/if}}
{{else}}
<!--Lên trình khi chiến đấu-->
{{if $form.fg == 1 }}
<a href="{{"/other/list.php"|cnvgw}}" accesskey="5">{{include file="parts/emoji.tpl" id=26}}Tiếp tục chiến đấu</a>
{{else}}
<a href="{{"/quest/disp.php?id="|cat:$app.id|cat:"&ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">{{include file="parts/emoji.tpl" id=26}}Chinh phục Thử thách</a>
{{/if}}
<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=70}}</span><a href="{{"/card/file.php"|cnvgw}}">Về Kho Card</a>
{{/if}}
</div>
{{/if}}
{{/if}}




{{if $app.tut_num > 17 }}
{{if $form.cl == 1}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;"><a href="{{"/quest/next.php?id="|cat:$form.id|cat:"&rfp="|cat:$form.rfp|cat:"&gR="|cat:$form.gR|cat:"&ssid="|cat:$app.ssid|cnvgw}}"><span style="font-size:medium;">Tiếp theo</span></a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="20" /><br />
{{else}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
{{/if}}
{{/if}}

</div>
</body>
</html>
