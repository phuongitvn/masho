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
<div style="text-align:center; background-color:#006600;">{{if $app.mode == "pre"}}Chọn quà{{elseif $app.mode == "wish"}}Đăng kí card muốn có{{else}}Card (Kho Card){{/if}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

{{if $app.mode == "wish"}}
Hãy chọn Card đăng kí <br />
Còn<span style="color:#ffff00;"> {{$app.rNum}}</span> Card có thể đăng kí 

{{elseif $app.mode == "pre"}}
{{else}}
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=63}}</span>Cỗ bài : <a href="{{"/card/deck.php?oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">5</a><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=70}}</span>Kho Card : {{$app.cnt}}/36  <br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=30}}</span>Hộp quà: <a href="{{"/card/pre.php?oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">{{$app.cntP}}/9 </a>
{{/if}}

{{if $app.mode == "edit"}}
<div style="text-align:center;"><img src="http://{{$app.domain.img}}/card/{{$app.card.bushoid}}_s.jpg" width="80" height="109" /></div>
{{elseif $app.mode == "pre"}}
<div style="background-color:#3366FF;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#3366FF;">Card muốn có của Quân đoàn {{$app.other.handle}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;"><table border="0" width="98%" cellspacing="0" cellpadding="0" align="center"><tr>
{{if $app.wlist}}
<!-- * -->
{{foreach from=$app.wlist item=item name=wish}}
<td width="72"><img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}_s.jpg" width="70" alt="" /></td>
<!-- * -->
{{/foreach}}
{{else}}
<span style="font-size:x-small;color:#ff0000;">Không đăng kí card muốn có </span>
{{/if}}
</tr></table></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">Tặng Card</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">Card /<a href="{{"/my/treasure.php?mode=pre&id="|cat:$form.id|cnvgw}}">Báu vật</a></div>
{{/if}}

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{if $app.mode == "edit"}}
Hãy chọn Card để thay thế vào Cỗ bài:<br />
{{elseif $app.mode == "pre"}}
{{elseif $app.mode == "wish"}}
{{else}}
{{if isset($app.msg) }}<div style="text-align:center;color:#ffff00;">{{$app.msg}}</div>{{/if}}
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">Danh sách Card trong kho</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>Bạn có thể thay đổi, <a href="{{"/card/pcomplist.php"|cnvgw}}">kết hợp</a>, <a href="{{"/card/del/mul.php"|cnvgw}}">bán Card</a> hoặc làm quà tặng cho người khác<br /><br />
{{/if}}

{{if $app.mode == "wish"}}
<span style="color:#ff0000;">Các Card trong cỗ bài và kho Card đang được xếp theo Độ hiếm </span>
{{elseif $app.mode == "pre"}}
{{else}}
{{if $app.st == "" || $app.st == "rk" }}
<div style="text-align:center">
Độ hiếm / <a href="{{"/card/file.php?st=lv&mode="|cat:$app.mode|cat:"&deck="|cat:$app.deck|cat:"&seq="|cat:$item.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">Level</a> / <a href="{{"/card/file.php?st=rb&mode="|cat:$app.mode|cat:"&deck="|cat:$app.deck|cat:"&seq="|cat:$item.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">Tên </a></div>
{{elseif $app.st == "rb" }}
<div style="text-align:center">
<a href="{{"/card/file.php?st=rk&mode="|cat:$app.mode|cat:"&deck="|cat:$app.deck|cat:"&seq="|cat:$item.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">Độ hiếm</a> / 
<a href="{{"/card/file.php?st=lv&mode="|cat:$app.mode|cat:"&deck="|cat:$app.deck|cat:"&seq="|cat:$item.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">Level</a> / Tên </div>
{{elseif $app.st == "lv" }}
<div style="text-align:center">
<a href="{{"/card/file.php?st=rk&mode="|cat:$app.mode|cat:"&deck="|cat:$app.deck|cat:"&seq="|cat:$item.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">Độ hiếm</a> / Level / <a href="{{"/card/file.php?st=rb&mode="|cat:$app.mode|cat:"&deck="|cat:$app.deck|cat:"&seq="|cat:$item.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">Tên </a></div>
{{/if}}
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<table border="0" width="98%" cellspacing="0" cellpadding="0" align="center" valign="top">
<tr>

{{if $app.list}}
<!-- * -->
{{foreach from=$app.list item=item name=deckf}}

<td width="70">

{{if $app.mode == "edit"}}
{{if $item.bushoid == "non_s"}}
<img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}.jpg" width="72" height="98" alt="" />
{{else}}
<a href="{{"/card/chg.php?deck="|cat:$app.deck|cat:"&seq="|cat:$item.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}"><img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}_s.jpg" width="72" height="98" alt="" /></a>
{{/if}}
{{elseif $app.mode == "pre"}}
{{if $item.bushoid == "non_s"}}
<img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}.jpg" width="72" height="98" alt="" />
{{else}}
<a href="{{"/card/?mode=4&id="|cat:$item.bushoid|cat:"&seq="|cat:$item.cardseq|cat:"&oid="|cat:$form.id|cnvgw}}"><img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}_s.jpg" width="72" height="98" alt="" /></a>
{{/if}}
{{elseif $app.mode == "wish"}}
{{if $item.bushoid == "non_s"}}
<img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}.jpg" width="72" height="98" alt="" />
{{else}}
<a href="{{"/card/?mode=5&id="|cat:$item.bushoid|cat:"&seq="|cat:$item.cardseq|cat:"&oid="|cat:$form.id|cnvgw}}"><img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}_s.jpg" width="72" height="98" alt="" /></a>
{{/if}}
{{else}}
{{if $item.bushoid == "non_s"}}
<img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}.jpg" width="72" height="98" alt="" />
{{else}}
<a href="{{"/card/?mode=2&id="|cat:$item.bushoid|cat:"&seq="|cat:$item.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}"><img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}_s.jpg" width="72" height="98" alt="" /></a>
{{/if}}
{{/if}}


<br />
<span style="font-size:x-small;text-align:left;">
{{if $item.bushoid == "non_s"}}
&nbsp;<br />
&nbsp;<br />
{{else}}
<span style="color:#ff0000;">Lv </span>{{$item.level}} <span style="color:#00ff00;">Công  </span>{{$item.offense}}<br />
<span style="color:#00ff00;">Thủ  </span>{{$item.defense}} <span style="color:#00ff00;">Binh  </span>{{$item.follower}}
{{/if}}
</span></td>

{{if $smarty.foreach.deckf.iteration % 3 == 0}}</tr><tr>{{/if}}


<!-- * -->
{{/foreach}}

</tr>
</table>


{{else}}Không có card <br />
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">
{{include file="parts/pager.tpl" url="/card/file.php" parm="&st="|cat:$app.st|cat:"&deck="|cat:$app.deck|cat:"&seq="|cat:$app.seq|cat:"&mode="|cat:$app.mode|cat:"&id="|cat:$form.id|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts}}
</div>

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
